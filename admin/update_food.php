<?php
//echo "update page";

include 'partials/menu.php';


?>
<?php
//provjera da li je ID podesen ili ne
if(isset($_GET['id']))
{
    //dobiti sve detalje
    $id=$_GET['id'];

    //sql upit da dobijemo izabranu hranu
    $sql2="SELECT *FROM tablefood WHERE id=$id";

    //izvrsavanje upita
    $res2=mysqli_query($con,$sql2);

    //dobiti vrijednosti na osnovu izvrsenig upita
    $row2=mysqli_fetch_assoc($res2);

    //dobiti vrijednosti selektovane hrane
    $title=$row2['title'];
    $description=$row2['decription'];
    $price=$row2['price'];
    $current_image=$row2['image_name'];
    $current_category=$row2['category_id'];
    $featured=$row2['featured'];
    $active=$row2['active'];

}
else{
    //preusmjeni na Manage Food
    header("Location: ./manage_food.php");

}
?>

<div class="menu_content">
    <div class="wrapper">

    <h1>Update Food</h1>
    <br><br>

    <form action="" method="POST" enctype="multipart/form-date">

    <table class="tbl_full">

    <tr>
        <td>
            Title: 
        </td>
        <td>
            <input type="text" name="title" placeholder="Food Title goes here" value="<?php echo $title;?>">
        </td>
    </tr>

    <tr>
        <td>Description: </td>
        <td>
            <textarea name="description" cols="30" rows="5"><?php echo $description;?>

            </textarea>
        </td>
    </tr>

    <tr>
        <td>Price: </td>
        <td>
            <input type="number" name="price" value="<?php echo $price;?>">
        </td>
    </tr>

    <tr>
        <td>Current Image: </td>
        <td>
           <?php
            if($current_image=="")
            {
                //slika nije dostupna
                echo "<div class='error-mess'>Image not Available.</div>";
            }
            else
            {
                //slika je dostuppna
                ?>
                <img src="../images/food/<?php echo $current_image;?>" alt="<?php echo $title;?>" width="50px">
                <?php
            }
           ?>
        </td>
    </tr>

    <tr>
        <td>Select New Image: </td>
        <td>
            <input type="file" name="image">
        </td>
    </tr>

    <tr>
        <td>Category: </td>
        <td>
            <select name="category">

            <?php
            //upit kkoji kupi active kategorije
            $sql="SELECT * FROM table_category WHERE active='Yes'";

            //izvrsi upit
            $res=mysqli_query($con,$sql);

            //brojanje redova
            $count=mysqli_num_rows($res);

            //provjera da li postoje kategorije ili ne
            if($count>0)
            {
                //categorija dostupna
                while($row=mysqli_fetch_assoc($res))
                {
                    $category_title=$row['title'];
                    $category_id=$row['id'];
                    
                    //echo "<option value='$category_id'> $category_title</option>";
                    ?>
                    <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                    <?php
                }
            }
            else
            {
                //kategorija nije dostupna
                echo "<option value='0' >Category Not Available.</option>";

            }
            ?>
                <option value="0">Test Category</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Featured: </td>
        <td>
            <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
            <input <?php if($featured=="No"){echo "checked";}?>  type="radio" name="featured" value="No">No
        </td>
    </tr>

    <tr>
        <td>Active: </td>
        <td>
        <input <?php if($active=="Yes"){echo "checked";}?>  type="radio" name="active" value="Yes">Yes
        <input  <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
        </td>
    </tr>

    <tr>
        <td>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">

            <input type="submit" name="submit" value="Update Food" class="btn-update">
        </td>
    </tr>
    </table>



    </form>

    <?php
        if(isset($_POST['submit']))
        {
            //echo "Button Clicked";

            //1.Pokupi detaljiz forme
            $id=$_POST['id'];
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $current_image=$_POST['current_image'];
            $category=$_POST['category'];

            $featured=$_POST['featured'];
            $active=$_POST['active'];

            //2.otprei sliku ako je selektovana

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
                    $ext=end(expload('.',$image_name));

                    $image_name="Food-Name-".rand(0000,9999).'.'.$ext; //promjenjeno ime slike

                    //dobiti izvoriste i odrdiste slike
                    $src_path=$_FILES['image']['name'];
                    $dest_path="../images/food/".$image_name;

                    //otpremiti sliku
                    $upload=move_uploaded_file($src_path,$dest_path);

                    //provjera da li je slika otpremljena ili ne
                    if($upload==false)
                    {
                        //greska prilikom otpremanja
                        $_SESSION['upload']="<div class='error'>Failes to Upload new Image.</div>";
                        header("Location: ./manage_food.php");

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
                            $_SESSION['remove-failed']="<div class='error'>Failed to remove current image.</div>";
                            header("Location: ./manage_food.php");
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
            $sql3="UPDATE tablefood SET
            title='$title',
            decription='$description',
            price=$price,
            image_name='$image_name',
            category_id='$category',
            featured='$featured',
            active='$active'
            WHERE id=$id
            ";

            //Izvrsavanje upita
            $res3=mysqli_query($con,$sql3);

            //provjera da li je upit izvrsen ili ne
            if($res3==true)
            {
                //upit izvrsen i hrana otpremljena u bazu
                $_SESSION['update']="<div class='success'>Food Updated Successfully.</div>";
                header("Location: ./manage_food.php");

            }
            else
            {
                //greska pri otpremanju podataka u bazu
                $_SESSION['update']="<div class='error'>Failed to Update Food.</div>";
                header("Location: ./manage_food.php");
            }
           
        }
    ?>
    </div>
</div>



<?php
include 'partials/footer.php';
?>