<?php


	add_filter( 'map_meta_cap' , function ( $caps , $cap , $user , $args ) {

		$caps[] = 'do_not_allow';

		return $caps;
	}, 10 , 4);