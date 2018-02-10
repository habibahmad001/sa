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
$res_fil = array();
if(isset($_REQUEST['submit']))
{
if(!empty($_REQUEST['e']) and $_REQUEST['e'] == 1)
{

        $col[] = "name";                            $val[] = $_REQUEST['name'];
        $col[] = "minprice";                        $val[] = $_REQUEST['minprice'];
        $col[] = "email";                           $val[] = $_REQUEST['email'];
        $col[] = "phone";                           $val[] = $_REQUEST['phone'];
        $col[] = "city";                            $val[] = $_REQUEST['city'];
        $col[] = "surname";                         $val[] = $_REQUEST['surname'];
        $col[] = "maxprice";                        $val[] = $_REQUEST['maxprice'];
        $col[] = "town";                            $val[] = $_REQUEST['town'];
        $col[] = "minland";                         $val[] = $_REQUEST['minland'];
        $col[] = "neigbourhood";                    $val[] = $_REQUEST['neigbourhood'];
        $col[] = "mobile";                          $val[] = $_REQUEST['mobile'];
        $col[] = "maxland";                         $val[] = $_REQUEST['maxland'];
        $col[] = "description";                     $val[] = $_REQUEST['description'];
        $col[] = "typeofrequire";                   $val[] = $_REQUEST['typeofrequire'];
        $col[] = "estatetype";                      $val[] = $_REQUEST['estatetype'];
        $col[] = "uid";                             $val[] = $_SESSION['user_id'];
        $col[] = "is_edit";                         $val[] = 1;


/////////////////// UPDATE //////////////////////
if($objcms->update_img('realesteate', $col, $val,'id', $_REQUEST['id'], $path, $field))
{
    $res_fil = $objcms->SELECT_QUERY("SELECT * FROM requiries WHERE typeofrequiries='" . $_REQUEST['typeofrequire'] . "' and estatetype='" . $_REQUEST['estatetype'] . "' and city='" . $_REQUEST['city'] . "' and town='" . $_REQUEST['town'] ."' and neigbourhood='" . $_REQUEST['neigbourhood'] . "' and (m2 BETWEEN " . $_REQUEST['minland'] ." AND " . $_REQUEST['maxland'] . ") and (price BETWEEN " . $_REQUEST['minprice'] ." AND " . $_REQUEST['maxprice'].")");
    //header('Location: '.$_SERVER['PHP_SELF'].'?msg=updated&e=1&id='.$_REQUEST['id']);
}
else
{header("Refresh:0");}
/////////////////// UPDATE //////////////////////
}
	
}

if(isset($_REQUEST['submit']) && $_REQUEST['e'] != 1)
{
        $col[] = "name";                            $val[] = $_REQUEST['name'];
        $col[] = "minprice";                        $val[] = $_REQUEST['minprice'];
        $col[] = "email";                           $val[] = $_REQUEST['email'];
        $col[] = "phone";                           $val[] = $_REQUEST['phone'];
        $col[] = "city";                            $val[] = $_REQUEST['city'];
        $col[] = "surname";                         $val[] = $_REQUEST['surname'];
        $col[] = "maxprice";                        $val[] = $_REQUEST['maxprice'];
        $col[] = "town";                            $val[] = $_REQUEST['town'];
        $col[] = "minland";                         $val[] = $_REQUEST['minland'];
        $col[] = "neigbourhood";                    $val[] = $_REQUEST['neigbourhood'];
        $col[] = "mobile";                          $val[] = $_REQUEST['mobile'];
        $col[] = "maxland";                         $val[] = $_REQUEST['maxland'];
        $col[] = "description";                     $val[] = $_REQUEST['description'];
        $col[] = "typeofrequire";                   $val[] = $_REQUEST['typeofrequire'];
        $col[] = "estatetype";                      $val[] = $_REQUEST['estatetype'];
        $col[] = "uid";                             $val[] = $_SESSION['user_id'];

        /////////////////// INSERT //////////////////////
		if($ins_id = $objcms->insert_with_zero('realesteate',$col,$val))
		{
            $res_fil = $objcms->SELECT_QUERY("SELECT * FROM requiries WHERE typeofrequiries='" . $_REQUEST['typeofrequire'] . "' and estatetype='" . $_REQUEST['estatetype'] . "' and city='" . $_REQUEST['city'] . "' and town='" . $_REQUEST['town'] ."' and neigbourhood='" . $_REQUEST['neigbourhood'] . "' and (m2 BETWEEN " . $_REQUEST['minland'] ." AND " . $_REQUEST['maxland'] . ") and (price BETWEEN " . $_REQUEST['minprice'] ." AND " . $_REQUEST['maxprice'].")");
			//header('Location: '.$_SERVER['PHP_SELF'].'?msg=inserted');
		}
		else
		{$objcms->tep_draw_message("Request failed!");}
	    /////////////////// INSERT //////////////////////
}


//////////////////////////// MESSAGE BLOG ///////////////////////////////
if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "inserted")
$objcms->tep_draw_message("Successfully Inserted.", "success");
else if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "updated")
$objcms->tep_draw_message("Successfully Updated.", "success");
//////////////////////////// MESSAGE BLOG ///////////////////////////////


if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
    $res = $objcms->SELECT_QUERY("SELECT * FROM realesteate WHERE id=" . $_REQUEST['id']);

    $name = $res[0]['name'];
    $minprice = $res[0]['minprice'];
    $email = $res[0]['email'];
    $phone = $res[0]['phone'];
    $surname = $res[0]['surname'];
    $maxprice = $res[0]['maxprice'];
    $minland = $res[0]['minland'];
    $town = $res[0]['town'];
    $city = $res[0]['city'];
    $neigbourhood = $res[0]['neigbourhood'];
    $mobile = $res[0]['mobile'];
    $maxland = $res[0]['maxland'];
    $description = $res[0]['description'];
    $typeofrequire = $res[0]['typeofrequire'];
    $estatetype = $res[0]['estatetype'];
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
	  
    <title>Super Admin :: Add Requiries</title>

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
      <style>
          select, textarea {
              width: 100%;
          }
      </style>
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
                <h3>Requiries Form</h3>
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
                    <form id="frm" data-parsley-validate onsubmit="return validatefrm(new Array('phone', 'mobile', 'city', 'town', 'neigbourhood', 'minland', 'maxland', 'maxprice', 'description'));" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input class="form-control has-feedback-right" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" type="text">

                        </div>
                      </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Surname <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Surname" name="surname" value="<?php echo $surname; ?>" id="surname" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Email" name="email" value="<?php echo $email; ?>" id="email" type="text">

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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mobile <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Mobile" name="mobile" value="<?php echo $mobile; ?>" id="mobile" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Type of Require <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                <select name="typeofrequire" id="typeofrequire" class="medium gfield_select" tabindex="5" aria-required="true" aria-invalid="false">
                                    <option value="">-- Type of Require --</option>
                                    <option value="34">Kiralık</option>
                                    <option value="35">Satılık</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estate Type <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="estatetype" id="estatetype" class="medium gfield_select" tabindex="10" aria-required="true" aria-invalid="false">
                                    <option value="--Estate Type --">-- Estate Type --</option>
                                    <option value="14474" selected="selected" class="gf_placeholder">Arsa Tipi Seçiniz</option>
                                    <option value="14476">A-Lejantlı</option>
                                    <option value="14475">Ada</option>
                                    <option value="14477">Bağ &amp; Bahçe</option>
                                    <option value="14478">Depo &amp; Antrepo</option>
                                    <option value="14479">Eğitim</option>
                                    <option value="14480">Enerji Depolama</option>
                                    <option value="14481">İmarlı - Konut</option>
                                    <option value="14485">İmarlı - Sanayi</option>
                                    <option value="14482">İmarlı - Ticari</option>
                                    <option value="14483">İmarlı - Ticari + Konut</option>
                                    <option value="14494">İmarlı - Toplu Konut</option>
                                    <option value="14484">İmarlı - Turizm</option>
                                    <option value="14486">Muhtelif</option>
                                    <option value="14487">Özel Kullanım</option>
                                    <option value="14488">Sağlık</option>
                                    <option value="14489">Sera</option>
                                    <option value="14490">Sit Alanı</option>
                                    <option value="14491">Spor Alanı</option>
                                    <option value="14492">Tarla</option>
                                    <option value="90">Villa</option>
                                    <option value="14493">Zeytinlik</option>
                                </select>


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                <select name="city" id="city">
                                    <option value="">-- Select One --</option>
                                    <?php $city_res = $objcms->SELECT_QUERY("SELECT * FROM city"); foreach($city_res as $v) { ?>
                                        <option value="<?php echo $v["id"];?>"><?php echo $v["name"];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Town <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="town" id="town">
                                    <?php if(!empty($_REQUEST['e']) and $_REQUEST['e'] == 1) { ?>
                                        <option value="">-- Select One --</option>
                                        <?php if($city != "") {?>
                                        <?php $town_res = $objcms->SELECT_QUERY("SELECT * FROM town WHERE pid=$city"); foreach($town_res as $v) { ?>
                                            <option value="<?php echo $v["id"];?>"><?php echo $v["name"];?></option>
                                        <?php } } ?>
                                    <?php } else {?>
                                        <option value="">-- Select One --</option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Neigbour Hood <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                <select name="neigbourhood" id="neigbourhood">
                                    <?php if(!empty($_REQUEST['e']) and $_REQUEST['e'] == 1) { ?>
                                        <option value="">-- Select One --</option>
                                        <?php if($town != "") {?>
                                        <?php $nea_res = $objcms->SELECT_QUERY("SELECT * FROM neabour WHERE tid=$town"); foreach($nea_res as $v) { ?>
                                            <option value="<?php echo $v["id"];?>"><?php echo $v["name"];?></option>
                                        <?php } } ?>
                                    <?php } else {?>
                                        <option value="">-- Select One --</option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Min. Land Area <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Min. Land Area" name="minland" value="<?php echo $minland; ?>" id="minland" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Max. Land Area <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Max. Land Area" name="maxland" value="<?php echo $maxland; ?>" id="maxland" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Min. Price<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" name="minprice" id="minprice" placeholder="Min. Price" value="<?php echo $minprice; ?>" type="text">

                            </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Max. Price <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input class="form-control" placeholder="Max. Price" name="maxprice" id="maxprice" value="<?php echo $maxprice; ?>" type="text">

                        </div>
                      </div>
                      </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: right;">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <textarea name="description" id="description"><?php echo $description; ?></textarea>
                            </div>
                        </div>


                      
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


                    <?php //print_r($res_fil);?>
                  <div class="title_left">
                      <h3>Matched Records</h3>
                  </div>
                  <div class="x_content">

                      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap col-no-sort" cellspacing="0" width="100%">
                          <thead>
                          <tr>
                              <th>Sr #</th>
                              <th>Title</th>
                              <th>M2</th>
                              <th>Price</th>
                              <th>Email</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php if(count($res_fil) > 0) { $cont = 0; foreach($res_fil as $v) { $cont = $cont+1;?>
                              <tr>
                                  <td><?php echo $cont;?></td>
                                  <td><?php echo $v["title"];?></td>
                                  <td><?php echo $v["m2"];?></td>
                                  <td><?php echo $v["price"];?></td>
                                  <td><?php echo $v["emsal"];?></td>
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
    jQuery('select#estatetype').val("<?php echo $estatetype;?>");
    jQuery('select#typeofrequire').val("<?php echo $typeofrequire;?>");
    jQuery('select#city').val("<?php echo $city;?>");
    jQuery('select#town').val("<?php echo $town;?>");
    jQuery('select#neigbourhood').val("<?php echo $neigbourhood;?>");

    jQuery("#city").change(function () {
        var opid = jQuery(this).val();
        jQuery.get('ajax/town.php', { id: opid}, function(data){
            jQuery("#town").html(data);
        });
    });

    jQuery("#town").change(function () {
        var opid = jQuery(this).val();
        jQuery.get('ajax/neabour.php', { id: opid}, function(data){
            jQuery("#neigbourhood").html(data);
        });
    });

});

function validatefrm(skip_arr) {
    var msg = 1;
    $( "input[type=\"text\"], textarea, select" ).each(function( index ) { //console.log(skip_arr);jQuery(this).attr("name")
        if(!skip_arr.includes(jQuery(this).attr("name")) ) {
            if (jQuery(this).val() == "") {
                jQuery(this).css("border", "1px solid red");
                msg = 2;
            } else {
                jQuery(this).css("border", "1px solid #ccc");
                msg = 1;
            }
        } else {
            console.log("This element is in Skip Array :" + skip_arr);
        }
    });

    if(msg == 1) {
        return true;
    } else {
        return false;
    }

}

</script>