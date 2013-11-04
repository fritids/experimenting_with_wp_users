<?php

	/*
	Plugin Name: HH users test
	Plugin URI: https://github.com/versusbassz/experimenting_with_wp_users
	Description: Just for learning
	Version: 1.0
	Author: Vladimir Sklyar
	Author URI: http://imgf.ru
	*/


	define( 'HH_PLUGIN_USERS_TEST_URI' , plugin_dir_url( __FILE__ ) );

	require 'register_post_type.php';
	require 'roles.php';


	add_action( 'init' , function() {

		register_custom_post_type_hh_project();
		hh_add_custom_role();


//		include 'examples/01_break_all.php';

//		include 'examples/02_allow_all.php';

		include 'examples/03_custom_post_type_capabilities.php';
		hh_map_meta_cap_test_03();

	});


