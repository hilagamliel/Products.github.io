<?php
require_once 'DB.php';
$connection=new Connection();
$n=$_POST["updatename"];
$Product=$connection->GetProductById($n);
$categories=$connection->GetAllCategory();





define('REQUIRED_FIELD_ERROR', 'This field is required');


$errors=[];
$id="";
$name="";
$description="";
$price="";
$image="";
$category="";

$name = post_data('name');
$description = post_data('description');
$price=post_data('price');
$category=post_data('category');

$image=post_data('image');

$search="";
function post_data($field)
{
    if (!isset($_POST[$field])) {
        return false;
    }
   
    $data = $_POST[$field];

    //check valid input if not contain special char
    return htmlspecialchars(stripslashes(trim($data)));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
          <!-- <link rel="stylesheet" href="CreateProduct.css"/>
          <link rel="stylesheet" href="UpDateProduct.css"/>
          <link rel="stylesheet" href="bootstrap.css"> -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


 <div class="AllPage">
<!-- לדף הכללי -->

 <form action="ManagerProduct.php" class="create" method="post" name="myform2">
 <button value="<?php print $search ?>"  class="btn btn-info" >
 <i class="bi bi-layout-text-sidebar-reverse"></i>
  Read Record</button>
 </form>   





 <form action="UpDate.php" name="myform2"  method="post" novalidate class="AllPage">
    <h1 class="title">Up Date a Record</h1>
    <div class="divpanel"></div>
    <input name="id" type="number" value="<?php print $Product['ID'] ?>" class="dis"/>

    <table class="table table-bordered">
            <tr>
                <td>
                    Name
                </td>
                <td>
                <div class="input-group input-group-sm mb-3">
                <input type="text" name="name" value="<?php print $Product['Name'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                </td>
            </tr>

            <tr>
                <td>
                    Description
                </td>
                <td>
                <div class="input-group mb-3">
                <input type="text" name="description" value="<?php print $Product['Description'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                </td>
            </tr>

            <tr>
                <td>
                    Price   
                </td>
                <td>
                <div class="input-group mb-3">
                <input type="number" name="price" value="<?php print $Product['Price'] ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                </div>
                </td>
            </tr>

            <tr>
                <td>
                    Category    
                </td>
                <td>
                <div class="input-group mb-3">
                <select class="form-select size" name="category" id="inputGroupSelect03" aria-label="Example select with button addon">
                <option><?php print $Product['Category'] ?></option>
                <?php foreach ($categories as $category):?>
                    <option><?php echo $category['Name']?></option>
                <?php endforeach; ?>
                </select>
                </div>
                </td>
            </tr>



            <tr>
                <td colspan="2">
                <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-secondary sizesave" type="submit">Update a Record</button>
                </div>
                </td>
            </tr>

        </table>
    </form>

    </div>
</body>
</html>