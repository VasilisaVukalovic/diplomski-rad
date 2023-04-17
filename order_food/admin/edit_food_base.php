
<?php include '../connection/connection.php';?>
<?php
        if(isset($_POST['save']))
        {
            //echo "Button Clicked";

            //1.Pokupi detaljiz forme
            $id=$_POST['id'];
            //echo $id;

            
            $food_name=$_POST['food'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $current_image=$_POST['current_image'];
            $category=$_POST['category'];
            $currency=$_POST['currency'];
            $featured=$_POST['featured'];
            $active=$_POST['active'];

            //2.otpremi sliku ako je selektovana

            //provjera da li dugme upload kliknuto ili ne
            if(isset($_FILES['image']['name']))
            {
                //dugme je kliknuto
                $image_name=$_FILES['image']['name']; //novo ime slike

                //provjera da li je fajl dostupan ili ne
                if($image_name!="")
                {
                    //slika postoji
                    //A.otpremanje slike
                    //promjeni sliku
                    $ext=end(explode('.',$image_name));

                    $image_name="Food-Name-".rand(0000,9999).'.'.$ext; //promjenjeno ime slike

                    //dobiti izvoriste i odrdiste slike
                    $src_path=$_FILES['image']['tmp_name'];
                    $dest_path="../images/food/".$image_name;

                    //otpremiti sliku
                    $upload=move_uploaded_file($src_path,$dest_path);

                    //provjera da li je slika otpremljena ili ne
                    if($upload==false)
                    {
                        //greska prilikom otpremanja
                        //$_SESSION['upload']="<div style='font-size:20px; word-spacing:12px;' class='fs-4 text-danger text-center fw-bold' role='alert'>Failed to Upload new Image.</div>";
                        header("Location: ./admin_food.php");

                        die();//stopiraj proces

                    }
                      //3.uklonite sliku ako je nova ucitana,a trenutna slika postoji
                    //B.Promjeni trenutnu sliku ako je dostupna
                    if($surrent_image!="")
                    {
                        //trennutna slika je dostupna
                        //promjeni sliku
                        $remove_path="../images/food/".$current_image;

                        $remove=unlink($remove_path);

                        //provjera da li je slika promjenjena ili ne
                        if($remove==false)
                        {
                            //greska
                            //$_SESSION['remove-failed']="<div style='font-size:20px; word-spacing:12px;' class='fs-4 text-danger text-center fw-bold' role='alert'>Failed to remove current image.</div>";
                            header("Location: ./admin_food.php");
                            die();

                        }
                    }

                }
                else
                {
                    $image_name=$current_image;//podrazumjevana slika kada nije izabrana
                }
            }
            else
            {
                $image_name=$current_image;//podrazumjevana slika kada se dugme ne klikne
            }
          
            //4.otpreit hranu u bazu
            /*$sql3="UPDATE `product` SET
            food_name='$food_name',
            description='$description',
            price=$price,
            image_name='$image_name',
            cat_id='$category',
            featured='$featured',
            active='$active',
            curency='$currency'
            WHERE id=$id";*/


 $sql3="UPDATE `product` SET
     `cat_id`='$category',
     `food_name`='$food_name',
     `curency`='$currency',
     `description`='$description',
     `price`='$price',
     `image_name`='$image_name',
     `featured`='$featured',
     `active`='$active' WHERE id=$id";

            //Izvrsavanje upita
            $res3=mysqli_query($con,$sql3);

            //provjera da li je upit izvrsen ili ne
            if($res3==true)
            {
                //upit izvrsen i hrana otpremljena u bazu
                //$_SESSION['update']="<div style='font-size:20px; word-spacing:12px;' class='fs-2 text-primary text-center fw-bold' role='alert'>Food Updated Successfully.</div>";
                header("Location: ./admin_food.php");

            }
            else
            {
                //greska pri otpremanju podataka u bazu
                //$_SESSION['update']="<div style='font-size:20px; word-spacing:12px;' class='fs-2 text-danger text-center fw-bold' role='alert'>Failed to Update Food.</div>";
                header("Location: ./admin_food.php");
            }
           
        }
    ?>