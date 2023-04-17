<?php include '../connection/connection.php';?>
<?php

    if(isset($_POST['submit']))
    {
       // echo "Clicked";

       //1.pokupi sve vrijednosti iz forme
        $id=$_POST['id'];
       $firstname=$_POST['firstname'];
       $lastname=$_POST['lastname'];
       $username=$_POST['username'];
       $pass=md5($_POST['password']);
       $email=$_POST['email'];
       $current_image=$_POST['image'];
       $is_guest=$_POST['is_guest'];
       /*u bazi da promjeni status i is_guest*/
       if(isset($_POST['admin']))
       {
           $status=$_POST['admin'];
           if($status=="admin")
           {
               $is_guest=0;
       
           }
           else if($status=="user")
           {
               $is_guest=1;
           }
           else
           {
               $is_guest=2;
               
           }
       }

        //2.Ucitavanje nove slike koja je selektovana
       //Provjera da li je slika selektovana ili nije
       if(isset($_FILES['image']['name']))
       {
        //Pokupi detalje slike
        $image_name=$_FILES['image']['name'];

        //provjera da li je slika dostupna ili ne
        if($image_name!="")
        {
            //Slika je dostupna
            //1.Upload nove slike
            $ext=end(explode('.',$image_name));

            //promijeni ime slike
            $image_name="Users_".rand(000,999).'.' .$ext; //e.g. Users_876.jpg


             $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../userimage/".$image_name;

            //na kraju upload slike

            $upload=move_uploaded_file($source_path,$destination_path);

            //Provjera da li je slika otpremljena ili nije
            //ako nije slika ucitana,zaustavljamo proces i saljemo poruku o gresci

            if($upload==false)
                {
                 //Postavljanje poruke
                 $_SESSION['upload']="<div style='font-size:20px; word-spacing:12px;' class='fs-4 text-danger text-center fw-bold' role='alert'>Failed to Upload Image.</div>";
                 //vratinas na stranicu Add Category
                 header("Location: ./admin_users.php");

                //Zaustavi proces
                die();

                }
        //2.promjeni Current Image ako je dostupna
        if($current_image!="")
        {
            $remove_path="../userimage/".$current_image;

            $remove=unlink($remove_path);

            //provjera da li je slika promjenjena ili ne
            //ako nije prikazi poruku na displej i zaustavi proces
            if($remove==false)
            {
                //Greska pri promjeni slike
                $_SESSION['failed-remove']="<div style='font-size:20px; word-spacing:12px;' class='fs-4 text-danger text-center fw-bold' role='alert'>Failed to remove current Image.</div>";
                header("Location: ./admin_users.php");
                die();//Zaustavi proces


            }
        }
    
    }
    else
    {
        $image_name=$current_image;

    }
   }
   else

   {
    $image_name=$surrent_image;

   }

    //3.Update baze
    $sql2="UPDATE users SET
    first_name='$firstname',
    user_image='$image_name',
    status='$status',
    last_name='$lastname',
    password='$pass',
    email='$email',
    user_name='$username',
    is_guest=$is_guest
    WHERE id=$id
    ";

    //Izvrsavanje upita
    $res2=mysqli_query($con,$sql2);



   //4.Usmjerenje na stranicu Category Manager
   //Provjera da li je upit ivrsen li ne
   if($res2==true)
   {
    //Update Category
    $_SESSION['update']="<div style='font-size:20px; word-spacing:12px;' class='fs-2 text-primary text-center fw-bold' role='alert'>Category Updated Sucessfully.</div>";
    header("Location: ./admin_users.php");



   }
   else
   {
    //greska
    $_SESSION['update']="<div style='font-size:20px; word-spacing:12px;' class='fs-2 text-danger text-center fw-bold' role='alert'>Failed to Updated Sucessfully.</div>";
    header("Location: ./admin_users.php");

   }

}

?>
