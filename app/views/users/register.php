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
        <h2><?php echo $data['title']?></h2>

        <form action="<?php echo URL_ROOT?>/registerController/register" method="POST">
            <input type="text" placeholder="Username*" name="username" value="<?php echo $data['username']?>">
            <span class="invalidFeedback">
                <?php echo $data['errorUsername'];?>
            </span>

            <input type="text" placeholder="Email*" name="email" value="<?php echo $data['email']?>">
            <span class="invalidFeedback">
                <?php echo $data['errorEmail'];?>
            </span>

            <input type="password" placeholder="Password*" name="password" value="<?php echo $data['password']?>">
            <span class="invalidFeedback">
                <?php echo $data['errorPassword'];?>
            </span>

            <input type="password" placeholder="Confirm Password*" name="confirmPassword" value="<?php echo $data['confirmPassword']?>">
            <span class="invalidFeedback">
                <?php echo $data['errorConfirmPassword'];?>
            </span>

            <button id="submit" type="submit" value="submit">Register</button>
    
        </form>
    </div>
</div>