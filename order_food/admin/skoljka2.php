<?php
include '../connection/connection.php';
if(!isset($_SESSION['user']))
{
    header('Location: ../admin/login3.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/svg-with-js.min.css" integrity="sha512-kykcz2VnxuCLnfiymkPqtsNceqEghEDiHWWYMa/nOwdutxeFGZsUi1+TEWT4MyesfxybNGpJNCVXzEPXSO8aKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/solid.min.css" integrity="sha512-6/gTF62BJ06BajySRzTm7i8N2ZZ6StspU9uVWDdoBiuuNu5rs1a8VwiJ7skCz2BcvhpipLKfFerXkuzs+npeKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
<!--google fonts-->
    <title>Responsive Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="./style_new/dashboard.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                             <i class="fa-solid fa-utensils"  style="font-size: 1.75rem;"></i>
                        </span>
                        <span class="title" style="font-family: 'Dancing Script', cursive; font-size:1.75rem;font-weight:bold;">Delicious Food</span>
                    </a>
                </li>


                <li>
                    <a href="home_admin.php">
                        <span class="icon">
                        <i class="fa-solid fa-house"></i>
                        </span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <li>
                    <a href="dashboard_admin.php">
                        <span class="icon">
                        <i class="fa-solid fa-gauge"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="admin_details.php">
                        <span class="icon">
                        <i class="fa-solid fa-user-tie"></i> 
                        </span>
                        <span class="title">Admin details</span>
                    </a>
                </li>

                <li>
                    <a href="admin_users.php">
                        <span class="icon">
                        <i class="fa-solid fa-users"></i>
                        </span>
                        <span class="title">Users</span>
                    </a>
                </li>
            
                <li>
                    <a href="admin_category.php">
                        <span class="icon">
                        <i class="fa fa-barcode"></i>
                        </span>
                        <span class="title">Category</span>
                    </a>
 
                </li>

                <li>
                    <a href="admin_food.php">
                        <span class="icon">
                        <i class="fa fa-barcode"></i>
                        </span>
                        <span class="title">Products</span>
                    </a>

                    
                </li>

                

                
               
                <li>
                    <a href="help.php">
                        <span class="icon">
                        <i class="fa-solid fa-circle-info"></i>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                

                

                <li>
                    <a href="./logout.php">
                        <span class="icon" style="color:red;">
                        <i class="fas fa-power-off me-2"></i>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

       
           


           