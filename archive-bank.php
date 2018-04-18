<?php
get_header(); ?>
    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7 col-lg-9">
                    <h2 class="section-title">Банки</h2>
					<?
					global $city;
					$args     = [
						'posts_per_page' => get_option( 'posts_per_page' ),
						'paged'          => $paged,
						'tax_query'      => [
							[
								'taxonomy' => 'city',
								'field'    => 'slug',
								'terms'    => $city->slug,
							]
						]
					];
					$wp_query = new WP_Query( $args );
					$i        = 1;
					if ( $wp_query->have_posts() ):
						while ( $wp_query->have_posts() ):$wp_query->the_post();
							//$city = wp_get_post_terms( get_the_ID(), 'city' )[0]->name;
							?>
							<? if ( $i == 3 ): ?>
                                <a href="<?= get_permalink( 123 ) ?>" class="banner-answer d-flex justify-content-between align-items-center">
                                    <div class="orders d-flex align-items-center">
                                        <div class="circle">235</div>
                                        <div class="text">Анкет<br>одобрено</div>
                                    </div>
                                    <div class="women">
                                        <img src="<?= path() ?>img/banner-women.png" alt="">
                                        <div class="message">Ответ уже сегодня</div>
                                    </div>
                                    <div class="button">Оформить заявку</div>
                                </a>
							<? elseif ( $i == 5 ): ?>
								<? getAdsense() ?>
							<? endif; ?>
                            <div class="bank-item default-block">
                                <div class="head d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <a href="<? the_permalink() ?>" class="logo"><img
                                                    src="<? the_post_thumbnail_url() ?>" alt=""></a>
										<? getStars( get_the_ID() ) ?>
										<? if ( get_comments_number() ): ?>
                                            <a href="<? the_permalink() ?>"
                                               class="reviews-count"><?= reviews( get_comments_number() ) ?></a>
										<? endif; ?>
                                    </div>
	                                <? compareForm( get_the_ID() ) ?>
                                </div>
                                <p class="title"><b><? the_title() ?></b><!--<span
                                            class="city"><?//= $city ? $city : ''
									?></span>--></p>
                                <p class="details">
                                    <b>Адрес:</b> <? the_field( 'адрес' ) ?><br>
                                    <b>Телефон:</b> <? the_field( 'телефон' ) ?>
                                </p>
                                <hr class="hr-more">
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
								<? endif; ?>
                            </div>
							<?
							$i ++;
						endwhile;
						$args = array(
							'show_all'           => false,
							// показаны все страницы участвующие в пагинации
							'end_size'           => 2,
							// количество страниц на концах
							'mid_size'           => 2,
							// количество страниц вокруг текущей
							'prev_next'          => true,
							// выводить ли боковые ссылки "предыдущая/следующая страница".
							'prev_text'          => '<',
							'next_text'          => '>',
							'add_args'           => true,
							// Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
							'add_fragment'       => '',
							// Текст который добавиться ко всем ссылкам.
							'screen_reader_text' => '',
						);
						the_posts_pagination( $args );
					else:
						echo 'Ничего не найдено...';
					endif;
					?>
                </div>
				<? getCredits() ?>
            </div>
        </div>
    </section>
<?
getBanks();
get_footer() ?>