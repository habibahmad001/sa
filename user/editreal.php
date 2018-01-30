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

        $col[] = "title";                           $val[] = $_REQUEST['title'];
        $col[] = "description";                     $val[] = $_REQUEST['description'];
        $col[] = "typeofrequiries";                 $val[] = $_REQUEST['typeofrequiries'];
        $col[] = "estatetype";                      $val[] = $_REQUEST['estatetype'];
        $col[] = "label";                           $val[] = $_REQUEST['label'];
        $col[] = "price";                           $val[] = $_REQUEST['price'];
        $col[] = "m2";                              $val[] = $_REQUEST['m2'];
        $col[] = "swap";                            $val[] = $_REQUEST['swap'];
        $col[] = "craditavaibility";                $val[] = $_REQUEST['craditavaibility'];
        $col[] = "bagari";                          $val[] = $_REQUEST['bagari'];
        $col[] = "deadstatus";                      $val[] = $_REQUEST['deadstatus'];
        $col[] = "katkarsilig";                     $val[] = $_REQUEST['katkarsilig'];
        $col[] = "emsal";                           $val[] = $_REQUEST['emsal'];
        $col[] = "videourl";                        $val[] = $_REQUEST['videourl'];
        $col[] = "address";                         $val[] = $_REQUEST['address'];
        $col[] = "city";                            $val[] = $_REQUEST['city'];
        $col[] = "town";                            $val[] = $_REQUEST['town'];
        $col[] = "neigbourhood";                    $val[] = $_REQUEST['neigbourhood'];
        $col[] = "uid";                             $val[] = $_SESSION["user_id"];
        $col[] = "is_edit";                         $val[] = 1;

        if($_FILES['photo']['name'] != "")
        {
            if(upload_image('photo',$random,'0'))
            {
                $col[] = "photo";                     $val[] = $random."".$_FILES['photo']['name'];
                $field[] = "photo";                   $path[] = "../images/uploads/";
            } else {
                $objcms->tep_draw_message("Fail To Upload The Thum Nail Image.");
            }

        }

/////////////////// UPDATE //////////////////////
if($objcms->update_img('requiries', $col, $val,'id', $_REQUEST['id'], $path, $field))
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
        $col[] = "title";                           $val[] = $_REQUEST['title'];
        $col[] = "description";                     $val[] = $_REQUEST['description'];
        $col[] = "typeofrequiries";                 $val[] = $_REQUEST['typeofrequiries'];
        $col[] = "estatetype";                      $val[] = $_REQUEST['estatetype'];
        $col[] = "label";                           $val[] = $_REQUEST['label'];
        $col[] = "price";                           $val[] = $_REQUEST['price'];
        $col[] = "m2";                              $val[] = $_REQUEST['m2'];
        $col[] = "swap";                            $val[] = $_REQUEST['swap'];
        $col[] = "craditavaibility";                $val[] = $_REQUEST['craditavaibility'];
        $col[] = "bagari";                          $val[] = $_REQUEST['bagari'];
        $col[] = "deadstatus";                      $val[] = $_REQUEST['deadstatus'];
        $col[] = "katkarsilig";                     $val[] = $_REQUEST['katkarsilig'];
        $col[] = "emsal";                           $val[] = $_REQUEST['emsal'];
        $col[] = "videourl";                        $val[] = $_REQUEST['videourl'];
        $col[] = "address";                         $val[] = $_REQUEST['address'];
        $col[] = "city";                            $val[] = $_REQUEST['city'];
        $col[] = "town";                            $val[] = $_REQUEST['town'];
        $col[] = "neigbourhood";                    $val[] = $_REQUEST['neigbourhood'];
        $col[] = "uid";                             $val[] = $_SESSION["user_id"];

        if($_FILES['photo']['name'] != "")
        {
            if(upload_image('photo',$random,'0'))
            {
                $col[] = "photo";          $val[] = $random."".$_FILES['photo']['name'];
            } else {
                $objcms->tep_draw_message("Some issue with image uploading.");
            }

        } else {
            $objcms->tep_draw_message("Image path is empty.");
        }

        /////////////////// INSERT //////////////////////
		if($ins_id = $objcms->insert_new_with_id('requiries',$col,$val))
		{
			header('Location: '.$_SERVER['PHP_SELF'].'?msg=inserted');
		} else {
            $objcms->tep_draw_message("Request Failed.");
        }
	    /////////////////// INSERT //////////////////////
}


//////////////////////////// MESSAGE BLOG ///////////////////////////////
if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "inserted")
$objcms->tep_draw_message("Successfully Inserted.", "success");
else if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == "updated")
$objcms->tep_draw_message("Successfully Updated.", "success");
//////////////////////////// MESSAGE BLOG ///////////////////////////////


if(isset($_REQUEST['id']) && $_REQUEST['id'] != "") {
    $res = $objcms->SELECT_QUERY("SELECT * FROM requiries WHERE id=" . $_REQUEST['id']);

    $title = $res[0]['title'];
    $description = $res[0]['description'];
    $typeofrequiries = $res[0]['typeofrequiries'];
    $estatetype = $res[0]['estatetype'];
    $label = $res[0]['label'];
    $price = $res[0]['price'];
    $photo = $res[0]['photo'];
    $m2 = $res[0]['m2'];
    $swap = $res[0]['swap'];
    $craditavaibility = $res[0]['craditavaibility'];
    $bagari = $res[0]['bagari'];
    $deadstatus = $res[0]['deadstatus'];
    $katkarsilig = $res[0]['katkarsilig'];
    $emsal = $res[0]['emsal'];
    $videourl = $res[0]['videourl'];
    $address = $res[0]['address'];
    $city = $res[0]['city'];
    $town = $res[0]['town'];
    $neigbourhood = $res[0]['neigbourhood'];


}

function upload_image($imagename,$prefix,$num)
{

    $uploaded_size = $_FILES[$imagename]['size'];
    $uploaded_type = $_FILES[$imagename]['type'];
    if($num == 0)
        $target =  "../images/uploads/".$prefix."".$_FILES[$imagename]['name'];
    $ok=1;

    //This is our size condition
    if ($uploaded_size > 350000)
    {
        //$ok=0;
        //return false;
    }

    //This is our limit file type condition
    if ($uploaded_type =="text/php")
    {
        return false;
        $ok=0;
    }

    //Here we check that $ok was not set to 0 by an error
    if ($ok==0)
    {
        return false;
    }

    //If everything is ok we try to upload it
    else if($_FILES[$imagename]['name'] != null &&  $_FILES[$imagename]['name']!= "")
    {
        if(move_uploaded_file($_FILES[$imagename]['tmp_name'], $target))
        {

            return true;
        }
        else
        {
            return false;
        }
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
	  
    <title>Super Admin :: Add Listing</title>

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
        #imgmar {
            margin: 15px 0px;
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
                <h3>Listing Form</h3>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Title<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input class="form-control has-feedback-right" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" type="text">

                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <textarea name="description" id="description"><?php echo $description; ?></textarea>

                      </div>
                      </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Type Of Requiries <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="typeofrequiries" id="typeofrequiries">
                                    <option value="">-- Select One --</option>
                                    <option value="Satilik">Satilik</option>
                                    <option value="Kiralik">Kiralik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estate Type <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="estatetype" id="estatetype" class="medium gfield_select" tabindex="10" aria-required="true" aria-invalid="false">
                                    <option value="--Estate Type --">-- Estate Type --</option>
                                    <option value="" selected="selected" class="gf_placeholder">Arsa Tipi Seçiniz</option>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Label <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                            <select name="label" id="label">
                                <option value="">-- Select One --</option>
                                <option value="Acil Satilik">Acil Satilik</option>
                                <option value="Okazyon Fiyat">Okazyon Fiyat</option>
                                <option value="Takasa Acik">Takasa Acik</option>
                            </select>
                        </div>
                      </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Price <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="Price" name="price" id="price" value="<?php echo $price; ?>" type="text">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Imange <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input placeholder="Imange" name="photo" id="photo" value="<?php echo $photo; ?>" type="file">
                                <?php if(isset($photo)) {?>
                                    <img id="imgmar" src="<?php echo "../images/uploads/$photo";?>" width="250" />
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">M2 <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="M2" name="m2" id="m2" value="<?php echo $m2; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">swap <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="swap" name="swap" id="swap" value="<?php echo $swap; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cradit Avaibility <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="Cradit Avaibility" name="craditavaibility" id="craditavaibility" value="<?php echo $craditavaibility; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bagari <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="Bagari" name="bagari" id="bagari" value="<?php echo $bagari; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dead Status <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="Dead Status" name="deadstatus" id="deadstatus" value="<?php echo $deadstatus; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kat-karsilig <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="Kat-karsilig" name="katkarsilig" id="katkarsilig" value="<?php echo $katkarsilig; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Emsal <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="Email" name="emsal" id="emsal" value="<?php echo $emsal; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Video URL <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="Video URL" name="videourl" id="videourl" value="<?php echo $videourl; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="Address" name="address" id="address" value="<?php echo $address; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="City" name="city" id="city" value="<?php echo $city; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Town <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="Town" name="town" id="town" value="<?php echo $town; ?>" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Neigbour Hood <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control" placeholder="Neigbour Hood" name="neigbourhood" id="neigbourhood" value="<?php echo $neigbourhood; ?>" type="text">

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
    jQuery('select#label').val("<?php echo $label;?>");
    jQuery('select#typeofrequiries').val("<?php echo $typeofrequiries;?>");
    jQuery('select#estatetype').val("<?php echo $estatetype;?>");
});
	
</script>