<?php include '../connection/connection.php';?>
<?php

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
            $_SESSION['upload']="<div style='font-size:20px; word-spacing:12px;' class='fs-2 text-danger text-center fw-bold' role='alert'>Failed to Remove Image File.</div>";
            //preusmjeri na Manage Food
            header("Location: ./manage_food2.php");

            //stopiraj proces
            die();

        }
    }

    // 1. dobiti ID admina koji hocemo da brisemo
$id=$_GET['id'];
$image_name=$_GET['image_name'];
//echo $id;

//2.Kreiranje SQL upita koji brise Admina

$sql="DELETE FROM product WHERE id=$id";

//Izvrsavanje upita
$res=$con->query($sql);

//Provjera da li je upit uspjesno izvrsen ili nije
if($res==TRUE)
{
    //Upit je izvrsen i admin je izbrisan
    //echo "Admin Deleted";

    //Kreiranje sesija varijable da bi prikazali poruku 
    //$_SESSION['delete']= "<div style='font-size:20px; word-spacing:12px;' class='text-primary fs-2 text-center fw-bold' role='alert'>Admin Deleted Successfully</div>";
   
    //Preusmjeri na admin stranicu
    header("Location: ../admin/admin_food.php");
   



}
else
{
    //Upit nije izvrsen ii admin nije izbrisan
   // echo "Failed to Delete Admin";

   //$_SESSION['delete']="<div style='font-size:20px; word-spacing:12px;' class='fs-2 text-danger text-center fw-bold' role='alert'>Failed to Delete Admin.Try Again Later</div>";
  
   header("Location: ../admin/admin_food.php");


}
//3.Preusmjerenje na admin stranicu(uspjesno/neuspjesno)

?>
