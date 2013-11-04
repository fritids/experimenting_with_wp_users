<?php

	function register_custom_post_type_hh_project() {
		$labels = array(
			'name' => 'Проекты',
			'singular_name' => 'Проект',
			'add_new' => 'Создать проект',
			'add_new_item' => 'Создать новый проект',
			'edit_item' => 'Редактировать проект',
			'new_item' => 'Новый проект',
			'all_items' => 'Все проекты',
			'view_item' => 'Просмотреть проект',
			'search_items' => 'Искать проекты',
			'not_found' =>  'Не найдено ни одного проекта',
			'not_found_in_trash' => 'В корзине не найдено ни одного проекта',
			'parent_item_colon' => '',
			'menu_name' => 'Проекты'
		);

		$args = array(
//			'label' => null,
			'description' => '',
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => false,
			'exclude_from_search' => true,
			'query_var' => true,
			'rewrite' => true,
//			'rewrite' => array(
//			        'slug' => 'projects',
//			        'with_front' => true,
//			        'feeds' => true,
//			        'pages' => true,
//			        'ep_mask' => ''
//			),

			'capability_type' => array( 'project' , 'projects' ),
			'capabilities' => array(
				'create_posts' => 'create_projects',
			),
			'map_meta_cap' => true,


//			'register_meta_box_cb' => '',
//			'taxonomies' => array(),
//			'permalink_epmask' => 'EP_PERMALINK',
			'can_export' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => 37,
			'supports' => array( 'title', 'editor' , 'revisions' ),
			'menu_icon' => HH_PLUGIN_USERS_TEST_URI . '/assets/img/bookmark.png'
		);

		register_post_type( 'hh_project', $args );

	}
//	add_action( 'init', 'register_custom_post_type_hh_project' );


