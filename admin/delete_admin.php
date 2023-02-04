<?php
//Konekcija na bazu
include '../connection/connection.php';


// 1. dobiti ID admina koji hocemo da brisemo
$id=$_GET['id'];
//echo $id;

//2.Kreiranje SQL upita koji brise Admina

$sql="DELETE FROM table_admin WHERE id=$id";

//Izvrsavanje upita
$res=$con->query($sql);

//Provjera da li je upit uspjesno izvrsen ili nije
if($res==TRUE)
{
    //Upit je izvrsen i admin je izbrisan
    //echo "Admin Deleted";

    //Kreiranje sesija varijable da bi prikazali poruku 
    $_SESSION['delete']= "<div class='success'>Admin Deleted Successfully</div>";
   
    //Preusmjeri na admin stranicu
    header("Location: ../admin/manage_admin.php");
   



}
else
{
    //Upit nije izvrsen ii admin nije izbrisan
   // echo "Failed to Delete Admin";

   $_SESSION['delete']="<div class='error'>Failed to Delete Admin.Try Again Later</div>";
  
   header("Location: ../admin/manage_admin.php");


}
//3.Preusmjerenje na admin stranicu(uspjesno/neuspjesno)

?>