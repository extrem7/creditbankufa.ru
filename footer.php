<footer class="footer">
    <div class="top">
        <div class="container">
			<? wp_nav_menu( [
				'menu'       => 'Хедер',
				'container'  => null,
				'items_wrap' => '<ul  class="menu d-flex justify-content-center">%3$s</ul>',
				'walker'     => new Bootstrap_Walker_Nav_Menu()
			] ); ?>
            <a href="#" class="scroll-up button">Наверх</a>
        </div>
    </div>
    <div class="bottom">
        <div class="container d-flex flex-column flex-sm-row justify-content-between align-items-center">
            <div class="left d-flex align-items-center">
                <a href="/" class="logo d-flex align-items-center">
                    <img <? the_image( 'лого', 'option' ) ?>>
                    <p>БАНКИ<b><? global $city;
							echo $city->description ?></b></p>
                </a>
                <p class="copyright"><? the_field( 'копирайт', 'option' ) ?></p>
            </div>
			<?
			$social = get_field( 'соц-медиа', 'option' );
			if ( ! empty( $social ) ):
				?>
                <div class="social">
					<? if ( $social['вк'] ): ?>
                        <a href="<?= $social['вк'] ?>" target="_blank"><img src="<?= path() ?>img/icon-vk.png"
                                                                            alt=""></a>
					<? endif;
					if ( $social['Fb'] ):
						?>
                        <a href="<?= $social['Fb'] ?>" target="_blank"><img src="<?= path() ?>img/icon-fb.png"
                                                                            alt=""></a>
					<? endif;
					if ( $social['Ok'] ):
						?>
                        <a href="<?= $social['Ok'] ?>" target="_blank"><img src="<?= path() ?>img/social-ok.png" alt=""></a>
					<? endif;
					if ( $social['Tw'] ):
						?>
                        <a href="<?= $social['Tw'] ?>" target="_blank"><img src="<?= path() ?>img/social-tw.png" alt=""></a>
					<? endif;
					if ( $social['G+'] ):
						?>
                        <a href="<?= $social['G+'] ?>" target="_blank"><img src="<?= path() ?>img/icon-gp.png"
                                                                            alt=""></a>
					<? endif; ?>
                </div>
			<? endif; ?>
        </div>
    </div>
</footer>
<? wp_footer() ?>
<? the_field( 'метрики-футер', 'option' ) ?>
</body>
</html>