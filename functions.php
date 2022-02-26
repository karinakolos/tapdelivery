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

add_filter( 'wp_nav_menu_items', 'change_nav_menu_items', 10, 2 );

function change_nav_menu_items( $items, $args ) {
	if ( 'header-menu' == $args->theme_location ) {
		$menu_items .= '
		<li class="menu-item has-children hidden-md hidden-lg"><a href="/my-account" class="nav-link">Мой аккаунт</a><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		viewBox="0 0 330 330" xml:space="preserve" class="dropdown-toggle">
   <path id="XMLID_225_" d="M325.607,79.393c-5.857-5.857-15.355-5.858-21.213,0.001l-139.39,139.393L25.607,79.393
	   c-5.857-5.857-15.355-5.858-21.213,0.001c-5.858,5.858-5.858,15.355,0,21.213l150.004,150c2.813,2.813,6.628,4.393,10.606,4.393
	   s7.794-1.581,10.606-4.394l149.996-150C331.465,94.749,331.465,85.251,325.607,79.393z"/>
   </svg>
		<ul class="dropdown">
			<li><a href="/my-account/edit-account/" class="nav-link">Личный кабинет</a></li>
			<li><a href="/my-account/leave_request/" class="nav-link">Отправить заявку</a></li>
			<li><a href="/my-account/send_code/" class="nav-link">Отправить код</a></li>
			<li><a href="/my-account/edit_address/" class="nav-link">Изменить адрес доставки</a></li>
			<li><a href="/my-account/instruction/" class="nav-link">Инструкция</a></li>
			<li><a href="' . wp_logout_url() . '" class="nav-link">Выйти</a></li>
		</ul>
		</li>';
		$new_items = $items . $menu_items;
	}

	return $new_items;
}

/*CUSTOM ENDPOINTS TO ACCOUNT PAGE*/

add_filter ( 'woocommerce_account_menu_items', 'silva_remove_my_account_links' );
function silva_remove_my_account_links( $menu_links ){
    unset( $menu_links['downloads'] ); 
	//unset( $menu_links['dashboard'] ); // Remove Dashboard
	unset( $menu_links['payment-methods'] ); // Remove Payment Methods
	unset( $menu_links['orders'] ); // Remove Orders
	//unset( $menu_links['downloads'] ); // Disable Downloads
	//unset( $menu_links['edit-account'] ); // Remove Account details tab
	//unset( $menu_links['customer-logout'] ); // Remove Logout link
	unset( $menu_links['edit-address'] );
	return $menu_links;
}


//ОФОРМИТЬ ЗАЯВКУ

add_filter ( 'woocommerce_account_menu_items', 'leave_request_endpoint', 40 );
function leave_request_endpoint( $menu_links ){
 
	$menu_links = array_slice( $menu_links, 0, 2, true ) 
	+ array( 'leave_request' => 'Оформить заявку' )
	+ array_slice( $menu_links, 2, NULL, true );
 
	return $menu_links;
 
}

add_action( 'init', 'leave_request_add_endpoint' );
function leave_request_add_endpoint() {
 
	add_rewrite_endpoint( 'leave_request', EP_PAGES );
 
}

add_action( 'woocommerce_account_leave_request_endpoint', 'leave_request_endpoint_content' );
function leave_request_endpoint_content() {
	?>
	<span class="check-text h4" id="#check"></span>
	<div class="form-block">
		<?php
		echo do_shortcode('[contact-form-7 id="34"]');
		?>
	</div>
	<?php
}

//ОТправить код

add_filter ( 'woocommerce_account_menu_items', 'send_code_endpoint', 40 );
function send_code_endpoint( $menu_links ){
 
	$menu_links = array_slice( $menu_links, 0, 3, true ) 
	+ array( 'send_code' => 'Отправить код' )
	+ array_slice( $menu_links, 3, NULL, true );
 
	return $menu_links;
 
}

add_action( 'init', 'send_code_add_endpoint' );
function send_code_add_endpoint() {
 
	add_rewrite_endpoint( 'send_code', EP_PAGES );
 
}

add_action( 'woocommerce_account_send_code_endpoint', 'send_code_endpoint_content' );
function send_code_endpoint_content() {
	?>
	<span class="check-text h4" id="#check"></span>
	<div class="form-block">
		<?php
		echo do_shortcode('[contact-form-7 id="35"]');
		?>
	</div>
	<?php
}

//Изменить адрес доставки

add_filter ( 'woocommerce_account_menu_items', 'edit_address_endpoint', 40 );
function edit_address_endpoint( $menu_links ){
 
	$menu_links = array_slice( $menu_links, 0, 3, true ) 
	+ array( 'edit_address' => 'Изменить адрес доставки' )
	+ array_slice( $menu_links, 3, NULL, true );
 
	return $menu_links;
 
}

add_action( 'init', 'edit_address_add_endpoint' );
function edit_address_add_endpoint() {
 
	add_rewrite_endpoint( 'edit_address', EP_PAGES );
 
}

add_action( 'woocommerce_account_edit_address_endpoint', 'edit_address_endpoint_content' );
function edit_address_endpoint_content() {
	?>
	<span class="check-text h4" id="#check"></span>
	<div class="form-block">
		<?php
		echo do_shortcode('[contact-form-7 id="5"]');
		?>
	</div>
	<?php
}

//Как заказать

add_filter ( 'woocommerce_account_menu_items', 'instruction_endpoint', 40 );
function instruction_endpoint( $menu_links ){
 
	$menu_links = array_slice( $menu_links, 0, 4, true ) 
	+ array( 'instruction' => 'Как заказать?' )
	+ array_slice( $menu_links, 4, NULL, true );
 
	return $menu_links;
 
}

add_action( 'init', 'instruction_add_endpoint' );
function instruction_add_endpoint() {
 
	add_rewrite_endpoint( 'instruction', EP_PAGES );
 
}

add_action( 'woocommerce_account_instruction_endpoint', 'instruction_endpoint_content' );
function instruction_endpoint_content() {
	?>
	<span class="check-text h4" id="#check"></span>
	<div class="form-block">
		<?php
		echo do_shortcode('[contact-form-7 id="5"]');
		?>
	</div>
	<?php
}



function wpb_woo_my_account_order() {
	$myorder = array(
		'edit-account'       => __( 'Личный кабинет', 'woocommerce' ),
		'leave_request'       => __( 'Отправить заявку', 'woocommerce' ),
		'send_code'       => __( 'Отправить код', 'woocommerce' ),
		'edit_address'       => __( 'Изменить адрес доставки', 'woocommerce' ),
		'instruction'       => __( 'Как заказать?', 'woocommerce' ),
		'customer-logout'       => __( 'Выйти', 'woocommerce' ),
	);

	return $myorder;
}
add_filter ( 'woocommerce_account_menu_items', 'wpb_woo_my_account_order' );