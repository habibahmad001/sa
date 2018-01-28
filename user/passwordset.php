<?php 
session_start();
include_once("../classes/cms.php");


$objcms = new cms();

 
if(isset($_REQUEST["id"]) && isset($_REQUEST["password"]))
{
	$col[] = "pass";                $val[] = $_REQUEST['password'];
	if($objcms->update_img($_REQUEST["type"], $col, $val, 'id', $_REQUEST['id'], "", ""))
	{
		header('Location: ../sales/');
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

    <title>Password Reset! | </title>

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
              <h1>Password Reset</h1>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="rpassword" placeholder="Password" required="" />
                <input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>" />
                <input type="hidden" name="type" value="<?php echo $_REQUEST["type"];?>" />
              </div>
              <div>
                <a class="btn btn-default submit" href="javascript:void(0);" style="width: 100%;" onClick="javascript:jQuery('#login-frm').submit();">Log in</a>
              </div>

              <div class="clearfix"></div>


            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
