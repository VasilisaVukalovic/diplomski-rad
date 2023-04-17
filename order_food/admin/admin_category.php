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
<a href="add_new_category.php" class="add">Add category</a>
</span>
<table class="tabela">
<thead>
    <tr>
        
        <th>Category name</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>

    
       
</thead>
<tbody>


<?php

$sql="SELECT * FROM category";
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
        $title=$row['title'];
        $featured=$row['featured'];
        $active=$row['active'];
    
        ?>
        <tr>
            
            <td><?php echo $title;?></td>
            <td><?php echo $featured;?></td>
            <td><?php echo $active;?></td>
            

            <td class="edit"><a href="../admin/edit_category.php?id=<?php echo $id; ?>">Edit</a></td>
            <td class="delete"><a href="../admin/delete_categoryy.php?id=<?php echo $id; ?>">Delete</a></td>
        </tr>
        <?php
        }
    }
        ?>
</tbody>
</table>





<!-- =========== Scripts =========  -->
<script src="./dashboard.js"></script>