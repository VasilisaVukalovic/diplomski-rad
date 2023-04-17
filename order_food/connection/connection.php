<?php
session_start();
//define('SITEURL','http://localhost/order_food/'); //URL POCETNI

/*$conn=mysqli_connect('localhost','root','') or die(mysqli_error()); //Database Connection

$db_select=mysqli_select_db($conn,'order_food') or die(mysqli_error()); //Database Selected
*/
$con=mysqli_connect('localhost','root','','newbase');
if(!$con)
{
    die("neuspjesna konekcija!");
}

?>
