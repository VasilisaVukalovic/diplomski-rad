
<?php 

include './skoljka2.php';

 
?>
<link rel="stylesheet" href="./style_new/admin.css">

<!-- ========================= Main ==================== -->
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


<div class="cartBox">
    <div class="cart">
   
            <?php 
            $sql="SELECT `user_image`,`status` FROM users WHERE id=".$_SESSION['user']['id'];

            $res=$con->query($sql);

            $count=mysqli_num_rows($res);

            if($count>0)
            {
                $row=mysqli_fetch_assoc($res);
                $image=$row['user_image'];
                $status=$row['status'];
            }
            else
            {
                echo "greska";
            }
            ?>
           <div class="image">   

            <img src="../userimage/<?php echo $image;?>" alt="slike nema">
            
           
            <br/>
            

            <div>
          
        
            <label style="color:black"><?php echo $_SESSION['user']['first_name']?></label>
              
            <span><label><?php echo $_SESSION['user']['last_name']?></label></span>
             
            
            </div>
            
       
            </div>
                    

       <div class="details">
            <table>

            
                <tr class="cbox">
                    <td>FirstName</td>
                    <td><?php echo $_SESSION['user']['first_name']?></td>
                </tr>
                <tr class="cbox">
                    <td>LastName</td>
                    <td><?php echo $_SESSION['user']['last_name']?></td>
                </tr>
                <tr class="cbox">
                    <td>Username</td>
                    <td><?php echo $_SESSION['user']['user_name']?></td>
                </tr>
                <tr class="cbox">
                    <td>Password</td>
                    <td style="font-size:10px;"><?php echo $_SESSION['user']['password']?></td>
                </tr>
                <tr class="cbox">
                    <td>Email</td>
                    <td><?php echo $_SESSION['user']['email']?></td>
                </tr>
                <tr class="cbox">
                    <td>Status</td>
                    <td><?php echo $status;?></td>
                </tr>

                
    
       
                </table>
        </div>


    </div>
</div>


</div>
        <!-- =========== Scripts =========  -->
    <script src="./dashboard.js"></script>





