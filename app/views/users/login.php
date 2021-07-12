<?php
    require APP_ROOT . '/views/templates/head.php';
?>

<div class="nav-bar">
    <?php   
        require APP_ROOT . '/views/templates/navigation.php';
    ?>
</div>
<div class="container-login">
    <div class="wrapper-login">
        <h2>Sign In</h2>

        <form action="<?php echo URL_ROOT?>/loginController/login" method="POST">
            <input type="text" placeholder="Username*" name="username" value="<?php echo $data['username']?>">
            <span class="invalidFeedback">
                <?php echo $data['errorUsername'];?>
            </span>

            <input type="password" placeholder="Password*" name="password" value="<?php echo $data['password']?>">
            <span class="invalidFeedback">
                <?php echo $data['errorPassword'];?>
            </span>

            <button id="submit" type="submit" value="submit">Sign In</button>

            <p class="options">Not registered yet? <a href="<?php echo URL_ROOT?>/users/register    ">Register Here</a></p>
        </form>
    </div>
</div>