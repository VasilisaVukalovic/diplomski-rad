
<?php include './skoljka2.php'?>

<!-- ======================= Main============================-->
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
       <div class="image">
       <img  src="../foods_image/admin1.jpg" style="position:fixed; background-repeat: no-repeat; overflow: hidden;">
       <p>Welcome to administrator page!</p>
       </div>

       <script>
        document.getElementsByTagName("p")[0].innerHTML = " ";
       </script>



       <!--provjera jel user ulogovan-->

       <?php
       if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    ?>
 <!-- ======================= Cards ================== -->
 <div class="cardBox">
                <div class="card">
                <?php

            $sql="SELECT * FROM category";

            $res=mysqli_query($con,$sql);

            $count=mysqli_num_rows($res);

            ?>

                    <div>
                        <div class="numbers"><?php echo $count;?></div>
                        <div class="cardName">Categories</div>
                    </div>

                    <div class="iconBx">
                    <i class="fa fa-barcode"></i>
                    </div>
                </div>

                <div class="card">

                <?php

                $sql1="SELECT * FROM product";

                $res1=mysqli_query($con,$sql1);

                $count1=mysqli_num_rows($res1);


                ?>
                    <div>
                        <div class="numbers"><?php echo $count1;?></div>
                        <div class="cardName">Products</div>
                    </div>

                    <div class="iconBx">
                   <i class="fas fa-hamburger"></i>
                    </div>
                </div>

                <div class="card">
                <?php
                
                
                $sql2="SELECT * FROM order_items"; 

                $res2=mysqli_query($con,$sql2);

                $count2=mysqli_num_rows($res2);


               
               ?>
                    <div>
                        <div class="numbers"><?php echo $count2;?></div>
                        <div class="cardName">Total Orders</div>
                    </div>

                    <div class="iconBx">
                        <i class="fas fa-list"></i>
                    </div>
                </div>

                <div class="card">
                <?php

                //kreiranje upita koji daje ukupan prihod
                $sql4="SELECT SUM(total_price) AS Total FROM orders WHERE status='Delivered'";

                $res4=mysqli_query($con,$sql4);

                //dobiti vrijednosti
                $row4=mysqli_fetch_assoc($res4);

                //dobiti ukupan prihod
                $total_revenue=$row4['Total'];

                ?>
                    <div>
                        <div class="numbers"><?php echo $total_revenue;?>KM</div>
                        <div class="cardName">Total Revenue</div>
                    </div>

                    <div class="iconBx">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                </div>
            </div>


            <section class="order" style="padding: 1rem 2%;position:relative;">

            <h4 class="titleh4"><span>Order</span> summary</h4>
            </section>
            <form action="" method="POST" style="position:relative">
             <table class="tabela">
            <thead>
            <tr>
           
            <th>Food</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Custom name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
            </tr>
        </thead>


        <tbody>
    <?php
        $order_query="SELECT order_items.id,product.food_name,order_items.price,order_items.qty,orders.total_price,order_items.created_at,orders.status,orders.name, orders.email,orders.phone,orders.address FROM order_items,orders,product,users WHERE order_items.pro_id=product.id AND order_items.order_id=orders.id AND orders.user_id=users.id ORDER BY order_items.created_at DESC";
        $order_query_run=mysqli_query($con,$order_query);

         $count=mysqli_num_rows($order_query_run);

         if($count>0)
        {
            //Order dostupan
            while($row=mysqli_fetch_assoc($order_query_run))
            {
            //dobiti sve detalje za order
                $id=$row['id'];
                $food=$row['food_name'];
                $price=$row['price'];
                $qty=$row['qty'];
                $total=$row['total_price'];
                $order_date=$row['created_at'];

        
                $status=$row['status'];
                 $custom_name=$row['name'];
                $custom_contact=$row['phone'];
                $custom_email=$row['email'];
                $custom_address=$row['address'];
                ?>
                <tr>
                                    
                <td><?php echo $food;?></td>
                <td><?php echo $price;?>KM</td>
                <td><?php echo $qty;?></td>
                <td><?php echo $total;?>KM</td>
                <td><?php echo $order_date;?></td>
                <td>
         <?php 
             //ordered,delivery,on delivery,cancelled
            if($status=="Ordered")
             {
                 echo "<label>$status</label>";
            }
             else if($status=="On Delivery")
            {
                 echo "<label style='color:orange;'>$status</label>";
            }
            else if($status=="Delivered")
            {
                echo "<label style='color:green;'>$status</label>";
            }
            else if($status=="Cancelled")
            {
                 echo "<label style='color:red;'>$status</label>";
            }

         ?>
            </td>

            <td><?php echo $custom_name;?></td>
            <td><?php echo $custom_contact;?></td>
            <td><?php echo $custom_email;?></td>
            <td><?php echo $custom_address;?></td>

            <td class="text-center;"> 
                <input type="hidden" value="<?php echo $id;?>">

                <a href="../admin/update_order.php?id=<?php echo $id;?>" class="btn-update"><button type="button" class="btn btn-warning text-white">Edit</button></a>
            </td>


            </tr>

        <?php
     }
}
else
{
  //nije dostupno
    echo "<div style='font-size:20px; word-spacing:12px; color:white;' colspan='12'>Orders not available.</div>";
}

    ?>

        
        </tbody>
</table>
</div>

       
       
 <!-- =========== Scripts =========  -->
 <script src="./dashboard.js"></script>

