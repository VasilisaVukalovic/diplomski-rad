<?php include 'partials-front/menu.php';?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                //prikazati hranu koja je aktivna
                $sql="SELECT * FROM tablefood WHERE active='Yes'";

                //izvrsavanje upita
                $res=mysqli_query($con,$sql);

                $count=mysqli_num_rows($res);

                if($count>0)
                {
                    //Hrana dostupna
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $price=$row['price'];
                        $description=$row['decription'];
                        $image_name=$row['image_name'];

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
                                        ?>
                                        <img src="./images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                        <?php
                    
                                    }
                                    ?>
                                     
                                 </div>

                            <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                                <p class="food-price">$<?php echo $price;?>.00</p>
                                <p class="food-detail">
                                <?php echo $description;?>
                                 </p>
                             <br>

                            <a href="./order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                            </div>
                         </div>

                        <?php
                    }
                }
                else
                {
                    //hrana nije dostupna
                    echo "<div class='error'> Food is not Available.</div>";
                }
            ?>

            
            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include 'partials-front/footer.php';?>
