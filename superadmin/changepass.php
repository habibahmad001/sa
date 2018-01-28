<?php 
session_start();
include_once("../classes/cms.php");

$objcms = new cms();

$username=null;
 
if(isset($_REQUEST["email"]))
{
      $email = $_REQUEST["email"];
        
      $result = $objcms->SELECT_QUERY("SELECT * FROM admin WHERE email='".$email."'");

      if($result[0]) {
          $txt = "Hi ". $result[0]["fname"]." ".$result[0]["lname"].",\r\n\r\nYour password is : ". $objcms->decryptItssl( $result[0]["pass"] );
          $txt .= "\r\n\r\nThanks";
          //echo $txt; exit();

          $objcms->Send_Mail_To($result[0]["email"], "Your Password Is !!!", $txt, "./index.php");
      } else {
          $objcms->tep_draw_message("Email is not registered.");
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

    <title> Road Safty ! </title>

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
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login-frm" name="login-frm" enctype="multipart/form-data" method="post">
              <h1>Forget Password</h1>
              <div>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required="" />
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
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
