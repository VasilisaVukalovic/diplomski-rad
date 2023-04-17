<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include './connection/connection.php';


if(isset($_SESSION['user']))
{
    if(isset($_POST['placeOrderBtn']))
    {
     //echo "logovan";
     $totalPrice=$_POST['totalPrice'];
     //echo $total;
    $user_id=$_SESSION['user']['id'];
     $name=$_POST['name'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
     $address=$_POST['address'];

     if($name=="" || $email=="" || $phone=="" || $address=="")
     {
        $_SESSION['message']="<div class='messagee'>All fields are mandatory!</div>";
        header("Location: ./checkout.php");
        exit(0);


     }


     $select_cart="SELECT product.id, cart.id, `food_name`, `pro_id`, `curency`, `price`, `image_name`,`quantity` FROM `product`,`cart` WHERE product.id=cart.pro_id AND cart.use_id=$user_id";
     $select_run=mysqli_query($con,$select_cart);


     $insert_query="INSERT INTO `orders`(`user_id`, `name`, `email`, `phone`, `address`, `total_price`, `status`, `comments`) 
                    VALUES ('".$user_id."','".$name."','".$email."','".$phone."','".$address."','".$totalPrice."','Ordered','prilog')";
    $insert_query_run=mysqli_query($con,$insert_query);
    if($insert_query_run==true)
    {
        $order_id=mysqli_insert_id($con);
        foreach($select_run as $items)
        {
            $pro_id=$items['pro_id'];
            $qty=$items['quantity'];
            $price=$items['price'];
            $currency=$items['curency'];

            $insert_order_items="INSERT INTO `order_items`(`order_id`, `pro_id`, `qty`, `price`,`currency`,`created_at`) 
            VALUES ('".$order_id."','".$pro_id."','".$qty."','".$price."','".$currency."',null)";

            $insert_order_items_run=mysqli_query($con,$insert_order_items);


        }



        $deleteCart_query="DELETE FROM cart WHERE use_id=$user_id";
        $deleteCart_query_run=mysqli_query($con,$deleteCart_query);

       


//dio koda za slanje poruke koristeci PHP Mailer
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


    //$name = htmlentities($name);
    //$email = htmlentities($email);
    //$subject = htmlentities($_POST['subject']);
    //$message = htmlentities($_POST['message']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'masasavic938@gmail.com';
    $mail->Password = 'ygoxospaftlkedrm';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, 'Food Delicious');
    $mail->addAddress($email);
   // $mail->Subject = ("$email ($subject)");
   // $mail->Body = $message;
   $mail->Subject ='Food Delicious';
   $mail->Body ="$name your order will be delivered immediately. Thank you for using our services!";
    $mail->send();


        



        header("Location: ./my_orders.php");
        die();

       
       
    }

    }
}
else
{
    header("Location: ./index.php");
}

?>