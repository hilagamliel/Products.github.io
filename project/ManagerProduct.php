<?php

////////////////////////////יצירת מופע מסוג מחלק שמתחברת לדטבייס/////////////////
require_once 'DB.php';
$connection=new Connection();

////////////////////כל המוצרים///////////////////
$productsAll=$connection->GetAllProduct();
$products=[];

//////////////////כמות הדפים/////////////////
$count=intval(count($productsAll)/6)+(count($productsAll)%6);

////////////////חיפוש לפי שם//////////////
if(!empty($_POST["search"]))
  $productsAll=$connection->GetAllProductByName($_POST["search"]);

///////////////מעבר דף קדימה///////////////
if(!empty($_POST["plus"]))
  $current=(intval($_POST["plus"])+1)>$count?$count:(intval($_POST["plus"])+1);

///////////////מעבר דף אחורה/////////////
if(!empty($_POST["minus"])) 
  $current=(intval($_POST["minus"])-1)<=0?0:(intval($_POST["minus"])-1);

/////////////לקיחה מהמערך לפי הכמות//////////
if( (!empty($_POST["plus"]) || !empty($_POST["minus"])) && $current>=0)
  for ($i=$current*5; $i <(($current*5)+5) &&  $i<count($productsAll); $i++) { 
    $products[$i]=$productsAll[$i];
  }
else
  for ($i=0; $i <5 && $i<count($productsAll)  ; $i++) { 
    $products[$i]=$productsAll[$i];
  }
if(count($productsAll)==0)
echo '<b class="notfoundplace"> Not Found</b>';
////////////משתנים////////////
$id="";
$search="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="Manager.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
        <!-- <link rel="stylesheet" href="bootstrap.css"> -->
        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<!-- כותרת -->
<h1 class="title">All Products</h1>
<div class="divpanel"></div>


<!-- חיפוש -->
<form class="form-inline" action="ManagerProduct.php" method="post">
  <nav class="navbar navbar-light bg-light place">
    <input name="search" class="form-control mr-sm-2" type="search"
     placeholder="Search" aria-label="Search" value=<?php print $search ?>>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
    <i class="bi bi-arrow-clockwise"></i>
    Search</button>
  </nav>
<div class="divbutton">
<button type="submit" name="minus" value='<?php echo $current?>' class="btn btn-warning">
<i class="bi bi-chevron-left"  ></i>
</button>

<button type="submit" name="plus" value='<?php echo $current?>'  class="btn btn-warning right">
<i class="bi bi-chevron-right"  ></i>
</button>

</div>
</form>

<form action="action.php" method="post" name="myform">

  <!-- כפתור לדף היצירה -->
  <button type="submit" name="type" value="create" class="btn btn-info create">
  <i class="bi bi-pencil-square"></i>
  Create Record</button>

  <!-- כפתוד ליצוא הנבחרים -->
  <button type="submit" name="type" value="export" class="btn btn-warning create">
  <i class="bi bi-box-arrow-up-right"></i>
  Export Selected
  </button>

    <!-- כפתור למחיקת הנבחרים -->
  <button  type="submit" name="type" value="delete" class="btn btn-danger create">
  <i class="bi bi-trash"></i>
  Delete Selected
  </button>

  <!-- כל המוצרים -->
<table class="table table2" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $product):?>
      <tr>
        <th scope="row"><input type="checkbox" name="check_list[]" value="<?php echo $product['ID']?>"/></th>
      
        <td><?php echo $product['Name']?></td>
        <td><?php echo $product['Description']?></td>
        <td><?php echo $product['Price']?></td>
        <td><?php echo $product['Category']?></td>
        <td>
</form>
      <div class="btn-group">
    

      <!-- לפרטי המוצר -->
      <form action="DetilesProduct.php" name="myform2"  method="post">
      <Button name="readname" value="<?php print $product['ID']?>" class="btn btn-info size">
      <i class="bi bi-eye"></i>
      Read
      </Button>
      </form>

      <!-- לעדכון המוצר -->
      <form action="UpdateProduct.php" name="myform2"  method="post">
      <Button name="updatename" value="<?php print $product['ID']?>" class="btn btn-warning size">
      <i class="bi bi-card-checklist"></i>
      Edit
      </Button>
      </form>

      <!-- למחיקת המוצר -->
      <form action="Delete.php" name="myform"  method="post">
      <Button name="id" value="<?php print $product['ID']?>" class="btn btn-danger size">
      <i class="bi bi-trash"></i>
       Delete
      </Button>
      </form>
</div>
     
    </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>