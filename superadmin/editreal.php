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

        $col[] = "adn";                         $val[] = $_REQUEST['Adınız'];
        $col[] = "minf";                        $val[] = $_REQUEST['MinFiyat'];
        $col[] = "email";                       $val[] = $_REQUEST['email'];
        $col[] = "phone";                       $val[] = $_REQUEST['phone'];
        $col[] = "sec";                         $val[] = $_REQUEST['Seçiniz'];
        $col[] = "soy";                         $val[] = $_REQUEST['Soyadınız'];
        $col[] = "maxf";                        $val[] = $_REQUEST['MaxFiyat'];
        $col[] = "ice";                         $val[] = $_REQUEST['İlçe'];
        $col[] = "mina";                        $val[] = $_REQUEST['MinAlan'];
        $col[] = "mah";                         $val[] = $_REQUEST['Mahalle'];
        $col[] = "cept";                        $val[] = $_REQUEST['CepTelefonu'];
        $col[] = "maxa";                        $val[] = $_REQUEST['MaxAlan'];
        $col[] = "aci";                         $val[] = $_REQUEST['Açıklama'];
        $col[] = "arstu";                       $val[] = $_REQUEST['ArsaTürü'];
        $col[] = "arst";                        $val[] = $_REQUEST['ArsaTipi'];
        $col[] = "is_edit";                     $val[] = 0;


/////////////////// UPDATE //////////////////////
if($objcms->update_img('realesteate', $col, $val,'id', $_REQUEST['id'], $path, $field))
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
        $col[] = "adn";                         $val[] = $_REQUEST['Adınız'];
        $col[] = "minf";                        $val[] = $_REQUEST['MinFiyat'];
        $col[] = "email";                       $val[] = $_REQUEST['email'];
        $col[] = "phone";                       $val[] = $_REQUEST['phone'];
        $col[] = "sec";                         $val[] = $_REQUEST['Seçiniz'];
        $col[] = "soy";                         $val[] = $_REQUEST['Soyadınız'];
        $col[] = "maxf";                        $val[] = $_REQUEST['MaxFiyat'];
        $col[] = "ice";                         $val[] = $_REQUEST['İlçe'];
        $col[] = "mina";                        $val[] = $_REQUEST['MinAlan'];
        $col[] = "mah";                         $val[] = $_REQUEST['Mahalle'];
        $col[] = "cept";                        $val[] = $_REQUEST['CepTelefonu'];
        $col[] = "maxa";                        $val[] = $_REQUEST['MaxAlan'];
        $col[] = "aci";                         $val[] = $_REQUEST['Açıklama'];
        $col[] = "arstu";                       $val[] = $_REQUEST['ArsaTürü'];
        $col[] = "arst";                        $val[] = $_REQUEST['ArsaTipi'];

        /////////////////// INSERT //////////////////////
		if($ins_id = $objcms->insert_with_zero('realesteate',$col,$val))
		{
			header('Location: '.$_SERVER['PHP_SELF'].'?msg=inserted');
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

    $Adınız = $res[0]['adn'];
    $MinFiyat = $res[0]['minf'];
    $email = $res[0]['email'];
    $phone = $res[0]['phone'];
    $Seçiniz = $res[0]['sec'];
    $Soyadınız = $res[0]['soy'];
    $MaxFiyat = $res[0]['maxf'];
    $İlçe = $res[0]['ice'];
    $MinAlan = $res[0]['mina'];
    $Mahalle = $res[0]['mah'];
    $CepTelefonu = $res[0]['cept'];
    $MaxAlan = $res[0]['maxa'];
    $Açıklama = $res[0]['aci'];
    $ArsaTürü = $res[0]['arstu'];
    $ArsaTipi = $res[0]['arst'];
}

if(isset($_REQUEST['vid']) && $_REQUEST['vid'] != "") {
    $col[] = "is_edit";                 $val[] = 0;

    $objcms->update_img('realesteate', $col, $val, 'id', $_REQUEST['id'], $path, $field);
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
	  
    <title>Super Admin :: Add Realestate Listing</title>

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
          select {
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Adınız<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input class="form-control has-feedback-right" name="Adınız" id="Adınız" placeholder="Adınız" value="<?php echo $Adınız; ?>" type="text">

                        </div>
                      </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Min. Fiyat<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" name="MinFiyat" id="MinFiyat" placeholder="Min. Fiyat" value="<?php echo $MinFiyat; ?>" type="text">

                            </div>
                      </div>
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Max. Fiyat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input class="form-control" placeholder="Max. Fiyat" name="MaxFiyat" id="MaxFiyat" value="<?php echo $MaxFiyat; ?>" type="text">

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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şehir Seçiniz <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                <select name="Seçiniz" id="Seçiniz" class="medium gfield_select bs-select-hidden" tabindex="11" aria-required="true" aria-invalid="false">
                                    <option value="" data-parentcountry="turkiye">Tüm Şehirler</option>
                                    <option value="ADANA" data-parentcountry="turkiye">ADANA</option>
                                    <option value="ADIYAMAN" data-parentcountry="turkiye">ADIYAMAN</option>
                                    <option value="AFYONKARAHİSAR" data-parentcountry="turkiye">AFYONKARAHİSAR</option>
                                    <option value="AĞRI" data-parentcountry="turkiye">AĞRI</option>
                                    <option value="AKSARAY" data-parentcountry="turkiye">AKSARAY</option>
                                    <option value="AMASYA" data-parentcountry="turkiye">AMASYA</option>
                                    <option value="ANKARA" data-parentcountry="turkiye">ANKARA</option>
                                    <option value="ANTALYA" data-parentcountry="turkiye">ANTALYA</option>
                                    <option value="ARDAHAN" data-parentcountry="turkiye">ARDAHAN</option>
                                    <option value="ARTVİN" data-parentcountry="turkiye">ARTVİN</option>
                                    <option value="AYDIN" data-parentcountry="turkiye">AYDIN</option>
                                    <option value="BALIKESİR" data-parentcountry="turkiye">BALIKESİR</option>
                                    <option value="BARTIN" data-parentcountry="turkiye">BARTIN</option>
                                    <option value="BATMAN" data-parentcountry="turkiye">BATMAN</option>
                                    <option value="BAYBURT" data-parentcountry="turkiye">BAYBURT</option>
                                    <option value="BİLECİK" data-parentcountry="turkiye">BİLECİK</option>
                                    <option value="BİNGÖL" data-parentcountry="turkiye">BİNGÖL</option>
                                    <option value="BİTLİS" data-parentcountry="turkiye">BİTLİS</option>
                                    <option value="BOLU" data-parentcountry="turkiye">BOLU</option>
                                    <option value="BURDUR" data-parentcountry="turkiye">BURDUR</option>
                                    <option value="BURSA" data-parentcountry="turkiye">BURSA</option>
                                    <option value="ÇANAKKALE" data-parentcountry="turkiye">ÇANAKKALE</option>
                                    <option value="ÇANKIRI" data-parentcountry="turkiye">ÇANKIRI</option>
                                    <option value="ÇORUM" data-parentcountry="turkiye">ÇORUM</option>
                                    <option value="DENİZLİ" data-parentcountry="turkiye">DENİZLİ</option>
                                    <option value="DİYARBAKIR" data-parentcountry="turkiye">DİYARBAKIR</option>
                                    <option value="DÜZCE" data-parentcountry="turkiye">DÜZCE</option>
                                    <option value="EDİRNE" data-parentcountry="turkiye">EDİRNE</option>
                                    <option value="ELAZIĞ" data-parentcountry="turkiye">ELAZIĞ</option>
                                    <option value="ERZİNCAN" data-parentcountry="turkiye">ERZİNCAN</option>
                                    <option value="ERZURUM" data-parentcountry="turkiye">ERZURUM</option>
                                    <option value="ESKİŞEHİR" data-parentcountry="turkiye">ESKİŞEHİR</option>
                                    <option value="GAZİANTEP" data-parentcountry="turkiye">GAZİANTEP</option>
                                    <option value="GİRESUN" data-parentcountry="turkiye">GİRESUN</option>
                                    <option value="GÜMÜŞHANE" data-parentcountry="turkiye">GÜMÜŞHANE</option>
                                    <option value="HAKKARİ" data-parentcountry="turkiye">HAKKARİ</option>
                                    <option value="HATAY" data-parentcountry="turkiye">HATAY</option>
                                    <option value="IĞDIR" data-parentcountry="turkiye">IĞDIR</option>
                                    <option value="ISPARTA" data-parentcountry="turkiye">ISPARTA</option>
                                    <option value="İSTANBUL" data-parentcountry="turkiye">İSTANBUL</option>
                                    <option value="İZMİR" data-parentcountry="turkiye">İZMİR</option>
                                    <option value="KAHRAMANMARAŞ" data-parentcountry="turkiye">KAHRAMANMARAŞ</option>
                                    <option value="KARABÜK" data-parentcountry="turkiye">KARABÜK</option>
                                    <option value="KARAMAN" data-parentcountry="turkiye">KARAMAN</option>
                                    <option value="KARS" data-parentcountry="turkiye">KARS</option>
                                    <option value="KASTAMONU" data-parentcountry="turkiye">KASTAMONU</option>
                                    <option value="KAYSERİ" data-parentcountry="turkiye">KAYSERİ</option>
                                    <option value="KIRIKKALE" data-parentcountry="turkiye">KIRIKKALE</option>
                                    <option value="KIRKLARELİ" data-parentcountry="turkiye">KIRKLARELİ</option>
                                    <option value="KIRŞEHİR" data-parentcountry="turkiye">KIRŞEHİR</option>
                                    <option value="KİLİS" data-parentcountry="turkiye">KİLİS</option>
                                    <option value="KOCAELİ" data-parentcountry="turkiye">KOCAELİ</option>
                                    <option value="KONYA" data-parentcountry="turkiye">KONYA</option>
                                    <option value="KÜTAHYA" data-parentcountry="turkiye">KÜTAHYA</option>
                                    <option value="MALATYA" data-parentcountry="turkiye">MALATYA</option>
                                    <option value="MANİSA" data-parentcountry="turkiye">MANİSA</option>
                                    <option value="MARDİN" data-parentcountry="turkiye">MARDİN</option>
                                    <option value="MERSİN" data-parentcountry="turkiye">MERSİN</option>
                                    <option value="MUĞLA" data-parentcountry="turkiye">MUĞLA</option>
                                    <option value="MUŞ" data-parentcountry="turkiye">MUŞ</option>
                                    <option value="NEVŞEHİR" data-parentcountry="turkiye">NEVŞEHİR</option>
                                    <option value="NİĞDE" data-parentcountry="turkiye">NİĞDE</option>
                                    <option value="ORDU" data-parentcountry="turkiye">ORDU</option>
                                    <option value="OSMANİYE" data-parentcountry="turkiye">OSMANİYE</option>
                                    <option value="RİZE" data-parentcountry="turkiye">RİZE</option>
                                    <option value="SAKARYA" data-parentcountry="turkiye">SAKARYA</option>
                                    <option value="SAMSUN" data-parentcountry="turkiye">SAMSUN</option>
                                    <option value="SİİRT" data-parentcountry="turkiye">SİİRT</option>
                                    <option value="SİNOP" data-parentcountry="turkiye">SİNOP</option>
                                    <option value="SİVAS" data-parentcountry="turkiye">SİVAS</option>
                                    <option value="ŞANLIURFA" data-parentcountry="turkiye">ŞANLIURFA</option>
                                    <option value="ŞIRNAK" data-parentcountry="turkiye">ŞIRNAK</option>
                                    <option value="TEKİRDAĞ" data-parentcountry="turkiye">TEKİRDAĞ</option>
                                    <option value="TOKAT" data-parentcountry="turkiye">TOKAT</option>
                                    <option value="TRABZON" data-parentcountry="turkiye">TRABZON</option>
                                    <option value="TUNCELİ" data-parentcountry="turkiye">TUNCELİ</option>
                                    <option value="UŞAK" data-parentcountry="turkiye">UŞAK</option>
                                    <option value="VAN" data-parentcountry="turkiye">VAN</option>
                                    <option value="YALOVA" data-parentcountry="turkiye">YALOVA</option>
                                    <option value="YOZGAT" data-parentcountry="turkiye">YOZGAT</option>
                                    <option value="ZONGULDAK" data-parentcountry="turkiye">ZONGULDAK</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Soyadınız <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Soyadınız" name="Soyadınız" value="<?php echo $Soyadınız; ?>" id="Soyadınız" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İlçe <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                <select name="İlçe" id="İlçe" class="medium gfield_select" tabindex="12" aria-required="true" aria-invalid="false">
                                    <option value="all">-- select a City --</option>
                                    <option value="" selected="selected" class="gf_placeholder">İlçe Seçiniz</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Min. Alan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Min. Alan" name="MinAlan" value="<?php echo $MinAlan; ?>" id="MinAlan" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Max. Alan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Max. Alan" name="MaxAlan" value="<?php echo $MaxAlan; ?>" id="MaxAlan" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mahalle <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                <select name="Mahalle" id="Mahalle" class="medium gfield_select" tabindex="13" aria-required="true" aria-invalid="false">
                                    <option value="-- select a Neighborhood --">-- select a Neighborhood --</option>
                                    <option value="" selected="selected" class="gf_placeholder">Mahalle Seçiniz</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Cep Telefonu <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Cep Telefonu" name="CepTelefonu" value="<?php echo $CepTelefonu; ?>" id="CepTelefonu" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Açıklama <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input class="form-control has-feedback-right" placeholder="Açıklama" name="Açıklama" value="<?php echo $Açıklama; ?>" id="Açıklama" type="text">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Arsa Türü <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                <select name="ArsaTürü" id="ArsaTürü" class="medium gfield_select" tabindex="5" aria-required="true" aria-invalid="false">
                                    <option value="" selected="selected" class="gf_placeholder">Arsa Türü Seçiniz</option>
                                    <option value="-- select a Status --">-- select a Status --</option>
                                    <option value="34">Kiralık Arsa</option>
                                    <option value="35">Satılık Arsa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Arsa Tipi <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="ArsaTipi" id="ArsaTipi" class="medium gfield_select" tabindex="10" aria-required="true" aria-invalid="false">
                                    <option value="" selected="selected" class="gf_placeholder">Arsa Tipi Seçiniz</option>
                                    <option value="-- select a Type --">-- select a Type --</option>
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