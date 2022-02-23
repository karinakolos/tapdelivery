<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head() ?>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/utils/flexboxgrid/flexboxgrid.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.min.css" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/utils/splide/splide-core.min.css">
</head>

<body class="<? if(  is_user_logged_in() ) { echo 'logged-in';} ?>">
<h1 class="visuallyhidden"></h1>
    <header>
        <div class="header" id="header">
            <div class="container navbar">
                <nav>
                    <a class="navbar__brand" href="/">
                        <img src="/wp-content/uploads/2022/02/logo_tap.svg" data-skip-lazy="" width="274" height="100" style="width:100%; height:auto;" alt="">
                    </a>
                    
                    <div class="header__menu">
                    <?php 
                    
                        wp_nav_menu(array(
                        'theme_location' => 'header-menu',            
                        'container'       => 'div',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id'    => 'navbar-header',
                        'menu_class'      => 'navbar-nav mx-auto ',
                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                        )); 

                    ?>
                    <div class="header__menu-buttons">
                        <a class="header__menu-button register-btn xoo-el-reg-tgr">Регистрация</a>
                        <a class="header__menu-button header__menu-button_aqua signin-btn xoo-el-login-tgr">Войти</a>
                    </div>
                    </div>
                    <span id="toggle-nav">
                        <i class="icon-bars" data-icon="a"></i>
                    </span>
                </nav>
            </div>
        </div>
    </header>