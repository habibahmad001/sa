        <?php
 
            define('__ROOT__', dirname(dirname(__FILE__))); 
            
            require_once __ROOT__.'/include/DBHandler.php';
            require_once __ROOT__.'/include/PassHash.php';
            require __ROOT__.'/libs/Slim/Slim.php';

            \Slim\Slim::registerAutoloader();

            $app = new \Slim\Slim();

            // User id from db - Global Variable
            $user_id = NULL;

            /**
             * Verifying required params posted or not
             */
            function verifyRequiredParams($required_fields) {
                $error = false;$error_fields = "";$request_params = array();$request_params = $_REQUEST;
                // Handling PUT request params
                if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
                    $app = \Slim\Slim::getInstance();
                    parse_str($app->request()->getBody(), $request_params);
                }
                foreach ($required_fields as $field) {
                    if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
                        $error = true;
                        $error_fields .= $field . ', ';
                    }
                }
                if ($error) {
                    // Required field(s) are missing or empty
                    // echo error json and stop the app
                    $response = array();
                    $app = \Slim\Slim::getInstance();
                    $response["error"] = true;
                    $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
                    echoRespnse(400, $response);
                    $app->stop();
                }
            }

            /**
             * Validating email address
             */
            function validateEmail($email) {
                $app = \Slim\Slim::getInstance();
                echo $email;
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $response["error"] = true;
                    $response["message"] = 'Email address is not valid';
                    echoRespnse(400, $response);
                    $app->stop();
                }
            }

            /**
             * Echoing json response to client
             * @param String $status_code Http response code
             * @param Int $response Json response
             */
            function echoRespnse($status_code, $response) {
                $app = \Slim\Slim::getInstance();
                // Http response code
                $app->status($status_code);

                // setting response content type to json
                $app->contentType('application/json');

                echo json_encode($response);
            }
            
            /**
            * Adding Middle Layer to authenticate every request
            * Checking if the request has valid api key in the 'Authorization' header
            */
           function authenticate(\Slim\Route $route) {
               // Getting request headers
               $headers = apache_request_headers();
               $response = array();
               $app = \Slim\Slim::getInstance();

               // Verifying Authorization Header
               if (isset($headers['Authorization'])) {
                   $db = new DbHandler();

                   // get the api key
                   $api_key = $headers['Authorization'];
                   // validating api key
                   if (!$db->isValidApiKey($api_key)) {
                       // api key is not present in users table
                       $response["error"] = true;
                       $response["message"] = "Access Denied. Invalid Api key";
                       echoRespnse(401, $response);
                       $app->stop();
                   } else {
                       global $user_id;
                       // get user primary key id
                       $user = $db->getUserId($api_key);
                       if ($user != NULL)
                           $user_id = $user["id"];
                   }
               } else {
                   // api key is missing in header
                   $response["error"] = true;
                   $response["message"] = "Api key is misssing";
                   echoRespnse(400, $response);
                   $app->stop();
               }
           }
           
           /**
            * User Registration
            * url - /register
            * method - POST
            * params - name, email, password
            */
            $app->post('/register', function() use ($app) {
                        // check for required params
                        verifyRequiredParams(array('name', 'email', 'phone', 'password', 'username', 'gender', 'dob', 'license_number', 'reg_number',  'pic_url', 'points', 'pdo_id' ));

                        

                        // reading post params
                        $name = $app->request->post('name');
                        $email = $app->request->post('email');
                        $password = $app->request->post('password');
                        $reg = $app->request->post('reg_number');
                        $license = $app->request->post('license_number');
                        $dob = $app->request->post('dob');
                        $pic = $app->request->post('pic_url');
                        $points = $app->request->post('points');
                        $phone = $app->request->post('phone');
                        $username = $app->request->post('username');
                        $gender = $app->request->post('gender');
                        $pdo_id = $app->request->post('pdo_id');

                        echo $pdo_id;
                        // validating email address
                        //validateEmail($email);

                        $db = new DbHandler();
                        //$res = $db->createUser($name, $email, $phone, $password, $username, $gender, $dob, $license, $reg, $pic, $points, $pdo_id);

                        if ($res == USER_CREATED_SUCCESSFULLY) {
                            $response["error"] = false;
                            $response["message"] = "You are successfully registered";
                            echoRespnse(201, $response);
                        } else if ($res == USER_CREATE_FAILED) {
                            $response["error"] = true;
                            $response["message"] = "Oops! An error occurred while registering";
                            echoRespnse(200, $response);
                        } else if ($res == USER_ALREADY_EXISTED) {
                            $response["error"] = true;
                            $response["message"] = "Sorry, this email already existed";
                            echoRespnse(200, $response);
                        }
                    });
                    
            /**
            * User Login
            * url - /login
            * method - POST
            * params - email, password
            */
            $app->post('/login', function() use ($app) {
                        // check for required params
                        verifyRequiredParams(array('email', 'password'));

                        // reading post params
                        $email = $app->request()->post('email');
                        $password = $app->request()->post('password');
                        $response = array();

                        $db = new DbHandler();
                        // check for correct email and password
                        if ($db->checkLogin($email, $password)) {
                            // get the user by email
                            $user = $db->getUserByEmail($email);

                            if ($user != NULL) {
                                $response["error"] = false;
                                $response['name'] = $user['name'];
                                $response['email'] = $user['email'];
                                $response['pic_url'] = $user['pic_url'];
                                $response['gender'] = $user['gender'];
                                $response['dob'] = $user['dob'];
                                $response['apiKey'] = $user['api_key'];
                                $response['createdAt'] = $user['created_at'];
                            } else {
                                // unknown error occurred
                                $response['error'] = true;
                                $response['message'] = "An error occurred. Please try again";
                            }
                        } else {
                            // user credentials are wrong
                            $response['error'] = true;
                            $response['message'] = 'Login failed. Incorrect credentials';
                        }

                        echoRespnse(200, $response);
                    });

            $app->run();
            
        ?>

