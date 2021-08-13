<?php 
require_once 'DB.php';
$connectin=new Connection();
$connectin->DeleteProduct($_POST["id"]);
header('Location:ManagerProduct.php');
?>