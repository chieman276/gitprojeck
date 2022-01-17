<?php
include "db.php";
$mahang = (isset($_REQUEST['mahang']) && !empty($_REQUEST['mahang']) ) ? ($_REQUEST['mahang'] ):"";
$db = new db();
$connect = $db->connect();
$sql =  "DELETE FROM `products` WHERE `products`.`mahang` = $mahang";
$connect->exec($sql);
header("location: index.php");
?>
