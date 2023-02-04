<?php
include 'partials/menu.php';
?>
<div class="menu_content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>

        <?php
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);

        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-full">

        <tr>
            <td>Title: </td>
            <td>
                <input type="text" name="title" placeholder="Title of the Food">
            </td>
        </tr>

        <tr>
            <td>Description: </td>
            <td>
                <textarea name="description"  cols="30" rows="5" placeholder="Description of Food."></textarea>
            </td>
        </tr>

        <tr>
            <td>Price: </td>
            <td>
                <input type="number" name="price" >

            </td>
        </tr>

        <tr>
            <td>Select Image: </td>
            <td>
                <input type="file" name="image">
            </td>
        </tr>

        <tr>
            <td>Category: </td>
            <td>
                <select name="category">

                <?php

                //Kreiranje PHP koda da prikaze sve kategorije iz baze podataka
                //1.Kreiranje SQL upita da bbi dobili sve aktivne kategorije iz BP

                $sql="SELECT * FROM table_category WHERE active='Yes'";

                //Izvrsavanje upita
                $res=mysqli_query($con,$sql);

                //Brojanje redova,da li ih ima ili ne
                $count=mysqli_num_rows($res);

                //Ako je broj veci od nule, imamo kategorije, ako nije nemamo
                if($count>0)
                {
                    //Postoje kategorije
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //pokupi detalje kategorije
                        $id=$row['id'];
                        $title=$row['title'];
                        ?>
                         <option value="<?php echo $id;?>"><?php echo $title; ?></option>
                        <?php

                    }
                }
                else
                {
                    //Kategorije nisu pronadjene
                    ?>
                    <option value="0">No Categories Found</option>
                    <?php
                }



                //2.Prikaz na padajucem meniju
                ?>
                    <option value="1">Food</option>
                    <option value="2">Snacks</option>

                </select>
            </td>
        </tr>

        <tr>
            <td>Featured: </td>
            <td>
                <input type="radio" value="Yes" name="featured">Yes
                <input type="radio" value="No" name="featured">No
            </td>
        </tr>

        <tr>
            <td>Active: </td>
            <td>
            <input type="radio" value="Yes" name="active">Yes
                <input type="radio" value="No" name="active">No
            </td>
        </tr>

        <tr>
            <td colspan="2" >
                <input type="submit" name="submit" value="Add Food" class="btn-add">
            </td>
        </tr>
        </table>
        </form>


        <?php
        //Provjera da li je dugme kliknuto ili ne 
        if(isset($_POST['submit']))
        {
            //Dodaj hranu u bazu
            //echo "Clicked";
            //1.Pokupi podatke iz forme
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
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

                        $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                        header("Location: ../admin/add_food.php");


                        //Stopiraj proces
                        die();
                        
                    }
                }
            }
            else
            {
                $image_name="";//postavljanje podrazumjevane vrijednosti,prazan string
            }

            //3.Dodaj ih u bazu podataka

            //Kreiranje Sql upita za cuvanje ili dodavanje hrane

            $sql2="INSERT INTO tablefood SET
            title='$title',
            decription='$description',
            price=$price, /*cijena je numericka vrijednost pa nam ne trebaju navodnici,samo string vrijednosti se stavljaju pod ''*/ 
            image_name='$image_name',
            category_id=$category,
            featured='$featured',
            active='$active'
            ";

            //izvrasavnje upita
            $res2=mysqli_query($con,$sql2);
            //provjera da li su podaci unijeti ili ne
            //4.poruka  i preusmjerenje na stranicu Menager Page
            if($res2==true)
            {
                //podaci uneseni
                $_SESSION['add']="<div class='success'>Food Added Succesfully.</div>";
                header("Location: ./manage_food.php");

            }
            else{
                //podaci nisu uneseni
                $_SESSION['add']="<div class='error'>Failed to Add Food.</div>";
                header("Location: ./manage_food.php");
            }
            

        }

        ?>
    </div>
</div>

<?php
include 'partials/footer.php';
?>