<?php
session_start();
require_once 'includes/bootstrap_menu.php';
require_once 'includes/breadcrumbs.php';
require_once 'includes/bank_setup.php';
require_once 'includes/speed_up.php';
//wp setup
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
add_theme_support( 'widgets' );
show_admin_bar( false );
//register css|js
function registerThemeStyles() {
	wp_register_style( 'main', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'main' );
}

add_action( 'wp_print_styles', 'registerThemeStyles' );
function registerThemeJs() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js' );
	wp_enqueue_script( 'jquery' );
	wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' );
	wp_enqueue_script( 'popper' );
	wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' );
	wp_enqueue_script( 'bootstrap' );
	wp_register_script( 'touchswipe', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js' );
	wp_enqueue_script( 'touchswipe' );
	/*if ( get_the_ID() == 123 ) {
		wp_register_script( 'input', get_template_directory_uri() . '/js/jquery.maskedinput.min.js' );
		wp_enqueue_script( 'input' );
	}*/
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js' );
	wp_enqueue_script( 'main' );
}

add_action( 'wp_enqueue_scripts', 'registerThemeJs' );
// remove admin-menu links
function remove_menus() {
	//remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'remove_menus' );

//cool functions for development
function path() {
	return get_template_directory_uri() . '/';
}

function phoneLink( $phone ) {
	return 'tel:' . preg_replace( '/[^0-9]/', '', $phone );
}

function the_image( $name, $id ) {
	echo 'src="' . get_field( $name, $id )['url'] . '" ';
	echo 'alt="' . get_field( $name, $id )['alt'] . '" ';
}

function the_checkbox( $field, $print, $post = null ) {
	if ( $post == null ) {
		global $post;
	}
	echo get_field( $field, $post ) ? $print : null;
}

function the_table( $field, $post = null ) {
	if ( $post == null ) {
		global $post;
	}
	$table = get_field( $field, $post );
	if ( $table ) {
		echo '<table>';
		if ( $table['header'] ) {
			echo '<thead>';
			echo '<tr>';
			foreach ( $table['header'] as $th ) {
				echo '<th>';
				echo $th['c'];
				echo '</th>';
			}
			echo '</tr>';
			echo '</thead>';
		}
		echo '<tbody>';
		foreach ( $table['body'] as $tr ) {
			echo '<tr>';
			foreach ( $tr as $td ) {
				echo '<td>';
				echo $td['c'];
				echo '</td>';
			}
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
}

function the_link( $field, $post = null, $classes = "" ) {
	if ( $post == null ) {
		global $post;
	}
	$link = get_field( $field, $post );
	if ( $link ) {
		echo "<a ";
		echo "href='{$link['url']}'";
		echo "class='$classes'";
		echo "target='{$link['target']}'>";
		echo $link['title'];
		echo "</a>";
	}
}

function repeater_image( $name ) {
	echo 'src="' . get_sub_field( $name )['url'] . '" ';
	echo 'alt="' . get_sub_field( $name )['alt'] . '" ';
}

function pre( $array ) {
	echo "<pre>";
	print_r( $array );
	echo "</pre>";
}

function reviews( $count ) {
	$count  = strval( $count );
	$char   = substr( $count, - 1 );
	$string = 'отзывов';
	switch ( $char ) {
		case 1:
			$string = 'отзыв';
			break;
		case 2:
			$string = 'отзыва';
			break;
		case 3:
			$string = 'отзыва';
			break;
		case 4:
			$string = 'отзыва';
			break;
	}

	return $count . ' ' . $string;
}

function getCredits() {
	get_template_part( 'template-parts/credits' );
}

function getReviews() {
	get_template_part( 'template-parts/reviews-carousel' );
}

function getBanks() {
	get_template_part( 'template-parts/banks-carousel' );
}

//options page
if ( function_exists( 'acf_add_options_page' ) ) {
	$main = acf_add_options_page( [
		'page_title' => 'Настройки темы',
		'menu_title' => 'Настройки темы',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false,
		'position'   => 2,
		'icon_url'   => 'dashicons-admin-customizer',
	] );
}

//widgets

function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Adsense',
		'id'            => 'adsens',
		'before_widget' => '',
		'class'         => 'adsens-block',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

}

add_action( 'widgets_init', 'arphabet_widgets_init' );

function getAdsense() {
	echo "<div class='adsens-wrapper'>";
	dynamic_sidebar( 'Adsense' );
	echo "</div>";
}

//title banks
function custom_title( $title_parts ) {
	if ( is_front_page() ) {
		$title_parts['title'] = $title_parts['title'] . ' ' . get_term( $_SESSION['city'], 'city' )->description;
	}
	if ( is_post_type_archive( 'bank' ) ) {
		$title_parts['title'] = $title_parts['title'] . ' ' . get_term( $_SESSION['city'], 'city' )->description;
		$title_parts['site']  = '';
	}

	return $title_parts;
}

add_filter( 'document_title_parts', 'custom_title' );
//search
function searchfilter( $query ) {

	if ( $query->is_search && ! is_admin() ) {
		$query->set( 'post_type', array( 'bank', 'credit', 'post' ) );
	}

	return $query;
}

add_filter( 'pre_get_posts', 'searchfilter' );

function themes_filter( $query ) {
	if ( ! is_main_query() ) {
		return $query;
	} else {
		$cat = get_queried_object()->term_id;
		if ( is_archive() && $cat == 1 ) {
			$query->set( 'category_name', null );
		}

		return $query;
	}
}

add_filter( 'pre_get_posts', 'themes_filter' );