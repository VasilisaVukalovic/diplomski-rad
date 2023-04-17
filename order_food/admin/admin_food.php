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
<a href="add_new_food.php" class="add">Add product</a>
</span>
<table class="tabela">
<thead>
    <tr>
        
        <th>Product name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Currency</th>
        <th>Image food</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    
       
</thead>
<tbody>

<?php
                        //Kreiranje Sql upita koji kupi sve detalje hrane
                        $sql="SELECT * FROM product";

                         //izvrasavanje upita
                        $res=mysqli_query($con,$sql);

                        //brojanje redova i provjera da lipoostoji hrana ili ne
                        $count=mysqli_num_rows($res);

                        //Kreiranje rednog broja i postavljanje vrijednosti na 1
                        $sn=1;

                        if($count>0)
                         {
                         //imamo hranu u bazi
                         //Pokupi hranu iz baze i prikazi u tabeli na ekranu
                             while($row=mysqli_fetch_assoc($res))
                            {
                            //dobiti vrijednosti iz pojedinacnih kolona
                                 $id=$row['id'];
                                 $food_name=$row['food_name'];
                                 $description=$row['description'];
                                 $price=$row['price'];
                                 $currency=$row['curency'];
                                 $image_name=$row['image_name'];
                                 $featured=$row['featured'];
                                 $active=$row['active'];

                            ?>

                            <tr>
                                <td><?php echo $food_name;?></td>
                                <td><?php echo $description;?></td>
                                <td><?php echo $price;?></td>
                                <td><?php echo $currency;?></td>
                                <td>
                                    
                                <?php  
                                    //provjera da li imamo slliku ili ne
                                    if($image_name=="")
                                    {
                                     //nemamo sliku,poruka o gresci
                                     echo "<div style='font-size:20px; word-spacing:12px;' class='fs-4 text-danger text-center fw-bold' role='alert'> Image not Added.</div>";
                                    }
                                    else
                                    {
                                     //imamo sliku,prikazi je
                                    ?>
                                        <img src="../images/food/<?php echo $image_name; ?>" alt="slika nije ucitana" width="70px;" height="60px;" style="border-radius:50%";>
                                    <?php
                                    }
                                    ?>

                                </td>
                                <td><?php echo $featured;?></td>
                                <td><?php echo $active;?></td>
                                
                                <td class="edit"><a href="../admin/edit_food.php?id=<?php echo $id;?>">Edit</a>
                                <input type="hidden" value="<?php echo $id;?>">
                               </td>
                                <td class="delete"><a href="../admin/delete_product.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>">Delete</a></td>
                            </tr>

                            <?php 
                            }
                        }
                        else
                        {
                            echo "<div>Food not added yet. </div>";
                        }
                        ?>
</tbody>
</table>





<!-- =========== Scripts =========  -->
<script src="./dashboard.js"></script>