<?php include '../connection/connection.php';?>
<?php
/*Process the Value from Form and Save it in Database*/
// 1. Get the Data from Form*/

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$pass=$_POST['password'];
$email=$_POST['email'];

//kada unosimo korisnika da nam u bazu upise odgovarajuce podatke za status i is_guest
if(isset($_POST['admin']))
{
    $status=$_POST['admin'];
    if($status=="admin")
    {
        $is_guest=1;

    }
    else if($status=="user")
    {
        $is_guest=1;
    }
    else
    {
        $is_guest=0;
        
    }
}

/*
else if($_POST['user'])
{
   $status=$_POST['user'];
   $is_guest="1";

}
else 
{
    $status="guest";
    $is_guest="0";

}

*/
if(isset($_FILES['image']['name']))
   {
    //upload slike
    //da bi otpremili sliku potrebno name je ime slike,putanja izvora i putanja odredista
    $image_name=$_FILES['image']['name'];


    //aploudajte sliku ako je selektovana
    if($image_name!="")
    {
    //Automacko mjenjanje imena slike
    //dobijamo ekstenzije nase slike(.jpg,.png,.gif) e.g. "specialfood1.jpg"
    $ext=end(explode('.',$image_name));

    //promijeni ime slike
    $image_name="Users_".rand(000,999).'.' .$ext; //e.g. Food_Category_876.jpg


    $source_path=$_FILES['image']['tmp_name'];
    $destination_path="../userimage/".$image_name;

    //na kraju upload slike

    $upload=move_uploaded_file($source_path,$destination_path);

    //Provjera da li je slika otpremljena ili nije
    //ako nije slika ucitana,zaustavljamo proces i saljemo poruku o gresci

    if($upload==false)
    {
        //Postavljanje poruke
        $_SESSION['upload']="<div style='font-size:20px; word-spacing:12px;' class='alert alert-danger text-center fw-bold' role='alert'>Failed to Upload Image.</div>";
        //vratinas na stranicu Add Category
        header("Location: ./add_user.php");

        //Zaustavi proces
        die();

    }
}
   }
   else
   {
    //slika nije dodata i postavite vrijednost slike(image_name) na blank
    $image_name="";
   }


$id=0;

//if(!isset($_POST['submit']))
if($firstname=="" || $username=="" || $pass=="" || $lastname=="" || $email=="" || $status=="")
{

    //setcookie("error-notification","<div style='font-size:20px; word-spacing:12px;' class='text-danger fs-2 text-center fw-bold'>Failed to Add Admin. Try again!</div>",time()+(60*60*24),"/");
    header("Location: ./add_user.php");

}
else
{
     //2. creating a query
     $sql="INSERT INTO `users`(`id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `status`, `is_guest`, `user_image`) VALUES ('".$id."','".$firstname."','".$lastname."','".$username."','".md5($pass)."','".$email."','".$status."','".$is_guest."','".$image_name."')";
    

     //3. query execution
     $res=$con->query($sql);     

     //setcookie("error-notification","<div style='font-size:20px; word-spacing:12px;' class='text-primary fs-2 text-center fw-bold'>Admin Add Successfully</div>",time()+(60*60*24),"/");
     header("Location: ./admin_users.php");
    

}
?>

