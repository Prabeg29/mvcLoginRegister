<nav class="top-menu">
    <ul>
        <li>
            <a href="<?php echo URL_ROOT?>/indexController/index">Home</a>
        </li>
        <li>
            <a href="<?php echo URL_ROOT?>/indexController/about">About</a>
        </li>
        <li>
            <a href="<?php echo URL_ROOT?>/indexController/projects">Projects</a>
        </li>
        <li>
            <a href="<?php echo URL_ROOT?>/indexController/blog">Blog</a>
        </li>
        <li>
            <a href="<?php echo URL_ROOT?>/indexController/contact">Contact</a>
        </li>
        <li class="btn-login">
            <?php if(SESSION::isLoggedIn()): ?>
                <a href="<?php echo URL_ROOT; ?>/loginController/logout">Logout</a>
            <?php else: ?>
                <a href="<?php echo URL_ROOT; ?>/loginController/login">Login</a>
            <?php endif;?>
        </li>
    </ul>
</nav>