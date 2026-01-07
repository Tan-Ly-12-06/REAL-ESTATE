<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "user";

$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error){
    die("Lỗi kết nối".$conn->error);
}

$username = $_POST['username'];
$userpassword = $_POST['user_password'];

$sql = "SELECT * FROM userdata WHERE username = '$username' AND user_password = '$userpassword'";
$result = $conn->query($sql);

if($result->num_rows>0){
    echo "Đăng nhập thành công";
}else{
    echo "Vui lòng kiểm tra lại tài khoản và mật khẩu";
}



if($username === "Admin" && $userpassword === "Operationer"){
    header("Location: admin.html");
    exit();
}

?>