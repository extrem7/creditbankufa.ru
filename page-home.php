<? /* Template Name: Главная */
get_header(); ?>
<div id="banner" class="carousel slide banner" data-ride="carousel" data-interval="10000">
    <div class="carousel-inner" role="listbox">
		<?
		$status = 'active';
		while ( have_rows( 'карусель' ) ) : the_row() ?>
            <div class="carousel-item <?= $status ?>"
                 style="background-image: url('<? the_sub_field( 'картинка' ) ?>')">
                <div class="container">
                    <p class="title"><? the_sub_field( 'заголовок' ) ?></p>
                    <p class="text"><? the_sub_field( 'текст' ) ?></p>
                    <a href="<? the_sub_field( 'ссылка' ) ?>" class="button"><? the_sub_field( 'кнопка' ) ?></a>
                </div>
            </div>
			<?
			$status = null;
		endwhile; ?>
    </div>
    <div class="container">
        <ol class="carousel-indicators d-flex align-items-center">
			<?
			$status = true;
			$li     = 0;
			while ( have_rows( 'карусель' ) ) : the_row() ?>
                <li data-target="#banner" data-slide-to="<?= $li ?>" class="<?= $status ? 'active' : '' ?>"></li>
				<?
				$status = false;
				$li ++;
			endwhile; ?>
        </ol>
    </div>
</div>
<section class="middle">
    <div class="container">
        <div class="row justify-content-center justify-content-xl-between">
            <div class="news col-xl-7">
                <h2 class="section-title title-popover">Самые свежие темы <a href="<?= get_category_link( 1 ) ?>"
                                                                             class="popover popover-right bs-popover-right">
                        <div class="arrow"></div>
                        СМОТРЕТЬ ВСЕ ТЕМЫ</a></h2>
				<?
				$news = get_posts( [
					'numberposts' => 4,
					'category'    => 1
				] );
				?>
                <div class="share-vk">
                    <script type="text/javascript" async>
                        document.write(VK.Share.button(false, {type: 'button', text: 'Поделиться'}));
                    </script>
                </div>
                <article class="big d-flex flex-column flex-md-row">
                    <a href="<?= get_permalink( $news[0]->ID ) ?>">
                        <div class="photo"
                             style="background-image: url('<?= get_the_post_thumbnail_url( $news[0]->ID ) ?>')"></div>
                    </a>
                    <div class="content">
                        <a href="<?= get_permalink( $news[0]->ID ) ?>"><h4><?= $news[0]->post_title ?></h4></a>
                        <p class="text"><?= $news[0]->post_excerpt ?></p>
                        <p class="date"><span class="icon-date"></span><?= get_the_date( '', $news[0]->ID ) ?></p>
                    </div>
                </article>
                <hr class="hr-more">
                <div class="d-flex flex-wrap justify-content-around justify-content-md-between">
                    <article>
                        <a href="<?= get_permalink( $news[1]->ID ) ?>">
                            <div class="photo"
                                 style="background-image: url('<?= get_the_post_thumbnail_url( $news[1]->ID ) ?>')"></div>
                            <h4><?= $news[1]->post_title ?></h4></a>
                        <p class="date"><span class="icon-date"></span> <?= get_the_date( '', $news[1]->ID ) ?></p>
                    </article>
                    <article>
                        <a href="<?= get_permalink( $news[2]->ID ) ?>">
                            <div class="photo"
                                 style="background-image: url('<?= get_the_post_thumbnail_url( $news[2]->ID ) ?>')"></div>
                            <h4><?= $news[2]->post_title ?></h4></a>
                        <p class="date"><span class="icon-date"></span> <?= get_the_date( '', $news[2]->ID ) ?></p>
                    </article>
                    <article>
                        <a href="<?= get_permalink( $news[3]->ID ) ?>">
                            <div class="photo"
                                 style="background-image: url('<?= get_the_post_thumbnail_url( $news[3]->ID ) ?>')"></div>
                            <h4><?= $news[3]->post_title ?></h4></a>
                        <p class="date"><span class="icon-date"></span> <?= get_the_date( '', $news[3]->ID ) ?></p>
                    </article>
                </div>
            </div>
			<? getCredits() ?>
        </div>
    </div>
</section>
<section class="banks-articles">
    <div class="container">
        <h2 class="section-title title-popover">Интернет банк <a
                    href="<?= get_post_type_archive_link( 'internet-bank' ) ?>"
                    class="popover popover-right bs-popover-right">
                <div class="arrow"></div>
                ВСЕ БАНКИ</a></h2>
        <div class="row justify-content-around justify-content-xl-between">
			<?
			$internet = get_field( 'интернет_банки' );
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
<? getReviews() ?>
<section class="questions">
	<?
	$cats = get_field( 'категории-новостей' );
	?>
    <div class="container d-flex flex-wrap justify-content-between">
		<? for ( $i = 0; $i < 3; $i ++ ): ?>
            <div class="column">
                <a href="<?= get_term_link( $cats[ $i ] ) ?>"><h3 class="section-title"><?= $cats[ $i ]->name ?></h3>
                </a>
				<? $news = get_posts( [ 'category' => $cats[ $i ]->term_id, 'numberposts' => 3 ] );
				?>
                <article>
                    <a href="<?= get_permalink( $news[0]->ID ) ?>">
                        <div class="photo" style="background-image: url('<?= get_the_post_thumbnail_url( $news[0]->ID, [
							80,
							80
						] ) ?>')"></div>
                        <div class="title"><?= $news[0]->post_title ?></div>
                    </a>
                </article>
                <article>
                    <a href="<?= get_permalink( $news[1]->ID ) ?>">
                        <div class="photo" style="background-image: url('<?= get_the_post_thumbnail_url( $news[1]->ID, [
							80,
							80
						] ) ?>')"></div>
                        <div class="title"><?= $news[1]->post_title ?></div>
                    </a>
                </article>
                <article>
                    <a href="<?= get_permalink( $news[2]->ID ) ?>">
                        <div class="photo" style="background-image: url('<?= get_the_post_thumbnail_url( $news[2]->ID, [
							80,
							80
						] ) ?>')"></div>
                        <div class="title"><?= $news[2]->post_title ?></div>
                    </a>
                </article>
            </div>
		<? endfor; ?>
    </div>
</section>
<?
getBanks();
get_footer() ?>
