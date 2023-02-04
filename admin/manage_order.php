<?php include('partials/menu.php');?>
<div class="menu-content">
    <div class="wrapper">
        <h1>Manager Order</h1>

        <br/><br/>
        <?php

        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
        }
        ?>
        <br/>
        <br/>

    <table class="tbl-full">
        <tr>
            <th>S.N.</th>
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
<?php

$sql="SELECT * FROM table_order ORDER BY id DESC"; 

$res=mysqli_query($con,$sql);

$count=mysqli_num_rows($res);

$sn=1;

if($count>0)
{
    //Order dostupan
    while($row=mysqli_fetch_assoc($res))
    {
        //dobiti sve detalje za order
        $id=$row['id'];
        $food=$row['food'];
        $price=$row['price'];
        $qty=$row['qty'];
        $total=$row['total'];
        $order_date=$row['order_date'];

        
        $status=$row['status'];
        $custom_name=$row['custom_name'];
        $custom_contact=$row['custom_contact'];
        $custom_email=$row['custom_email'];
        $custom_address=$row['custom_address'];

        ?>

        <tr>
            <td><?php echo $sn++;?></td>
            <td><?php echo $food;?></td>
            <td>$<?php echo $price;?>.00</td>
            <td><?php echo $qty;?> </td>
            <td><?php echo $total;?>.00</td>
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

            <td> 
                <a href="../admin/update_order.php?id=<?php echo $id;?>" class="btn-update">Update Order</a>
            </td>


        </tr>

        <?php
    }
}
else
{
    //nije dostupno
    echo "<div class='error' colspan='12'>Orders not available.</div>";
}
?>

        
    </table>

    </div>
</div>
<?php include('partials/footer.php');?>