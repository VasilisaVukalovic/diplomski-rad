<?php
include '../connection/connection.php';
?>

<?php
//Autorization-Access Control
//Provjera da li je korisnikk ulogovan ili nije

if(!isset($_SESSION['user'])) //korisnicka sesija nije podesena
{
//Korisnik nije ulogovan
//Vrati na login stranicu uz poruku
$_SESSION['no-login-message']="<div class='error'>Please login to access Admin Panel.</div>";

//Uputi na login stranicu
header('Location: ../admin/login.php');
}
?>



<html>
    <head>
        <title>Order Food Website-Home Page</title>
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
    </head>
    <body>
        <!--Menu Sections Starts--> 
        <div class="menu">
            <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage_admin.php">Admin</a></li>
                <li><a href="manager_category.php">Category</a></li>
                <li><a href="manage_food.php">Food</a></li>
                <li><a href="manage_order.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
               
            </ul>
            </div>
           
        </div>
        <!--Menu Sections Ends-->