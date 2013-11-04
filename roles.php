<?php

	function hh_add_custom_role () {

		add_role(
			'projects_manager' ,
			'Projects manager',
			array(
				'read' => true,
//				'manage_options' => true
			)
		);

	}
