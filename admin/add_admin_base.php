
<?php
include '../connection/connection.php';

 /*Process the Value from Form and Save it in Database*/
       // 1. Get the Data from Form*/

    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=$_POST['password']; 
    $id=0;


    if($fullname==null || $username==null || $password==null)
    {
        setcookie("error-notification","<div class='error_n'>Failed to Add Admin. Try again!</div>",time()+(60*60*24),"/");
        header("Location: ./add_admin.php");


    }
    else
    {
       
        //2. creating a query
        $sql="INSERT INTO table_admin (`id`,`full_name`,`user_name`,`password`) VALUES ('".$id."','".$fullname."','".$username."','".md5($password)."');";

        //3. query execution
        $res=$con->query($sql);     

        setcookie("error-notification","<div class='success_n'>Admin Add Successfully</div>",time()+(60*60*24),"/");
        header("Location: ./manage_admin.php");
       
    } 
?>