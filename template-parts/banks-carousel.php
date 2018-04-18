<section class="partners">
    <div class="container">
        <h2 class="section-title title-popover">Банки
            <a href="<?= get_post_type_archive_link( 'bank' ) ?>" class="popover popover-right bs-popover-right">
                <div class="arrow"></div>
                ВСЕ БАНКИ</a></h2>
        <div id="banks" class="carousel slide container" data-ride="carousel" data-interval="10000">
            <div class="carousel-inner" role="listbox">
				<?
				global $city;
				$args   = [
					'post_type'      => 'bank',
					'posts_per_page' => - 1,
					'tax_query'      => [
						[
							'taxonomy' => 'city',
							'field'    => 'slug',
							'terms'    => $city->slug,
						]
					]
				];
				$banks  = array_chunk( get_posts( $args ), 6 );
				$status = 'active';
				foreach ( $banks as $row ):
					?>
                    <div class="carousel-item <?= $status ?>">
                        <div class="d-flex flex-wrap justify-content-around justify-content-xl-between align-items-center">
							<?
							foreach ( $row as $post ):?>
                                <a href="<? the_permalink() ?>"><? the_post_thumbnail() ?></a>
							<? endforeach; ?>
                        </div>
                    </div>
					<?
					$status = '';
				endforeach;
				wp_reset_postdata();
				?>
            </div>
            <a class="carousel-control-prev" href="#banks" data-slide="prev"><span
                        class="carousel-arrow"></span></a>
            <a class="carousel-control-next" href="#banks" data-slide="next"><span
                        class="carousel-arrow"></span></a>
        </div>
    </div>
</section>