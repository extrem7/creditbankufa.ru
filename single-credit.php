<?php
get_header(); ?>
    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7 col-lg-9">
                    <h2 class="section-title"><? the_title() ?></h2>
                    <div class="parent-bank-item bank-item default-block">
						<?
						$bank = get_field( 'банк' );
						?>
                        <div class="head d-flex align-items-center justify-content-between">
                            <div class="d-flex flex-wrap align-items-center">
                                <a href="<? the_permalink( $bank->ID ) ?>" class="logo"><img
                                            src="<?= get_the_post_thumbnail_url( $bank->ID ) ?>" alt=""></a>
								<? getStars( get_the_ID() ) ?>
								<? if ( get_comments_number() ): ?>
                                    <a href="<? the_permalink() ?>"
                                       class="reviews-count"><?= reviews( get_comments_number() ) ?></a>
								<? endif; ?>
                            </div>
							<? compareForm( $bank->ID ) ?>
                        </div>
                        <p class="title"><b><? the_title() ?></b><!--<span class="city">Ярославль</span>--></p>
						<? $post = $bank ?>
                        <p class="details">
                            <b>Адрес:</b> <? the_field( 'адрес' ) ?><br>
                            <b>Телефон:</b> <? the_field( 'телефон' ) ?><br>
                            <b>Часы работы:</b> <? the_field( 'часы_работы' ) ?><br>
                            <b>Официальный сайт:</b> <? the_link( 'официальный_сайт' ) ?>
                        </p>
                        <hr>
						<? wp_reset_query() ?>
                        <p class="about"><?= wp_strip_all_tags( get_the_content() ) ?></p>
                        <div class="foot d-flex justify-content-between align-items-center">
                            <div class="count-today">
                                <div class="circle"><? the_field( 'заявок-сегодня' ) ?></div>
                                <p>Заявок<br> одобрено сегодня</p></div>
                            <a href="<?= get_field( 'стандартная_форма' ) ? get_permalink( 123 ) : get_field( 'внешняя_ссылка' ) ?>"
                               class="button">Оформить</a>
                        </div>
                        <img src="<?= path() ?>img/banner-women.png" alt="" class="women">
                    </div>
                    <ul class="nav tabs-list d-flex flex-wrap align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-1">Условия и ставки </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2">Требования и документы</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3">Выдача и погашение</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  active" data-toggle="tab" href="#tab-4">Отзывы</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="tab-1">
							<? the_table( 'условия' ) ?>
                        </div>
                        <div class="tab-pane fade" id="tab-2">
							<? the_field( 'требования' ) ?>
                        </div>
                        <div class="tab-pane fade" id="tab-3">
							<? the_field( 'выдача' ) ?>
                        </div>
                        <div class="tab-pane fade  show active" id="tab-4">
                            <div class="hide-form">
								<?
								comments_template(); ?>
                            </div>
							<? comment_form() ?>
                            <div class="stars-top">
								<?= do_shortcode( '[gdrts_stars_rating id="' . get_the_ID() . '"]' ) ?>
                            </div>
                        </div>
                    </div>
					<? getAdsense() ?>
                    <h2 class="section-title">Похожие кредиты</h2>
					<? $also = get_field( 'похожие_кредиты' );
					if ( empty( $also ) ) {
						$also = get_posts( [
							'numberposts' => 2,
							'post_type'   => 'credit',
							'exclude'     => [ get_the_ID() ]
						] );
					}
					foreach ( $also as $post ):
						get_template_part( 'template-parts/credit-card' );
					endforeach; ?>
                </div>
				<? getCredits() ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>