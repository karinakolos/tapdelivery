<?php

//* * Register Menus * *//

function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'footer-menu' => __( 'Footer Menu' )
      )
    );
  }
  add_action( 'init', 'register_my_menus' );

//* * Register Custom Navigation Walker * *//

function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );



//* * register widget areas * *//

function register_my_widgets(){
	register_sidebar( array(
		'name' => "Правая боковая панель сайта",
		'id' => 'right-sidebar',
		'description' => 'Эти виджеты будут показаны в правой колонке сайта',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
}
add_action( 'widgets_init', 'register_my_widgets' );


function register_my_widgets_footer_column_1(){
	register_sidebar( array(
		'name' => 'Footer Column 1',
		'id' => 'footer_column_1',
		'description' => 'Виджет в футере 1',
		'before_widget' => '<div class="footer-widget-block-1">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'register_my_widgets_footer_column_1' );

function register_my_widgets_footer_column_2(){
	register_sidebar( array(
		'name' => 'Footer Column 2',
		'id' => 'footer_column_2',
		'description' => 'Виджет в футере 2',
		'before_widget' => '<div class="footer-widget-block-2">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'register_my_widgets_footer_column_2' );

function register_my_widgets_footer_column_3(){
	register_sidebar( array(
		'name' => 'Footer Column 3',
		'id' => 'footer_column_3',
		'description' => 'Виджет в футере 3',
		'before_widget' => '<div class="footer-widget-block-3">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'register_my_widgets_footer_column_3' );

function register_my_widgets_footer_column_4(){
	register_sidebar( array(
		'name' => 'Footer Column 4',
		'id' => 'footer_column_4',
		'description' => 'Виджет в футере 4',
		'before_widget' => '<div class="footer-widget-block-4">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'register_my_widgets_footer_column_4' );

//* * Remove WP auto adding <p> * *//

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

//* * Add miniatures support * *//

add_theme_support( 'post-thumbnails' ); //

//* * Add pagination * *//

function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</div>\n";
    }
}

wp_enqueue_script('my-custom-script', get_template_directory_uri() .'/assets/utils/jquery/jquery-3.6.0.min.js', array('jquery'), null, true);

/* *Add custom links in responsive menu* */

/*add_filter( 'wp_nav_menu_items', 'change_nav_menu_items', 10, 2 );

function change_nav_menu_items( $items, $args ) {
	if ( 'header-menu' == $args->theme_location ) {
		$first_menu_item .= '
		<li class="hidden-lg"><a href="tel:+79699995685">+7 (969) 999 56 85</a></li>
		<li class="hidden-lg menu-mail"><a href="mailto:info@indiba.com.ru">info@indiba.com.ru</a></li>';
		$new_items = $first_menu_item . $items;
	}

	return $new_items;
}*/