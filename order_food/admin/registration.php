<?php include '../connection/connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Food Website</title>

    <link rel="shortcut icon" type="image" href="../foods_image/logo.png">

        
<!--fontawesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" integrity="sha512-tk4nGrLxft4l30r9ETuejLU0a3d7LwMzj0eXjzc16JQj+5U1IeVoCuGLObRDc3+eQMUcEQY1RIDPGvuA7SNQ2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/svg-with-js.min.css" integrity="sha512-kykcz2VnxuCLnfiymkPqtsNceqEghEDiHWWYMa/nOwdutxeFGZsUi1+TEWT4MyesfxybNGpJNCVXzEPXSO8aKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/solid.min.css" integrity="sha512-6/gTF62BJ06BajySRzTm7i8N2ZZ6StspU9uVWDdoBiuuNu5rs1a8VwiJ7skCz2BcvhpipLKfFerXkuzs+npeKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--fontawesome-->
    

<!--google fonts-->
<link rel="preconnect" href="https://fonts.googleapis.com">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<!--google fonts-->

<link rel="stylesheet" href="./style_new/login.css">

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />



</head>
<body>
<!-- header -->

<header class="header" style="border-bottom: 1px solid var(--secondary-color);">
    <a href="#" class="logo"><i class="fa-solid fa-utensils"></i> Delicious Food</a>

    <nav class="navbar" style="margin-right: 60px; word-spacing: 15px;">
        <a href="../index.php">Home</a>
        <a href="../about.php">About us</a>
        <a href="#">Contact</a>
    </nav>


</header>

<div class="container">
    <div class="login">
        <div class="content">
            <img src="../foods_image/re_image.jpg">
        </div>
        <div class="loginform">
            <h1>Sign up</h1>
            <form action="registarCheck.php" method="POST" id="formSubmit">
            <div class="tbox">
                    <i class="icon fa-solid fa-user-tie fa-lg">
                        <input type="text" name="firstname" placeholder="Firstname">
                    </i>
                </div>
                <div class="tbox">
                    <i class="icon fa-solid fa-user-tie fa-lg">
                        <input type="text" name="lastname" placeholder="Lastname">
                    </i>
                </div>
                <div class="tbox">
                    <i class="icon fa-solid fa-envelope fa-lg">
                        <input type="text" name="mail" placeholder="E-mail">
                    </i>
                </div>
                <div class="tbox">
                    <i class="icon fa-solid fa-user-tie fa-lg">
                        <input type="text" name="username" placeholder="Username">
                    </i>
                </div>
                <div class="tbox">
                    <i class="icon fa-solid fa-lock fa-lg"><input type="password" name="password" placeholder="Password"></i>
                </div>

                <button class="btn">Create acount</button><br/><br/>

                
            </form>

        </div>
    </div>
</div>