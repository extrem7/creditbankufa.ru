<?php
// удаляет H2 из шаблона пагинации
add_filter( 'navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ) {
	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

//banks
add_action( 'init', 'register_banks' );

function register_banks() {
	register_post_type( 'bank', [
		'labels'        => [
			'name'               => 'Банки', // основное название для типа записи
			'singular_name'      => 'Банк', // название для одной записи этого типа
			'add_new'            => 'Добавить банк', // для добавления новой записи
			'add_new_item'       => 'Добавление банка', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование банка', // для редактирования типа записи
			'new_item'           => 'Новое', // текст новой записи
			'view_item'          => 'Смотреть банк', // для просмотра записи этого типа.
			'search_items'       => 'Искать банк', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Банки', // название меню
		],
		'public'        => true,
		'menu_position' => 4,
		'menu_icon'     => 'dashicons-building',
		'supports'      => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'comments' ),
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'banks' ),
	] );
	register_post_type( 'internet-bank', [
		'labels'        => [
			'name'               => 'Интернет банки', // основное название для типа записи
			'singular_name'      => 'Интернет банки', // название для одной записи этого типа
			'add_new'            => 'Добавить интернет банк', // для добавления новой записи
			'add_new_item'       => 'Добавление интернет банка', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование интернет банка', // для редактирования типа записи
			'new_item'           => 'Новое', // текст новой записи
			'view_item'          => 'Смотреть интернет банк', // для просмотра записи этого типа.
			'search_items'       => 'Искать интернет банк', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Интернет Банки', // название меню
		],
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-admin-site',
		'taxonomies'    => array( 'post_tag' ),
		'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'comments' ),
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'internet-banks' ),
	] );
	register_post_type( 'credit', [
		'labels'        => [
			'name'               => 'Кредиты', // основное название для типа записи
			'singular_name'      => 'Кредиты', // название для одной записи этого типа
			'add_new'            => 'Добавить кредит', // для добавления новой записи
			'add_new_item'       => 'Добавление кредита', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование кредита', // для редактирования типа записи
			'new_item'           => 'Новое', // текст новой записи
			'view_item'          => 'Смотреть кредит', // для просмотра записи этого типа.
			'search_items'       => 'Искать кредит', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Кредиты', // название меню
		],
		'public'        => true,
		'menu_position' => 6,
		'menu_icon'     => 'dashicons-cart',
		'supports'      => array( 'title', 'editor', 'custom-fields', 'comments' ),
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'credits' ),
	] );
	register_taxonomy( 'city', array( 'bank' ), array(
		'label'                 => '',
		// определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Город',
			'singular_name'     => 'Город',
			'search_items'      => 'Искать город',
			'all_items'         => 'Все города',
			'view_item '        => 'Смотреть город',
			'parent_item'       => 'Parent город',
			'parent_item_colon' => 'Parent город:',
			'edit_item'         => 'Редактировать город',
			'update_item'       => 'Обновить город',
			'add_new_item'      => 'Добавить город',
			'new_item_name'     => 'Название города',
			'menu_name'         => 'Городa',
		),
		'description'           => '',
		// описание таксономии
		'public'                => true,
		'publicly_queryable'    => null,
		// равен аргументу public
		'show_in_nav_menus'     => true,
		// равен аргументу public
		'show_ui'               => true,
		// равен аргументу public
		'show_tagcloud'         => true,
		// равен аргументу show_ui
		'show_in_rest'          => null,
		// добавить в REST API
		'rest_base'             => null,
		// $taxonomy
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		// callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false,
		// Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
		// по умолчанию значение show_ui
	) );
	register_taxonomy( 'type', array( 'credit' ), array(
		'label'                 => '',
		// определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Тип',
			'singular_name'     => 'Тип',
			'search_items'      => 'Искать тип',
			'all_items'         => 'Все тип',
			'view_item '        => 'Смотреть тип',
			'parent_item'       => 'Parent тип',
			'parent_item_colon' => 'Parent тип:',
			'edit_item'         => 'Редактировать тип',
			'update_item'       => 'Обновить тип',
			'add_new_item'      => 'Добавить тип',
			'new_item_name'     => 'Название типа',
			'menu_name'         => 'Типы кредитов',
		),
		'description'           => '',
		// описание таксономии
		'public'                => true,
		'publicly_queryable'    => null,
		// равен аргументу public
		'show_in_nav_menus'     => true,
		// равен аргументу public
		'show_ui'               => true,
		// равен аргументу public
		'show_tagcloud'         => true,
		// равен аргументу show_ui
		'show_in_rest'          => null,
		// добавить в REST API
		'rest_base'             => null,
		// $taxonomy
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		// callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false,
		// Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null,
		// по умолчанию значение show_ui
	) );
}

function getStars( $id ) {
	echo do_shortcode( '[gdrts_stars_rating id="' . $id . '" style_class="stars" style_size="17"]' );
}

function compareForm( $id ) {
	$active = in_array( $id, $_SESSION['compare'] ) ? 'active' : '';
	ob_start(); ?>
    <form method="post" class="control-block">
        <!--<a href="" class="btn-wishlist">В избраное</a>-->
        <input type="hidden" name="add_id" value="<?= $id ?>">
        <a href="" class="btn-compare <?= $active ?>"><?= $active ? 'В сравнении' : 'Сравнить' ?></a>
    </form>
	<?
	ob_end_flush();
}