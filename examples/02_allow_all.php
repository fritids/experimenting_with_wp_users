<?php


	add_filter( 'map_meta_cap' , function ( $caps , $cap , $user , $args ) {

		$caps = array( 'read' );

		return $caps;
	}, 10 , 4);


