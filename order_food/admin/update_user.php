<?php
 include '../connection/connection.php';
 if(isset($_GET['id'])){
    $id=$_GET['id'];

     //Kreiranje SQL upita koji uzima ostale detalje
     $sql="SELECT * FROM users WHERE id=$id";

     //Izvrsi upit
     $res=mysqli_query($con,$sql);
 
     //broji redove i provjera da li postoje podaci
     $count=mysqli_num_rows($res);
 
     if($count==1)
     {
         //pokupi sve podatke
         $row=mysqli_fetch_assoc($res);
         
         $firstname=$row['first_name'];
         $lastname=$row['last_name'];
         $username=$row['user_name'];
         $pass=$row['password'];
         $email=$row['email'];
         $image=$row['user_image'];
         $status=$row['status'];
        $is_guest=$row['is_guest'];
 
 
     }
     else
     {
         //$_SESSION['no-category-found']="<div style='font-size:20px; word-spacing:12px;' class='alert alert-danger text-center fw-bold' role='alert'>Category not Found.</div>";
         header("Location: ./admin_users.php");
 
     }
 
 
 
 }
 else
 {
     //preusmjeri na manage categoroy
     header("Location: ./admin_users.php");
 
 }
     ?>
 


    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update user</title>
    <link rel="stylesheet" href="./style_new/new_user.css">

    <!--fontawesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" integrity="sha512-tk4nGrLxft4l30r9ETuejLU0a3d7LwMzj0eXjzc16JQj+5U1IeVoCuGLObRDc3+eQMUcEQY1RIDPGvuA7SNQ2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/svg-with-js.min.css" integrity="sha512-kykcz2VnxuCLnfiymkPqtsNceqEghEDiHWWYMa/nOwdutxeFGZsUi1+TEWT4MyesfxybNGpJNCVXzEPXSO8aKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/solid.min.css" integrity="sha512-6/gTF62BJ06BajySRzTm7i8N2ZZ6StspU9uVWDdoBiuuNu5rs1a8VwiJ7skCz2BcvhpipLKfFerXkuzs+npeKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--fontawesome-->
<link rel="preconnect" href="https://fonts.googleapis.com">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<body>
<div class="title">
<span class="icon">
    <i class="fa-solid fa-utensils"  style="font-size: 1.75rem; color:#c98d83;"></i>
</span>
<span class="title" style="font-family: 'Dancing Script', cursive; font-size:1.75rem;font-weight:bold; margin-top:5px"> Delicious Food</span>
</div>




    <h1><span>Update</span> user</h1>
    <div class="container">
    <form action="update_user_base.php" method="POST" enctype="multipart/form-data">

        <div class="tbox">
        <i class="fa-solid fa-user">
                <input type="text" name="username" placeholder="Username" value="<?php echo $username;?>"/>
            </i>
        </div>

        <div class="tbox">
            <i class="icon fa-solid fa-lock fa-lg">
                <input type="password" name="password" placeholder="Password" value="<?php echo $pass;?>"/></i>
        </div>

        <div class="tbox">
        <i class="fa-solid fa-user">
                <input type="text" name="firstname" placeholder="Firstname" value="<?php echo $firstname;?>"/>
            </i>
        </div>

        <div class="tbox">
        <i class="fa-solid fa-user">
                <input type="text" name="lastname" placeholder="Lastname" value="<?php echo $lastname;?>"/>
            </i>
        </div>

        <div class="tbox">
        <i class="fa-solid fa-envelope">
                <input type="mail" name="email" placeholder="Email" value="<?php echo $email;?>"/>
            </i>
        </div>

        
        <div class="tbox">
        <i class="fa-solid fa-image">
                <input type="file" id="file" name="image" placeholder="Choose image" value="<?php $image;?>"/>
            </i>
        </div>

        <div class="chose">
            <label>Choose user status</label>
            <br/><br/>
            <input <?php if($status=="admin"){echo "checked";}?> type="radio" name="admin" value="admin">
            <label>Admin</label><br/>
            <input <?php if($status=="user"){echo "checked";}?> type="radio" name="admin" value="user" >
            <label>User</label><br/>
            <input <?php if($status=="guest"){echo "checked";}?> type="radio" name="admin" value="guest" >
            <label>Guest</label><br/>
            
        </div>
        <input type="hidden" name="image" value="<?php echo $image;?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <input type="hidden" name="is_guest" value="<?php echo $is_guest; ?>"/>


        <div class="dugme">
       
           <button class="save" name="submit">Save</button>
           <button class="cancel"><a href="admin_users.php" style="text-decoration:none;color:white;">Cancel</a></button>
        </div>
        



    </form>
    </div>
</body>
</html>