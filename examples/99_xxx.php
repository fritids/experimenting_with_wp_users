<?php

	add_filter( 'map_meta_cap' , function ( $caps , $cap , $user , $args ) {

			if ( in_array( $cap , array( 'edit_post' , 'read_post' , 'delete_post' ) ) ) {

				if ( isset( $args[0] ) &&  $args[0] === 49 ) {
					return $caps;
				}
			}

		$my_caps = array(
			'delete_project',
			'edit_projects',
			'edit_other_projects',

			'publish_projects',
			'read_private_projects',
			'delete_projects',
			'delete_private_projects',
			'delete_published_projects',

			'delete_others_projects',
			'edit_private_projects',
			'edit_published_posts',

			'read'
		);

		if ( in_array( $cap , $my_caps ) ) {
			$caps = array( 'read' );
		}

		if (  $cap === 'create_projects' ) {

			if ( current_user_can( 'administrator' ) ) {
				$caps = array( 'read' );
			} else {
				$caps = array( 'do_not_allow' );
			}

		}

		return $caps;
	}, 10 , 4);


