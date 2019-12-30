
<?php
date_default_timezone_set('Asia/Colombo');
if(session_id() == '') { session_start(); }
if (!array_key_exists('privilege',$_SESSION)) {
  $_SESSION['privilege'] = 0;
}

$privilege = $_SESSION['role'];
$privilegeusers = array(0=>array('root',''),1=>array('level1_employee','123'),2=>array('managial_employee','123'),3=>array('admin_employee','123'));

$db_username = $privilegeusers[$privilege][0];
$db_password = $privilegeusers[$privilege][1];
$db_name = 'hrm';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
if ($mysqli->connect_error){}
?>

