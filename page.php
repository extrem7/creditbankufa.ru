<? get_header(); ?>

    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7">
                    <h2 class="section-title"><? the_title() ?></h2>
                    <div class="default-block bank-item">
						<?= apply_filters( 'the_content', get_post_field( 'post_content', $id ) ); ?>
                    </div>
					<? getAdsense() ?>
                </div>
				<? getCredits() ?>
            </div>
        </div>
    </section>
<?
getBanks();
get_footer() ?>