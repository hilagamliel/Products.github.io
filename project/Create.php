<?php 
require_once 'DB.php';
$connectin=new Connection();
$n=$_POST["name"];
$d=$_POST["description"];
$p=$_POST["price"];
$c=$_POST["category"];
$i=$_POST["image"];
$connectin->AddProduct($n,$d,(float)$p,$c,$i);
header('Location:ManagerProduct.php');
?>