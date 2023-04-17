<?php include '../connection/connection.php'?>

<?php 
    if(isset($_REQUEST['firstname']) && isset($_REQUEST['lastname']) && isset($_REQUEST['mail']) && isset($_REQUEST['username']) && isset($_REQUEST['password']))
    {

        $ime=$_REQUEST['firstname'];
        $prezime=$_REQUEST['lastname'];
        $mail=$_REQUEST['mail'];
        $user=$_REQUEST['username'];
        $pass=$_REQUEST['password'];


        $br_usera=0;
        //$sql1="SELECT * FROM `table_admin`";
        $sql1="SELECT * FROM `users`";

        $result=$con->query($sql1);

        if($result->num_rows>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $br_usera++;
            }
            

        }
        $br_usera++;

        if($user!='admin')
        {
            $status='user';
            $is_guest=1;
        }
        else if($user=='admin')
        {
            $status='admin';
            $is_guest=0;
        }
        else{
            $is_guest=2;
        }
      

$sql2="INSERT INTO `users`(`id`, `first_name`, `last_name`, `user_name`, `password`, `email`,`status`,`is_guest`) 
VALUES (".$br_usera.",'".$ime."','".$prezime."','".$user."','".md5($pass)."','".$mail."','".$status."','".$is_guest."')";



    $con->query($sql2);
    
    header("Location: ../admin/login3.php");

    }
?>