
<?php include './header.php';?>

<?php 
if(isset($_SESSION['user']))
{
    if(isset($_POST['addCart']))
    {
  
    $user_id=$_SESSION['user']['id'];
    //echo "welcome $user_id";
    $product_id=$_POST['product_id'];
    //echo "$product_id";
    $product_qty=$_POST['quantity'];
    //echo "$product_qty";

    $id=0;
    $counter_product=0;
    $select="SELECT * FROM `cart` WHERE pro_id=$product_id AND use_id=$user_id";
    $res=mysqli_query($con,$select) or die('query failed');
    $count=mysqli_num_rows($res);
    if($count>0)
    {
        /*while($row=mysqli_fetch_assoc($res))
        {
                $id++;
        }*/
        $_SESSION['message']='<p class="message">Product already added to cart.</p>';
    }
    else
    {
        //$id++;
        $insert="INSERT INTO `cart`(`id`, `use_id`, `pro_id`, `quantity`) VALUES (null,'".$user_id."','".$product_id."','".$product_qty."')";
        $res1=mysqli_query($con,$insert) or die('query failed');
        
        
        $_SESSION['message']='<p class="message">Product added to cart succesfully.</p>';

    }
    
    

    
} 
    

}
else
{
 ?>
 <script>
    function disable()
    {
    let btnAddToCart=document.getElementById('addToCart');
    btnAddToCart.disabled=false;
     alert('Please login or create an account to complete your order.'); 
    }
    
 </script>
 <?php
}

?>
 
<form action="" method="POST">

<section class="product-view" id="product" style="margin-top:8%">

<div class="box-container-products-view">

<?php

if(isset($_GET['id']))
{
    $food_id=$_GET['id'];

    $sql="SELECT product.id, `cat_id`, `food_name`, `curency`, `description`, `price`, `image_name`,`title` FROM `product`,`category` WHERE product.id=$food_id AND product.cat_id=category.id";

    $res=mysqli_query($con,$sql);

    $count=mysqli_num_rows($res);
    
        
    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);
        $id=$row['id'];
        $food_name=$row['food_name'];
        $cat_id=$row['cat_id'];
        $currency=$row['curency'];
        $description=$row['description'];
        $price=$row['price'];
        $image_name=$row['image_name'];
        $title_category=$row['title'];
        

        
        ?>
        
         <div class="box-product-view">
        <div class="imagee-view">
        <?php
                if($image_name=="")
                {
                    echo "slika nije dostupna";
                }
                else
                {
                    ?>
                    <img src="./images/food/<?php echo $image_name;?>" alt="<?php echo $food_name;?>" >
                    <?php
                }
                ?>
           
           <span class="qtybtn">
            <div class="container-qty">
            <input type="button" name="decrement-btn" class="decrement-btn" onclick="decrementValue()" value="-"/>
            <input type="text"  name="quantity" value="1" maxlength="2" max="10" size="1" class="number" id="number" style="height: 5rem; font-size: 20px; text-align: center;" />
            <input type="button" name="increment-btn" class="increment-btn" onclick="incrementValue()" value="+"/>
            </div>
           
            <script>
                
                
                function incrementValue()
                {
                    var value = parseInt(document.getElementById('number').value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value<10)
                    {
                     value++;
                    document.getElementById('number').value = value;
                    }
                    
                }
                function decrementValue()
                {
                    var value = parseInt(document.getElementById('number').value, 10);
                    value = isNaN(value) ? 0 : value;
                    if(value>1)
                    {
                    value--;
                    document.getElementById('number').value = value;
                    }

                }

            </script>
     
      


      <input type="hidden" name="product_id" value="<?php echo $id;?>">
      

    <div class="button">
    <button id="addToCart" class="addToCart" name="addCart" onclick="disable()" value="<?php echo $id;?>">Add to Cart</button>
    </div>
    
    </span>

   

</div>
</div>
<div class="desc"">

    
        <p style="font-size:40px; color:black; border-bottom:1px solid grey;text-transform:capitalize"><?php echo $food_name;?></p>
        <br/><br/>
        <p style="font-size:12px;color:#444">All that is needed for the finest food are quality and fresh ingredients, skilled hands and a little love.</p>
        <br/><br/>
            
        
        <p style="font-size:18px;color:#444">Price: <?php echo $price;?><?php echo $currency;?></p>

        <br/><br/>
        <p style="font-size:18px; color:#444">Category: <a href="" style="color:var(--primary-color);"><?php echo $title_category;?></a> </p>

        <br><br>

        <p style="border-top:1px solid grey"></p>
        <br/>
        <p style="font-size:18px;color:#444;">Product Description:</p><br>
        <p style="font-size:18px;color:#444;border-bottom:1px solid grey;"><?php echo $description;?></p>
    

        <?php
        if(isset($_SESSION['message']))
        {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            
        }
        ?>   
    
    
</table>
</div>

</div>





<?php
    }

}
?>




</form>
