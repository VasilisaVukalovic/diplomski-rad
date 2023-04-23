
<?php include './connection/connection.php';
if(isset($_SESSION['user']))
{
    if($_SESSION['status']=='admin')
        {header("Location: ./admin/home_admin.php");}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Food Website</title>
    
    <link rel="shortcut icon" type="image" href="./foods_image/logo.png">
   

        
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

<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="./searchjs.js"></script>

</head>
<body>
<!-- header -->

<header class="header" id="header">
    <a href="./index.php" class="logo" id="logo"><i class="fas fa-bread-slice"></i>Food Delicious</a>

    <nav class="navbar">
        <a href="./index.php">Home</a>
        <a href="./about.php">About</a>
        <div class="dropdown">
        <button class="dropbtn">Category</button>
        <div class="dropdown-content">
        <?php
                $sql1="SELECT * FROM category WHERE active='Yes'";

                $res=mysqli_query($con,$sql1);

                $count=mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['id'];
                        $title=$row['title'];

                        ?>

          <a href="category_product.php?id=<?php echo $id;?>"><?php echo $title;?></a>
          <?php 
                    }
                }
          ?>
        </div>
      </div>
       

        <a href="./contact.php">Contact</a>
    </nav>

    
     
    <span>
    <?php
    if(isset($_SESSION['user']))
    {
    $sql_count="SELECT * FROM `cart` WHERE use_id=".$_SESSION['user']['id'];
    $result=mysqli_query($con,$sql_count) or die('query_failed');
    $row_count=mysqli_num_rows($result);
    }
    else
    {
    
        $row_count=0;
       
    }
    ?>
    
    <form class="searchBox" method="POST" action="./searchpage.php">
            <input type="text" class="searchText"  onkeyup="goSearch();" id="searchfield" name="search" placeholder="Type to Search..">
            <a href="#" class="searchBtn" name="search">
            <i class="fa-solid fa-magnifying-glass fa-2x" style="font-size:15px;"></i>
            </a>
            <!--<body onload="refreshsearchpage();">
            <div id="searchpage"></div>
            </body>-->
            

            
     </form>
     
    
    <a href="./cart.php" id="cart-btnn" name="cart-btnn" class="fas fa-shopping-cart" style="font-size:15px; margin-right:12px;color:black;"><span style="border:1px solid lightgreen; font-size:15px;margin-left:2px;color:white; background-color:lightgreen;"><label style="padding:4px;"><?php echo $row_count;?></label></span></a>
    <div id="menu-btn" class="fas fa-bars"></div>
    <span id="userr" style="font-size:18px; font-weight:bold;">
    <?php 
    
   if($_SESSION['status']=='guest')
    { 
    ?>
        <script>
        let usernew=document.getElementById('userr');
        usernew.style.display='none';
        

        </script>
        
        
        <?php
    }
    else if($_SESSION['user']['is_guest']==1){echo $_SESSION['user']['first_name'];}
        ?>
    </span>
    <a href="./admin/logout.php" class="logout-button" id="logout">Log out</a>
    <script>
        
        if(usernew)
        {
            document.getElementById('logout').innerHTML='<a href="./admin/login3.php" style="text-decoration:none;color:black;">Log in</a>';
        }
    </script>
    
    </span>

   
</header>


<!--header end-->


 <!--shopping cart -->
 
<div class="cart-items-container">
 
 <div id="close-form" class="fas fa-times"></div>
 <h3 class="title" style="background:var(--primary-color); color:white; border-radius:.5rem; text-align:left;padding:8px;">checkout</h3>
 <div id="cartItem" style="font-size:20px;">You cart is empty</div>
 
 <div class="cart-item">
    
     <span class="fas fa-times"></span>
     <img src="foods_image/burger.jpg" alt="">
     <div class="content">
         <h3>bakery item 1</h3>
         <div class="price">$45.99/-</div>
     </div>
     
 </div>
 <div class="foot">
         <h3>Total:</h3>
         <h2 id="total">$0.00</h2>
     </div>
 
 
 <a href="#" class="btnn"> checkout </a>
 
 </div>
 
  

 