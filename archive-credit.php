<?php
get_header(); ?>
    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7 col-lg-9">
                    <h2 class="section-title"><?= is_tax() ? single_cat_title() : 'Кредиты' ?></h2>
					<?
					if ( have_posts() ):
						while ( have_posts() ):the_post();
							$bank = get_field( 'банк', $post->ID )->ID;
							?>
							<? if ( $i == 3 ): ?>
								<? getAdsense() ?>
							<? endif;
							get_template_part( 'template-parts/credit-card' );
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