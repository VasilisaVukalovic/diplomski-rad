<?php include '../connection/connection.php';?>
<?php 
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $sql1="SELECT * FROM users WHERE id=$id";

    $res1=$con->query($sql1);

    $count=mysqli_num_rows($res1);
 
    if($count==1)
    {
        //pokupi sve podatke
        $row1=mysqli_fetch_assoc($res1);
        $id=$row1['id'];
    }
    else
    {
        header("Location: ./admin_users.php");
    }
        
}
else
{
    header("Location: ./admin_users.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete user</title>
    <link rel="stylesheet" href="./style_new/delete_user.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/svg-with-js.min.css" integrity="sha512-kykcz2VnxuCLnfiymkPqtsNceqEghEDiHWWYMa/nOwdutxeFGZsUi1+TEWT4MyesfxybNGpJNCVXzEPXSO8aKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/solid.min.css" integrity="sha512-6/gTF62BJ06BajySRzTm7i8N2ZZ6StspU9uVWDdoBiuuNu5rs1a8VwiJ7skCz2BcvhpipLKfFerXkuzs+npeKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

</head>
<body>
<div class="title">
<span class="icon">
    <i class="fa-solid fa-utensils"  style="font-size: 1.75rem; color:#c98d83;"></i>
</span>
<span class="title" style="font-family: 'Dancing Script', cursive; font-size:1.75rem;font-weight:bold; margin-top:5px">Food Delicious</span>
</div>
    <div class="cartBox">
    <h2>Delete<span> user</span></h2>
    
        <div class="cart">

        <p>Do you want to delete the user?</p>

<div class="buttons">
    <input type="hidden" value="<?php echo $id;?>">
    <button class="yes" style="background-color: var(--secondary-color);
    padding: 10px;
    width: 35%;
    color: white;
    font-size: 15px;"><a href="delete_user_base.php?id=<?php echo $id?>">Yes</a></button>
    <button class="no" style="padding: 10px;
    width: 35%;
    font-size: 15px;
    color: white;
    background-color: #de705d;"><a href="admin_users.php">No</a></button>
</div>
        </div>
    </div>
</body>
</html>