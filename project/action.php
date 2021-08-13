<?php 
require_once 'DB.php';
$connectin=new Connection();

if($_POST['type']=="delete")
{
    foreach($_POST['check_list'] as $item){
        $connectin->DeleteProduct($item);
    }
    header('Location:ManagerProduct.php');
}
else if($_POST['type']=="create")
    header('Location:CreateProduct.php');  
else
    {
    $fp = fopen('exportSelected.csv', 'w');
    $list = $_POST["check_list"];
    foreach ($list as $fields) {
    fputcsv($fp, $connectin->GetProductById($fields));
    }
fclose($fp);  
header('Location:ManagerProduct.php');
}
?>