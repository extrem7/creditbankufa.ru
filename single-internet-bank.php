<?php
get_header(); ?>
    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7 col-lg-9">
                    <div class="bank-item default-block">
						<?
						$bank = get_posts( [
							'numberposts' => 1,
							'post_type'   => 'bank',
							'meta_key'    => 'интернет_банк',
							'meta_value'  => get_the_ID()
						] )[0];
						setup_postdata( $bank );
						$post = $bank;
						?>
                        <div class="head d-flex align-items-center justify-content-between">
                            <div class="d-flex flex-wrap align-items-center">
                                <a href="<? the_permalink( ) ?>" class="logo"><img
                                            src="<?= get_the_post_thumbnail_url( ) ?>" alt=""></a>
								<? getStars( get_the_ID() ) ?>
								<? if ( get_comments_number() ): ?>
                                    <a href="<? the_permalink() ?>"
                                       class="reviews-count"><?= reviews( get_comments_number() ) ?></a>
								<? endif; ?>
                            </div>
                            <a href="<? the_permalink( ) ?>" class="button">Подробнее о банке</a>
                        </div>
                        <hr>
                        <div class="foot d-flex justify-content-between align-items-center">
                            <div class="count-today">
                                <div class="circle">17</div>
                                <p>Заявок<br> одобрено сегодня</p></div>
                            <a href="<?= get_field( 'стандартная_форма' ) ? get_permalink( 123 ) : get_field( 'внешняя_ссылка') ?>"
                               class="button">Оформить</a>
                        </div>
                        <img src="<?= path() ?>img/banner-women.png" alt="" class="women">
                    </div>
					<? wp_reset_postdata(); ?>
                    <h2 class="section-title"><? the_title() ?></h2>
                    <div class="internet-item default-block">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
							the_content();
						endwhile;
						else: ?>
						<?php endif; ?>
                    </div>
                    <div class="hide-form">
						<?
						comments_template(); ?>
                    </div>
					<? comment_form() ?>
                    <div class="stars-top">
						<?= do_shortcode( '[gdrts_stars_rating id="' . get_the_ID() . '"]' ) ?>
                    </div>
                </div>
				<? getCredits() ?>
            </div>
        </div>
    </section>
    <section class="banks-articles">
        <div class="container">
            <h2 class="section-title ">Другие статьи про интернет-банки</h2>
            <div class="row justify-content-around justify-content-xl-between">
				<?
				$internet = get_posts( [
					'numberposts' => 4,
					'exclude'     => [ get_the_ID() ],
					'post_type'   => 'internet-bank',
				] );
				foreach ( $internet as $post ):
					setup_postdata( $post );
					?>
                    <div class="col-xl-3 col-lg-5 col-md-6 col-sm-10">
                        <a href="<? the_permalink() ?>" class="item">
							<? if ( get_comments_number() ): ?>
                                <span class="count"><?= get_comments_number() ?></span>
							<? endif; ?>
                            <p class="title"><? the_title() ?></p>
                            <span class="logo"><? the_post_thumbnail() ?></span>
                            <p class="about"><? the_excerpt() ?></p>
                            <hr class="hr-more">
                            <p class="text-details">
                                <span class="icon-date"></span> <? the_date() ?>, <? the_author() ?>
                            </p>
                            <hr class="hr-more">
                            <p class="text-details"><span
                                        class="icon-tag"></span><?= implode( ', ', wp_get_post_tags( get_the_ID(), array( 'fields' => 'names' ) ) ) ?>
                            </p>
                            <hr class="hr-more">
                        </a>
                    </div>
				<? endforeach;
				wp_reset_postdata() ?>
            </div>
        </div>
    </section>
<?
getBanks();
get_footer() ?>