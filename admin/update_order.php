<?php include 'partials/menu.php'?>

<div class="menu_content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>
        <?php
            //provjera da li je id pokupljen ili ne
            if(isset($_GET['id']))
            {
                    //dobiti dettalje 
                    $id=$_GET['id'];

                    $sql="SELECT * FROM table_order WHERE id=$id";

                    $res=mysqli_query($con,$sql);

                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //detalji dostupnni
                        $row=mysqli_fetch_assoc($res);

                        $food=$row['food'];
                        $price=$row['price'];
                        $qty=$row['qty'];
                        $status=$row['status'];
                        $custome_name=$row['custom_name'];
                        $custome_contact=$row['custom_contact'];
                        $custome_address=$row['custom_address'];
                        $custome_email=$row['custom_email'];


                    }
                    else
                    {

                        header("Location: ../admin/manage_order.php");
                    }
            }
            else
            {
                header("Location: ../admin/manage_order.php");
            }
        ?>

        <form action="" method="POST">

        <table class="tbl-full">
            <tr>

            <td>Food Name: </td>
            <td><b><?php echo $food;?></b></td>
            </tr>

            <tr>
                <td>Price: </td>
                <td> 
                    <b> $ <?php echo $price;?>.00</b>
                </td>
            </tr>

            <tr>
                <td>Qty: </td>
                <td>
                    <input type="number" name="qty" value="<?php echo $qty;?>">
                </td>
            </tr>

            <tr>
                <td>Status: </td>
                <td>
                    <select name="status">
                        <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                        <option  <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                        <option  <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                        <option  <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Customer Name: </td>
                <td>
                    <input type="text" name="custome_name" value="<?php echo $custome_name;?>">
                </td>
            </tr>

            <tr>
                <td>Customer Contact: </td>
                <td>
                    <input type="text" name="custome_contact" value="<?php echo $custome_contact;?>">
                </td>
            </tr>

            <tr>
                <td>Customer Email: </td>
                <td>
                    <input type="text" name="custome_email" value="<?php echo $custome_email;?>">
                </td>
            </tr>

            <tr>
                <td>Customer Address: </td>
                <td>
                    <textarea  name="custome_address"  rows="5" cols="30" ><?php echo $custome_address;?></textarea>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">

                    <input type="hidden" name="price" value="<?php echo $price;?>">
                    <input type="submit" name="submit" class="btn-update" value="Update Order">
                </td>
            </tr>
        </table>
        </form>

        <?php

        //provjera dali je dugme kliknuto ili ne
        if(isset($_POST['submit']))
        {
            //kliknuto,pokupi detalje iz forme
            $id=$_POST['id'];
            $price=$_POST['price'];
            $qty=$_POST['qty'];
            $total=$qty * $price;

            $status=$_POST['status'];

            $custome_name=$_POST['custome_name'];
            $custome_contact=$_POST['custome_contact'];
            $custome_email=$_POST['custome_email'];
            $custome_address=$_POST['custome_address'];



            //uradi update
            $sql2="UPDATE table_order SET
                qty=$qty,
                total=$total,
                status='$status',
                custom_name='$custome_name',
                custom_contact='$custome_contact',
                custom_address='$custome_address',
                custom_email='$custome_email'
                WHERE id=$id";


                $res2=mysqli_query($con,$sql2);

                //provjera da li je otpremljeno ili ne

                if($res2==true)
                {
                    $_SESSION['update']="<div class='success'>Order updated Succesfully.</div>";
                    header("Location: ../admin/manage_order.php");
                }
                else

                {
                    $_SESSION['update']="<div class='error'>Failed to update order.</div>";
                    header("Location: ../admin/manage_order.php");
                }


        }
        else
        {

        }

        ?>
    </div>
</div>

<?php include 'partials/footer.php'?>