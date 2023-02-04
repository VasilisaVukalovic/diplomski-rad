<?php include 'partials/menu.php';?>
<div class="menu-content">
    <div class="wrapper">

    <h1>Update Admin</h1><br/><br/>

    <?php
    //1.Dohvati ID admina kojeg zelimo da azuriramo
    $id=$_GET['id'];
    //echo $id;

    //2.Kreiranje SQL upita
    $sql="SELECT * FROM table_admin WHERE id=$id";

    //Izvrsavanje upita
    $res=$con->query($sql);

    //Provjera da li je upit izvrsen
    if($res==true)
    {
        //Provjera da li ima podataka ili ne
        $count=mysqli_num_rows($res);

        //provjera da li immamo adminove podatke
        if($count==1)
        {
            //Pokupi detalje admina 
            //echo Admin Available;

            $rows=mysqli_fetch_assoc($res);
            $fullname=$rows['full_name'];
            $username=$rows['user_name'];
        }
        else
        {
            //vrati se na stranicu Manage Page
            header("Location: ../admin/manage_admin.php");

        }
    }
    else
    {

    }

    ?>

    <form action="" method="POST">
    
        <table class="tbl_form_admin">
        <tr>
            <td>Full Name:</td>
            <td><input type="text" name="fullname" placeholder="Enter Your Name" value="<?php echo $fullname ?>"></td>
        </tr>

        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" placeholder="Username" value="<?php echo $username ?>" ></td>
        </tr>

        

        <tr>
            <td colspan="2">
                <input type="hidden" name="id" value="<?php echo $id; ?>"> <!--dodat id da bi ga mogli pokupiti dolje u $POST,tu se ubacuje name tj.$POST['name']-->
                <input type="submit" name="submit" value="Update Admin" class="btn-update">
                
                
            </td>
        </tr>
       
        </table>
        
    </form>

</div>
</div>



<?php 
//provjera da li je dugme kliknuto ili ne
if(isset($_POST['submit']))
{
    //echo Button Clicked;
    //Pokupimo podatke iz forme da bi ih uradili update u bazi

    $id=$_POST['id'];
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];

    //Kreiramo upit koji ce raditi Update
    $sql="UPDATE table_admin SET
    full_name='$fullname',
    user_name='$username'
    WHERE id=$id";

    //izvrsi upit
    $res=$con->query($sql);

    //provjera da li je upit izvrsen
    if($res==true)
    {
        //upit je izvrsen i Admin je azuriran
        $_SESSION['update']="<div class='success'>Admin Updated Succesfully</div>";
        //predji na Manage Admin stranicu
        header("Location: ../admin/manage_admin.php");
    }
    else
    {
        //Greska prilikom Update-a
        $_SESSION['update']="<div class='error'>Failed Admin Updated Succesfully</div>";
        //predji na Update Admin stranicu
        header("Location: ../admin/update_admin.php");
    }

  

}

include 'partials/footer.php';
?>

