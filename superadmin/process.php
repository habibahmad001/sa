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

$res = "";
/*if(isset($_REQUEST["id"])) 
{
	$res = $objcms->SELECT_QUERY('SELECT DATEDIFF(NOW(), sdtm) AS dayss FROM leads WHERE id='.$_REQUEST["id"]);
}

$select_step = 0;

if($res[0]["dayss"] <= 7)
{
	$select_step = 0;
}
else if($res[0]["dayss"] > 7 and $res[0]["dayss"] <= 14)
{
	$select_step = 1;
}
else if($res[0]["dayss"] > 14 and $res[0]["dayss"] <= 21)
{
	$select_step = 2;
}
else if(($res[0]["dayss"] > 21 and $res[0]["dayss"] <= 28) or $res[0]["dayss"] > 28)
{
	$select_step = 3;
}*/
if(isset($_REQUEST["id"])) 
{
	$res = $objcms->SELECT_QUERY('SELECT * FROM stages WHERE lid='.$_REQUEST["id"]);
}

$select_step = 0;

if($res[0]["st1"] != "")
{
	$select_step = 1;
}
if($res[0]["st2"] != "")
{
	$select_step = 2;
}
if($res[0]["st3"] != "")
{
	$select_step = 3;
}
if($res[0]["st4"] != "")
{
	$select_step = 3;
}




$res_lead_list = $objcms->SELECT_QUERY('SELECT * FROM leads');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Process! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./font_awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
	.actionBar a {
		display: none !important;
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
                    <h2>Lead Stages</h2>
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


                    <!-- Smart Wizard -->
                    <?php if($_REQUEST["id"] == "") {?>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin: 0px 0px 5% 0px;">
                          <select class="select2_single form-control" onChange="javascript: frmsubmit(this.value);">
                          		<option></option>	
							  <?php foreach($res_lead_list as $res_list) {?>
                                <option value="<?php echo $res_list["id"];?>"><?php echo $res_list["name"];?></option>
                              <?php } ?>  
                          </select>
                    </div>
                    <?php } ?>
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br />
                                              <small>Meeting With Client</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br />
                                              <small>Design Submission</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br />
                                              <small>Installation</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Step 4<br />
                                              <small>Close Project</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        <h2 class="StepTitle">Step 1</h2>
						<p>It's <?php echo $res[0]["dayss"];?>TH day Since project starts and client meeting in Progress.</p>
                      </div>
                      <div id="step-2">
                        <h2 class="StepTitle">Step 2</h2>
                        <p>It's <?php echo $res[0]["dayss"];?>TH day Since project starts and Design Phase in Progress.</p>
                      </div>
                      <div id="step-3">
                        <h2 class="StepTitle">Step 3</h2>
                        <p>It's <?php echo $res[0]["dayss"];?>TH day Since project starts and Instalation Phase in Progress.</p>
                      </div>
                      <div id="step-4">
                        <h2 class="StepTitle">Step 4</h2>
                        <p>It's <?php echo $res[0]["dayss"];?>TH day Since project starts and Closing Phase in Progress.</p>
                      </div>

                    </div>
                    <!-- End SmartWizard Content -->

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
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

	
  </body>
</html>
<script language="javascript">
function frmsubmit(v1) {
	window.location.href = '<?php echo $_SERVER['PHP_SELF'];?>?id='+v1;
}
(function($){

$.fn.smartWizard = function(method) {
    var args = arguments;
    var rv = undefined;
    var allObjs = this.each(function() {
        var wiz = $(this).data('smartWizard');
        if (typeof method == 'object' || ! method || ! wiz) {
            var options = $.extend({}, $.fn.smartWizard.defaults, method || {});
            if (! wiz) {
                wiz = new SmartWizard($(this), options);
                $(this).data('smartWizard', wiz);
            }
        } else {
            if (typeof SmartWizard.prototype[method] == "function") {
                rv = SmartWizard.prototype[method].apply(wiz, Array.prototype.slice.call(args, 1));
                return rv;
            } else {
                $.error('Method ' + method + ' does not exist on jQuery.smartWizard');
            }
        }
    });
    if (rv === undefined) {
        return allObjs;
    } else {
        return rv;
    }
};

// Default Properties and Events
$.fn.smartWizard.defaults = {
    selected: <?php echo $select_step;?>,  // Selected Step, 0 = first step
    keyNavigation: true, // Enable/Disable key navigation(left and right keys are used if enabled)
    enableAllSteps: false,
    transitionEffect: 'fade', // Effect on navigation, none/fade/slide/slideleft
    contentURL:null, // content url, Enables Ajax content loading
    contentCache:true, // cache step contents, if false content is fetched always from ajax url
    cycleSteps: false, // cycle step navigation
    enableFinishButton: false, // make finish button enabled always
	hideButtonsOnDisabled: false, // when the previous/next/finish buttons are disabled, hide them instead?
    errorSteps:[],    // Array Steps with errors
    labelNext:'Next',
    labelPrevious:'Previous',
    labelFinish:'Finish',
    noForwardJumping: false,
    onLeaveStep: null, // triggers when leaving a step
    onShowStep: null,  // triggers when showing a step
    onFinish: null  // triggers when Finish button is clicked
};

})(jQuery);
</script>