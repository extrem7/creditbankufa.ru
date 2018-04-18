<? require_once "includes/controller.php"; ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= wp_get_document_title() ?></title>
		<? wp_head() ?>
		<? if ( is_front_page() ): ?>
            <script type="text/javascript" src="https://vk.com/js/api/share.js?93" charset="windows-1251"></script>
		<? endif; ?>
    </head>
<body <? body_class() ?>>
<header class="header">
    <div class="top">
        <div class="container d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <div class="city">
                <span class="icon-map"></span>
                Мой город: <u> <? global $city;
					$city = get_term( $_SESSION['city'], 'city' );
					echo $city->name ?></u> <a href="" data-toggle="dropdown">/ выбрать другой</a>
                <ul class="dropdown-menu">
					<?
					$cities = get_terms( 'city' );
					foreach ( $cities as $li ):
						if ( $li->term_id == $_SESSION['city'] ) {
							continue;
						}
						?>
                        <li>
                            <a href="<?= explode( '?', $_SERVER['REQUEST_URI'], 2 )[0] ?>?c=<?= $li->term_id ?>"><?= $li->name ?></a>
                        </li>
					<? endforeach; ?>
                </ul>
            </div>
			<? get_search_form() ?>
        </div>
    </div>
    <div class="bottom">
        <div class="container d-flex  flex-column flex-md-row justify-content-between align-items-center">
            <a href="/" class="logo d-flex align-items-center">
                <img <? the_image( 'лого', 'option' ) ?>>
                <p>БАНКИ<b><?= $city->description ?></b></p>
            </a>
            <ul class="menu d-flex flex-column flex-sm-row">
                <li><a href="<?= get_post_type_archive_link( 'bank' ) ?>">Банки</a></li>
                <li><a href="<?= get_permalink( 129 ) ?>">Рейтинги</a></li>
                <li><a href="#" class="dropdown-toggle">Сравнение
                        кредитов <?= ! empty( $_SESSION['compare'] ) ? '(' . count( $_SESSION['compare'] ) . ')' : '' ?></a>
                </li>
            </ul>
            <a href="<?= get_permalink( 123 ) ?>" class="button">Заявка на кредит</a>
        </div>
    </div>
    <div class="compare">
        <div class="container d-flex justify-content-center align-items-center">
			<? wp_nav_menu( [
				'menu'       => 'Хедер',
				'container'  => null,
				'items_wrap' => '<ul  class="menu d-flex">%3$s</ul>',
				'walker'     => new Bootstrap_Walker_Nav_Menu()
			] ); ?>
        </div>
    </div>
</header>
<?
if ( ! is_front_page() ) {
	print_breadcrumbs();
}
?>