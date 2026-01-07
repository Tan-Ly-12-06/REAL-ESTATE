<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "user";

$conn = new mysqli($host, $user, $password);

if($conn->connect_error){
    die("Lỗi kết nối".$conn->connect_error);
}

$database = "CREATE DATABASE IF NOT EXISTS $dbname";

if($conn->query($database)){
    echo"Tạo db thành công";
}else{
    echo"Tạo db thất bại" .$conn->error;
}
$conn->select_db($dbname);

$userdata = "CREATE TABLE IF NOT EXISTS userdata(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(40),
email VARCHAR(40),
user_password VARCHAR(80),
user_address VARCHAR(255),
user_hotline VARCHAR(255)
)";

if($conn->query($userdata)){
    echo"Tạo bảng thành công";
}else{
    echo"Tạo bảng thất bại" .$conn->error;
}

$username = $_POST['username'];
$usermail = $_POST['email'];
$userpassword = $_POST['user_password'];
$useraddress = $_POST['user_address'];
$userhotline = $_POST['user_hotline'];

$input = "INSERT INTO userdata(`username`,`email`,`user_password`,`user_address`,`user_hotline`) VALUES('$username','$usermail','$userpassword','$useraddress','$userhotline')";

if($conn->query($input)){
    echo "Thêm dữ liệu thành công, $input";
}else{
    echo "Lỗi" .$conn->error;
}
?>