<?php
include '../connection/connection.php';

//provjera dali je dugme kliknuto ili ne
if(isset($_POST['submit']))
{
    //kliknuto,pokupi detalje iz forme
    $id=$_POST['id'];
    //echo $id;

    $food=$_POST['food_name'];
    //echo $food;
    $price=$_POST['price'];
    //echo $price;
    $qty=$_POST['qty'];
    //echo $qty;

    $status=$_POST['status'];
     //echo $status;
    $custome_name=$_POST['custom_name'];
    //echo $custome_name;
    $custome_contact=$_POST['phone'];
    //echo $custome_contact;
  
    $custome_address=$_POST['custom_address'];
    //echo $custome_address;
   



    //uradi update
   
        $update_order="UPDATE order_items,orders SET 
        orders.status='$status'
        
        WHERE order_items.order_id=orders.id AND order_items.id=$id";

        $update_order_run=mysqli_query($con,$update_order);

        //provjera da li je otpremljeno ili ne

        if($update_order_run==true)
        {
           // $_SESSION['update']="<div style='font-size:20px; word-spacing:12px;' class='fs-2 text-primary text-center fw-bold' role='alert'>Order updated Succesfully.</div>";
            header("Location: ../admin/dashboard_admin.php");
        }
        else

        {
            //$_SESSION['update']="<div style='font-size:20px; word-spacing:12px;' class='fs-2 text-danger text-center fw-bold' role='alert'>Failed to update order.</div>";
            header("Location: ../admin/dashboard_admin.php");
        }


}

?>