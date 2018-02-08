<?php
ini_set('max_execution_time', 30000000000);
error_reporting(E_ALL);
include_once("./classes/cms.php");
$objcms = new cms();



/*$row = 1;
if (($handle = fopen("citylist.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        $col[] = "city";                $val[] = $data[0];
	    $col[] = "town";                $val[] = $data[1];
	    $col[] = "neabour";             $val[] = $data[2];

	    $objcms->insert("temp1", $col, $val);
		unset($col);                unset($val);
    }
    fclose($handle);
}
exit();*/


/*$res = $objcms->SELECT_QUERY("SELECT * FROM town");
next_level($res, 2);*/
chk_arrar();

function next_level($res_dbval, $level) {

    include_once("./classes/cms.php");
    $objcms = new cms();
    

    foreach($res_dbval as $ov) {
        $match_arr = return_matched_arrar($ov["name"], $level);
        

        foreach($match_arr as $v) {

                
                $col[] = "name";            $val[] = $v;
                $col[] = "tid";             $val[] = $ov["id"];

                if($objcms->insert_new("neabour", $col, $val)) {
                    echo "inserted<br />";
                } else {
                    echo "not<br />";
                }
                unset($col);                unset($val);
        }
    }


}


function return_matched_arrar($keyval, $level) {
    include_once("./classes/cms.php");
    $objcms = new cms();

    $return_arr = array();

    $res = $objcms->SELECT_QUERY("SELECT * FROM temp");
    foreach($res as $v) {
        if($v["town"] == $keyval) {
            $return_arr[] = $v["neabour"];
        }
    }

    return $return_arr;
}

function chk_arrar() {
    include_once("./classes/cms.php");
    $objcms = new cms();


    $res = $objcms->SELECT_QUERY("SELECT * FROM temp");
    foreach($res as $v) {
        inst($v["town"], $v["neabour"]);
    }

}

function inst($matchkey, $insval) {
	include_once("./classes/cms.php");
    $objcms = new cms();

    $res = $objcms->SELECT_QUERY("SELECT * FROM town WHERE `name`='" . trim($matchkey) ."'");

    
    $col[] = "name";            $val[] = trim($insval);
    $col[] = "tid";             $val[] = $res[0]["id"];

    if($objcms->insert("neabour", $col, $val)) {
        echo "inserted<br />";
    } else {
        echo "not<br />";
    }
    unset($col);                unset($val);
                
}

function chk_arrar1() {
    include_once("./classes/cms.php");
    $objcms = new cms();


    $res = $objcms->SELECT_QUERY("SELECT * FROM temp");
    foreach($res as $v) {
        inst1($v["city"], $v["town"]);
    }

}

function inst1($matchcity, $matchtown) {
	include_once("./classes/cms.php");
    $objcms = new cms();

    $res = $objcms->SELECT_QUERY("SELECT * FROM city WHERE `name`='" . $matchcity ."'");
    $res_chk = $objcms->SELECT_QUERY("SELECT * FROM town WHERE `name`='" . $matchtown ."'");

    if(!$res_chk[0])
    {
    	$col[] = "name";            $val[] = $matchtown;
	    $col[] = "pid";             $val[] = $res[0]["id"];

	    if($objcms->insert_new("town", $col, $val)) {
	        echo "inserted<br />";
	    } else {
	        echo "not<br />";
	    }
	    unset($col);                unset($val);
    } else {
    	echo "already inserted <br />";
    }
	    
                
}
?>






