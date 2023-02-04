<?php
include 'partials/menu.php';
?>
<div class="menu-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br/><br/>


        <?php 
        //da li je izabran id
        if(isset($_GET['id']))
        {
            //kupimo ga u promjenljivu $id
            $id=$_GET['id'];
        }
        ?>
        <form action="" method="POST">
        <table class="tbl_form_admin">

        <tr>
            <td>Current Password: </td>
            <td>
                <input type="password" name="current_password" placeholder="Current Password">
            </td>

        </tr>
        <tr>
            <td>New Password: </td>
            <td>
                <input type="password" name="new_password" placeholder="New Password">
            </td>
        </tr>

        <tr>
            <td>Confirm Password: </td>
            <td>
                <input type="password" name="confirm_password" placeholder="Confirm Password">
            </td>
        </tr>

        <tr>
            <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change Password" class="btn-update">
            </td>
        </tr>

        </table>

        </form>

    </div>
</div>

<?php
//provjera da li je dugme kliknuto
if(isset($_POST['submit']))
{
//1.Pokupi podatke iz forme
$id=$_POST['id'];
$current_password=md5($_POST['current_password']);
$new_password=md5($_POST['new_password']);
$confirm_password=md5($_POST['confirm_password']);

//2.Povjera da li postoji korisnik sa trenutnim passwordom i ID-om ili ne
$sql="SELECT * FROM table_admin WHERE id=$id AND password='$current_password'";

//Izvrsavanje upita
$res=$con->query($sql);

//provjera da li je upit izvrsen
if($res==true)
{
    //provjera da li postoji u bazi podataka
    $count=mysqli_num_rows($res);

    if($count==1)
    {
        //User pronadjen i lozinka se moze promjeniti
       // echo "User Found";

       //3.provjera da li se nova lozinka i potvrdjena podudaraju
       if($new_password==$confirm_password)
       {
        //4.update password
        //echo "Password Match";
        $sql2="UPDATE table_admin SET
        password='$new_password'
        WHERE id=$id";

        //Izvrsavanje upita
        $res2=$con->query($sql2);

        if($res2==true)
        {
            //poruka da je uspjesno promjenjena lozinka
            $_SESSION['change-pwd']="<div class='success'>Password Changed Succesfully.</div>";
            header("Location: ../admin/manage_admin.php");

        }
        else
        {

            $_SESSION['change-pwd']="<div class='error'>Failed to Changed Password.</div>";
            header("Location: ../admin/update_admin.php");

        }

       }
       else
    {
        //poruka na Manage Admin stranici o gresci
        $_SESSION['pwd-not-match']="<div class='error'>The Password Did not Match.</div>";
        header("Location: ../admin/manage_admin.php");

        
    }
    }
    else
    {
        //Korisnik ne postoji i lozinka se ne moze promjeniti
        $_SESSION['user-not-found']="<div class='error' >User Not Found.</div>";

        header("Location: ../admin/manage_admin.php");


    }
}



}
?>
<?php
include 'partials/footer.php';
?>
