<?php 
require_once 'DB.php';
$connectin=new Connection();
$n=$_POST["readname"];
$Product=$connectin->GetProductById($n);

$search="";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="detilesproduct.css">
    <link rel="stylesheet" href="bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    
</head>
<body>
   <h1 class="titel">Read One Record</h1>
  <form action="ManagerProduct.php" class="create" method="post" name="myform2">
  <button value="<?php print $search ?>"  class="btn btn-info" >
  <i class="bi bi-layout-text-sidebar-reverse"></i>
  Read Record</button>
  </form>   
  <b class="fs-6 place">Create in <?php print $Product["Productiondate"]?></b>
<table class='table table-bordered' id="tbl" >
  <tr>
      <td scope="col">Name</td>
      <td><?php echo $Product["Name"]?></td>
    </tr> 
  <tr>
  <td scope="col">Description</td>
  <td><?php print $Product["Description"]?></td>
</tr>
  <tr>
  <td scope="col">Price</td>
  <td><?php print $Product["Price"]?></td>
    </tr>
    <tr>
    <td scope="col">Image</td>
    <td><img src="img\<?php print $Product["Category"]?>\<?php print $Product["Image"]?>" class='imgproduct figure-img img-fluid rounded'/></td>
    </tr>
    <tr>
    <td scope="col">Category</td>
    <td><?php print $Product["Category"]?></td>
    </tr>

</table>

</body>
</html>
