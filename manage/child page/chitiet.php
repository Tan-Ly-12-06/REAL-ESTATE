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

while($row = $result->fetch_assoc()){
                    $data[] = $row;
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
                <a href="../../Real Estate/Trangchu.php" style="text-decoration: none; color: white; font-family: 'Times New Roman', Times, serif;">SL</a>
        </div>
        <div id="menu_house_name">
            <?php foreach($data as $row): ?>
                <p><?= $row['product_name'] ?></p>
            <?php endforeach; ?> 
        </div>
        <div class="menu-icon">E</div>         
        <div class="menu-icon">N</div> 
        </div>
        </div>
        <div id="head">
                <?php
                    echo "
                    <img src='../../pictures/".$row['product_img']."'>
                    ";
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
                </div>
                <div id="container-info">
                        <?php foreach($data as $row): ?>
                            <img src="../../pictures/<?=$row['product_img']?>">
                        <?php endforeach; ?>
                    <div id="head-info-container">
                        <?php foreach($result as $row): ?>
                            <h3><?= $row['product_name'] ?></h3>
                            <p><?= $row['product_address'] ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div id="Recent-similar-real-estate">
                    <h1>Find Similar <br>Luxurios Estate</h1>
                    <p>Enhance your experience for what you desire</p>
                    <div id="rs-icon-container">
                        <?php foreach ($data as $row): ?>
                        <div class="rs-icon" id="rsi-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="1em" height="1em" fill="currentColor" style="vertical-align: middle;">
                                <path d="M32 32c17.7 0 32 14.3 32 32v224h224v-128c0-17.7 14.3-32 32-32h160c53 0 96 43 96 96v224c0 17.7-14.3 32-32 32s-32-14.3-32-32v-64H64v64c0 17.7-14.3 32-32 32S0 465.7 0 448V64c0-17.7 14.3-32 32-32zm80 160a64 64 0 1 1 128 0 64 64 0 1 1-128 0z"/>
                            </svg>
                            Bedroom
                        </div>
                        <?php endforeach; ?>

                        <?php foreach ($data as $row): ?>
                        <div class="rs-icon" id="rsi-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="13" height="13" fill="currentColor" style="vertical-align: middle;">
                                <path d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3 3.5 0 6.9 1.4 9.4 3.9l14.9 14.9c-3.6 9.1-5.5 18.9-5.5 29.2 0 19.9 7.2 38 19.2 52-5.3 9.2-4 21.1 3.8 29 9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9-7.8-7.9-19.8-9.1-29-3.8-14-12-32.1-19.2-52-19.2-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0 66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32v48c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32v-16h256v16c0 17.7 14.3 32 32 32s32-14.3 32-32v-40.4c19.6-17.6 32-43.1 32-71.6v-48c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3z"/>
                            </svg>
                            Bathroom
                        </div>
                        <?php endforeach; ?>

                        <?php foreach ($data as $row): ?>
                        <div class="rs-icon"><?=$row['product_type']?></div>
                        <?php endforeach; ?>
                    </div>
                    <div id="rs-search">Search For Result</div>
                </div>
        </div>
    </body>
</html>