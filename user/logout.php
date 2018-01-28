<?php 
session_start();
//session_unregister('user_id');
//session_unregister('username');
//session_unregister('isadmin');
session_destroy();
session_commit();
header('Location: index.php');
?>