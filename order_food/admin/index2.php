
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> 
    <link rel="stylesheet" href="../css/styles.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/brands.min.css" integrity="sha512-L+sMmtHht2t5phORf0xXFdTC0rSlML1XcraLTrABli/0MMMylsJi3XA23ReVQkZ7jLkOEIMicWGItyK4CAt2Xw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css" integrity="sha512-cHxvm20nkjOUySu7jdwiUxgGy11vuVPE9YeK89geLMLMMEOcKFyS2i+8wo0FOwyQO/bL8Bvq1KMsqK4bbOsPnA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" integrity="sha512-tk4nGrLxft4l30r9ETuejLU0a3d7LwMzj0eXjzc16JQj+5U1IeVoCuGLObRDc3+eQMUcEQY1RIDPGvuA7SNQ2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/svg-with-js.min.css" integrity="sha512-kykcz2VnxuCLnfiymkPqtsNceqEghEDiHWWYMa/nOwdutxeFGZsUi1+TEWT4MyesfxybNGpJNCVXzEPXSO8aKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/solid.min.css" integrity="sha512-6/gTF62BJ06BajySRzTm7i8N2ZZ6StspU9uVWDdoBiuuNu5rs1a8VwiJ7skCz2BcvhpipLKfFerXkuzs+npeKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="preconnect" href="https://fonts.googleapis.com">


    
    <title>Responsive Admin Dashboard</title>
</head>

<body>
    <?php include '../connection/connection.php';
    ?>
    <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    ?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <i class="fa-solid fa-utensils"></i> Order Food</div>

            <div class="list-group list-group-flush my-3">
                <a href="" class="list-group-item list-group-item-action bg-transparent second-text active">
                <i class="fa-solid fa-gauge"></i> Dashboard</a>

                        

                <a href="manage_admin2.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-user-tie"></i> Admin</a>

                <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-list"></i> Category</a>

                <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-hamburger"></i> Food</a>

                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-list"></i> Order</a>

               
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user-tie"></i> John Doe
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php

                 $sql="SELECT * FROM table_category";

                $res=mysqli_query($con,$sql);

                $count=mysqli_num_rows($res);
            
                 ?>

                                <h3 class="fs-2"><?php echo $count;?></h3>
                                <p class="fs-5">Categories</p>
                            </div>
                            <i class="fas fa-stream fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <?php

$sql1="SELECT * FROM tablefood";

 $res1=mysqli_query($con,$sql1);

$count1=mysqli_num_rows($res1);


?>
                                <h3 class="fs-2"><?php echo $count1;?></h3>
                                <p class="fs-5">Foods</p>
                            </div>
                            <i
                                class="fas fa-hamburger  fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <?php

$sql2="SELECT * FROM table_order";

 $res2=mysqli_query($con,$sql2);

 $count2=mysqli_num_rows($res2);


?>
                                <h3 class="fs-2"><?php echo $count2; ?></h3>
                                <p class="fs-5">Total Orders</p>
                            </div>
                            <i class="fas fa-stream fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <?php

//kreiranje upita koji daje ukupan prihod
$sql4="SELECT SUM(total) AS Total FROM table_order WHERE status='Delivered'";

$res4=mysqli_query($con,$sql4);

//dobiti vrijednosti
$row4=mysqli_fetch_assoc($res4);

//dobiti ukupan prihod
$total_revenue=$row4['Total'];

?>
                                <h3 class="fs-2">$<?php echo $total_revenue; ?>.00 </h3>
                                <p class="fs-5">Revenue Generated</p>
                            </div>
                            <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Orders</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">S.n.</th>
                                    <th scope="col">Food</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Custom name</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

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
                                    <th scope="row"><?php echo $sn++;?>.</th>
                                    <td><?php echo $food;?></td>
                                    <td>$<?php echo $price;?>.00</td>
                                    <td><?php echo $qty;?> </td>
                                    <td>$<?php echo $total;?>.00</td>
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
                <a href="../admin/update_order2.php?id=<?php echo $id;?>"><button type="button" class="btn btn-warning text-white">Update Order</button></a>
            </td>


                                </tr>

                                <?php
    }
}
else
{
    //nije dostupno
    echo "<div style='font-size:20px; word-spacing:12px;' class='alert alert-danger text-center fw-bold' role='alert' colspan='12'>Orders not available.</div>";
}
?>

                                   
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>