<?php
//session_start();

if($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    error_reporting(E_ALL);
    define("DBHOST","localhost",true);
    define("DBUSER","root",true);
    define("DBPASSWORD","123",true);
    define("DBNAME","superadmin",true);

    /*error_reporting(1);
    define("DBHOST","192.168.10.10",true);
    define("DBUSER","homestead",true);
    define("DBPASSWORD","secret",true);
    define("DBNAME","pdo",true);*/
} else {
    error_reporting(0);
    define("DBHOST","localhost",true);
    define("DBUSER","fendoz_sa",true);
    define("DBPASSWORD","fendoz_sa@123",true);
    define("DBNAME","fendoz_sa",true);
}



?>