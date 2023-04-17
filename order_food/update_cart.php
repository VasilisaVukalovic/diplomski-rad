<?php include './connection/connection.php';
if(isset($_GET['cart_id']) && isset($_GET['qty']))
{

$cart_id=$_GET['cart_id'];
$q=$_GET['qty'];


$sql="UPDATE cart SET quantity='$qty' WHERE id='$cart_id'";
$res=mysqli_query($con,$sql);

if($res==true)
{
    $_SESSION['messagee']='<div class="messagee">Qunatity updated.</div>';
    header("Location: ./cart.php");

}
else
{
    $_SESSION['messagee']='<div class="messagee">Qunatity no updated.</div>';
    header("Location: ./cart.php");

}
}
else
{
    header("Location: ./cart.php");
}
?>
