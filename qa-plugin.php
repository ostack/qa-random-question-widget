<?php

/*
	Plugin Name: Random question widget
	Plugin URI:
	Plugin Description: Outputs a random question in the sidebar
	Plugin Version: 1.0
	Plugin Date: 2021-02-01
	Plugin Author: Zhao Guangyue
	Plugin Author URI: https://github.com/ostack/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.8.5
*/


	if (!defined('QA_VERSION')) { // 
		header('Location: ../../');
		exit;
	}


	qa_register_plugin_module('widget', 'qa-random-question.php', 'qa_random_questions', 'Random question');
	qa_register_plugin_module('module', 'qa-random-admin.php', 'qa_random_question_admin', 'Random question widget');


