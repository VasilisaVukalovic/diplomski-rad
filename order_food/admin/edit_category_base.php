<?php include '../connection/connection.php';?>
<?php

    if(isset($_POST['submit']))
    {
       // echo "Clicked";

       //1.pokupi sve vrijednosti iz forme
        $id=$_POST['id'];
       $title=$_POST['title'];
       $featured=$_POST['featured'];
       $active=$_POST['active'];
        
       //3.Update baze
        $sql2="UPDATE category SET
        title='$title',
        featured='$featured',
        active='$active'
        WHERE id=$id
        ";

        //Izvrsavanje upita
        $res2=mysqli_query($con,$sql2);



        //4.Usmjerenje na stranicu Category Manager
        //Provjera da li je upit ivrsen li ne
        if($res2==true)
        {
            //Update Category
            //$_SESSION['update']="<div style='font-size:20px; word-spacing:12px;' class='fs-2 text-primary text-center fw-bold' role='alert'>Category Updated Sucessfully.</div>";
            header("Location: ./admin_category.php");



        }
        else
        {
            //greska
            //$_SESSION['update']="<div style='font-size:20px; word-spacing:12px;' class='fs-2 text-danger text-center fw-bold' role='alert'>Failed to Updated Sucessfully.</div>";
            header("Location: ./admin_category.php");

        }

    }

?>
