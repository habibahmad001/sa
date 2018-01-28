<?php
include("fckeditor.php");
session_start();

if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
{}
else
{
	header('Location: index.php');
}

include_once("../classes/cms.php");


$objcms = new cms();
$message = null;
$js=null;
$random = "r".(rand()%10000);
//$pid = $_REQUEST['pid'];
$sub_ind = $_REQUEST['sub'];
if(isset($_REQUEST['submit']))
{ 
if(!empty($_REQUEST['e']) and $_REQUEST['e'] == 1)
{

        //$col[] = "social_id";                   $val[] = $_REQUEST['social_id'];
        $col[] = "name";                        $val[] = $_REQUEST['name'];
        $col[] = "email";                       $val[] = $_REQUEST['email'];
        $col[] = "phone";                       $val[] = $_REQUEST['phone'];
        $col[] = "username";                    $val[] = $_REQUEST['username'];
        $col[] = "gender";                      $val[] = $_REQUEST['gender'];
        //$col[] = "api_key";                     $val[] = $_REQUEST['api_key'];
        $col[] = "created_at";                  $val[] = date("Y-m-d h:i:s", strtotime($_REQUEST['created_at']));
        //$col[] = "license_number";              $val[] = $_REQUEST['license_number'];
        //$col[] = "reg_number";                  $val[] = $_REQUEST['reg_number'];
        $col[] = "dob";                         $val[] = date("Y-m-d h:i:s", strtotime($_REQUEST['dob']));
        //$col[] = "vehicle";                     $val[] = $_REQUEST['vehicle'];
        //$col[] = "points";                      $val[] = $_REQUEST['points'];
        //$col[] = "km_driven";                   $val[] = $_REQUEST['km_driven'];
        //$col[] = "violations";                  $val[] = $_REQUEST['violations'];
        //$col[] = "pdo_id";                      $val[] = $_REQUEST['pdo_id'];


/////////////////// UPDATE //////////////////////
if($objcms->update_img('users', $col, $val,'id', $_REQUEST['id'], $path, $field))
{
	header('Location: '.$_SERVER['PHP_SELF'].'?msg=updated&e=1&id='.$_REQUEST['id']);
}
else
{header("Refresh:0");}
/////////////////// UPDATE //////////////////////
}
	
}

if(isset($_REQUEST['submit']) && $_REQUEST['e'] != 1)
{
		//$col[] = "social_id";                   $val[] = $_REQUEST['social_id'];
		$col[] = "name";                        $val[] = $_REQUEST['name'];
		$col[] = "email";                       $val[] = $_REQUEST['email'];
		$col[] = "phone";                       $val[] = $_REQUEST['phone'];
		$col[] = "username";                    $val[] = $_REQUEST['username'];
        $col[] = "gender";                      $val[] = $_REQUEST['gender'];
        //$col[] = "api_key";                     $val[] = $_REQUEST['api_key'];
        $col[] = "created_at";                  $val[] = date("Y-m-d h:i:s", strtotime($_REQUEST['created_at']));
        //$col[] = "license_number";              $val[] = $_REQUEST['license_number'];
        //$col[] = "reg_number";                  $val[] = $_REQUEST['reg_number'];
        $col[] = "dob";                         $val[] = date("Y-m-d h:i:s", strtotime($_REQUEST['dob']));
        //$col[] = "vehicle";                     $val[] = $_REQUEST['vehicle'];
        //$col[] = "points";                      $val[] = $_REQUEST['points'];
        //$col[] = "km_driven";                   $val[] = $_REQUEST['km_driven'];
        //$col[] = "violations";                  $val[] = $_REQUEST['violations'];
        //$col[] = "pdo_id";                      $val[] = $_REQUEST['pdo_id'];

        /////////////////// INSERT //////////////////////
		if($ins_id = $objcms->insert_new_with_id('users',$col,$val))
		{
			header('Location: '.$_SERVER['PHP_SELF'].'?msg=inserted');
		}
		else
		{header("Refresh:0");}
	    /////////////////// INSERT //////////////////////
}


//////////////////////////// MESSAGE BLOG ///////////////////////////////
if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "inserted")
$objcms->tep_draw_message("Successfully Inserted.", "success");
else if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "updated")
$objcms->tep_draw_message("Successfully Updated.", "success");
//////////////////////////// MESSAGE BLOG ///////////////////////////////


if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
    $res = $objcms->SELECT_QUERY("SELECT * FROM users WHERE id=" . $_REQUEST['id']);

    //$social_id = $res[0]['social_id'];
    $name = $res[0]['name'];
    $email = $res[0]['email'];
    $phone = $res[0]['phone'];
    $username = $res[0]['username'];
    $gender = $res[0]['gender'];
    //$api_key = $res[0]['api_key'];
    $created_at = $res[0]['created_at'];
    //$license_number = $res[0]['license_number'];
    //$reg_number = $res[0]['reg_number'];
    $dob = $res[0]['dob'];
    //$vehicle = $res[0]['vehicle'];
    //$points = $res[0]['points'];
    //$km_driven = $res[0]['km_driven'];
    //$violations = $res[0]['violations'];
    //$pdo_id = $res[0]['pdo_id'];
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
	  
    <title>Super Admin :: Add User</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./font_awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      
        <?php 
				include("includes/left.php");
				include("includes/header.php");		
		?>

        <!-- page content -->
         <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Form</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">

                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_content">
                    <br />
                    <form id="frm" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input class="form-control has-feedback-right" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" type="text">

                        </div>
                      </div>
                      <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Social ID<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" name="social_id" id="social_id" placeholder="Social ID" value="<?php /*echo $social_id; */?>" type="text" readonly>

                            </div>
                      </div>-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" type="text">

                      </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input class="form-control has-feedback-right" placeholder="Phone" name="phone" value="<?php echo $phone; ?>" id="phone" type="text">

                        </div>
                      </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">User Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="User Name" name="username" value="<?php echo $username; ?>" id="username" type="text">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gender <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Gender" name="gender" value="<?php echo $gender; ?>" id="gender" type="text">

                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Api Key <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Api Key" name="api_key" value="<?php /*echo $api_key; */?>" id="api_key" type="text" readonly>

                            </div>
                        </div>-->

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Created <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Created" name="created_at" value="<?php echo date("F,j Y  h:i:s", strtotime($created_at)); ?>" id="created_at" type="text">

                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">License Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="License Number" name="license_number" value="<?php /*echo $license_number; */?>" id="license_number" type="text" readonly>

                            </div>
                        </div>-->

                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Registration Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Registration Number" name="reg_number" value="<?php /*echo $reg_number; */?>" id="reg_number" type="text" readonly>

                            </div>
                        </div>-->

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date of Birth <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Date of Birth" name="dob" value="<?php echo date("F,j Y  h:i:s", strtotime($dob)); ?>" id="dob" type="text"  >

                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vehicle <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Vehicle" name="vehicle" value="<?php /*echo $vehicle; */?>" id="vehicle" type="text" readonly>

                            </div>
                        </div>-->

                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Points <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Points" name="points" value="<?php /*echo $points; */?>" id="points" type="text">

                            </div>
                        </div>-->

                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Km Driven <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Km Driven" name="km_driven" value="<?php /*echo $km_driven; */?>" id="km_driven" type="text" readonly>

                            </div>
                        </div>-->

                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Violations <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Violations" name="violations" value="<?php /*echo $violations; */?>" id="violations" type="text">

                            </div>
                        </div>-->

                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">PDO ID <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="PDO ID" name="pdo_id" value="<?php /*echo $pdo_id; */?>" id="pdo_id" type="text" readonly>

                            </div>
                        </div>-->
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input name="e" type="hidden" value="<?php if($_REQUEST["e"]) echo $_REQUEST["e"]; else echo 0;?>">
                          <input name="id" type="hidden" value="<?php if($_REQUEST["id"]) echo $_REQUEST["id"];?>">

                          <button type="submit" name="submit" id="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /page content -->

        <?php include("includes/footer.php");?>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    
    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
	
  </body>
</html>
<script language='javascript'>
jQuery(document).ready(function(e) {
    //jQuery("input").removeAttr("disabled");
    jQuery('#errdiv').fadeOut(6000);
});
	
</script>