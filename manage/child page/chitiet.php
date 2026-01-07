<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "data";

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
        <div id="menu_bar"> 
        <div id="menu_logo">
                <a href="../../Real Estate/Trangchu.php" style="text-decoration: none; color: white; font-family: 'Times New Roman', Times, serif;">SkyLine</a>
        </div>
        <div id="menu_text">
            <a href="../product/product.php" style="text-decoration: none; color: inherit;">Bộ lọc</a>
            <a href="../product/product.php" style="text-decoration: none; color: inherit;">Tin tức</a>
        </div>         
        </div>
        </div>
        <div id="head">
                <?php
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                    echo "
                    <img style='postion: absolute; width: 1500px; height: 750px; filter: blur(5px);' src='/pictures/".$row['product_img']."'>
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
                console.log(text);
            }, 5000);
        </script>
    </body>
</html>