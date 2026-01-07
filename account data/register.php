<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "RS_Database";

$conn = new mysqli($host, $user, $password);
if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS `$dbname` 
              CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");


$conn->select_db($dbname);


$conn->query("CREATE TABLE IF NOT EXISTS userdata(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(40) UNIQUE NOT NULL,
    email VARCHAR(40) UNIQUE NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_address VARCHAR(100),
    user_hotline VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
$conn->query("CREATE TABLE IF NOT EXISTS products(
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
    )");
    $conn->query("CREATE TABLE IF NOT EXISTS projects(
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    product_img VARCHAR(255),
    product_img1 VARCHAR(255),
    product_img2 VARCHAR(255),
    product_img3 VARCHAR(255)
    )");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['user_password'];
    $address  = trim($_POST['user_address']);
    $hotline  = trim($_POST['user_hotline']);

    $password = $_POST['user_password'];

    if (empty($password)) {
    echo "<script>
            alert('Mật khẩu không được để trống!');
            window.history.back();
          </script>";
    exit;
    }

    if (strlen($password) < 6) {
    echo "<script>
            alert('Mật khẩu phải có ít nhất 6 ký tự!');
            window.history.back();
          </script>";
    exit;
    }
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "SELECT id FROM userdata WHERE username = ? OR email = ?"
    );
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>
                alert('Tài khoản hoặc email đã tồn tại!');
                window.history.back();
              </script>";
        exit;
    }

    $stmt = $conn->prepare("
        INSERT INTO userdata 
        (username, email, user_password, user_address, user_hotline)
        VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->bind_param(
        "sssss",
        $username,
        $email,
        $hashedPassword,
        $address,
        $hotline
    );

    if ($stmt->execute()) {
        echo "<script>
                alert('Đăng ký thành công!');
                window.location.href = 'log.php';
              </script>";
        exit;
    } else {
        echo "<script>alert('Đăng ký thất bại!');</script>";
    }
}
?>
