<?php
include '../connection/connection.php';

if($_SESSION['status']=='admin')
{
    $is_guest=$_SESSION['is_guest'];
    header("Location: ../admin/home_admin.php");

    exit();

}
else if($_SESSION['status']=='user')
{
    $is_guest=$_SESSION['is_guest'];
    $username=$_SESSION['user'];
    //header("Location: ../index.php");
    header("Location: ../home_page.php");

}

else if($_SESSION['status']=='guest')
{
    
    $is_guest=2;
     //ovajheader("Location: ../index.php");
    header("Location: ../home_page.php");
    
}


