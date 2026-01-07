<?php
require_once __DIR__ . "/../../account data/header.php";
?>
<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "RS_Database";

$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error){
    die("Lỗi kết nối".$conn->error);
}

$id = $_GET['id'] ?? 0;
$id = intval($id);

$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);

if($result->num_rows>0){
    echo "";
}else{
    echo "Chưa có thông tin";
}
?>
<html>
    <head><link rel="stylesheet" href="childpage.css"></head>
    <body>
        <h3 style="z-index: 1000; width: 20px; height: 20px; position: absolute; left: 80%;">
  <svg id="heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20">
    <path id="heart-path" d="M378.9 80c-27.3 0-53 13.1-69 35.2l-34.4 47.6c-4.5 6.2-11.7 9.9-19.4 9.9s-14.9-3.7-19.4-9.9l-34.4-47.6c-16-22.1-41.7-35.2-69-35.2-47 0-85.1 38.1-85.1 85.1 0 49.9 32 98.4 68.1 142.3 41.1 50 91.4 94 125.9 120.3 3.2 2.4 7.9 4.2 14 4.2s10.8-1.8 14-4.2c34.5-26.3 84.8-70.4 125.9-120.3 36.2-43.9 68.1-92.4 68.1-142.3 0-47-38.1-85.1-85.1-85.1z"/>
  </svg>
</h3>

        <div id="menu_bar"> 
        <div id="menu_logo">
                <a href="../../Real Estate/Trangchu.php" style="text-decoration: none; color: white; font-family: 'Times New Roman', Times, serif;">SkyLine</a>
        </div>
        <div id="menu_text">
            <a href="../product/product.php" style="text-decoration: none; color: inherit;">Back</a>
            <a href="../product/product.php" style="text-decoration: none; color: inherit;">News</a>
        </div>         
        </div>
        </div>
        <div id="head">
                <?php
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                    echo "
                    <img style='postion: absolute; width: 1500px; height: 750px; filter: blur(5px);' src='../../pictures/".$row['product_img']."'>
                    ";
                }
                ?>   
                <div id="head-img-container">
                    <div class="img-container" id="anh1-container">
                        <span>current image</span>
                        <?php foreach($data as $row): ?>
                            <img id="anh1" src="../../pictures/<?= $row['product_img'] ?>">
                        <?php endforeach; ?>    
                    </div>


                    <div class="img-container">
                        <span></span>
                        <?php foreach($data as $row): ?>
                            <img src="../../pictures/<?= $row['product_img1'] ?>">
                        <?php endforeach; ?>    
                    </div>


                    <div class="img-container">
                        <span></span>
                        <?php foreach($data as $row): ?>
                            <img src="../../pictures/<?= $row['product_img2'] ?>">
                        <?php endforeach; ?>  
                    </div>


                    <div class="img-container">
                        <span></span>
                        <?php foreach($data as $row): ?>
                            <img src="../../pictures/<?= $row['product_img3'] ?>">
                        <?php endforeach; ?>  
                    </div>
                </div>
                <div id="head-info-container">
                <?php foreach($result as $row): ?>
                    <h1><?= $row['product_name'] ?></h1>
                    <h2><?= $row['product_type']?>: <?= $row['product_price'] ?></h2>
                    <h3><?= $row['product_address'] ?></h3>
                    <p class="describe"><?= $row['product_describe'] ?></p>
                <?php endforeach; ?>
                </div>
        </div>
        <script>
            const images = document.querySelectorAll(".img-container img");
            const text = document.querySelectorAll(".img-container span");
            let index = 0;
            const anh = document.getElementById("anh1");
            anh.classList.add("show");

            images.forEach((img, idx) => {
                img.addEventListener('click', () => {
                clearInterval(baseInterval);
                images.forEach(el => el.classList.remove("show"));
                text.forEach(t => t.textContent = "");
                img.classList.add("show");
                text[idx].textContent = "current image";
                index = idx;
                baseInterval = setInterval(interval, 5000);
                });
            });


            function interval(){
                index = (index + 1) % images.length;
                images.forEach(i => i.classList.remove("show"));
                text.forEach(t => t.textContent = "");
                images[index].classList.add("show");
                text[index].textContent = "current image";
            }

            let baseInterval = setInterval(() => {
                interval();
            }, 5000);


            const heart = document.getElementById("heart");
            const path = document.getElementById("heart-path");
            let count = 0;

            heart.addEventListener('click', () => {
                if(count < 2){
                    count++;
                }
                if(count == 1){
                    path.style.fill = "red";
                }
                if(count == 2){
                    path.style.fill = "black";
                    count = 0;
                }
            });
        </script>
    </body>
</html>