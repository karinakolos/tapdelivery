<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head() ?>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/utils/flexboxgrid/flexboxgrid.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/utils/splide/splide-core.min.css">
</head>

<body class="<? if(  current_user_can('administrator') ) { echo 'is_admin';} ?>">
<h1 class="visuallyhidden"></h1>
    <header>
        <div class="header" id="header">
            <div class="container navbar">
                <nav>
                    <a class="navbar__brand" href="/">
                        <img src="" data-skip-lazy="" width="" height="" style="width:100%; height:auto;" alt="">
                    </a>

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

                    <span id="toggle-nav">
                        <i class="icon-bars" data-icon="a"></i>
                    </span>
                </nav>
            </div>
        </div>
    </header>