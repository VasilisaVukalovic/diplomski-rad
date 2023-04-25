<?php include 'partials-front/menu.php';?>

<script src="./javascript.js"></script>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                //prikazati sve kategorije koje su aktivne
                //sql upit

                $sql="SELECT * FROM table_category WHERE active='Yes'";

                //izvris upit
                $res=mysqli_query($con,$sql);

                //brojanje redova
                $count=mysqli_num_rows($res);

                //provjera da li postoje kategorije u bazi
                if($count>0)
                {
                    //kategorije dostupne
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>

                    <a href="category-foods.php?category_id=<?php echo $id; ?>">
                         <div class="box-3 float-container">
                            <?php
                            if($image_name=="")
                            {
                                //slika nije dostupna
                                echo "<div class='error'>Image not Found.</div>";

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
                    //kategorije nisu dostupne
                    echo "<div class='error'>Category not Available.</div>";

                }
            ?>

            

        

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

<?php include 'partials-front/footer.php';
?>