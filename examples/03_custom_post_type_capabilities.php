<?php

	function hh_map_meta_cap_test_03 () {

		$projects_manager = get_role( 'projects_manager' );
		$administrator    = get_role( 'administrator' );


		$post_type = get_post_type_object( 'hh_project' );


		$possible_caps = array(
//			'read',
//			'read_project', // meta
//			'edit_project', // meta
//			'delete_project', // meta

			'read_private_projects',

			'create_projects',

			'edit_projects',
			'edit_others_projects',
			'edit_published_projects',
			'edit_private_projects',

			'publish_projects',

			'delete_projects',
			'delete_others_projects',
			'delete_published_projects',
			'delete_private_projects',
		);

		foreach ( $possible_caps as $cap ) {
			$projects_manager->remove_cap( $cap );
		}

		foreach ( $possible_caps as $cap ) {
			$administrator->add_cap( $cap );
		}


		$new_caps = array(
//			'read',
//			'read_private_projects',

//			'create_projects',

			'edit_projects',
			'edit_others_projects',
			'edit_published_projects',
			'edit_private_projects',

			'publish_projects',

//			'delete_projects',
//			'delete_others_projects',
//			'delete_published_projects',
//			'delete_private_projects',
		);

		foreach ( $new_caps as $cap ) {
			$projects_manager->add_cap( $cap );
		}

		$a = 1;
	}


	add_filter( 'map_meta_cap' , function ( $caps , $cap , $user , $args ) {

		if ( $cap === 'create_projects' ) {
			$caps = array( 'create_projects' );
		}

		if ( $cap === 'edit_projects' ) {
			$caps = array( 'edit_projects' );
		}

		return $caps;
	}, 10 , 4);


	add_filter( 'map_meta_cap', 'my_map_meta_cap', 10, 4 );
	function my_map_meta_cap( $caps, $cap, $user_id, $args ) {

		/* If editing, deleting, or reading a movie, get the post and post type object. */
		if ( 'edit_project' == $cap || 'delete_project' == $cap || 'read_project' == $cap ) {
			$post = get_post( $args[0] );
			$post_type = get_post_type_object( $post->post_type );

			/* Set an empty array for the caps. */
			$caps = array();


			/* If editing a movie, assign the required capability. */
			if ( 'edit_project' == $cap ) {
				if ( $user_id == $post->post_author )
					$caps[] = $post_type->cap->edit_posts;
				else
					$caps[] = $post_type->cap->edit_others_posts;
			}

			/* If deleting a movie, assign the required capability. */
			elseif ( 'delete_project' == $cap ) {
				if ( $user_id == $post->post_author )
					$caps[] = $post_type->cap->delete_posts;
				else
					$caps[] = $post_type->cap->delete_others_posts;
			}

			/* If reading a private movie, assign the required capability. */
			elseif ( 'read_project' == $cap ) {

				if ( 'private' != $post->post_status )
					$caps[] = 'read';
				elseif ( $user_id == $post->post_author )
					$caps[] = 'read';
				else
					$caps[] = $post_type->cap->read_private_posts;
			}
		}


		/* Return the capabilities required by the user. */
		return $caps;
	}

