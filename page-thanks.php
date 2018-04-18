<? get_header();
/* Template Name: Спасибо */
?>

    <section class="main">
        <div class="container">
            <div class="row justify-content-center justify-content-xl-between">
                <div class="col-xl-7">
                    <div class="thanks-content">
						<?= apply_filters( 'the_content', get_post_field( 'post_content', $id ) ); ?>
                    </div>
                </div>
				<? getCredits() ?>
            </div>
        </div>
    </section>
<?
getBanks();
get_footer() ?>