<?php include './header.php';?>
<script src="./javascript.js"></script>
<?php 
if(isset($_GET['id']))
{
    $category_id=$_GET['id'];

    $sql="SELECT title FROM category WHERE id=$category_id;";

    $res=mysqli_query($con,$sql);

    $row=mysqli_fetch_assoc($res);

    $category_title=$row['title'];
}
else
{
    header("Location: ../order_food/");
}
?>
<section class="product" id="product" style="margin-top:5%">
<h1 class="heading"><?php echo $category_title;?></h1>
<div class="box-container-products">
<?php 
        $sql2="SELECT * FROM product WHERE cat_id=$category_id";

        $res2=mysqli_query($con,$sql2);

        $count2=mysqli_num_rows($res2);

        if($count2>0)
        {
            while($row2=mysqli_fetch_assoc($res2))
            {
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
                <p style="font-size:18px; font-weight:bold;"><?php echo $price;?> <?php echo $currency;?></p>
            </div>
            </div>
            </div>
                <?php
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