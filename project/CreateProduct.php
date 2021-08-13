


<?php
require_once 'DB.php';
$connection=new Connection();
$categories=$connection->GetAllCategory();
$connection=new Connection();
define('REQUIRED_FIELD_ERROR', 'This field is required');


$errors=[];

$name="";
$description="";
$price="";
$image="";
$category="";
$disabled = "disabled";

$name = post_data('name');
$description = post_data('description');
$price=post_data('price');
$category=post_data('category');
$image=post_data('image');

if ($name=="") {
    $errors['name'] = REQUIRED_FIELD_ERROR;
} else if (strlen($name) < 2 || strlen($username) > 20){
  $errors['username'] = 'Username must be less than 2 and more than 20 chars';
}


if ($description=="") {
    $errors['description'] = REQUIRED_FIELD_ERROR;
}


if (!$price) {
    $errors['price'] = REQUIRED_FIELD_ERROR;
}


if ($image=="") {
    $errors['image'] = REQUIRED_FIELD_ERROR;
}




function post_data($field)
{
    if (!isset($_POST[$field])) {
        return false;
    }
   
    $data = $_POST[$field];
    return htmlspecialchars(stripslashes(trim($data)));
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
          <link rel="stylesheet" href="CreateProduct.css"/>
          <!-- <link rel="stylesheet" href="bootstrap.css"> -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="AllPage">


<?php

function getdis(Type $var = null)
{
    if($errors==[])
    $disabled = "";
    else
    $disabled = "disabled";


}

?>
<form action="Create.php" name="myform"  method="post" >
    <h1 class="title">Create a Record</h1>
    <div class="divpanel"></div>
    
    <table class="table table-bordered">
            <tr>
                <td>
                    Name
                </td>
                <td>
                <div class="input-group input-group-sm mb-3">
                <input type="text" name="name" onkeyup="getdis(this)" value="<?php echo $name ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                </td>
            </tr>

            <tr>
                <td>
                    Description
                </td>
                <td>
                <div class="input-group mb-3">
                <input type="text" name="description" onkeyup="getdis(this)" value="<?php echo $description ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                </td>
            </tr>

            <tr>
                <td>
                    Price   
                </td>
                <td>
                <div class="input-group mb-3">
                <input type="number" name="price" onkeyup="getdis(this)" value="<?php echo $price ?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
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
                <?php foreach ($categories as $category):?>
                    <option><?php echo $category['Name']?></option>
                <?php endforeach; ?>
                </select>
                </div>
                </td>
            </tr>

            <tr>
                <td>
                    Image   
                </td>
                <td>

                <div class="input-group mb-3">
                <input type="file" name="image"  onkeyup="getdis(this)" class="form-control size" id="inputGroupFile01">
                </div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-secondary sizesave" type="submit">Save</button>
                </div>
                </td>
            </tr>

        </table>
    </form>

    </div>
</body>
</html>