<section class="reviews-carousel">
	<?
	$args          = [
		'comment__in' => get_field( 'комментарии', 6 )
	];
	$comment_query = new WP_Comment_Query;
	$comments      = $comment_query->query( $args );
	$comments      = array_chunk( $comments, 3 );
	if ( $comments ):
		?>
        <div class="container">
            <h2 class="section-title title-popover">Отзывы о банках <!--<a href=""
                                                                       class="popover popover-right bs-popover-right">
                    <div class="arrow"></div>
                ВСЕ ОТЗЫВЫ</a>--></h2>
            <div id="reviews" class="carousel slide container" data-ride="carousel" data-interval="10000">
                <div class="carousel-inner" role="listbox">
					<?
					$status = 'active';
					foreach ( $comments as $row ): ?>
                        <div class="carousel-item <?= $status ?>">
                            <div class="row justify-content-around">
                                <div class="col-xl-4 col-md-6">
                                    <div class="review">
                                        <div class="head d-flex align-items-center">
                                            <div class="photo"><img src="<?= get_avatar_url( $row[0]->user_id ) ?>"
                                                                    alt=""></div>
                                            <div class="info">
                                                <p class="role"><?= $row[0]->user_id == 0 ? 'Гость' : 'Пользователь' ?></p>
                                                <p class="name"><?= $row[0]->user_id != 0 ? get_user_by( 'id', $row[0]->user_id )->display_name : $row[0]->comment_author; ?></p>
                                                <p class="time"><span class="icon-time"></span>
													<?= human_time_diff( get_comment_date( 'U', $row[0] ), current_time( 'timestamp' ) ); ?>
                                                    назад</p>
                                            </div>
                                        </div>
                                        <div class="box">
                                            <p class="text"><?= $row[0]->comment_content ?></p>
                                            <a href="<?= get_permalink( $row[0]->comment_post_ID ) ?>"
                                               class="button"><?= get_the_title( $row[0]->comment_post_ID ) ?></a>
                                        </div>
                                    </div>
                                </div>
								<? if ( $row[1] ): ?>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="review">
                                            <div class="head d-flex align-items-center">
                                                <div class="photo"><img src="<?= get_avatar_url( $row[1]->user_id ) ?>"
                                                                        alt=""></div>
                                                <div class="info">
                                                    <p class="role"><?= $row[1]->user_id == 0 ? 'Гость' : 'Пользователь' ?></p>
                                                    <p class="name"><?= $row[1]->user_id != 0 ? get_user_by( 'id', $row[1]->user_id )->display_name : $row[1]->comment_author; ?></p>
                                                    <p class="time"><span class="icon-time"></span>
														<?= human_time_diff( get_comment_date( 'U', $row[1] ), current_time( 'timestamp' ) ); ?>
                                                        назад</p>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <p class="text"><?= $row[1]->comment_content ?></p>
                                                <a href="<?= get_permalink( $row[1]->comment_post_ID ) ?>"
                                                   class="button"><?= get_the_title( $row[1]->comment_post_ID ) ?></a>
                                            </div>
                                        </div>
                                    </div>
								<?endif;
								if ( $row[2] ):?>
                                    <div class="col-xl-4 col-lg-6 col-md-12">
                                        <div class="review">
                                            <div class="head d-flex align-items-center">
                                                <div class="photo"><img src="<?= get_avatar_url( $row[2]->user_id ) ?>"
                                                                        alt=""></div>
                                                <div class="info">
                                                    <p class="role"><?= $row[2]->user_id == 0 ? 'Гость' : 'Пользователь' ?></p>
                                                    <p class="name"><?= $row[2]->user_id != 0 ? get_user_by( 'id', $row[2]->user_id )->display_name : $row[2]->comment_author; ?></p>
                                                    <p class="time"><span class="icon-time"></span>
														<?= human_time_diff( get_comment_date( 'U', $row[2] ), current_time( 'timestamp' ) ); ?>
                                                        назад</p>
                                                </div>
                                            </div>
                                            <div class="box">
                                                <p class="text"><?= $row[2]->comment_content ?></p>
                                                <a href="<?= get_permalink( $row[2]->comment_post_ID ) ?>"
                                                   class="button"><?= get_the_title( $row[2]->comment_post_ID ) ?></a>
                                            </div>
                                        </div>
                                    </div>
								<? endif; ?>
                            </div>
                        </div>
						<?
						$status = '';
					endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#reviews" data-slide="prev"><span
                            class="carousel-arrow"></span></a>
                <a class="carousel-control-next" href="#reviews" data-slide="next"><span
                            class="carousel-arrow"></span></a>
            </div>
        </div>
	<? endif; ?>
</section>