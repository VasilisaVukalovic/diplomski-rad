
<?php include './skoljka2.php'?>

 <!-- ========================= Main ==================== -->
 <div class="main" id="main">
       
       <div class="topbar">
           <div class="toggle">
           <i class="fas fa-align-left"></i>
           </div>
           <div class="user">
              <!-- <img src="../userimage/customer01.jpg" alt="">-->
             <span><i class="fa-solid fa-user-tie"></i> <?php echo $_SESSION['user']['first_name']?></span>
             <a href="./logout.php">Log out</a>
           </div>
       </div>
       
      <div id="slika">
     
       <img src="../foods_image/admin1.jpg" style="position:fixed; background-repeat: no-repeat; overflow: hidden;">
       <p>Welcome to administrator page!</p>
       </div>
</div>
        <!-- =========== Scripts =========  -->
    <script src="./dashboard.js"></script>
