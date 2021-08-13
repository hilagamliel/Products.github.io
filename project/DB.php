<?php
class Connection{
    public $Table=null;
    public function __construct(){
    try{
        $this->Table=new PDO('mysql:server=localhost;dbname=productmanagement','root','');
        $this->Table->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $excption){
        echo "ERROR: "+$excption.getMessage();
    }
}

public function GetAllProduct()
{
    $statment=$this->Table->prepare("SELECT * FROM products ORDER BY ID DESC");
    $statment->execute();
    return $statment->fetchAll(PDO::FETCH_ASSOC);
}
public function GetAllProductByName($name)
{
    $statment=$this->Table->prepare("SELECT * FROM products WHERE name LIKE :name  ORDER BY Name DESC");
    $statment->bindValue('name',$name.'%');
    $statment->execute();
    return $statment->fetchAll(PDO::FETCH_ASSOC);
}
public function GetAllCategory(Type $var = null)
{
    $statment=$this->Table->prepare("SELECT * FROM categories ORDER BY Name DESC");
    $statment->execute();
    return $statment->fetchAll(PDO::FETCH_ASSOC);
}
public function GetProductById($id)
{
    $statment=$this->Table->prepare("SELECT * FROM products WHERE ID=:id");
    $statment->bindValue('id',$id);
    $statment->execute();
    return $statment->fetch(PDO::FETCH_ASSOC);
}
public function AddProduct($n,$d,$p,$c,$i)
{
   $statment=$this->Table->prepare("insert into products
    (name,description,price,category,image) VALUES (:name,:description,:price,:category,:image)");
    $statment->bindValue(':name',$n);
    $statment->bindValue(':description',$d);
    $statment->bindValue(':price',$p);
    $statment->bindValue(':category',$c);
    $statment->bindValue(':image',$i);
    $statment->execute();
    echo("נשמר בהצלחה");
}
public function DeleteProduct($id)
{
    $statment=$this->Table->prepare("DELETE FROM products WHERE ID='$id'");
    $statment->execute();
}
public function UpDateProduct($id,$n,$d,$p,$c)
{
    $statment=$this->Table->prepare("UPDATE products set name=:name, description=:description, 
    price=:price,category=:category  WHERE id=:id");
    $statment->bindValue('id',$id);
    $statment->bindValue('name',$n);

    $statment->bindValue('description',$d);
    $statment->bindValue('price',$p);   
    $statment->bindValue('category',$c);
   
    return $statment->execute();
}
}
?>