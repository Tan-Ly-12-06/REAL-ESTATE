<?php
require_once __DIR__ . "/../account data/header.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <style>
        *{box-sizing: border-box;}
        html,body{background-color: rgb(44, 44, 44); margin: 0 auto; top: 0; z-index: -1; user-select: none;}

        #head{
            position: relative;
            width: 100%;
            max-width: 1500px;  
            height: 900px;
            margin: auto;
            display: flex;
            bottom: 60px;
        }
        #head-show{
            width: 100%;
            height: 100%;
            position: absolute;
            transition: 10s ease-in-out;
            background-color: black;
        }
        #head img{
            object-fit: cover;
            width: 100%;
            height: 100%;
            filter: brightness(60%);
        }
        #intro{
            bottom: 45%;
            position: absolute;
            width: 1000px;
            height: 500px;
            display: flex;
            justify-content: center;
        }
        #intro h1{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 1000px;
            height: 240px;
            color: white;
            font-family: serif;
            transition: 1s ease-in-out;
            overflow: hidden;
            font-size: 90px;
            position: relative;
            opacity: 0;
            translate: -50% 50%;
            font-family: 'Noto Serif', serif;
        }
        #intro-button-container{
            opacity: 0;
            translate: -150%;
            top: 80%;
            position: absolute;
            width: 270px;
            height: 60px;
            display: flex;
            justify-content: space-between;
        }
        #intro-btn1{
            background-color: white;
        }
        #intro-btn2{
            background-color: rgba(255, 255, 255, 0.4);
            color: white;
        }
        .intro-button{
            border: none;
            border-radius: 10px;
            width: 130px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 14px;
            transition: .4s ease-in-out;
            cursor: pointer;
        }
        .intro-button:hover{
            scale: 1.03;
            transition: .4s ease-in-out;
        }
        #intro-content{
            padding-top: 70px;
            left: 90%;
            top: 105%;
            position: absolute;
            display: grid;
            width: 300px;
            height: 100px;
        }
        #intro-content h2{
            translate: 0 1800%;
            opacity: 0;
            color: white;
        }
        #intro-content p{
            translate: 0 3000%;
            opacity: 0;
            color: white;
        }
        #icon-container{
            top: 55%;
            left: 50%;
            transform: translateX(-50%);
            position: absolute;
            width: 30%;
            height: 50px;
            display: flex;
            gap: 40px;
            justify-content: center;
            transition: .3s all;
        }
        #menu_bar{
            max-width: 1500px;
            width: 100%;
            height: 65px;
            top: 0;
            position: fixed;
            z-index: 1000;
            display: flex;
            align-items: center; 
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: .3s ease-in-out;
        }
        #menu_bar:hover{
            opacity: 1;
        }
        #border{
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 100%;
            border-bottom: 1px solid rgba(255, 255, 255, 0.6);
            transition: .2s ease-in-out;
        }
        #menu_bar:hover #border{
            width: 80%;
            transition: 2.5s ease-in-out;
        }
        #menu_func{
            width: 180px;
            height: 70px;
            position: relative;
            display: flex;
            justify-content: space-around;
            align-items: center;
            transition: all 0.5s ease-in-out;
        }
        #menu_text{
            width: 80%;
            height: 100%;
            margin: 0 auto;
            position: relative;
            color: white;
            font-size: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 20px;
            min-width: 750px;
            min-height: 70px;
        }
        #menu_logo{
            width: 400px;
            height: 100%;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            position: relative;
            color: white;
            font-size: 30px;
            font-weight: 500;
        }
        .label-check {
            display: none;
        }
        .hamburger-label {
            width: 60px;
            height: 30px;
            display: flex;
            flex-direction: column;
            cursor: pointer;
            justify-content: center;
            align-items: center;
        }
        .hamburger-label div {
            width: 40px;
            height: 2px;
            scale: 1;
            position: absolute;
            z-index: 2;
            background-color: #fff;
            transition: .3s ease-in-out;
        }
        .line2 {
            margin: 20px 0 0 20px;
        }
        #label-check:checked + .hamburger-label .line1 {
            transform: translate(10px, -5px) scale(1.01);
            position: absolute;
            transition: .5s ease-in-out;
        }
        #label-check:checked + .hamburger-label .line2 {
            transform: translate(-10px, 5px) scale(1.01);
            position: absolute;
            transition: .5s ease-in-out;
        }
        #menu_op{
            position: fixed;
            top: 100px;
            transition: .5s ease-in-out;
            width: 300px;
            height: 0px;
            background-color: rgba(255, 255, 355, 0.1);
            opacity: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            transform: translateX(20%);

        }
        #menu_op *{
            color: white;
        }
        #menu_op.open{
            height: 600px;
            transform: translateX(-30%);
            opacity: 1;
            transition: .5s ease-in-out;
            box-shadow: -5px -5px 25px rgba(221, 221, 221, 0.5), 5px 5px 25px black;
            position: fixed;
        }
        .menu-op-section{
            width: 200px;
            height: 30px;
            position: relative;
            left: 20px;
            border-bottom: 1px solid rgb(210, 210, 210);
            list-style-type: none;
        }
        #body_1{
            width: 100%;
            max-width: 1500px;
            height: 1000px;
            margin: 0;
            padding-top: 70px;
            display: flex;
            gap: 5px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            flex-direction: column;
        }
        #about-us{
            position: relative;
            margin: 0 auto;
            width: 100%;
            left: 0;
            max-width: 1500px;
            height: 1000px;
            background-color: rgb(20, 20, 20);
            display: flex;
            padding-top: 100px;
            padding-left: 50px;
            bottom: 100px;
            visibility: visible;
        }
        #about-us-img-container{
            width: 450px;
            height: 650px;
            display: flex;
            overflow: hidden;
            opacity: 0;
            transition: 1000ms ease-in-out;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }
        #abimg-1{
            filter: brightness(50%);
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: .5s ease-in-out;
        }
        #ab-show{
            width: 101%;
            height: 100%;
            position: absolute;
            background-color: rgb(20, 20, 20);
            z-index: 1;
            left: 50%;
            transform: translateX(-50%);
            transition: .5s ease-in-out;
        }
        #about-us-next-btn{
            border-radius: 50%;
            width: 60px;
            height: 60px;
            position: relative;
            margin: 0 auto;
            transition: all .2s ease-in-out;
            background-color: rgba(255, 255, 255, 0.6);
            z-index: 10000;
            opacity: 0;
        }
        #about-us-next-btn:hover{
            scale: 1.05;
            transition: all .2s ease-in-out;
        }
        .btnn{
            width: 30px;
            height: 6px;
            scale: 1;
            position: absolute;
            z-index: 2;
            background-color: #ffffff;
            transition: .3s ease-in-out;
        }
        #b1{
            transform: rotate(-45deg) translate(-15px, 40px);
        }
        #b2{
            transform: rotate(45deg) translate(28px, 2px);
        }
        #abi-span-1{
            position: absolute;
            top: 40%;
            translate: -150%;
            text-align: left;
            font-size: 50px;
            font-weight: bold;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            transition: .5s ease-in-out;
            opacity: 0;
        }
        #about-us-content{
            position: relative;
            width: 40%;
            height: 70%;    
            display: flex;
            justify-content: flex-start;
            padding-top: 70px;
            padding-left: 100px;
            left: 30%;
            color: white;
            bottom: 100px;
        }
        #about-us-content h1{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            width: 400px;
            height: 100px;
            opacity: 0;
            transition: 1s ease-in-out;
            left: 20%;
            position: relative;
        }
        #about-us-content p{
            position: relative;
            top: 13%;
            right: 10%;
            translate: 10%;
            opacity: 0;
            transition: 1.25s ease-in-out;
        }
        #about-us-main{
            border: none;
            border-radius: 30px;
            top: 50%;
            right: 45%;
            width: 100px;
            height: 30px;
            font-weight: bold;
            position: absolute;
            background-color: rgba(255, 255, 255, 0.8);
            color: white;
            translate: 0 100%;
            transition: 1s ease-in-out;
        }
        #about-us-main:hover{
            background-color: rgb(0, 73, 198);
        }
        #about-us-trust{
            overflow: hidden;
            margin: auto;
            position: relative;
            width: 100%;
            height: 900px;
        }
        #about-us-trust img{
            object-fit: cover;
            filter: brightness(90%);
            width: 100%;
            height: 100%;
        }
        #ab-h1{
            position: absolute;
            top: 20%;
            text-align: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            scale: 0.8;
            left: 10%;
            opacity: 0;
            transition: .5s ease-in-out;
            font-size: 50px;
        }
        #about-us-trust p{
            top: 22%;
            position: relative;
            text-align: center;
            opacity: 0;
            scale: 0.8;
            translate: 0 10%;
            transition: .5s ease-in-out;
            color: white;
        }
        #about-container{
            top: 20%;
            position: relative;
            width: 400px;
            height: 200px;
            display: flex;
            gap: 70px;
            overflow: hidden;
            left: 5%;
        }
        .about{
            width: 200px;
            height: 250px;
            bottom: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #book1{
            position: relative;
            background-color: rgba(255, 255, 255, 0.6);
            width: 50%;
            height: 100%;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        #book2{
            position: relative;
            background-color: rgba(255, 255, 255, 0.6);
            width: 50%;
            height: 100%;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }
        .about h1{
            color: white;
        }
        .about p{
            color: rgb(223, 223, 223);
            font-size: 20px;
        }
        #ab1{
            left: 50%;
            position: absolute;
            transition: 1s ease-in-out;
            opacity: 1;
            top: 50%;
        }
        #ab2{
            position: absolute;
            text-align: center;
            transition: 1s ease-in-out;
            opacity: 1;
            left: 25%;
            top: 60%;
        }
        #ab3{
            position: absolute;
            transition: 2s ease-in-out;
            opacity: 1;
            left: 80%;
            top: 70%;
        }
        #body_2{
            width: 100%;
            max-width: 1500px;
            height: 800px;
            padding-top: 100px;
            position: relative;
            margin: 0 auto;
            display: flex;  
        }
        #des-container{
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 1500px;
            height: 800px;
            background-color: rgb(29, 28, 30);
            bottom: 100px;
        }
        #des-context{
            position: relative;
            width: 30%;
            height: 80%;
            right: 30%;
            justify-content: center;
            padding-top: 100px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 25px;
            background-color: white;
            transition: .2s ease-in-out;
            border-radius: 10px;
            visibility: hidden;
            color: white;
        }
        .dt{
            position: absolute;
        }
        .dt span{
            width: 300px;
            top: 80px;
            font-size: 15px;
        }
        #des-img{
            position: absolute;
            display: flex;
            align-items: center;
            width: 600px;
            height: 550px;
            left: 45%;
        }
        #di-1.skew{
            transform: skew(5deg) rotate(15deg);
            transition: .7s ease-in-out;
        }
        #di-1{
            transform: skew(5deg) rotate(-15deg) translate(-100%, -20%);
            transition: .7s ease-in-out;
        }
        #di-2.skew{
            transform: skew(5deg) rotate(-15deg) translate(-100%, -20%);
            transition: .7s ease-in-out;
        }
        #di-2.skew-move{
            transform: skew(5deg) rotate(-15deg) translate(-100%, -20%);
            transition: .7s ease-in-out;
        }
        #di-3.skew{
            transform: skew(5deg) rotate(15deg);
            transition: .7s ease-in-out;
        }
        .des-img{
            display: flex;
            width: 300px;
            height: 400px;
            transition: .3s ease-in-out;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.8);
        }
        .des-img img{
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        .des-img span{
            background-color: transparent;
            font-size: 13px;
            top: 75%;
            left: 50%;
            transform: translateX(-50%);
            position: absolute;
            color: white;
            text-align: center;
        }
        #di-1.img-ad{
            width: 300px;
            height: 400px;
            border: 8px solid white;
            box-shadow: 10px 10px 20px black;
            position: absolute;
            z-index: 2;
            scale: 1.1;
            left: 51%;
            bottom: 19%;
            transform: translateX(-50%) skew(0deg) rotate(0deg);
            transition: .6s ease-in-out;
            border-radius: 5px;
        }
        #di-2.img-ad{
            width: 300px;
            height: 400px;
            border: 8px solid white;
            box-shadow: 10px 10px 20px black;
            position: absolute;
            z-index: 2;
            scale: 1.1;
            left: 51%;
            bottom: 19%;
            transform: translateX(-50%) skew(0deg) rotate(0deg);
            transition: .6s ease-in-out;
            border-radius: 5px;
        }
        #di-3.img-ad{
            width: 300px;
            height: 400px;
            border: 8px solid white;
            box-shadow: 10px 10px 20px black;
            position: absolute;
            z-index: 2;
            scale: 1.1;
            left: 51%;
            bottom: 19%;
            transform: translateX(-50%) skew(0deg) rotate(0deg);
            transition: .6s ease-in-out;
            border-radius: 5px;
        }
        .img-context{
            visibility: visible;
            animation: ad 1s ease-in-out forwards;
        }






        #footer{
            padding-top: 100px;
            display: flex;
            width: 100%;
            height: 800px;
            max-width: 1500px;
            max-height: 1000px;
            background-color: rgb(32, 32, 32);
            position: relative;
            margin: auto;
            color: white;
            gap: 50px;
        }
        .footer-info{
            padding-left: 2px;
        }
        .footer-info p{
            font-weight: 400;
            color: gray;
            cursor: pointer;
        }
        .footer-info p:hover{
            text-decoration: underline;
        }
        @keyframes lscroll{
            0%{
                top: -100%;
                height: 0px;
            }
            0.001%{
                top: -50%;
            }
            100%{
                top: 0;
                height: 130px;
            }
        }
        @keyframes ad{
            0%{
                visibility: hidden;
                opacity: 0;
            }
            0.01%{
                visibility: visible;
            }
            100%{
                opacity: 1;
            }
        }
        @keyframes whyus{
            0%,50%{
                width: 0;
                opacity: 0;
                font-size: 0px;
            }
            95%,100%{
                position: relative;
                width: 200px;
                opacity: 1;
                font-size: 18px;
            }
        }
        @keyframes movebg {
            0%{
                background-position: 0 0;
            }
            20%,60%{
                background-position: 175% 175%;
            }
            70%,100%{
                background-position: 100% 100%;
            }
        }

        #menu_bar.animate{
            transition: 2.7s ease-in-out;
            opacity: 1;
        }
        #border.animate{
            width: 80%;
            transition: 3.5s ease-in-out;
        }
        #head-show.animate{
            translate: 0 -150%;
            transition: 1s ease-in-out;
        }
        #head-h1.animate{
            opacity: 1;
            translate: -10% 50%;
            transition: 2s ease-in-out;
        }
        #intro-button-container.animate{
            translate: -35%;
            opacity: 1;
            transition: 3.2s ease-in-out;
        }
        #head-h2.animate{
            position: absolute;
            opacity: 1;
            translate: 0 0;
            transition: 2.5s ease-in-out;
        }
        #head-p.animate{
            opacity: 1;
            translate: 0 0;
            transition: 4s ease-in-out;
        }
        #about-us-img-container.show{
            opacity: 1;
            translate: 0 0;
            transition: 1000ms ease-in-out;
        }
        #about-us-content h1.show{
            opacity: 1;
            transition: 1s ease-in-out;
        }
        #about-us-content p.show{
            translate: 0;
            opacity: 1;
            transition: 1.25s ease-in-out;
        }
        #ab-show.show{
            height: 0;
            transition: 1.2s ease-in-out;
        }
        #about-us-main.show{
            translate: 0 0;
            transition: 1s ease-in-out;
        }
        #about-us-trust h1.appear{
            scale: 1;
            opacity: 1;
            translate: 0 0;
            transition: .75s ease-in-out;
        }
        #about-us-trust p.appear{
            scale: 1;
            opacity: 0.7;
            translate: 0 10%;
            transition: .75s ease-in-out;
        }
        .visible{
            opacity: 1;
        }
        #about-container.spin{
            width: 80%;
            transition: 1s ease-in-out;
        }
        #abi-span-1.show{
            opacity: 1;
            translate: 20%;
            transition: 1s ease-in-out;
        }
        #ab1.appear{
            transition: 1s ease-in-out;
            top: 10%;
            opacity: 1;
        }
        #ab2.appear{
            top: 40%;
            transition: 1.2s ease-in-out;
            opacity: 1;
        }
        #ab3.appear{
            top: 35%;
            transition: 1.5s ease-in-out;
            opacity: 1;
        }
    </style>
    <body style="display: blocks; align-items: flex-start; overflow: hidden;">
        <section>
            <div id="about-us-next-btn">
                <div class="btnn" id="b1"></div>
                <div class="btnn" id="b2"></div>
            </div>
    <div id="menu_bar"> 
        <div id="border"></div>
        <div style="display: flex; justify-content: flex-end; align-items: flex-end; flex-direction: row; height: 100px; width: 100%;">
        <div id="menu_text">
            <div id="menu_logo">
                <span id="logo">SKYLINE</span>
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
                <div class="menu-op-section">
                    <a href="../manage/product/product.php">Explore</a>
                </div>
                <div class="menu-op-section">Project</div>
                <div class="menu-op-section">News</div>
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="menu-op-section">
                    👤Welcome, <?= htmlspecialchars($_SESSION['username']) ?>
                    </div>
                    <div class="menu-op-section">
                        <a href="/Real%20Estate/account%20data/logout.php">Logout</a>
                    </div>
                <?php else: ?>
                    <div class="menu-op-section">
                        <a href="/Real%20Estate/account%20data/log.php">Login</a>
                </div>
                    <div class="menu-op-section">
                        <a href="/Real%20Estate/account%20data/reg.php">Register</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
        </section>
        <section class="home-img_container" id="head">
                <img src="pics/head-img.jpeg" style="filter: brightness(60%);">
                <div id="head-show"></div>
                <div id="intro">
                <h1 id="head-h1">SkyLine</h1>
                <div id="intro-button-container">
                    <div class="intro-button" id="intro-btn1">Contact us for free</div>
                    <div class="intro-button" id="intro-btn2"><a href="../manage/product/product.php" style="text-decoration: none; color: inherit;">Explore more</a></div>
                </div>
                    <div id="intro-content">           
                        <h2 id="head-h2">HOLISTIC LUXURY REAL ESTATE</h2>
                        <p id="head-p">Welcome to Skyline Residence</p>
                    </div>
                </div>
        </section>
        <section id="body_1">
            <div id="about-us">
                <div id="about-us-img-container">
                    <div id="ab-show"></div>
                    <img id="abimg-1" src="pics/aboutus.jpg">          
                </div>
                <span id="abi-span-1">We Build <br>Your Dream <br>House</span> 
                <div id="about-us-content">
                    <h1>OUR STORY</h1>
                    <p>Our Website is built with a goal to deliver the top-quality to customers</p>
                    <button id="about-us-main">Learn more</button>
                </div>
            </div>
        </section>
        <section style="width: 100%; height: 1000px; background-color: transparent; max-width: 1500px; position: relative; margin: auto;">
            <div id="about-us-trust">
                <img src="pics/whyus.jpg">
                <h1 id="ab-h1" style="color: white;">Why Choose Us</h1>
                <div class="about" id="ab1">
                    <div id="book1"></div>
                    <div id="book2"></div>
                    <div style="position: absolute; display: grid; justify-content: center; align-items: center; text-align: center;">
                    <h1>Our service</h1>
                    <p>Experience the Art of Fine living</p>
                    </div>
                </div>
                <div class="about" id="ab2">
                    <div id="book1"></div>
                    <div id="book2"></div>
                    <div style="position: absolute; display: grid; justify-content: center; align-items: center; text-align: center;">
                    <h1>100 years</h1>
                    <p>Live the Life You Deserve</p>
                    </div>
                </div>
                <div class="about" id="ab3">
                    <div id="book1"></div>
                    <div id="book2"></div>
                    <div style="position: absolute; display: grid; justify-content: center; align-items: center; text-align: center;">
                    <h1>24/7</h1>
                    <p>Always here for You</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="body_2">
            <div id="des-container">
                <div id="des-context">
                    <div id="dt-1" class="dt" style="font-size: 25px;">VinHome Smart City <br><br><span>Vinhomes Smart City là đại đô thị do Vingroup phát triển, được quy hoạch và xây dựng với tầm nhìn tạo ra một khu đô thị thông minh, hiện đại và bền vững. Dự án được thiết kế nhằm mang lại trải nghiệm sống toàn diện cho cư dân với sự kết hợp hài hòa giữa không gian xanh, tiện ích nội khu đẳng cấp và hạ tầng giao thông hiện đại.</span></div>
                    <div id="dt-2" class="dt" style="font-size: 25px;">VinHome Cổ Loa - Dự án Đô Thị Quốc tế <br><br><span>Tọa lạc tại tuyến đường Trường Xa, xã Đông Hội, huyện Đông Anh, Hà Nội. Với quy mô ấn tượng lên đến 385 hecta, Vinhomes Global Gate không chỉ là một khu đô thị hiện đại mà còn là biểu tượng mới của Thủ đô, nơi hội tụ tinh hoa và mở ra cơ hội phát triển vượt bậc cho khu vực phía Bắc Hà Nội.</span></div>
                    <div id="dt-3" class="dt" style="font-size: 25px;">Dự án căn hộ Sun Grand City Hillside Residence <br><br><span>Tiếp tục phát triển ở phía Nam<br>Hillside Residence có 8 tòa sở hữu tầm view 360 độ trực tiếp có thể ngắm hoàng hôn và bình minh, view thị trấn và thành phố, view các bờ Đông-Tây của nam Phú Quốc</span></div>
                </div>
                <div id="des-img">
                    <div class="des-img" id="di-1">
                        <img src="pics/DA-hot-1.jpg">
                        <span>VinHome Hà Đôngh</span>
                    </div>
                    <div class="des-img" id="di-2">
                        <img src="pics/DA-hot-2.jpeg">
                        <span>VinHome Cổ Loa</span>
                    </div>
                    <div class="des-img" id="di-3">
                        <img src="pics/DA-hot-3.jpg">
                        <span>SunGroup Phú Quốc</span>
                </div>
                </div>
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
        <script>
let index = 0;
const head = document.getElementById("head");
const headshow = document.getElementById("head-show");
const aboutwhy = document.getElementById("WHY-US");
const ab = document.getElementById("about-us");
const about_us = document.getElementById("about-us-trust");
const whyus = about_us.querySelectorAll("*");
const trust = document.getElementById("about-container");
const trust2 = document.querySelectorAll(".about:not(#a1)");
const di = document.querySelectorAll("#des-img .des-img");
const dt = document.querySelectorAll("#des-context .dt");
const d1 = document.getElementById("di-1");
const d2 = document.getElementById("di-2");
const d3 = document.getElementById("di-3");


d1.classList.add("img-ad");
let interval;
let count = 0;

const headObserver =  new IntersectionObserver(entries =>{
    entries.forEach(entry => {
        if(entry.isIntersecting){
            document.getElementById("menu_bar").classList.add("animate");
            document.getElementById("border").classList.add("animate");
            headshow.classList.add("animate");
            document.getElementById("head-h1").classList.add("animate");
            document.getElementById("head-h2").classList.add("animate");
            document.getElementById("head-p").classList.add("animate");
            document.getElementById("intro-button-container").classList.add("animate");
        }else{
            headshow.classList.remove("animate");
            document.getElementById("menu_bar").classList.remove("animate");
            document.getElementById("border").classList.remove("animate");
            headshow.classList.remove("animate");
            document.getElementById("head-h1").classList.remove("animate");
            document.getElementById("head-h2").classList.remove("animate");
            document.getElementById("head-p").classList.remove("animate");  
        }
    })
})


const observer = new IntersectionObserver(entries =>{
    entries.forEach(entry =>{
        if(entry.isIntersecting){ 
            const about = ab.querySelectorAll("*");
            about.forEach(a =>(a.classList.add("show")));
            document.getElementById("about-us-next-btn").classList.add("visible");
        }else{
            const about = ab.querySelectorAll("*");
            about.forEach(a =>(a.classList.remove("show")));
            document.getElementById("about-us-next-btn").classList.remove("visible");
        }
    });
},{
    threshold: 0.5
});

const spinObserve = new IntersectionObserver(entries =>{
    entries.forEach(entry =>{
        if(entry.isIntersecting){
            whyus.forEach(choose => choose.classList.add("appear"));
        }else{
            whyus.forEach(choose => choose.classList.remove("appear"));
        }
    });
});

const skewObserver = new IntersectionObserver(entries =>{
    entries.forEach(entry =>{
        if(entry.isIntersecting){
            d2.classList.add("skew");
            d3.classList.add("skew");
function showImage(i) {
    di.forEach(d => d.classList.remove("img-ad"));
    dt.forEach(d2 => d2.classList.remove("img-context"));
    di[i].classList.add("img-ad");
    dt[i].classList.add("img-context");
    if(d1.classList.contains("img-ad")){
        d1.classList.remove("skew");
    }
    if(d3.classList.contains("img-ad")){
        d1.classList.add("skew");
    }
    if(d2.classList.contains("img-ad")){
        d1.classList.remove("skew");
    }
}

function startInterval() {
    clearInterval(interval);
    interval = setInterval(() => {
        index = (index + 1) % di.length;
        showImage(index);
    }, 5000);
}

di.forEach((d, i) => {
    d.addEventListener("click", () => {
        index = i;         
        showImage(index);   
        startInterval();     
    });
});
showImage(index);
startInterval();
        }else{
            clearInterval(interval);
            d1.classList.add("img-ad");
            d2.classList.remove("skew");
            d3.classList.remove("skew");
        }
    });
},{
    threshold: 0.6
});
headObserver.observe(head);
observer.observe(ab);
const desimg = document.getElementById("des-img");
spinObserve.observe(about_us);
skewObserver.observe(desimg);

document.getElementById("menu_1").addEventListener('click', ()=>{
 document.getElementById("menu_op").classList.toggle("open");
});

history.scrollRestoration = "manual";


const sections = document.querySelectorAll("section");
let currentSection = 0;
let isScrolling = false;

window.addEventListener('wheel', (e) => {
    console.log(currentSection)
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



document.getElementById("Project").addEventListener('click',()=>{
    document.getElementById("des-container").scrollIntoView({ behavior: "smooth" });

});

document.getElementById("logo").addEventListener('click',()=>{
    document.getElementById("head").scrollIntoView({ behavior: "smooth"});
})
        </script>
    </body>
</html>