
<?php
include './header.php';
include './connection/connection.php';


?>
<section class="product" id="product" style="margin-top:5%">
<h4 class="heading">Foods on your search "<?php echo $_POST['search'];?>"</h4>
<div class="box-container-products">
<?php
if(isset($_POST['search']))
{
    $search=$_POST['search'];
   
   $search_query="SELECT * FROM product WHERE food_name LIKE '%$search%'";
   $search_query_run=mysqli_query($con,$search_query);
   $count=mysqli_num_rows($search_query_run);
   if($count>0)
   {
    while($row2=mysqli_fetch_assoc($search_query_run))
    {
        //echo $row2['food_name'].'</br>';
        $id=$row2['id'];
        $food_name=$row2['food_name'];
        $price=$row2['price'];
        $description=$row2['description'];
        $image_name=$row2['image_name'];
        $currency=$row2['curency'];
        ?>

        <div class="box-product">
            <div class="imagee">

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
          
          

          <div class="content" style="margin-top:10px;">
          <a href="product_view.php?id=<?php echo $id;?>" style="font-size: 20px; color: var(--primary-color);"><?php echo $food_name;?></a>
    </div>
    <div class="price" style="margin-top:10px;">
        <p style="font-size:18px; font-weight:bold;"><?php echo $price;?><?php echo $currency;?></p>
    </div>
    </div>
    </div>
    <?php
            }
        }
    }
        else
        {
            echo "Food not available";

        }

?>
<!--<a href="#" class="btn-cart" name="add_to_cart">add to cart</a>-->

   </div>
</section>