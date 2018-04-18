<?php
get_header(); ?>
    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7 col-lg-9">
                    <h2 class="section-title"><? the_title() ?></h2>
                    <div class="parent-bank-item bank-item default-block">
                        <div class="head d-flex align-items-center justify-content-between">
                            <div class="d-flex flex-wrap align-items-center">
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
                        <p class="title"><b><? the_title() ?></b><!--<span class="city">Ярославль</span>--></p>
                        <p class="details">
                            <b>Адрес:</b> <? the_field( 'адрес' ) ?><br>
                            <b>Телефон:</b> <? the_field( 'телефон' ) ?><br>
                            <b>Часы работы:</b> <? the_field( 'часы_работы' ) ?><br>
							<? $link = get_field( 'официальный_сайт' ) ?>
                            <b>Официальный сайт:</b> <a href="<?= $link['url']; ?>"
                                                        target="<?= $link['target']; ?>"><?= $link['title']; ?></a>
                        </p>
                        <ul class="types d-flex flex-wrap">
							<?
							$credits = get_posts( [
								'numberposts' => - 1,
								'post_type'   => 'credit',
								'meta_key'    => 'банк',
								'meta_value'  => get_the_ID()
							] );
							$types   = [];
							foreach ( $credits as $credit ) {
								$terms = wp_get_post_terms( $credit->ID, 'type' );
								foreach ( $terms as $term ) {
									if ( ! in_array( $term, $types ) ) {
										array_push( $types, $term );
									}
								}
							}
							?>
							<?
							if (  !isset( $_GET['cat'] ) ) {
								foreach ( $types as $type ): ?>
                                    <li><a href="<?= '?cat=' . $type->term_id ?>"><?= $type->name ?></a></li>
								<? endforeach;
							} ?>
                        </ul>
                        <div class="foot d-flex justify-content-between align-items-center">
                            <!--todo-->
                            <div class="count-today">
                                <div class="circle"><? the_field('заявок-сегодня')  ?></div>
                                <p>Заявок<br> одобрено сегодня</p></div>
                            <!--todo-->
                            <a href="<?= get_field( 'стандартная_форма' ) ? get_permalink( 123 ) : get_field( 'внешняя_ссылка' ) ?>"
                               class="button">Оформить</a>
                        </div>
                    </div>
					<?
					$internet = get_field( 'интернет_банк' );
					if ( $internet ):
						?>
                        <a href="<?= get_permalink( $internet ) ?>"
                           class="banner-bank d-flex justify-content-between align-items-center">
                            <p class="title">Интернет-банк<br><span>«<? the_title() ?>»</span></p>
                            <img src="<?= path() ?>img/banner-bank.png" alt="" class="women">
                            <div class="button">Все о интернет-банке</div>
                        </a>
					<? endif; ?>
					<?
					if ( isset( $_GET['cat'] ) && get_term( $_GET['cat'], 'type' ) ):?>
                        <ul class="nav tabs-list d-flex flex-wrap align-items-center">
							<?
							$i = 1;
							foreach ( $types as $type ): ?>
                                <li class="nav-item">
                                    <a class="nav-link <?= $type->term_id == $_GET['cat'] ? 'active' : '' ?>"
                                       data-toggle="tab"
                                       href="#tab-<?= $i ?>"><?= $type->name ?></a>
                                </li>
								<?
								$i ++;
							endforeach; ?>
                        </ul>
                        <div class="tab-content">
							<?
							$i = 1;
							foreach ( $types as $type ): ?>
                                <div class="tab-pane fade show active <?= $type->term_id == $_GET['cat'] ? 'active-real' : '' ?>"
                                     id="tab-<?= $i ?>">
									<?
									$credits = get_posts( [
										'numberposts' => - 1,
										'post_type'   => 'credit',
										'meta_key'    => 'банк',
										'meta_value'  => get_the_ID(),
										'tax_query'   => [
											[
												'taxonomy' => 'type',
												'field'    => 'slug',
												'terms'    => $type->slug,
											]
										]
									] );
									foreach ( $credits as $post ) {
										get_template_part( 'template-parts/credit-card' );
										wp_reset_query();
									}
									?>
                                </div>
								<?
								$i ++;
							endforeach; ?>
                        </div>
					<? else: ?>
                        <div class="bank-item bank-details default-block">
                            <p class="title"><b>О банке</b><span class="city"><? the_title() ?></span></p>
                            <hr class="hr-more">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
								the_content();
							endwhile;
							else: ?>
							<?php endif; ?>
							<?//= do_shortcode( '[gdrts_stars_rating id="' . get_the_ID() . '"]' ) ?>
                        </div>
					<? endif; ?>
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
<?
getBanks();
get_footer() ?>