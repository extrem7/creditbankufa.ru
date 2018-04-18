<?
$bank = get_field( 'банк', $post->ID )->ID;
?>
<div class="bank-item default-block">
    <div class="head d-flex align-items-center justify-content-between">
        <div class="d-flex flex-wrap align-items-center">
            <a href="<? the_permalink() ?>" class="logo"><img
                        src="<?= get_the_post_thumbnail_url( $bank ) ?>" alt=""></a>
			<? getStars( get_the_ID() ) ?>
			<? if ( is_archive() ): ?>
                <a href="<? the_permalink( $bank ) ?>" class="reviews-count">Адрес и контакты банка</a>
			<? else:
				if ( get_comments_number() ): ?>
                    <a href="<? the_permalink() ?>"
                       class="reviews-count"><?= reviews( get_comments_number() ) ?></a>
				<? endif; endif; ?>
        </div>
		<? compareForm( $bank ) ?>
    </div>
    <p class="title"><b><? the_title() ?></b></p>
    <p class="details">
       <? the_field('дополнительная-информация') ?>
    </p>
	<? if ( is_archive() ): ?>
        <div class="foot d-flex justify-content-between align-items-center">
            <div class="count-today">
                <div class="circle"><? the_field( 'заявок-сегодня' ) ?></div>
                <p>Заявок<br> одобрено сегодня</p></div>
            <a href="<?= get_field( 'стандартная_форма' ) ? get_permalink( 123 ) : get_field( 'внешняя_ссылка' ) ?>"
               class="button">Оформить сейчас</a>
        </div>
	<? else: ?>
        <div class="foot d-flex align-items-center">
            <p class="time"><span class="icon-years"></span><? the_field( 'срок' ) ?></p>
            <p class="percent"><span class="icon-percent"></span><? the_field( 'ставка' ) ?></p>
            <p class="money"><span
                        class="icon-coin"></span><? the_field( 'максимальная_сумма' ) ?></p>
        </div>
		<?
		if ( have_rows( 'подробнее' ) ):
			?>
            <ul class="more">
				<?
				while ( have_rows( 'подробнее' ) ) : the_row(); ?>
                    <li><? the_sub_field( 'элемент' ); ?></li>
				<?endwhile;
				?>
            </ul>
            <a href="" class="button show-more">Подробнее</a>
		<? endif;
	endif; ?>
</div>