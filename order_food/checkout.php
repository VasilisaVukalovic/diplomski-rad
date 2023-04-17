
<?php include './header.php';?>

<form action="placeOrder.php" method="POST">

   <?php echo $_SESSION['message']; unset($_SESSION['message']);?>

<div class="checkout">

<div class="card-checkout">

   <div class="title">
      <h2>Basic Details</h2>
   </div>
 <div class="detail">
  
   <form action="" method="">
   
     <label id="label">Name</label>
     <div> <input type="text" placeholder="Enter your full name" name="name" id="input"></div>
    
     <label id="label">E-mail</label>
     <div> <input type="email" placeholder="Enter your e-mail address" name="email" id="input"></div>

     <label id="label">Phone</label>
     <div> <input type="text" placeholder="Enter your phone number" name="phone" id="input"></div>
    
     <label id="label">Address</label>
     <div><textarea id="textarea" name="address"></textarea></div>
     
   </form>
    
 </div>

</div>
<div class="card-checkout">

   <div class="title">
      <h2>Order Details</h2>
   </div>
   <?php
if(isset($_SESSION['user']))
{
    
    $user_id=$_SESSION['user']['id'];
    $sql_cart="SELECT product.id, cart.id, `pro_id`, `food_name`, `curency`, `price`, `image_name`,`quantity` FROM `product`,`cart` WHERE product.id=cart.pro_id AND cart.use_id=$user_id";
    $result=mysqli_query($con,$sql_cart);
    
    $count=mysqli_num_rows($result);

    if($count>0)
    {
      $sumPrice=0;
        while($row=mysqli_fetch_assoc($result))
        {
           
            $product_id=$row['id'];
            $cart_id=$row['id'];
            $pro_id=$row['pro_id'];
            $food=$row['food_name'];
            $currency=$row['curency'];
            $price=$row['price'];
            $image_name=$row['image_name'];
            $qty=$row['quantity'];
            $total=$qty*$price;
      
   ?>
                  <div class="detail" style="margin-top:19px;">
                  <div class="box" style="display:flex">
                  <?php  
                    //provjera da li imamo slliku ili ne
                    if($image_name=="")
                    {
                         //nemamo sliku,poruka o gresci
                         echo "<div style='font-size:20px; word-spacing:12px;' class='fs-4 text-danger text-center fw-bold' role='alert'> Image not Added.</div>";
                    }
                    else
                    {
                    //imamo sliku,prikazi je
                    ?>
                    <img src="./images/food/<?php echo $image_name; ?>" alt="slika nije ucitana" name="image" style="width:70px">
                    <?php
                    }
                    ?>
      
      <label class="labela"><?php echo $food;?></label>
      <label class="labela"><?php echo $price;?><?php echo $currency;?></label>
     
      <label class="labela">x<?php echo $qty;?></label>
      <label class="labela"><?php echo $total;?><?php echo $currency;?></label>
                  
      
   
  </div>
  <?php 
  $sumPrice+=$qty*$price;//ukupna cijena
        }

        

        ?>
        <?php
                  
    }
    else
    {
        echo "<div class='info'>Your bag is empty, if you want to order something, add it to the bag!</div>";
    }
}
else
{
    echo "<div class='info'>Please login/register to place your order!</div>";
}
   
?>
  <div class="total">
   <label class="total">Total Price:</label>
  
  
   <label class="price"><?php echo $sumPrice;?><?php echo $currency;?></label>

  </div>
  
  <div class="confirm_order">
   <input type="hidden" name="totalPrice" value="<?php echo $sumPrice;?>">
   <button type="submit" name="placeOrderBtn" id="btn-confirm">Confirm and place order</button>
  </div>
     
   </div>
</div> 

</div>

</form>

