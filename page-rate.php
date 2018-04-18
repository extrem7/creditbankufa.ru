<?php
/* Template Name: Рейтинги */
get_header(); ?>
    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7 col-lg-9">
                    <h2 class="section-title"><? the_title() ?></h2>
                    <div class="table-scroll">
                        <table class="rate-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Название банка</th>
                                <th>Рейтинг</th>
                                <th>Отзывы</th>
                                <th>Процентная ставка</th>
                            </tr>
                            </thead>
							<?= do_shortcode( '[gdrts_stars_rating_list orderby="votes" limit="-1"]' ) ?>
                        </table>
                    </div>
	                <? getAdsense() ?>
                </div>
				<? getCredits() ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>