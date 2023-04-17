
<?php
include './connection/connection.php';
if(!isset($_SESSION['status']))
{
    $_SESSION['status']='guest';
    header("Location: ./back-end/session.php");
}
if(isset($_POST['continue_guest']))
{
    $_SESSION['status']='guest';
    
//header("Location: ./index.php");
    header("Location: ./home_page.php");
    
}
if(isset($_SESSION['user']))
{
    if($_SESSION['status']=='admin')
        {header("Location: ./admin/home_admin.php");}

}
if(isset($_SESSION['user']))
{
    if($_SESSION['status']=='user')
        {//header("Location: ./index.php");
            header("Location: ./home_page.php");
        }
}





?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="./home_style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/svg-with-js.min.css" integrity="sha512-kykcz2VnxuCLnfiymkPqtsNceqEghEDiHWWYMa/nOwdutxeFGZsUi1+TEWT4MyesfxybNGpJNCVXzEPXSO8aKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/solid.min.css" integrity="sha512-6/gTF62BJ06BajySRzTm7i8N2ZZ6StspU9uVWDdoBiuuNu5rs1a8VwiJ7skCz2BcvhpipLKfFerXkuzs+npeKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
<a href="#" class="logo"><i class="fa-solid fa-utensils"></i> Food Delicious</a>

<div class="container">
<p>The best for
    <br>you.
</p>
<div class="box" style="box-shadow:0 1.5rem 2rem rgba(0, 0, 0, 0.1); text-align:center; width:55%; margin-left:30%; height:100%;padding:10px">
<br><br>
<a href="#" class="logo"><i class="fa-solid fa-utensils"></i> Food Delicious</a>
<p class="paragraf">Continue as a guest to view the menu,and if you want to order, 
    <br>  you need to have an account</p>
<a href="./admin/login3.php" name="login" style="color:white; border:1px solid white;padding:5px; border-radius:20px;text-decoration:none;">Login or create account</a>

<a href="home_page.php" name="continue_guest" style="color:white; border:1px solid white;padding:5px; width:20%; border-radius:20px;text-decoration:none;">Continue as guest</a>


</div>


</body>
</html>