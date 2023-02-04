

<?php
include '../connection/connection.php';
?>



<?php

//provjera da li je dugme kliknuto
if(isset($_POST['submit'])) 

{
    //pokupi podatke sa forme
    //$username=$_POST['username'];
    //$password=md5($_POST['password']);
    

    $username=mysqli_real_escape_string($con,$_POST['username']);
   
    $raw_password=md5($_POST['password']);
    $password=mysqli_real_escape_string($con, $raw_password);


    //postavljanje upita
    $sql="SELECT * FROM table_admin WHERE user_name='$username' AND password='$password'";

    //izvrsavanje upita
    $res=$con->query($sql);

    //provjera da li postoje korisnici u bazi
    $count=mysqli_num_rows($res);

    if($count==1)
    {
        //Korisnik je pronadjen i uspjesno ulogovan
        $_SESSION['login']="<div class='success'>Login Successfully.</div>";
        $_SESSION['user']=$username; //provjerava da li je korisnik ulogovan ili ne i odjava ce ga ponistiti


        //preusmjeri na stranicu HOME/DASHBOARD
        header("Location: ../admin/");

    }
    else
    {
        //Korisnik nije pronadjen i pogresno logovanje
        $_SESSION['login']="<div class='error'>Username or Password did not match.</div>";

        //preusmjeri na stranicu Login
        header("Location: ../admin/login.php");

    }

}
?>
