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
		if($objcms->delete_img('realesteate',$path,$field,'id',$_REQUEST['id']))
		header('Location: '.$_SERVER['PHP_SELF'].'?DI=1');
		/////////////////// DELETR //////////////////////
	}
}

$res = $objcms->SELECT_QUERY("SELECT * FROM realesteate WHERE is_edit=1");



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

    <title>Super Admin :: Realesteate Listing Page</title>

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

                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">


                  <div class="x_content">
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap col-no-sort" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sr #</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Surname</th>
                            <th>Mobile #</th>
                          <th class="no-sort">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(count($res) > 0) { $cont = 0; foreach($res as $v) { $cont = $cont+1;?>
                        <tr>
                            <td><?php echo $cont;?></td>
                            <td><?php echo $v["adn"];?></td>
                            <td><?php echo $v["emsal"];?></td>
                            <td><?php echo $v["soy"];?></td>
                            <td><?php echo $v["cept"];?></td>
                          <td style="width:200px !important;">
                          		<a class="btn btn-app" href="editreal.php?e=1&id=<?php echo $v["id"];?>&vid=1">
                                  <i class="fa fa-edit"></i> View/Edit
                                </a>
                          </td>
                        </tr>
                      <?php } } else { ?>
                      	<tr>
                          <td colspan="6">No Client Found here !</td>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

  </body>
</html>
<script language='javascript'>
jQuery(document).ready(function(e) {
    jQuery('#errdiv').fadeOut(6000);
});

$('.col-no-sort').DataTable( {
    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
    "columnDefs": [ {
        "targets": 'no-sort',
        "orderable": false,
    } ]
} );

jQuery(function() {
    jQuery("#sdate").datepicker({ 
      showOn: 'button'
    });
    jQuery("#edate").datepicker({ 
      showOn: 'button'
    });

});
	
</script>