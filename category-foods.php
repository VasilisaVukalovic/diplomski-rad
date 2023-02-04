<?php include 'partials-front/menu.php';?>

<?php
//provjera da li je id proslijedjen ili ne
if(isset($_GET['category_id']))
{
    //category_id je proslijedjen
    $category_id=$_GET['category_id'];

    //dobiti naslov kategorije na osnovu category_id
    $sql="SELECT title FROM table_category WHERE id=$category_id";

    //izvrsavanje upita
    $res=mysqli_query($con,$sql);

    //dobiti vrijednosti iz baze
    $row=mysqli_fetch_assoc($res);

    //dobiti naslov
    $category_title=$row['title'];



}
else{
    //category_id nije proslijedjen
    //preusmjerenje na Home Page
    header("Location: ../order_food/");
}
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

            //kreiranje upita da bi dobili hranu na osnovu odabrane kategorije
            $sql2="SELECT * FROM tablefood WHERE category_id=$category_id";

            //izvrsavanje upita
            $res2=mysqli_query($con,$sql2);

            //brojanje redova
            $count2=mysqli_num_rows($res2);
            
            if($count2>0)
            {
                //Hrana dostupna
                while($row2=mysqli_fetch_assoc($res2))
                {
                    $id=$row2['id'];
                    $title=$row2['title'];
                    $price=$row2['price'];
                    $description=$row2['decription'];
                    $image_name=$row2['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php

                            if($image_name=="")
                            {
                                //slika nije dostupna
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //slika  dostupna
                                ?>
                                  <img src="./images/food/<?php echo $image_name;?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                  <?php
                            }
                            ?>
                           
                        </div>

                        <div class="food-menu-desc">
                             <h4><?php echo $title;?> </h4>
                             <p class="food-price">$<?php echo $price; ?>.00</p>
                                <p class="food-detail">
                                <?php
                                echo $description;
                                ?>
                                </p>
                            <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    <?php
                }
            }
            else 
            {
                //Hrana nije dostupna
                echo "<div class='error'>Food not Available.</div>";
            }
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
<?php include 'partials-front/footer.php';?>
    