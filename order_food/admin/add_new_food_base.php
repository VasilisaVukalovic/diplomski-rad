<?php include '../connection/connection.php';?>
<?php

if(isset($_POST['submit']))
{
    $id=0;
    $food_name=$_POST['food'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $currency=$_POST['currency'];
    $category=$_POST['category'];
    //provjera da li je radio button cekiran illi ne
    if(isset($_POST['featured']))
    {
        $featured=$_POST['featured'];

    }
    else
    {
        $featured="No";//postavljanje podrazumjevane vrijednosti
    }

    if(isset($_POST['active']))
    {
        $active=$_POST['active'];

    }
    else
    {
        $active="No"; //postavljanje podrazumjevane vrijednosti
    }



    //2.Upload slike koju smo selektovali
            //provjera da li je selektovana slika izabrana ili ne, otpremiti sliku samo ako je izabrana
            if(isset($_FILES['image']['name']))
            {
                //pokupi detalje selektovane slike
                $image_name=$_FILES['image']['name'];

                //provjera da li je slika izabrana ili ne,otpremanje samo ako je izabrana
                if($image_name!="")
                {
                    //slika je selektovana
                    //A.Promejni ime slike
                    //Pokupi ekstenziju selektovane slike (jpg,png,gif,etc) "slika.jpg"
                    $ext=end(explode('.',$image_name));

                    //kreiramo nov ime za sliku
                    $image_name="Food-Name-".rand(0000,9999).".".$ext; //novo ime slike npr. "Food-Name-123.jpg"


                    //B.Otpremi sliku
                    //pokupi izvorisnu i odredisnu ptanju

                    //izvorisna putanja je trenutna lokacija slike
                    $src=$_FILES['image']['tmp_name'];

                    //odredisna putanja za sliku koja ce biti ucitana
                    $dest="../images/food/".$image_name;

                    //na kraju otpremiti sliku hrane
                    $upload=move_uploaded_file($src,$dest);

                    //provjera da li je sllika otpremljena ili ne
                    if($upload==false)
                    {
                        //nije otpremljena,greska!
                        //preusmjerenje na stranicu Add Page uz poruku o gresci

                        $_SESSION['upload']="<div style='font-size:20px; word-spacing:12px;' class='text-danger  fs-2 text-center fw-bold' role='alert'>Failed to Upload Image.</div>";
                        header("Location: ../admin/admin_food.php");


                        //Stopiraj proces
                        die();
                        
                    }
                }
            }
            else
            {
                $image_name="";//postavljanje podrazumjevane vrijednosti,prazan string
            }


            //dodavanje u bazu
            $sql="INSERT INTO `product`(`id`, `cat_id`, `food_name`, `curency`, `description`, `price`, `image_name`, `featured`, `active`) VALUES
             ('".$id."','".$category."','".$food_name."','".$currency."','".$description."','".$price."','".$image_name."','".$featured."','".$active."')";

            $res=mysqli_query($con,$sql);

            if($res==true)
            {
                header("Location: ./admin_food.php");

            }
            else
            {
                header("Location: ./admin_food.php");

            }



}
?>