<?php
get_header(); ?>
    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7 col-lg-9">
                    <h1 class="section-title"><? single_cat_title() ?></h1>
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post() ?>
                            <a href="<? the_permalink() ?>" class="news-item default-block">
                                <h3 class="title"><? the_title() ?></h3>
								<? the_post_thumbnail() ?>
                                <p class="about"><? the_excerpt() ?></p>
                                <span class="d-flex justify-content-between align-items-center">
	                            <? getStars(get_the_ID()) ?>
								<? if ( get_comments_number() ): ?>
                                    <p class="reviews-count"><? comments_number( 'Нету комментариев', 'Один комментарий', '% комментарий' ); ?></p>
								<? endif; ?>
                                    </span>
                            </a>
						<?
						endwhile;
					endif;
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
					?>
                </div>
				<? getCredits() ?>
            </div>
        </div>
    </section>
<?
getBanks();
get_footer() ?>