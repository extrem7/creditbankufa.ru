<?php // GDRTS Template: Shortcode // ?>

<?php

if ( gdrts_list()->have_items() ) :
	global $city;
	$i = 0;
	while ( gdrts_list()->have_items() ) :
		gdrts_list()->the_item();
		$post  = gdrts_list()->item()->id;
		$terms = [];
		foreach ( wp_get_post_terms( $post, 'city' ) as $term ) {
			array_push( $terms, $term->slug );
		}
		if ( get_post_type( $post ) != 'bank' || !in_array( $city->slug, $terms ) ) {
			continue;
		}
		$i ++;
		if ( $i > 15 ) {
			break;
		}
		?>
        <tr>
            <td class="gdrts-grid-order"><a
                        href="<?= get_permalink( $post ) ?>"><?= get_the_post_thumbnail( $post ) ?></a></td>
            <td class="gdrts-grid-item"><a
                        href="<?= get_permalink( $post ) ?>"><?php echo gdrts_list()->item()->title(); ?></a>
            </td>
            <td class="gdrts-grid-votes"><? getStars( $post ) ?></td>
            <td class="reviews-count"><a href="<?= get_permalink( $post ) ?>?comment=1"><?= reviews( get_comments_number( $post ) ) ?></a></td>
            <td><? the_field( 'ставка', $post ) ?> в год</td>
        </tr>

	<?php

	endwhile;

else :

	?>

    <tr>
        <td colspan="4"><?php _e( "No items found.", "gd-rating-system" ); ?></td>
    </tr>

<?php

endif;

?>