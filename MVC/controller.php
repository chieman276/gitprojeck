<?php
include "model.php";
//controller
if($_POST && $_POST['fullname'] && $_POST['age'] && $_POST['addres']){
    $db = new db();
    $connect = $db->connect();
   
    // $fullname = $_POST['fullname'];
    // $age = $_POST['age'];
    // $addres = $_POST['addres'];
   
    $sql = "INSERT INTO `customers` (`id`, `fullname`, `age`, `addres`) 
    VALUES (NULL, '$fullname', '$age', '$addres')";
   
    //check sql
    // echo $sql;
    // die();
   
    $connect->exec($sql);
    them_khach_hang($fullname,$age,$addres);
    header(header: "location: index.php");
}

include "view.php";
