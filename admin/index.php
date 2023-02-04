<?php 
include ('partials/menu.php');
?>

        <!--Menu Content Starts--> 
        <div class="menu-content">
        <div class="wrapper">
        <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    ?>
            <h1>Dashboard</h1>

            <div class="col-4">

                <?php

                 $sql="SELECT * FROM table_category";

                $res=mysqli_query($con,$sql);

                $count=mysqli_num_rows($res);
            
                 ?>

                <h1><?php echo $count;?></h1>
                <br/>

                Categories
            </div>

            <div class="col-4">

            <?php

                $sql1="SELECT * FROM tablefood";

                 $res1=mysqli_query($con,$sql1);

                $count1=mysqli_num_rows($res1);


            ?>

            <h1><?php echo $count1;?></h1>
                <br/>
             Foods

            </div>

            <div class="col-4">

                <?php

                    $sql2="SELECT * FROM table_order";

                     $res2=mysqli_query($con,$sql2);

                     $count2=mysqli_num_rows($res2);


                ?>
            <h1><?php echo $count2; ?></h1>

            <br/>
                Total Orders

            </div>

            <div class="col-4">
                <?php

                    //kreiranje upita koji daje ukupan prihod
                    $sql4="SELECT SUM(total) AS Total FROM table_order WHERE status='Delivered'";

                    $res4=mysqli_query($con,$sql4);

                    //dobiti vrijednosti
                    $row4=mysqli_fetch_assoc($res4);

                    //dobiti ukupan prihod
                    $total_revenue=$row4['Total'];

                ?>
                <h1>$<?php echo $total_revenue; ?>.00 </h1>
                <br/>
                Revenue Generated
            </div>
            <div class="clear-fix"></div>
            </div>
        </div>
        <!--Menu Content Ends--> 

       <?php include('partials/footer.php');?>