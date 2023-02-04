<?php include 'partials-front/menu.php';?>

<?php

//provjera da li je pokupljen food_id ili ne
if(isset($_GET['food_id']))
{
    //dobiti food id i detalje skoje selektovana hrana
    $food_id=$_GET['food_id'];

    //dobitit detalje selektovane hrane
    $sql="SELECT * FROM tablefood WHERE id=$food_id";

    $res=mysqli_query($con,$sql);

    $count=mysqli_num_rows($res);
    //provjera da li su podaci dostupni
    if($count==1)
    {
            //podaci dostupni
            $row=mysqli_fetch_assoc($res);

            $title=$row['title'];
            $price=$row['price'];
            $image_name=$row['image_name'];

    }
    else
    {//podaci za hranu nisu dostupni;
        header("Location: /order_food/");

    
    }

}
else
{
    //preusmjeri na homepage
    header("Location: /order_food/");
}

?>


    <!-- fOOD sEARCH Section Starts Here -->


    <?php

    if(isset($_SESSION['order']))
    {
       echo  $_SESSION['order'];
       unset($_SESSION['order']);
    }
    ?>
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php

                        //provjera da li je slika dostupna
                        if($image_name=="")
                        {
                            //slika nije dostupna
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //slika je dostupna
                            ?>

                                <img src="./images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>

                        <input type="hidden" name="food" value="<?php echo $title;?>"> <!--da pokupimo naslov da mozemo upisati u bazu-->
                        <p class="food-price">$<?php echo $price;?>.00</p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php

            //provjera da li je dugme kliknuto ili ne
            if(isset($_POST['submit']))
            {
                //dobiti sve detalje iz forme
                $food=$_POST['food'];
                $price=$_POST['price'];
                $qty=$_POST['qty'];
                $total=$price * $qty; 

                $order_date=date("Y-m-d h:i:sa");//order date

                $status="Ordered"; //ordered,on delivery,delivered,cancelled (naruceno,pri isporuci,isporuceno,otkazano)


                $custom_name=$_POST['full-name'];
                $custom_contact=$_POST['contact'];

                $custom_email=$_POST['email'];
                $custom_address=$_POST['address'];



                //sacuvati u bazu
                //kreiranje sql upita koji cuva u bazu

                $sql2="INSERT INTO table_order SET
                    food='$food',
                    price=$price,
                    qty=$qty,
                    total=$total,
                    order_date='$order_date',
                    status='$status',
                    custom_name='$custom_name',
                    custom_contact='$custom_contact',
                    custom_email='$custom_email',
                    custom_address='$custom_address'
                    ";

                    //izvrsavanje upita
                    $res2=mysqli_query($con,$sql2);

                    if($res2==true)
                    {
                        //upit izvrsen i sacuvano sve
                        $_SESSION['order']="<div class='success text-center'>Food Ordered Succesfully.</div>";
                        header("Location: /order_food/");
                       


                    }
                    else
                    {
                        //upit nije izvrsen,greska prilikom cuvanja
                        $_SESSION['order']="<div class='error text-center'>Failed to Order Food.</div>";
                        header("Location: /order_food/");
                        
                    }




            }

            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include 'partials-front/footer.php';?>
