<?php include './skoljka2.php'?>

<!-- ========================= Main ==================== -->
<link rel="stylesheet" href="./style_new/help.css">
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

   
</script>

<div class="cardBoxHelp">
    <div class="cardHelp">

        <div>
        
            <div class="cardNamee"><span style="color:white;"><i class="fa-solid fa-circle-info"></i></span>  WHY WE USE ADMIN PANEL?</i></div>
            
            <div class="paragraf">
            Food delicious admin panel fully enables data manipulation.<br>
            <br>
            The administrator can delete, add new details or even change<br>
            the details   of existing products in food delicious.<br>
          
            <br>
            This mini admin app also gives admin permission to
             add change details or delete existing users.
     
            </div>
            
           
        </div>    
        

    </div>

    <div class="cardHelp">

        <div>
            
            <div class="cardNamee"><span style="color:white;"> <i class="fa-solid fa-user-tie"></i></span>  ADMIN DETAILS</div>
            <div class="paragraf">
            The admin details section provides information about the currently
            logged-in administrator on the system. The administrator can make 
            changes in the food delicious database. 
            <br>
</div>
        <div class="cardNamee"><span style="color:white;"> <i class="fa-solid fa-gauge"></i></span> DASHBOARD SECTION</div>
        <div class="paragraf">
        The dashboard section provides information about the
         available categories and food in the database,
         as well as the number of orders and total income when delivering food.
            </div>
           
            
            
        </div>    
        

    </div>

    <div class="cardHelp">

        <div>
        <i>
            <div class="cardNamee"><span style="color:white;"> <i class="fa-solid fa-users"></i></span> USERS SECTION</div> </i>
            <div class="paragraf">
            The users section displays information about each individual user,
             regardless of whether they are guests, users or administrators.
            <br><br>
            The add button opens a form where the administrator can add a new user to the database.
            The edit button opens a form where the administrator can make changes about the selected user.
            The delete button allows the administrator to delete any user from the database.
            </div>
            
           
        </div>    
        

    </div>

    <div class="cardHelp">

        <div>
            <i>
            <div class="cardNamee"><span style="color:white;"> <i class="fa-sharp fa-solid fa-burger"></i></span>CATEGORY AND PRODUCT SECTION</div></i>
            <div class="paragraf">
            The category and product section contains information about food categories and available products.
            Category and product sections display tables about all categories and products in the database.
            The add button opens a form where the administrator can add a new category or food.Also the edit button opens a form where the administrator can add changes to existing categories or products
            the delete button enables the deletion of any category or product chosen by the administrator.
            </div>
            
            
        </div>    
        

    </div>
</div>






<!-- =========== Scripts =========  -->
<script src="./dashboard.js"></script>