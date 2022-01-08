<?php
include "db.php";
 //model
 function them_khach_hang($fullname,$age,$addres){
 $db = new db();
 $connect = $db->connect();

 $fullname = $_POST['fullname'];
 $age = $_POST['age'];
 $addres = $_POST['addres'];

 $sql = "INSERT INTO `customers` (`id`, `fullname`, `age`, `addres`) 
 VALUES (NULL, '$fullname', '$age', '$addres')";

 //check sql
 // echo $sql;
 // die();

 $connect->exec($sql);
 header(header: "location: index.php");
 }

?>