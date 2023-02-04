<?php
include '../connection/connection.php';
?>




<html>
    <head>
        <title>Food Order-Login Page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    
   
   <div class="login">
   <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }

    if(isset($_SESSION['no-login-message']))
    {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
    }
    ?>
   <h1>Login</h1>
   <br/>
    <!--Login Form Starts Here-->
        <form action="./login_check.php" method="POST">
                Username:<br>
                <input type="text" name="username" placeholder="Enter Username"><br/><br/>
        
                Password:<br>
                <input type="password" name="password" placeholder="Enter Password"><br/><br/>

                <input type="submit" name="submit" value="Login" class="btn_log">
            

        </form>
</div>
<!--Login Form Ends Here-->
    </body>
</html>

