<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "data";

$conn = new mysqli($host, $user, $password, $dbname);
if($conn->connect_error){
    die("Lỗi".$conn->error);
}
$result = $conn->query("SELECT * FROM products");
if(!$result){
    die("Lỗi kết nối" .$conn->error);
}

$project = $conn->query("SELECT * FROM projects");
if(!$project){
  die("Lỗi" .$conn->error);
}
?>
<html>
  <head>
    <link rel="stylesheet" href="product.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
  </head>
  <body>
        <div id="menu_bar"> 
        <div id="border"></div>
        <div style="display: flex; justify-content: flex-end; align-items: flex-end; flex-direction: row; height: 100px; width: 100%;">
        <div id="menu_text">
            <div id="menu_logo">
                <a href="../../Real Estate/Trangchu.html" style="text-decoration: none; color: white; font-family: 'Times New Roman', Times, serif;">SkyLine</a>
            </div>
            <input class="label-check" id="label-check" type="checkbox">
               <label for="label-check" class="hamburger-label" id="menu_1">
               <div class="line1"></div>
               <div class="line2"></div>
               <label></label></label>
               </div>         
        </div>
        <div id="menu_func">
            <div id="menu_op">
            <div class="menu-op-section"><a href="../../../Real Estate/Trangchu.html" style="text-decoration: none; color: inherit;">Trang chủ</a></div>
            <div class="menu-op-section" style="cursor: pointer;" id="Bo-loc">Bộ lọc</div>
            <div class="menu-op-section"><a href="../../../Real Estate/Trangchu.html" style="text-decoration: none; color: inherit;">Dự án</a></div>
            <div class="menu-op-section"><a href="../../account data/login.html" style="text-decoration: none; color: inherit;">Đăng Nhập</a></div>
            </div>
            <div id="menu_filter">
              <div id="filter">
                <div id="type-container">
                      <div id="sell">Bán</div>
                      <div id="rent">Thuê</div>
                    </div>
                <h3 style="position: relative; margin: auto; width: 280px; text-align: center; font-family: Arial, Helvetica, sans-serif; font-weight: bold;">Bộ lọc bất động sản</h3>
                  <div id="house-type">
                    <h4 style="position: absolute; left: 10px; color: white;">Hình thức nhà</h4>
                    <div id="type-select">
                      Thuê
                    </div>
                    <svg id="type-icon" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" fill="black" aria-hidden="true" width="20" height="20">
                        <path d="M247.1 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L179.2 256 41.9 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/>
                    </svg>
                  </div>
                  <div id="Search">
                    <strong style="color: white;">Lọc theo tên</strong>
                    <input type="text" id="Search-input">
                </div>
                <div id="price-container">
                  <div id="price-input">
                    <h4 style="position: absolute; bottom: 20px; left: 0; color: white;">Giá</h4>
                  <input type="number" id="min" placeholder="đ 0">
                  <h3 style="color: black; font-weight: bold; text-align: center; display: flex; justify-content: center; padding-bottom: 3px;">-</h3>
                  <input type="number" id="max" placeholder="đ 100.000.000" value="100000000">
                </div>
                <div id="price-display">
                  <p id="min-display"></p>
                  <p id="max-display"></p>
                </div>
                </div>
                <div id="price-reset">
                  <button id="p-reset">Đặt lại</button>
                  <button id="p-confirm">Xem kết quả</button>
                </div>
              </div>
            </div>
        </div>
        </div>
<section id="head">
      <h1 id="lxr">LUXURY REAL ESTATE</h1>
      <h2>LET'S FIND<br> YOUR DREAM HOUSE</h2>
<div class="flower-container" id="intro-con">
  <div class="petal" style="--i:0;">
    <?php
      $default = "../../pictures/img1.png";
      if(
        isset($pj['project_img1']) &&
        $pj['project_img1'] !== '' &&
        file_exists(__DIR__ . "../../pictures/" . $pj['project_img1'])
      ){
        $img = "../../pictures/" . $pj['project_img1'];
      }else{
        $img = $default;
      }
    ?>
      <img src="<?php echo $img; ?>">
  </div>
  <div class="petal" style="--i:1;">
    <?php
      $default = "../../pictures/img2.png";
      if(
        isset($pj['project_img2']) &&
        $pj['project_img2'] !== '' &&
        file_exists(__DIR__ . "../../pictures/" . $pj['project_img2'])
      ){
        $img = "../../pictures/" . $pj['project_img2'];
      }else{
        $img = $default;
      }
    ?>
      <img src="<?php echo $img; ?>">
  </div>
  <div class="petal" style="--i:2;">
    <?php
      $default = "../../pictures/img3.jpg";
      if(
        isset($pj['project_img3']) &&
        $pj['project_img3'] !== '' &&
        file_exists(__DIR__ . "../../pictures/" . $pj['project_img3'])
      ){
        $img = "../../pictures/" . $pj['project_img3'];
      }else{
        $img = $default;
      }
    ?>
      <img src="<?php echo $img; ?>">
  </div>
  <div class="petal" style="--i:3;">
    <?php
      $default = "../../pictures/img1.png";
      if(
        isset($pj['project_img1']) &&
        $pj['project_img1'] !== '' &&
        file_exists(__DIR__ . "../../pictures/" . $pj['project_img1'])
      ){
        $img = "../../pictures/" . $pj['project_img1'];
      }else{
        $img = $default;
      }
    ?>
      <img src="<?php echo $img; ?>">
  </div>
  <div class="petal" style="--i:4;">
    <?php
      $default = "../../pictures/img2.png";
      if(
        isset($pj['project_img2']) &&
        $pj['project_img2'] !== '' &&
        file_exists(__DIR__ . "../../pictures/" . $pj['project_img2'])
      ){
        $img = "../../pictures/" . $pj['project_img2'];
      }else{
        $img = $default;
      }
    ?>
      <img src="<?php echo $img; ?>"> 
  </div>
  <div class="petal" style="--i:5;">
    <?php
      $default = "../../pictures/img3.jpg";
      if(
        isset($pj['project_img3']) &&
        $pj['project_img3'] !== '' &&
        file_exists(__DIR__ . "../../pictures/" . $pj['project_img3'])
      ){
        $img = "../../pictures/" . $pj['project_img3'];
      }else{
        $img = $default;
      }
    ?>
      <img src="<?php echo $img; ?>">
  </div>
</section>
<section id="body" style="position: relative; margin: auto; max-width: 1500px; width: 100%; height: 800px; position: relative; overflow: hidden; background-color: rgba(24, 23, 35, 1);">
        <h1 id="rcm">Our Recommend</h1> 
        <div id="result">
          <?php
          while($row = $result->fetch_assoc()){
            echo "
                <div class='house' id='" . $row['product_id'] . "'>
                    <img src='../../pictures/" . $row['product_img'] . "'>
                    <h3>" . $row['product_name'] . "</h3>
                    <h4 id='p-price'>".$row['product_price']."</h4>
                    <p id='p-type'>".$row['product_type']."</p>
                    <button onclick=\"location.href='../child page/chitiet.php?id={$row['id']}'\">Xem chi tiết</button>
                </div>
            ";
          }
          ?>
        </div>
  </section>
  <section id="footer">
            <div class="footer-info" id="fi-1" style="position: absolute; left: 5%; top: 15%;">
                <h2>Chính sách</h2>
                <p>abc</p>
                <p>abc</p>
            </div>

            <div class="footer-info" id="fi-2" style="position: absolute; left: 20%; top: 15%;">
                <h2>Giới thiệu</h2>
                <p>SkyLine</p>
                <p>Đội ngũ</p>
            </div>

            <div class="footer-info" id="fi-3" style="position: absolute; left: 40%; top: 15%;">
                <h2 style="color: white; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Liên hệ với chúng tôi qua</h2>
                <p style="color: rgb(177, 177, 177); font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Email: abc@gmail.com</p>
                <p style="color: rgb(177, 177, 177); font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Hotline: 0909.xxx.xxx</p>
                <input placeholder="Contact us..." style="width: 300px; height: 30px;">
            </div>


            <div class="footer-info" id="fi-4" style="position: absolute; left: 70%; top: 15%;">
                <div style="border-bottom: 1px solid gray; font-family: Arial, Helvetica, sans-serif;">
                    <h2>Dịch vụ khách hàng</h2>
                    <h3>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20">
                            <path d="M203.7 512.9s0 0 0 0l-37.8 26.7c-7.3 5.2-16.9 5.8-24.9 1.7S128 529 128 520l0-72-32 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l320 0c53 0 96 43 96 96l0 224c0 53-43 96-96 96l-120.4 0-91.9 64.9zm64.3-104.1c8.1-5.7 17.8-8.8 27.7-8.8L416 400c26.5 0 48-21.5 48-48l0-224c0-26.5-21.5-48-48-48L96 80c-26.5 0-48 21.5-48 48l0 224c0 26.5 21.5 48 48 48l56 0c10.4 0 19.3 6.6 22.6 15.9 .9 2.5 1.4 5.2 1.4 8.1l0 49.7c32.7-23.1 63.3-44.7 91.9-64.9z"/>
                        </svg>&nbsp;
                        Trò chuyện trực tiếp
                    </h3>
                    <h3>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="17" height="17">
                            <path d="M160.2 25C152.3 6.1 131.7-3.9 112.1 1.4l-5.5 1.5c-64.6 17.6-119.8 80.2-103.7 156.4 37.1 175 174.8 312.7 349.8 349.8 76.3 16.2 138.8-39.1 156.4-103.7l1.5-5.5c5.4-19.7-4.7-40.3-23.5-48.1l-97.3-40.5c-16.5-6.9-35.6-2.1-47 11.8l-38.6 47.2C233.9 335.4 177.3 277 144.8 205.3L189 169.3c13.9-11.3 18.6-30.4 11.8-47L160.2 25z"/>
                        </svg>&nbsp;&nbsp;
                        0909.xxx.xxx
                    </h3>
                </div>
                <div>
                    <h2 style="color: white; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">Đăng ký nhận tin</h2>
                    <input placeholder="Nhập địa chỉ email..." style="width: 300px; height: 30px; border-radius: 5px; border: -1px -1px 20px white; background-color: transparent; box-shadow: 1px 1px 5px white; color: white;">
                </div>
            </div>

            <h1 style="position: absolute; left: 50%; transform: translateX(-50%); top: 60%; font-family: Arial, Helvetica, sans-serif;">
                CONTACT US&nbsp;
                <svg style="fill: white;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20">
                    <path d="M214.6 17.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 117.3 160 488c0 17.7 14.3 32 32 32s32-14.3 32-32l0-370.7 105.4 105.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/>
                </svg>
            </h1>

            <div class="footer-info" id="fi-5" style="width: 95%; height: 300px; border-top: 1px solid gray; position: absolute; left: 50%; transform: translateX(-50%); top: 70%;"></div>
        </section>
    </div>
    <div id="show" style="width: 100%; height: 100%; max-height: 750px; max-width: 1500px; background-color: black;"></div>
    <div id="eff1"></div>
    <div id="eff2">
      <div style="width: 50%; height: 50%; background-color: white;"><div>
    </div>
    
  </body>
  <script>
    history.scrollRestoration = "manual";
    const head = document.getElementById("head");
    const body = document.getElementById("body");
    const search = document.getElementById("Search-input");
    const result = document.querySelectorAll(".house");
    const house = document.querySelector(".house");
    const filters = document.getElementById("filter");
    const menu_filter = document.getElementById("menu_filter");
    const rent = document.getElementById("rent");
    const sell = document.getElementById("sell");
    const menu_op = document.getElementById("menu_op");
    const min = document.getElementById("min");
    const max = document.getElementById("max");
    const minDisplay = document.getElementById("min-display");
    const maxDisplay = document.getElementById("max-display");
    const eff1 = document.getElementById("eff1");
    const eff2 = document.getElementById("eff2");
    const introcon = document.getElementById("intro-con");
    minDisplay.textContent = "0";
    maxDisplay.textContent = "100.000.000";
    house.classList.add("show");
    rent.classList.add("show");
    let index = 0;
    let match = [];
    let tcount = 1;



    //SEARCH FEATURE
    document.getElementById("p-confirm").addEventListener('click',()=>{
      const key = search.value.toLowerCase();
      match = [];

      result.forEach(r =>{
        const id = r.textContent.toLowerCase();
        if(id.includes(key)){
          r.style.display = "";
          match.push(r);
        }else{
          r.style.display = "none";
        }
        
        match.forEach(item => {
    const priceEl = item.querySelector("#p-price");
    if (!priceEl) return;

    const priceText = priceEl.textContent.toLowerCase();

    const minVal = Number(min.value);
    const maxVal = Number(max.value);

    let priceNumber = 0;

    if (priceText.includes("tỷ") && sell.classList.contains("show")) {
        priceNumber = Number(priceText.replace("tỷ", "").trim()) * 1e9;
    }

    else if (priceText.includes("triệu") && rent.classList.contains("show")) {
        priceNumber = Number(priceText.replace("triệu", "").trim()) * 1e6;
    }

    else {
        item.style.display = "none";
        return;
    }

    if (priceNumber >= minVal && priceNumber <= maxVal) {
        item.style.display = "";
    } else {
        item.style.display = "none";
    }

    console.log("Price:", priceNumber);
    console.log("Min:", minVal, "Max:", maxVal);
});

    });
    });

    min.addEventListener('keyup', ()=>{
      if(min.value > 0){
        minDisplay.textContent = formatWithDots(min.value);
      }else{
        minDisplay.textContent = "0";
      }
      if(min.value >= max.value - 1 && sell.classList.contains("show")){
        if(max.value > 0){
          min.value = max.value - max.value * 1/100;
          minDisplay.textContent = formatWithDots(min.value);
        }
      }
      if(min.value >= max.value - 1 && rent.classList.contains("show")){
        min.value = max.value - max.value * 1/100;
        minDisplay.textContent = formatWithDots(min.value);
      }
    });
    max.addEventListener('keyup', ()=>{
      if(max.value >= min.value){
        maxDisplay.textContent = formatWithDots(max.value);
      }else{
        maxDisplay.textContent = formatWithDots(max.value);
        if(min.value >= max.value - 1 && sell.classList.contains("show")){
        if(max.value >= 0){
          min.value = max.value - max.value * 1/100;
          minDisplay.textContent = formatWithDots(min.value);
        }
      }

        if(min.value >= max.value - 1 && rent.classList.contains("show")){
        min.value = max.value - max.value * 1/100;
        minDisplay.textContent = formatWithDots(min.value);
      }
      }
      if(max.value >= 1e11 && sell.classList.contains("show")){
        max.value = 1e11;
        maxDisplay.textContent = formatWithDots(max.value);
      }
      if(max.value >= 1e8 && rent.classList.contains("show")){
        max.value = 1e8;
        maxDisplay.textContent = formatWithDots(max.value);
      }
    });


//BANNER SLIDE
const slides = document.querySelectorAll(".house");
slides[2].classList.add("show");




    if (slides.length > 0) {
      let index = 2;
      const slideWidth = slides[0].offsetWidth;

    function positionSlides() {
      slides.forEach((el, i) => {
        if(i === index){
        el.style.scale = "1.1";
        el.style.filter = "blur(0px) brightness(100%)";
        }else{
        el.style.scale = "0.9";
        el.style.filter = "blur(2px) brightness(70%)";
        }

      el.style.transition = ".6s ease";
      el.style.transform = `translateX(${(i - index) * slideWidth}px)`;
    });
  }

  function autoSlide() {
  slides.forEach(s => s.classList.remove("show"));
    index = (index + 1) % slides.length;   
  slides[index].classList.add("show");
      positionSlides();
  }

  let slideTimer = setInterval(autoSlide, 5000);


  slides.forEach((el, i) => {
    el.addEventListener("click", () => {
      slides.forEach(s => s.classList.remove("show"));
      clearInterval(slideTimer);
      el.classList.add("show");
      index = i;
      positionSlides();
      slideTimer = setInterval(autoSlide, 5000);
    });
  });

  window.addEventListener("load", positionSlides);
  }










  //TOGGLE ĐƠN GIẢN
    document.getElementById("menu_1").addEventListener('click', ()=>{
      document.getElementById("menu_op").classList.toggle("open");
      document.getElementById("menu_filter").classList.remove("open");
      document.getElementById("filter").classList.remove("open");
    });
    document.getElementById("Bo-loc").addEventListener('click', ()=>{
      document.getElementById("label-check").checked = false;
      document.getElementById("menu_filter").classList.toggle("open");
      document.getElementById("filter").classList.toggle("open");
      document.getElementById("menu_op").classList.toggle("open");
    });
    document.getElementById("head").addEventListener('click', (e)=>{
      if(!filters.contains(e.target)){
        filters.classList.remove("open");
        menu_filter.classList.remove("open");
      }
    });

    document.getElementById("type-select").addEventListener('click', ()=>{
      document.getElementById("type-container").classList.toggle("open");
      document.getElementById("type-select").textContent = "";
      document.getElementById("type-icon").style.transform = "rotate(90deg)";
    });

    rent.addEventListener('click', ()=>{
      maxDisplay.textContent = "100.000.000";
      document.getElementById("type-select").textContent = "Thuê";
      document.getElementById("type-container").classList.toggle("open");
      document.getElementById("type-icon").style.transform = "rotate(0deg)";
    });
    sell.addEventListener('click', ()=>{
      maxDisplay.textContent = "100.000.000.000";
      document.getElementById("type-select").textContent = "Bán";
      document.getElementById("type-container").classList.toggle("open");
      document.getElementById("type-icon").style.transform = "rotate(0deg)";
    });












  //INTERSECTION OBSERVERS
    const headObserver =  new IntersectionObserver(entries =>{
    entries.forEach(entry => {
        if(entry.isIntersecting){
          document.getElementById("menu_bar").style.opacity = "1";
          document.getElementById("border").classList.add("animate");
          const hh1 = document.getElementById("lxr").classList.add("show");
          const h2 = document.querySelector("#head h2"); 
          h2.classList.add("show");
          document.getElementById("show").classList.add("show");
          eff1.classList.add("show");
          eff2.classList.add("show");
          introcon.classList.add("show");
        }else{
          document.getElementById("show").classList.remove("show");
        }
        });
    });

    headObserver.observe(head);

    const bodyObserver =  new IntersectionObserver(entries =>{
    entries.forEach(entry => {
        if(entry.isIntersecting){
          const bh1 = document.getElementById("rcm").classList.add("show");
        }
        });
    });

    bodyObserver.observe(body);









  //WINDOW LISTENER
    const sections = document.querySelectorAll("section");
    let currentSection = 0;
    let isScrolling = false;



    window.addEventListener('wheel', (e) => {
    e.preventDefault();
    if (isScrolling) return;

    if (e.deltaY > 0 && currentSection < sections.length - 1) {
        currentSection++;
    } else if (e.deltaY < 0 && currentSection > 0) {
        currentSection--;
    } else {
        return;
    }

    isScrolling = true;

    sections[currentSection].scrollIntoView({
        behavior: 'smooth'
    });

    setTimeout(() => {
        isScrolling = false;
    }, 300);
}, { passive: false });





  //FUNCTION 



  //SIDE 
  if(rent.classList.contains("show")){
    document.getElementById("type-select").textContent = "Thuê";
    max.setAttribute("max", 1e6);
  }
  if(sell.classList.contains("show")){
    document.getElementById("type-select").textContent = "Bán";
    max.setAttribute("max", 1e11);
  }

  const sellReset = document.getElementById("p-reset").addEventListener('click', ()=>{
    if(rent.classList.contains("show")){
      min.value = "";
      max.value = "";
      minDisplay.textContent = "0";
      maxDisplay.textContent = "100.000.000";
    }
    if(sell.classList.contains("show")){
      min.value = "";
      max.value = "";
      minDisplay.textContent = "0";
      maxDisplay.textContent = "100.000.000.000";
    }
    });
  </script>
</html>