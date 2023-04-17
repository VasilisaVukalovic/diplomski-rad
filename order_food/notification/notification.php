<style>
    <?php include '../notification/notification.css';?>
</style>
<?php


if(isset($_COOKIE['error-notification']))
{
    ?>
    <div class="notice">
        <?=$_COOKIE['error-notification']?>
    </div>
    <?php
    setcookie("error-notification","",time()-10,"/");
}
?>