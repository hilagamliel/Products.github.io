<?php 
require_once 'DB.php';
$connectin=new Connection();
$id=$_POST['id'];
$n=$_POST['name'];
$d=$_POST['description'];
$p=$_POST['price'];
$c=$_POST["category"];
$p= $connectin->UpDateProduct($id,$n,$d,(float)$p,$c);
echo $p;
header('Location:ManagerProduct.php');

?>