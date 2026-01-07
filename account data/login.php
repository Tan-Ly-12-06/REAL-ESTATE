<?php
session_set_cookie_params([
    'path' => '/', // QUAN TRỌNG
]);
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "RS_Database";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Lỗi kết nối " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST['username'] ?? '';
    $userpassword = $_POST['user_password'] ?? '';

    
    if ($username === "Admin" && $userpassword === "Operationer") {
        $_SESSION['username'] = "Admin";
        $_SESSION['role'] = "admin";

        header("Location: /Real%20Estate/Real%20Estate/Trangchu.php");
        exit;
    }

    
    $sql = "SELECT * FROM userdata 
            WHERE username='$username' 
            AND user_password='$userpassword'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        header("Location: /Real%20Estate/Real%20Estate/Trangchu.php");
        exit;
    }

    echo "Sai tài khoản hoặc mật khẩu";
}
