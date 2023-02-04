<?php include ('partials-front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="../order_food/food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
                //Kreiranje Sql upita za prikaz kategorija na pozadini
                $sql="SELECT * FROM table_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //izvrsavanje upita
                $res=mysqli_query($con,$sql);
                //brojanje redova,provjera da li je kategorija dostupna ili ne
                $count=mysqli_num_rows($res);

                if($count>0)
                {
                    //kategorija dostupna
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //dobiti vrijednosti id,title,image_name
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>

                        <a href="category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php
                                //provjera da li je slika dostuppna ili ne
                                if($image_name=="")
                                {
                                    //prikazati poruku
                                    echo "<div class='error'>Image Not Available</div>";

                                }
                                else
                                {
                                    //slika je dostupna
                                    ?>
                                         <img src="./images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                                ?>
                               

                                <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>
                        </a>
                        <?php
                    }

                }
                else
                {
                    //Kategroija nije dostupna
                    echo "<div class='error'>Category not Added.</div>";
                }

            ?>
           

          

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

            //Dobiti hranu iz baze koja je aktivna i izabrana

            //sql upit
            $sql2="SELECT * FROM tablefood WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //izvrsavanje upita
            $res2=mysqli_query($con,$sql2);

            //provjera da li je dostupna  hrana u bazi
            $count2=mysqli_num_rows($res2);

            if($count2>0)
            {
                //Hrana dostupna
                while($row2=mysqli_fetch_assoc($res2))
                {
                    //dobiti potrebne vrijednosti
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
                                //Slika nije dostupna
                                echo "<div class='error'>Image not available.</div>";
                        }
                        else
                        {
                            //slika dostupna
                            ?>
                            <img src="./images/food/<?php echo $image_name; ?>" alt="<?php echo $title;?>" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                   
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$<?php echo $price; ?>.00</p>
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
                //Hrana nije dostupna
                echo "<div class='error'>Food is not Found.</div>";
            }

            ?>
            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include 'partials-front/footer.php';?>