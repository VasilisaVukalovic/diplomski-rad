<?php include '../connection/connection.php';?>

<?php
//provjera da li je izabran id ili ne

if(isset($_GET['id']))
{
    //Pokupi ID i ostale detalje
    //echo "Getting the Data";

    $id=$_GET['id'];

    //Kreiranje SQL upita koji uzima ostale detalje
    $sql="SELECT * FROM category WHERE id=$id";

    //Izvrsi upit
    $res=mysqli_query($con,$sql);

    //broji redove i provjera da li postoje podaci
    $count=mysqli_num_rows($res);

    if($count==1)
    {
        //pokupi sve podatke
        $row=mysqli_fetch_assoc($res);
        
        $title=$row['title'];
       
        $featured=$row['featured'];
        $active=$row['active'];



    }
    else
    {
       // $_SESSION['no-category-found']="<div style='font-size:20px; word-spacing:12px;' class='alert alert-danger text-center fw-bold' role='alert'>Category not Found.</div>";
        header("Location: ./admin_category.php");

    }



}
else
{
    //preusmjeri na manage categoroy
    header("Location: ./admin_category.php");

}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit category</title>
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
<body  style="background-image:url('../foods_image/category.jpg')">
<div class="title">
<span class="icon">
    <i class="fa-solid fa-utensils"  style="font-size: 1.75rem; color:#c98d83;"></i>
</span>
<span class="title" style="font-family: 'Dancing Script', cursive; font-size:1.75rem;font-weight:bold; margin-top:5px"> Delicious Food</span>
</div>
    <h1 class="h1_category"><span>Edit</span> category</h1>
    <div class="container">
    <form action="edit_category_base.php" method="POST">

        <div class="tbox">
        <i class="fa-sharp fa-solid fa-burger">
                <input type="text" name="title" placeholder="Category name" value="<?php echo $title;?>">
            </i>
        </div>

      
<div class="chose" style="display:grid; grid-template-columns:1fr 1fr;padding:15px;">
    <label>Featured: </label>
    <div>
        <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes" >
        <label>Yes</label>
        <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No"  style="margin-left:30%">
        <label>No</label>
    </div>
    <label style="margin-top:10px;">Active: </label>
    <div style="margin-top:10px;">
        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes" >
        <label>Yes</label>
        <input <?php if($active=="No"){echo "checked";}?>  type="radio" name="active" value="No" style="margin-left:30%">
        <label>No</label>
    </div>
</div>
        <div class="dugme">
        <input type="hidden" name="id" value="<?php echo $id;?>">
           <button class="save" name="submit">Save</button>
           <button class="cancel"><a href="admin_category.php" style="text-decoration:none;color:white;">Cancel</a></button>
        </div>
        



    </form>
    </div>
</body>
</html>