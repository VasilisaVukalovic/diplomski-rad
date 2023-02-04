<?php

include '../connection/connection.php';

//echo "Delete Page";
//Provjera da li je vrijednost id postavljena i vrijednost slike ili ne

if(isset($_GET['id']) && isset($_GET['image_name']))
{
    //Dobiti vrijednost i obrisati
    //echo "Get value and delete";

    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    //uklanjanje slike
    if($image_name!="")
    {
        //slika je dostupna,uklonite je
        $path="../images/category/".$image_name;

        //ukloni sliku
        $remove=unlink($path);

        //ako je uklanjnje slike neuspjseno posalji porukuo gresci i zaustavite proces
        if($remove==false)
        {
            //postaviti sesiju poruke
            $_SESSION['remove']="<div class='error'>Failed to Remove Category Image.</div>";

            //Preusmjeri na Manage Category Page
            header("Location: ./manager_category.php");

            //Zaustavi proces
            die();



        }
    }

    //obrisati podatke iz baze
    //SQL UPIT ZA BRISANJE PODATAKA IZ BAZE
    $sql="DELETE FROM table_category WHERE id=$id";

    //izvrsavanje upita
    $res=mysqli_query($con,$sql);

    //Provjera da li su podaci u bazi obrisani ili ne
    if($res==true)
    {
        //posalji poruku o potvrdi i posalji na odgovarajucu stranicu
        $_SESSION['delete']="<div class='success'>Category Deleted Succesfully.</div>";

        header("Location: ./manager_category.php");

    }
    else
    {
        //poruka da nije obrisano
        $_SESSION['delete']="<div class='error'>Failed to Deleted Category..</div>";

        header("Location: ./manager_category.php");
    }


    //preusmjeri na Manage Category stranicu uz poruku



}
else
{
    //preusmjeri na Manage Category stranicu
    header("Location: ./manager_category.php");

}

?>