<?php include('partials/menu.php');?>
<div class="menu-content">
    <div class="wrapper">
        <h1>Manager Food</h1>

<br><br>
<!--Button to Add Admin-->
<a href="./add_food.php" class="btn-add">Add Food</a>

<br><br>

<?php
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);

}

if(isset($_SESSION['delete']))
{
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);

}

if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);

}

if(isset($_SESSION['unauthorize']))
{
    echo $_SESSION['unauthorize'];
    unset($_SESSION['unauthorize']);

}

if(isset($_SESSION['update']))
{
    echo $_SESSION['update'];
    unset($_SESSION['update']);

}




?>

<table class="tbl-full">
    <tr>
        <th>S.N</th>
        <th>Title</th>
        
        <th>Price</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>

    <?php
    //Kreiranje Sql upita koji upi sve detalje hrane
    $sql="SELECT * FROM tablefood";

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
            $title=$row['title'];
            $price=$row['price'];
            $image_name=$row['image_name'];
            $featured=$row['featured'];
            $active=$row['active'];

            ?>
            <tr>
                <td><?php echo $sn++;?>.</td>
                <td><?php echo $title;?></td>
        
                <td>$<?php echo $price;?>.00</td>
                <td>
                    <?php  
                    //provjera da li imamo slliku ili ne
                    if($image_name=="")
                    {
                        //nemamo sliku,poruka o gresci
                        echo "<div class='error'> Image not Added.</div>";
                    }
                    else
                    {
                        //imamo sliku,prikazi je
                        ?>
                        <img src="../images/food/<?php echo $image_name; ?>" alt="slika nije ucitana" width="70px;" height="60px;">
                        <?php
                    }
                    ?>
                </td>
                <td><?php echo $featured;?></td>
                <td><?php echo $active;?></td>
                <td>
                 <a href="../admin/update_food.php?id=<?php echo $id; ?>" class="btn-update">Update Food</a>
                <a href="../admin/delete_food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete Food</a>
                </td>

       
            </tr>
            <?php

        }
    }
    else{
        //hrana nije dodata u bazu
        echo "<tr> <td colspan='7' class='error'> Food not Added Yet.</td></tr>";
    }
    
   ?>
   
    </table>

</div>
</div>

<?php include('partials/footer.php');?>