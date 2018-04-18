<div class="credits col-xl-5 col-lg-8 col-md-10">
    <h2 class="section-title title-popover">Кредиты по типам
        <a href="<?= get_post_type_archive_link( 'credit' ) ?>" class="popover popover-right bs-popover-right">
            <div class="arrow"></div>
            ВСЕ КРЕДИТЫ</a></h2>
    <div class="taxonomies d-flex flex-column flex-sm-row justify-content-between">
		<?
		$types = get_terms( 'type' );
		$types = array_chunk( $types, ceil( count( $types ) / 2 ) );
		?>
        <ul>
			<? foreach ( $types[0] as $type ): ?>
                <li><a href="<?= get_term_link( $type ) ?>"><?= $type->name ?></a></li>
			<? endforeach; ?>
        </ul>
        <ul>
			<? foreach ( $types[1] as $type ): ?>
                <li><a href="<?= get_term_link( $type ) ?>"><?= $type->name ?></a></li>
			<? endforeach; ?>
        </ul>
    </div>
	<? getAdsense() ?>
</div>