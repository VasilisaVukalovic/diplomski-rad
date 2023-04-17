<?php include './skoljka2.php'?>

<!-- ========================= Main ==================== -->
<link rel="stylesheet" href="./style_new/admin.css">
<div class="main" id="main">
       
       <div class="topbar">
           <div class="toggle">
           <i class="fas fa-align-left"></i>
           </div>
           

          
         
           <div class="user">
              <!-- <img src="../userimage/customer01.jpg" alt="">-->
             <span><i class="fa-solid fa-user-tie"></i> <?php echo $_SESSION['user']['first_name']?></span>
             <a href="./logout.php" style="text-decoration:none; margin-left:12px">Log out</a>
           </div>
          
       </div>
       
      <div>
     
       <img src="../foods_image/admin1.jpg" style="position:fixed; background-repeat: no-repeat; overflow: hidden;">
       <p>Welcome to administrator page!</p>
      
       </div>

       <script>
     document.getElementsByTagName("p")[0].innerHTML = " ";

    var slika=document.querySelector("img");
    slika.style.display="none";

</script>

<span class="add1">
<i class="fa-solid fa-plus" style="color:white"></i>
<a href="add_user.php" class="add">Add new user</a>
</span>
<table class="tabela">
<thead>
    <tr>
        <th>S.n.</th>
        <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Password</th>
        <th>Email</th>
        <th>UserImage</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
</thead>
<tbody>
    <?php

    $sql="SELECT * FROM users";
    //izvrsavanje upita
    $res=mysqli_query($con,$sql);

    //broji redove
    $count=mysqli_num_rows($res);

    //kreiramo serial number varijablu i postavimo vrijednost na 1
    $sn=1;

    //provjera da li ima podataka u bazi ili ne
    if($count==true)
    {
        //postoje podaci u bazi
        //dobiti podatke i prikazati
        while($row=mysqli_fetch_assoc($res))
        {
            $id=$row['id'];
            $username=$row['user_name'];
            $firstname=$row['first_name'];
            $lastname=$row['last_name'];
            $password=$row['password'];
            $email=$row['email'];
            $userimage=$row['user_image'];

         
            ?>
            <tr>
                <td><?php echo $sn++;?>.</td>
                <td><?php echo $username;?></td>
                <td><?php echo $firstname;?></td>
                <td><?php echo $lastname;?></td>
                <td><?php echo $password;?></td>
                <td><?php echo $email;?></td>
            <td>
                <?php
                if($userimage!=" ")
                {
                    ?>
                    <img src="../userimage/<?php echo $userimage;?>" alt="" width="70px;" height="60px;">
                    <?php
                }
                else{
                 echo "<div>slike nema</div>";
                }
                ?>
                </td>
            <td class="edit"><a href="../admin/update_user.php?id=<?php echo $id; ?>">Edit</a></td>
            <td class="delete"><a href="../admin/delete_user.php?id=<?php echo $id; ?>">Delete</a></td>
            </tr>
<?php
        }
    }
    ?>

    
</tbody>

</table>
  <!-- =========== Scripts =========  -->
  <script src="./dashboard.js"></script>
