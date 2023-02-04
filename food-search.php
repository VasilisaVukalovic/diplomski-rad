<?php include 'partials-front/menu.php';?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
            //dobiti kljucnu rijec za pretragu
           // $search=$_POST['search'];
            $search=mysqli_real_escape_string($con,$_POST['search']);


            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
          
            //sql upit za dobijanje hrane na osnovu kljucne rijeci
            //$search=burger '; DROP database_name;
            //"SELECT * FROM tablefood WHERE title LIKE '%burger'%' OR decription LIKE '%burger%';

            $sql="SELECT * FROM tablefood WHERE title LIKE '%$search%' OR decription LIKE '%$search%'";

            //izvrsi kod
            $res=mysqli_query($con,$sql);

            //brojanje redova
            $count=mysqli_num_rows($res);

            //provjera da li su dostupni ili ne
            if($count>0)
            {
                //Hrana dostupna
                while($row=mysqli_fetch_assoc($res))
                {
                    //dobiti detalje
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
                            else{
                                //slika je dostupna
                                ?>
                                <img src="./images/food/<?php echo $image_name; ?>" alt="<?php echo $title;?>" class="img-responsive img-curve">
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

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                    </div>
                    <?php

                }
            }
            else
            {
                //hrana nije dostupna
                echo "<div class='error'>Food not Found.</div>";
            }
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php
    include 'partials-front/footer.php';?>