<?php
include '../connection/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new user</title>
    <link rel="stylesheet" href="./style_new/new_food.css">

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
<body  style="background-image:url('../foods_image/product.jpg')">

<div class="title">
<span class="icon">
    <i class="fa-solid fa-utensils"  style="font-size: 1.75rem; color:#c98d83;"></i>
</span>
<span class="title" style="font-family: 'Dancing Script', cursive; font-size:1.75rem;font-weight:bold; margin-top:5px">Food Delicious</span>
</div>
    <h1 class="h1_category"><span>Add new</span> product </h1>

    <div class="container">

    <form action="add_new_food_base.php" method="POST" enctype="multipart/form-data">

        <div class="tbox">
        <i class="fa-sharp fa-solid fa-burger">
                <input type="text" name="food" placeholder="Product name">
            </i>
        </div>

        <div class="tbox">
                <i>
                <input type="float" name="price" placeholder="Price">
                </i>
        </div>

        <div class="tbox" style="height:80px;">
        <i>
                <input type="text" name="description" placeholder="Leave a comment here" >
            </i>
        </div>

        

        <div class="tbox">
                <i>
                <input type="text" name="currency" placeholder="Currency(KM)">
                </i>
        </div>

        <div class="tbox">
        <i class="fa-solid fa-image">
                <input type="file" id="file" name="image" placeholder="Choose image">
            </i>
        </div>

        <div class="select">
           <i>
                <select class="sel" name="category">
                <option value="0">Select category food</option>   

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
                            <option value="<?php echo $id?>"><?php echo $title;?></option>
                        <?php
                    }
                }
                ?>
                </select>
   
            </i>
        </div>

        <div class="chose" style="display:grid; grid-template-columns:1fr 1fr;padding:15px;">
        <label>Featured: </label>
        <div>
            <input type="radio" name="featured" value="Yes"><label>Yes</label>
            <input type="radio" name="featured" value="No" style="margin-left:30%"><label>No</label>
        </div>
            <label style="margin-top:10px;">Active: </label>
        <div style="margin-top:10px;">
             <input type="radio" name="active" value="Yes"><label>Yes</label>
            <input type="radio" name="active" value="No" style="margin-left:30%"><label>No</label>
        </div>
    </div>
        <div class="dugme">
           <button class="save" name="submit">Save</button>
           <button class="cancel"><a href="admin_food.php" style="text-decoration:none;color:white;">Cancel</a></button>
        </div>
        



    </form>
    </div>
</body>
</html>