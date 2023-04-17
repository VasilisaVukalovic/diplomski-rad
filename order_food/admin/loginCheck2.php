<?php

include '../connection/connection.php';

if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];

    //postavljanje upita
    
    $sql="SELECT * FROM users WHERE user_name='".$username."' AND password='".md5($password)."'";


     //izvrsavanje upita
    $res=mysqli_query($con,$sql);

    //provjera da li postoje korisnici u bazi
    $count=mysqli_num_rows($res);

    if($count==1)
    {
        $row=mysqli_fetch_assoc($res);

        //Korisnik je pronadjen i uspjesno ulogovan
        //$_SESSION['login']="<div style='font-size:20px; word-spacing:12px;' class='text-primary fs-2 text-center fw-bold'>Login Successfully.</div>";
        $_SESSION['user']=$row;
        $_SESSION['status']=$row['status'];
        $_SESSION['user_id']=$row['id'];
        $_SESSION['username']=$row['user_name'];
        $_SESSION['is_guest']=$row['is_guest'];

       
    
       
        header("Location: ../back-end/session.php");
            
            
            
    }

    
    else
    {
       //Korisnik nije pronadjen i pogresno logovanje
       $_SESSION['login']="<p style='font-size:15px; color:red; margin-top:13px;'>Username or password is incorrect.</p>";

       //preusmjeri na stranicu Login
       header("Location: ../admin/login3.php"); 
    }
}
?>