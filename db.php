<?php
ini_set('max_execution_time', 30000000000);
error_reporting(E_ALL);
include_once("./classes/cms.php");
$objcms = new cms();


/*$res = $objcms->SELECT_QUERY("SELECT * FROM city");
next_level($res, 1);*/
$res1 = $objcms->SELECT_QUERY("SELECT * FROM town");
next_level($res1, 2);

function next_level($res_dbval, $level) {

    include_once("./classes/cms.php");
    $objcms = new cms();
    if($level == 1) {
        $tablename = "town";
    } else {
        $tablename = "neabour";
    }
    

    foreach($res_dbval as $ov) {
        $match_arr = return_matched_arrar($ov["name"], $level);
        

        foreach($match_arr as $v) {
            $res = $objcms->SELECT_QUERY("SELECT * FROM $tablename WHERE `name`='" . $v . "' and tid=".$ov["id"]);

            //if(!$res[0]) {
                unset($col);                unset($val);
                $col[] = "name";            $val[] = $v;
                if($level == 1) {
                    $tablename = "town";
                    $col[] = "pid";             $val[] = $ov["id"];
                } else {
                    $tablename = "neabour";
                    $col[] = "tid";             $val[] = $ov["id"];
                }

                if($objcms->insert_new($tablename, $col, $val)) {
                    echo "inserted<br />";
                } else {
                    echo "not<br />";
                }
            //}
        }
    }


}


function return_matched_arrar($keyval, $level) {
    include_once("./classes/cms.php");
    $objcms = new cms();

    $return_arr = array();

    $res = $objcms->SELECT_QUERY("SELECT * FROM temp");
    foreach($res as $v) {
        if($level == 1) {
            $oldval = "city";
            $getcol = "town";
        } else {
            $oldval = "town";
            $getcol = "neabour";
        }
        if($v[$oldval] == $keyval) {
            $return_arr[] = $v[$getcol];
        }
    }

    return $return_arr;
}






/*$row = 1;
if (($handle = fopen("city.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}*/
?>






