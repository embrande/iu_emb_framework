<?php

	/************
	 ***********
		THIS SETS UP THE ENTIRE FILE
	 ***********
	 ***********/

	/*
		Begin output buffer
	*/
	ob_start();

	/*
		Define file paths
	*/
	//javascript
	$GLOBALS['JAVASCRIPT_FILE_PATH'] = dirname(__FILE__) . "/js/";
	//css
	$GLOBALS['CSS_FILE_PATH'] = dirname(__FILE__) . "/css/";
	//template global
	$GLOBALS['template'] = dirname(__FILE__) . "/template/" . $template_name . ".php";


	

	require_once("functions/functions.php");


   
	display_template();




?>