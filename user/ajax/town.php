<?php
include_once("../../classes/cms.php");
$objcms = new cms();
?>
    <option value="">-- Select One --</option>
<?php $city_res = $objcms->SELECT_QUERY("SELECT * FROM town WHERE pid=".$_REQUEST["id"]); foreach($city_res as $v) { ?>
    <option value="<?php echo $v["id"];?>"><?php echo $v["name"];?></option>
<?php } ?>