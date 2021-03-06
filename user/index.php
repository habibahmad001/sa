<?php
session_start();
include_once("../classes/cms.php");

$objcms = new cms();

$username=null;
$password = null;

if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]))
{
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];
    $rmb = $_REQUEST["rmb"];

    $result = $objcms->SELECT_QUERY("SELECT * FROM users WHERE username='".$username."'");

    if($objcms->decryptItssl($result[0]["password_hash"]) == $password)
    {
        $_SESSION["user_id"]= $result[0]["id"];
        $_SESSION["isadmin"] = 1;


        header('Location: editrequiries.php');
    }
    elseif($result[0]["password_hash"] == NULL) {
        header('Location: changepass.php?id='.$result[0]["id"]);
    }
    else
    {
        $objcms->tep_draw_message("Invalid credentials, Please try again.");
    }
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> User :: Login </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./font_awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
      <style>
          #rmb {
              float: left;
              margin: 10px 5px 0 0;
          }
          #armb {
              float: left;
              margin: 10px 0 0 0;
          }
      </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login-frm" name="login-frm" enctype="multipart/form-data" method="post">
              <h1>User Login</h1>
              <div>
                <input type="text" class="form-control" name="username" value="<?php echo $username;?>" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" value="<?php echo $password;?>" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="javascript:void(0);" style="width: 100%;" onClick="javascript:jQuery('#login-frm').submit();">Log in</a>
              </div>

              <div class="clearfix"></div>

              <!--div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> IMS!</h1>
                </div>
              </div-->
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="dashboard.php">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> User!</h1>
                  <p>©2018 All Rights Reserved. User. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
