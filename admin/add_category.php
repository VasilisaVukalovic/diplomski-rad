<?php
include 'partials/menu.php';

?>
<div class="menu-content">
<div class="wrapper">
<h1>Add Category</h1>

<br><br>


<?php

if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}




if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
?>

<!--Add Category Forms starts-->

<form action="" method="POST" enctype="multipart/form-data">

<table class="tbl_form_admin">

<tr>
    <td>Title: </td>
    <td>
        <input type="text" name="title" placeholder="Category Title">
    </td>
</tr>

<tr>
    <td>Select Image: </td>
<td>
    <input type="file" name="image">
</td>
</tr>

<tr>
    <td>Featured: </td>
    <td>
        <input type="radio" name="featured" value="Yes"> Yes
        <input type="radio" name="featured" value="No"> No
    </td>
</tr> 

<tr>
    <td>Active: </td>
    <td>
        <input type="radio" name="active" value="Yes">Yes
        <input type="radio" name="active" value="No">No
</td>
</tr>

<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add Category" class="btn-add">
    </td>
</tr>
</table>
</form>
<!--Add Category Forms  Ends-->

<?php

//Provjera da li je dugme kliknuto ili ne

if(isset($_POST['submit']))
{
   // echo "kliknuto";


   //1.Uzeti vrijednost iz forme
   $title=$_POST['title'];


   //Za radio treba provjeriti da li je izabran ili nije

   if(isset($_POST['featured']))
   {
    //Uzeti vrijednost iz forme

    $featured=$_POST['featured'];

   }
   else
   {
    //postaviti podrazumjevanu vrijednost
    $featured="No";

   }



   if(isset($_POST['active']))
   {
    $active=$_POST['active'];

   }
   else
   {
    $active="No";

   }

   //Provjeriti da li je slika izabrana ili ne,i podesiti vrijednost za naziv slike
   //print_r($_FILES['image']);

   //die();//razbijanje koda ovdje

   if(isset($_FILES['image']['name']))
   {
    //upload slike
    //da bi otpremili sliku potrebno name je ime slike,putanja izvora i putanja odredista
    $image_name=$_FILES['image']['name'];


    //aploudajte sliku ako je selektovana
    if($image_name!="")
    {
    //Automacko mjenjanje imena slike
    //dobijamo ekstenzije nase slike(.jpg,.png,.gif) e.g. "specialfood1.jpg"
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
        header("Location: ./add_category.php");

        //Zaustavi proces
        die();

    }
}
   }
   else
   {
    //slika nije dodata i postavite vrijednost slike(image_name) na blank
    $image_name="";
   }

   //2.Kreiranje SQL upita za dodavanje kategorije u bazu
   $sql="INSERT INTO table_category SET
   title='$title',
   image_name='$image_name',
   featured='$featured',
   active='$active'
   ";

   //3.Izvrsavanje upita i cuvanje u bazi
   $res=mysqli_query($con,$sql);



   //3.Provjera da lije upit izvrsen ili nije,i dali su podaci dodatii ili ne
   if($res==TRUE)
   {
    //Upit izvrsen i kategodija dodata
    $_SESSION['add']="<div class='success'>Category Added Succesfully.</div>";
    //Odlazak na Manage Category stranicu
    header("Location: ./manager_category.php");


   }
   else
   {
    //Greska prilikom dodavanje
    $_SESSION['add']="<div class='success'>Failed to Add Category.</div>";
    //Odlazak na Add Category stranicu
    header("Location: ./add_category.php");
   }
}
?>
</div>
</div>

<?php
include 'partials/footer.php';
?>