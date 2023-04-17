
<!--ukljucivanje header-a tj home i menu-->
<?php include './header.php'?>

<!--about--> 
<section class="about" id="about">

    <h1 class="heading"><span>about</span>  us</h1>
    <div class="row">
        <div class="image" >
            <img src="./foods_image/about1.jpg" style="border-radius:20px;">
        </div>

        <div class="content">
            <h3>good things come to those <span>who cook</span> for others</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla aliquam eos ut cupiditate aspernatur minima consequuntur quas facilis maiores! Modi minus nemo cupiditate 
                voluptas rem corporis unde vel commodi adipisci?
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla aliquam eos ut cupiditate aspernatur minima consequuntur quas facilis maiores! Modi minus nemo cupiditate 
                voluptas rem corporis unde vel commodi adipisci?
            </p>
            
        </div>
    </div>

</section>
<!--about end--> 

<!--category--> 

<section class="category"  id="category">

<h1 class="heading">C<span>ategory</span></h1>

     <div class="box-container">
     


     <?php 
                //Kreiranje Sql upita za prikaz kategorija na pozadini
                $sql="SELECT * FROM category WHERE active='Yes' AND featured='Yes'";
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
                       // $image_name=$row['image_name'];
                        ?>

                       


                    <div class="box-category">

                        <a href="category_foods1.php?category_id=<?php echo $id; ?>">
                   
    
                        </a>
                    </div>  
                     
                       
                    <?php
                    }

                }
                else
                {
                    //Kategroija nije dostupna
                    echo "<div class='error'>Category not Added.</div>";
                }

            ?>      
           
    </div>

</section>
<!--category end-->

<!--product food-->


<section class="product" id="product">
    <h1 class="heading">Our<span> products</span></h1>
    <div class="box-container-products">


    <?php

//Dobiti hranu iz baze koja je aktivna i izabrana

//sql upit
$sql2="SELECT * FROM product WHERE active='Yes' AND featured='Yes' LIMIT 6";

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
        $title=$row2['food_name'];
        $price=$row2['price'];
        $description=$row2['description'];
        $image_name=$row2['image_name'];
        $currency=$row2['curency'];
        

        ?>


        <div class="box-products">
            <div class="imagee">

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
                            <img src="./images/food/<?php echo $image_name; ?>" alt="<?php echo $title;?>" >
                            <?php
                        }
                        ?>
                

            </div>


  
             <!--dugme za kolicinu-->
           <!-- product A -->
            <!--<div id="product_A_form" class="input-group">qty:
  
                <span class="input-group-btn">
                    <button class="btn btn-default btn-subtract" type="button">-</button>
                </span>

                    <input id="product_A_qty" type="text" class="form-control no-padding text-center item-quantity" value="1" name="qty">

                <span class="input-group-btn">
                    <button class="btn btn-default btn-add" type="button">+</button>
                </span>
            </div>-->
            <label class="input-group">Qty:</label>
            <input type="number" class="btn" min="1" value="1" max="10">
            <br/>
               
            <div class="content">
                <br/>
                <h3><?php echo $title;?></h3><br/>
                <p><?php echo ($description);?></p><br/>
                <span class="price">$<?php echo $price;?></span>
                <a href="#" class="btn-cart" name="add_to_cart">add to cart</a>

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

           
        

</div>
    

</section>

<!--product food--> 





<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="./javascript.js"></script>


</body>
</html>