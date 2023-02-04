<?php

//echo "Update Page";
include 'partials/menu.php';
?>
<div class="main_content">
<div class="wrapper">
    <h1>Update Category</h1>
    <br><br>


    <?php
//provjera da li je izabran id ili ne

if(isset($_GET['id']))
{
    //Pokupi ID i ostale detalje
    //echo "Getting the Data";

    $id=$_GET['id'];

    //Kreiranje SQL upita koji uzima ostale detalje
    $sql="SELECT * FROM table_category WHERE id=$id";

    //Izvrsi upit
    $res=mysqli_query($con,$sql);

    //broji redove i provjera da li postoje podaci
    $count=mysqli_num_rows($res);

    if($count==1)
    {
        //pokupi sve podatke
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $current_image=$row['image_name'];
        $featured=$row['featured'];
        $active=$row['active'];



    }
    else
    {
        $_SESSION['no-category-found']="<div class='error'>Category not Found.</div>";
        header("Location: ./manager_category.php");

    }



}
else
{
    //preusmjeri na manage categoroy
    header("Location: ./admin/manager_category.php");

}
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-full">
        <tr>

        <td>
            Title:
        </td>
        <td>
            <input type="text" name="title" value="<?php echo $title; ?>">
        </td>
        </tr>

        <tr>
            <td>Current Image: </td>
            <td>
                <?php 
                    if($current_image!="")
                    {
                        //prikazi sliku
                        ?>

                        <img src="../images/category/<?php echo $current_image; ?>" width="50px;">
                        <?php


                    }
                    else
                    {
                        //prikazi poruku
                        echo "<div class='error-mess'>Image Not Added.</div>";
                    }
                ?>
            </td>
        </tr>

        <tr>
            <td>New Image: </td>
            <td>
                <input type="file" name="image">
            </td>
        </tr>

        <tr>
            <td>Featured: </td>
            <td>
                <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes
                <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No"> No
            </td>
        </tr>

        <tr>
            <td>Active: </td>
            <td>
            <input <?php if($active=="Yes"){ echo "checked";}?> type="radio" name="active" value="Yes">Yes
                <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No"> No
            </td>
        </tr>

        <tr>
            <td>
                <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">

            <input type="submit" name="submit" value="Update Category" class="btn-update">
            </td>

        </tr>
    </table>
    </form>

    <?php

    if(isset($_POST['submit']))
    {
       // echo "Clicked";

       //1.pokupi sve vrijednosti iz forme
        $id=$_POST['id'];
       $title=$_POST['title'];
       $current_image=$_POST['current_image'];
       $featured=$_POST['featured'];
       $active=$_POST['active'];

       //2.Ucitavanje nove slike koja je selektovana
       //Provjera da li je slika selektovana ili nije
       if(isset($_FILES['image']['name']))
       {
        //Pokupi detalje slike
        $image_name=$_FILES['image']['name'];

        //provjera da li je slika dostupna ili ne
        if($image_name!="")
        {
            //Slika je dostupna
            //1.Upload nove slike
            $ext=end(explode('.',$image_name));

            //promijeni ime slike
            $image_name="Food_Category_".rand(000,999).'.' .$ext; //e.g. Food_Category_876.jpg


             $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../images/category/".$image_name;

            //na kraju upload slike

            $upload=move_uploaded_file($source_path,$destination_path);

            //Provjera da li je slika otpremljena ili nije
            //ako nije slika ucitana,zaustavljamo proces i saljemo poruku o gresci

            if($upload==false)
                {
                 //Postavljanje poruke
                 $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                 //vratinas na stranicu Add Category
                 header("Location: ./manager_category.php");

                //Zaustavi proces
                die();

                }
            //2.promjeni Current Image ako je dostupna
            if($current_image!="")
            {
                $remove_path="../images/category/".$current_image;

                $remove=unlink($remove_path);
    
                //provjera da li je slika promjenjena ili ne
                //ako nije prikazi poruku na displej i zaustavi proces
                if($remove==false)
                {
                    //Greska pri promjeni slike
                    $_SESSION['failed-remove']="<div class='error'>Failed to remove current Image.</div>";
                    header("Location: ./manager_category.php");
                    die();//Zaustavi proces
    
    
                }
            }
        
        }
        else
        {
            $image_name=$current_image;

        }
       }
       else

       {
        $image_name=$surrent_image;

       }

       //3.Update baze
       $sql2="UPDATE table_category SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
        WHERE id=$id
        ";

        //Izvrsavanje upita
        $res2=mysqli_query($con,$sql2);



       //4.Usmjerenje na stranicu Category Manager
       //Provjera da li je upit ivrsen li ne
       if($res2==true)
       {
        //Update Category
        $_SESSION['update']="<div class='success'>Category Updated Sucessfully.</div>";
        header("Location: ./manager_category.php");



       }
       else
       {
        //greska
        $_SESSION['update']="<div class='error'>Failed to Updated Sucessfully.</div>";
        header("Location: ./manager_category.php");

       }

    }

    ?>
</div>
</div>
