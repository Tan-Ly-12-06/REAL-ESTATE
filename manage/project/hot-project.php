<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "data";


$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error){
    die("error" .$conn->connect_error);
}

$table = "CREATE TABLE IF NOT EXISTS projects(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
project_img1 VARCHAR(255),
project_img2 VARCHAR(255),
project_img3 VARCHAR(255)
)";

if($conn->query($table)){
    echo "Create table success";
}else{
    echo "Fail to create table" .$conn->error;
}


$p_img1 = $_POST['project_img1'];
$p_img2 = $_POST['project_img2'];
$p_img3 = $_POST['project_img3'];

$data = "INSERT INTO projects(`project_img1`,`project_img2`,`project_img3`) VALUES('$p_img1','$p_img2','$p_img3')";

if($conn->query($data)){
    echo "Thêm dữ liệu thành công ($data)";
}


$conn->query("SET @count = 0");
$conn->query("UPDATE products SET id = @count:=@count+1");
$conn->query("ALTER TABLE products AUTO_INCREMENT = 1");
?>