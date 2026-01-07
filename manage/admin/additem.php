<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "data";


$conn = new mysqli($host, $user, $password);

if($conn->connect_error){
    die("error" .$conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if($conn->query($sql)){
    echo "Success";
}else{
    echo "Fail" .$conn->error;
}

$conn->select_db($dbname);

$table = "CREATE TABLE IF NOT EXISTS products(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
product_id VARCHAR(40),
product_name VARCHAR(100),
product_price VARCHAR(100),
product_type VARCHAR(255),
product_address VARCHAR(255),
product_describe VARCHAR(255),
product_size VARCHAR(255),
product_img VARCHAR(255),
product_img1 VARCHAR(255),
product_img2 VARCHAR(255),
product_img3 VARCHAR(255)
)";

if($conn->query($table)){
    echo "Create table success";
}else{
    echo "Fail to create table" .$conn->error;
}
$id = $_POST['product_id'];
$name = $_POST['product_name'];
$price = $_POST['product_price'];
$type = $_POST['product_type'];
$address = $_POST['product_address'];
$describe = $_POST['product_describe'];
$size = $_POST['product_size'];
$image = $_POST['product_img'];
$image1 = $_POST['product_img1'];
$image2 = $_POST['product_img2'];
$image3 = $_POST['product_img3'];

$data = "INSERT INTO products(`product_id`,`product_name`,`product_price`,`product_type`,`product_address`,`product_describe`,`product_size`,`product_img`,`product_img1`,`product_img2`,`product_img3`) VALUES('$id','$name','$price','$type','$address','$describe','$size','$image','$image1','$image2','$image3')";

if($conn->query($data)){
    echo "Thêm dữ liệu thành công ($id,$name,$price,$type,$address,$describe,$size,$image,$image1,$image2,$image3)";
}


$conn->query("SET @count = 0");
$conn->query("UPDATE products SET id = @count:=@count+1");
$conn->query("ALTER TABLE products AUTO_INCREMENT = 1");
?>