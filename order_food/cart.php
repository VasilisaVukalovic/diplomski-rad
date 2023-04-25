

<?php include './header.php';?>
<script src="./javascript.js"></script>

<?php

    if(isset($_POST['update']))
    {
        $id=$_POST['product_id'];
        $qty_up=$_POST['qty'];
        $update="UPDATE cart SET quantity='$qty_up' WHERE id='$id'";
         $res2=mysqli_query($con,$update);

        if($res2)
        {
            $_SESSION['messagee']='<span class="messagee" style="
            color: white;"><i class="fa-solid fa-circle-info"> Quantity updated!</i></span>';
        }
        else
        {
            $_SESSION['messagee']='<span class="messagee" style="
            color: white; background:red;"><i class="fa-solid fa-circle-exclamation"> Error!</i></span>';
        }
    }
?>

<?php
if(isset($_SESSION['user']))
{
    $user_id=$_SESSION['user']['id'];
    $sql_cart="SELECT product.id, cart.id, `pro_id`, `food_name`, `curency`, `price`, `image_name`,`quantity` FROM `product`,`cart` WHERE product.id=cart.pro_id AND cart.use_id=$user_id";
    $result=mysqli_query($con,$sql_cart);
    
    $count=mysqli_num_rows($result);
    if($count>0)
    {
    ?>
    <section class="order" style="padding: 1rem 2%;">

    <h4 class="titleh4"><span>Order</span> summary</h4>
    </section>
    <form action="" method="POST">
    <table class="my_cart">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Price(KM)</th>
            <th>Total</th>
            <th>Food side dishes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<?php
    

        $sumPrice=0;
        while($row=mysqli_fetch_assoc($result))
        {
            
            $product_id=$row['id'];
            $cart_id=$row['id'];
            $food=$row['food_name'];
            $currency=$row['curency'];
            $price=$row['price'];
            $image_name=$row['image_name'];
            $qty=$row['quantity'];
            $total=$qty*$price;

            
            ?>

            <tr>
                <td class="cart-img">
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
                    <img src="./images/food/<?php echo $image_name; ?>" alt="slika nije ucitana" name="image">
                    <?php
                    }
                    ?>
            
                </td>
                <td name="food"><?php echo $food;?></td>
                <td><input type="hidden" name="product_id" value="<?php echo $cart_id;?>">
                    <input type="number" id ="qty" name="qty" min="1" max="10" style="border:1px solid var(--primary-color); width:40%;margin-left:10px" onchange="quantityfunction(this)" value="<?php echo $qty;?>"></td>

                
                <td><input type="text"  id ="price" name="price" onkeyup="pricefunction(this)"  value="<?php echo $price;?>"></td>
                <td class="netPrice" name="totale"><?php echo $total;?> KM</td>

                <td><textarea name="desc" placeholder="If you want something from the attachment, you can list it here!🙂" style="height:18rem; color:var(--secondary-color); border:1px solid var(--secondary-color); background-color:transparent;"></textarea></td>
                
                <td><a href="delete_cart.php?id=<?php echo $cart_id; ?>" class="fa-solid fa-trash-can" style="color:var(--secondary-color);"></a>
                <button name="update" style="font-size:17px; color:var(--secondary-color);"><i class='fa-regular fa-pen-to-square'></i></button>
                </td>

             
                </form>
               

            </tr>


            <?php 
            $sumPrice+=$qty*$price;//ukupna cijena
        }

        

        ?>
        <?php
                  
    }
    else
    {
        ?>
        <div class="card-empty">
            <h4>Your cart is empty.</h4>
        </div>
        <?php
       
    }

?>
            
</tbody>
<?php if($count>0){
        ?>
        <tfoot>
        <tr style="height:8rem;">
                
        <td colspan="4" style="text-align:left; font-size:20px; padding-left:20px;">Total</td>
        <td id="total"><?php echo $sumPrice;?>KM</td>
        
        
        <td colspan="3"><button id="btn-procced-check" name="btn-check" value=""><a href="checkout.php">Procced to checkout</a></button></td>
        </tr>
        
        
    </tfoot>
     
   
    </table>
   
   
    </form>
    
    <?php
    }

    ?> 
    <?php
}
else
{
    ?>
        <div class="card-empty">
            <h4>Please log in or register to complete the order successfully!</h4>
        </div>
        <?php
}
   
?>
    <script>

    var total = document.getElementById("total");
        var netPrice = document.getElementsByClassName("netPrice");
        
        function quantityfunction(q)
        {
            var priceValue=q.parentElement.parentElement.children[3].children[0].value;
            //console.log(q.value*priceValue);
            q.parentElement.parentElement.children[4].innerHTML=q.value*priceValue +" KM";
            var cal=0;
             for(let i=0; i<netPrice.length; i++)
            {
                //console.log(netPrice[i].innerText);
                cal +=parseInt(netPrice[i].innerText);


            }
            //console.log(cal);
            total.innerHTML=cal +" KM";

        };
        
        
    </script>


</body>

</html>
 