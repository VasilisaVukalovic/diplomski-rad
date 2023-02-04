<?php include('partials/menu.php');?>

<div class="menu-content">
    <div class="wrapper">

    
<?php  

if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}


if(isset($_SESSION['remove']))
{
    echo $_SESSION['remove'];
    unset($_SESSION['remove']);

}

if(isset($_SESSION['delete']))
{
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
    
}

if(isset($_SESSION['no-category-found']))
{
    echo $_SESSION['no-category-found'];
    unset($_SESSION['no-category-found']);
    

}

if(isset($_SESSION['update']))
{
    echo $_SESSION['update'];
    unset($_SESSION['update ']);
    

}

if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
    

}

if(isset($_SESSION['failed-remove']))
{
    echo $_SESSION['failed-remove'];
    unset($_SESSION['failed-remove']);
    

}
?>
        <h1>Manager Category</h1>


        <br><br>

        <!--Button to Add Admin-->
        <a href="add_category.php" class="btn-add">Add Category</a>

        <br><br>

        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            
            //upit koji uzima sve podatke iz baze za kategoriju
            $sql="SELECT * FROM table_category";

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
                    $image_name=$row['image_name'];
                    $featured=$row['featured'];
                    $active=$row['active'];
                 
                    ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title;?></td>
                        <td>
                            <?php
                            //provjera da li je slika ucitana ili nije
                            if($image_name!="")
                            {
                                //prikazi sliku
                                ?>
                                <img src="../images/category/<?php echo $image_name; ?>" alt="slika nije ucitana" width="70px;" height="60px;";>
                                <?php
                            } 
                            else
                            {
                                //prikazi poruku
                                echo "<div class='error'>Image not Added.</div>";

                            }
                             ?>
                        </td>
                        <td><?php echo $featured;?></td>
                        <td><?php echo $active;?></td>
            

                        <td>
                            <a href="../admin/update_category.php?id=<?php echo $id; ?>" class="btn-update">Update Category</a>
                            <a href="../admin/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-delete">Delete Category</a>
                         </td>
                    </tr>

                    <?php

                }
            }
            else
            {
                //ne postoje podaci u bazi
                //prikaz poruke unutar tabele
                ?>

                <tr>
                    <td colspan="6"><div class="error">No Category Added.</div></td>
                </tr>




                <?php


            }
            ?>

           
        </table>
    </div>
</div>
<?php include('partials/footer.php');?>
