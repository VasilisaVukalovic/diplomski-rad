<?php
include '../connection/connection.php';
session_unset();
//1.Unistavanje sesije
session_destroy(); //ponistava $_session['user']

//2.Vracanje na login stranicu

header("Location: ./login3.php");

?>