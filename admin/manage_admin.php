<?php include('partials/menu.php');
include '../notification/notification.php';

?>
        <!--Menu Content Starts--> 
        <div class="menu-content">
        <?php 
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete']; //Poruka na display
                unset($_SESSION['delete']);//Ukloni poruku
            }
            
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }

            if(isset($_SESSION['pwd-not-match']))
            {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
            }

            if(isset($_SESSION['change-pwd']))
            {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
            }



            ?>
        <div class="wrapper">
            <h1>Manager Admin</h1>
            <br/>
           
           <br/><br/>
           <a href="add_admin.php" class="btn-add">Add Admin</a>
           <br/><br/>

          
           <br/>
            <table class="tbl-full">
                <tr>
                <th>S.N</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Actions</th>
                </tr>

                <?php
                
                $sql="SELECT * FROM table_admin;";

                $res=$con->query($sql);        //Query execution

                if($res==TRUE)
                {
                        //broj redove da provjerimo da li imamo podatke u bazi ili ne
                        $count=mysqli_num_rows($res);   //funkcja za dobijanje svih redova u bazi podataka

                        $sn=1; //Kreirana varijabla i dodijeljena vrijednost

                        //provjera broja redova
                        if($count>0)
                        {
                                //imamo redove u bazi podataka
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                       
                                        //koristeci while petlju dobijamo sve podatke iz baze podataka
                                        //while petlja ce raditi sve dok ima podataka u BP

                                        //dobijanje pojedinacnih podataka

                                        $id=$rows['id'];
                                        
                                        $full_name=$rows['full_name'];
                                        $username=$rows['user_name'];

                                       

                                        //prikazati vrijednosti u nasoj tabeli

                                        ?>
                                        <tr>
                                                <td><?php echo $sn++?></td>    <!--svaki put kad u bazi izbrisemo neki podatak, u nasoj tabeli ce redni broj biti kakav treba-->
                                                <td><?php echo $full_name?></td>
                                                <td><?php echo $username?></td>
                                                <td>
                                                <a href="../admin/update_password.php?id=<?php echo $id ?>" class="btn-change">Change Password</a>
                                                <a href="../admin/update_admin.php?id=<?php echo $id; ?>" class="btn-update">Update Admin</a> 
                                                
                                                <a href="../admin/delete_admin.php?id=<?php echo $id; ?>" class="btn-delete">Delete Admin</a> 
                                                
                                                 </td>
                                                
                                        </tr>

                                        <?php

                                }
                        }
                        else
                        {
                                //nema redova u bazi podataka
                        }

                }

                ?>
                
            </table>
        </div>
</div>
        <!--Menu Content Ends--> 

<?php include('partials/footer.php');?>