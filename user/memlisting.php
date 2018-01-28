<?php
session_start();

if(isset($_SESSION['isadmin']) &&  $_SESSION['isadmin']=="1") 
{}
else
{
	header('Location: index.php');
}

include_once("../classes/cms.php");
$objcms = new cms();

if(isset($_REQUEST['d']) && isset($_REQUEST['id']))
{	
	if($_REQUEST['d']=="1" && $_REQUEST['id']!=null)
	{
		/////////////////// DELETR //////////////////////
		if($objcms->delete_img('marketing',$path,$field,'id',$_REQUEST['id']))
		header('Location: '.$_SERVER['PHP_SELF'].'?DI=1');
		/////////////////// DELETR //////////////////////
	}
}

if(isset($_REQUEST['mail']) && isset($_REQUEST['id']))
{
	$res_set = $objcms->SELECT_QUERY("SELECT * FROM marketing WHERE id=".$_REQUEST['id']);
	$to = $res_set[0]["email"];
	$subject = "Please set password";
	$txt = "http://".$_SERVER['SERVER_NAME']."/admin/passwordset.php?id=".$_REQUEST['id']."type=marketing";	
	$objcms->Send_Mail_To($to, $subject, $txt, "memlisting.php");
}


$res = $objcms->SELECT_QUERY("SELECT * FROM marketing");


if(isset($_REQUEST['DI']) && $_REQUEST['DI'] != "")
$message = $objcms->tep_draw_message("Data is deleted !");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Salse Staff | Gentelella</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./font_awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
		td, th {
				  text-align: center !important;
				  vertical-align: baseline !important;
				}
	</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include("includes/left.php");?>
		<?php include("includes/header.php");?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sales Staff Management</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sr #</th>	
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Phone No</th>
                          <th>E-mail</th>
                          <th>Position</th>
                          <th>Action &nbsp;&nbsp;<button type="button" class="btn btn-primary" onClick="javascript: window.location.href = 'addmem.php';">Add Sales Staff</button></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(count($res) > 0) { $cont = 0; foreach($res as $v) { $cont = $cont+1;?>
                        <tr>
                          <td><?php echo $cont;?></td>
                          <td><?php echo $v["fname"];?></td>
                          <td><?php echo $v["lname"];?></td>
                          <td><?php echo $v["phone"];?></td>
                          <td><?php echo $v["email"];?></td>
                          <td><?php echo $v["des"];?></td>
                          <td style="width:200px !important;">
                          		<a class="btn btn-app" href="addmem.php?e=1&id=<?php echo $v["id"];?>">
                                  <i class="fa fa-edit"></i> Edit
                                </a>
                                <a class="btn btn-app" href="<?php echo $_SERVER['PHP_SELF'];?>?d=1&id=<?php echo $v["id"];?>">
                                  <i class="fa fa-stumbleupon"></i> Delete
                                </a>
                                <a class="btn btn-app" href="<?php echo $_SERVER['PHP_SELF'];?>?mail=1&id=<?php echo $v["id"];?>">
                                  <i class="fa fa-envelope"></i> Send Email
                                </a>
                          </td>
                        </tr>
                      <?php } } else { ?>
                      	<tr>
                          <td colspan="6">No Sales Member Found here !</td>
                        </tr>
                      <?php }?>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include("includes/footer.php");?>
        <!-- /footer content -->
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
<script language='javascript'>
jQuery(document).ready(function(e) {
    jQuery('#errdiv').fadeOut(6000);
});
	
</script>