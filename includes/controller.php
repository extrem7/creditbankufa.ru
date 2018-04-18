<?php

function city() {
	if ( isset( $_GET['c'] ) ) {
		if ( get_term( $_GET['c'], 'city' ) ) {
			$_SESSION['city'] = $_GET['c'];
		}
	}
	if ( ! isset( $_SESSION['city'] ) ) {
		$_SESSION['city'] = get_field( 'город', 'option' );
	}
}

function compare() {
	if ( empty( $_SESSION['compare'] ) ) {
		$_SESSION['compare'] = [];
	}
	if ( isset( $_POST['add_id'] ) ) {
		if ( ! in_array( $_POST['add_id'], $_SESSION['compare'] ) ) {
			array_push( $_SESSION['compare'], $_POST['add_id'] );
		}
	}
	if ( isset( $_GET['remove_id'] ) ) {
		if ( in_array( $_GET['remove_id'], $_SESSION['compare'] ) ) {
			unset( $_SESSION['compare'][ array_search( $_GET['remove_id'], $_SESSION['compare'] ) ] );
		}
	}
}

city();
compare();