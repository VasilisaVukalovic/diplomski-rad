<?php
include '../connection/connection.php';
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

    //2.Kreiranje SQL upita za dodavanje kategorije u bazu
    $sql="INSERT INTO category SET
    title='$title',
    featured='$featured',
    active='$active'
    ";
 
    //3.Izvrsavanje upita i cuvanje u bazi
    $res=mysqli_query($con,$sql);
 
 
 
    //3.Provjera da lije upit izvrsen ili nije,i dali su podaci dodatii ili ne
    if($res==TRUE)
    {
     //Upit izvrsen i kategodija dodata
     //$_SESSION['add']="<div style='font-size:20px; word-spacing:12px;' class='text-primary fs-2 text-center fw-bold'>Category Added Succesfully.</div>";
     //Odlazak na Manage Category stranicu
     header("Location: ./admin_category.php");
 
 
    }
    else
    {
     //Greska prilikom dodavanje
     //$_SESSION['add']="<div style='font-size:20px; word-spacing:12px;' class='text-danger text-center fw-bold fs-2'>Failed to Add Category.</div>";
     //Odlazak na Add Category stranicu
     header("Location: ./add_new_category.php");
    }
 }
 ?>