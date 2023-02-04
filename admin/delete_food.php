<?php
include '../connection/connection.php';
//echo "Delete food";

if(isset($_GET['id']) && isset($_GET['image_name']))
{
    //obrisi
    //1.Pokupi id i image_name
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];


    //2.Promjeni ime slike ako je dostupnaa
    //provjeri da li je slika dostupna ili ne i izbrisi ako je dostupna
    if($image_name!="")
    {
        //postoji slika i treba je ukloniti
        //destinacija slike
        $path="../images/food/".$image_name;

        //uklonite sliku iz datoteke
        $remove=unlink($path);

        //provjera da li je slika uklonjena ili ne
        if($remove==false)
        {
            //neuspjesno uklanjanje
            $_SESSION['upload']="<div class='error'>Failed to Remove Image File.</div>";
            //preusmjeri na Manage Food
            header("Location: ./manage_food.php");

            //stopiraj proces
            die();

        }
    }

    //3.obrisi iz baze
    $sql="DELETE FROM tablefood WHERE id=$id";
    //izvrsavanje upita
    $res=mysqli_query($con,$sql);

    //provjera da li je upit izvrsen ili nije 
    if($res==true)
    {
        //Obrisana hrana
        $_SESSION['delete']="<div class='success'>Food Deleted Succesfully.</div>";
        header("Location: ./manage_food.php");

    }
    else
    {
        //nije obrisano
        $_SESSION['delete']="<div class='error'>Failed to Delete Food.</div>";
        header("Location: ./manage_food.php");
    }
    
    
}
else
{
    //preusmjeri na Manaage Food
    $_SESSION['unauthorize']="<div class='error'>Unauthorized Access.</div>";
    header("Location: ./manage_food.php");

}
?>