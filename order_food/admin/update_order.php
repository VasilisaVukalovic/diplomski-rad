<?php include '../connection/connection.php';?>

<?php
  if(isset($_GET['id']))
  {
    $order_id=$_GET['id'];
    //echo $order_id;
    $order_query1="SELECT order_items.id,product.food_name,order_items.price,order_items.qty,orders.total_price,order_items.created_at,orders.status,orders.name, orders.email,orders.phone,orders.address FROM order_items,orders,product,users WHERE order_items.pro_id=product.id AND order_items.order_id=orders.id AND orders.user_id=users.id AND order_items.id=$order_id";
    $order_query1_run=mysqli_query($con,$order_query1);

    //dobiti vrijednosti na osnovu izvrsenig upita
    $row_order1=mysqli_fetch_assoc($order_query1_run);

    $food=$row_order1['food_name'];
    $price=$row_order1['price'];
    $qty=$row_order1['qty'];
    $status=$row_order1['status'];
    $name=$row_order1['name'];
    $address=$row_order1['address'];
    $contact=$row_order1['phone'];




  }
  else
  {
    header("Location: ./dashboard_admin.php");

  }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit order</title>
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
    <h1 class="h1_category"><span>Edit</span> order</h1>
    <div class="container">

    <form action="update_order_base.php" method="POST">

        <div class="tbox">
        <i class="fa-sharp fa-solid fa-burger">
                <input type="text" name="food_name" placeholder="Food name" value="<?php echo $food;?>" disabled>
            </i>
        </div>

        <div class="tbox">
            <i>
                <input type="float" name="price" placeholder="Price" value="<?php echo $price;?> KM" disabled>
            </i>
        </div>
        <div class="tbox">
            <i>
                <input type="text" name="qty" placeholder="QTY" value="<?php echo $qty;?>" disabled>
            </i>
        </div>
        <div>
            <select class="select" name="status">
                <option <?php if($status=="Ordered"){echo "selected";}?> value="Ordered">Ordered</option>
                <option <?php if($status=="On Delivery"){echo "selected";}?> value="On Delivery">On Delivery</option>
                <option <?php if($status=="Delivered"){echo "selected";}?> value="Delivered">Delivered</option>
                <option <?php if($status=="Cancelled"){echo "selected";}?> value="Cancelled">Cancelled</option>
            </select>
        </div>
        <div class="tbox">
            <i>
                <input type="text" name="custom_name" placeholder="customer_name" value="<?php echo $name;?>" disabled>
            </i>
        </div>

        <div class="tbox">
            <i>
                <input type="text" name="cistom_address" placeholder="Address" value="<?php echo $address;?>" disabled>
            </i>
        </div>
        <div class="tbox">
            <i>
                <input type="text" name="phone" placeholder="Phone" value="<?php echo $contact;?>" disabled>
            </i>
        </div>
       


      

        <div class="dugme">
        <input type="hidden" name="id" value="<?php echo $order_id;?>">
        <input type="hidden" name="price" value="<?php echo $price;?>">
        <input type="hidden" name="food_name" value="<?php echo $food;?>">

        <input type="hidden" name="custom_name" value="<?php echo $name;?>">
        <input type="hidden" name="custom_address" value="<?php echo $address;?>">
        <input type="hidden" name="phone" value="<?php echo $contact;?>">
        <input type="hidden" name="qty" value="<?php echo $qty;?>">

           <button class="save" name="submit">Save</button>
           <button class="cancel"><a href="admin_category.php" style="text-decoration:none;color:white;">Cancel</a></button>
        </div>
        



    </form>
    </div>
</body>
</html>