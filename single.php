<?php
get_header();
?>
    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7 col-lg-9">
                    <h1 class="section-title"><? the_title() ?></h1>
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
                </div>
				<? getCredits() ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>