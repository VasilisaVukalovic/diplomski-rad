<?php include 'partials/menu.php';
include '../notification/notification.php';?>

<div class="menu-content">
    <div class="wrapper">

    <h1>Add Admin</h1><br/><br/>


    <form action="add_admin_base.php" method="POST">
    
        <table class="tbl_form_admin">
        <tr>
            <td>Full Name:</td>
            <td><input type="text" name="fullname" placeholder="Enter Your Name"></td>
        </tr>

        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" placeholder="Username" ></td>
        </tr>

        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" placeholder="Password"></td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" name="btn_add" value="Add Admin" class="btn-addAdmin">
                
                
            </td>
        </tr>
       
        </table>
        
    </form>

    </div>
</div>

<?php include 'partials/footer.php';?>