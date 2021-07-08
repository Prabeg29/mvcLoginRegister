<?php
    require APP_ROOT . '/views/templates/head.php';
?>

<div id="nav-bar">
    <?php   
        require APP_ROOT . '/views/templates/navigation.php';
    ?>
</div>

<div class="container-login">
    <div class="wrapper-login">
        <h2>Sign In</h2>

        <form action="<?php echo URL_ROOT?>/users/login" method="POST">
            
        </form>
    </div>
</div>