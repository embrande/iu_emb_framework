<?php

	/************
	 ***********
		THIS SETS UP THE ENTIRE FILE
	 ***********
	 ***********/

	/*
		Begin output buffer - ends in template
	*/
	ob_start();

	/*
		Define file paths
	*/
	//javascript
	$GLOBALS['JAVASCRIPT_FILE_PATH'] = dirname(__FILE__) . "/js/";
	//css
	$GLOBALS['CSS_FILE_PATH'] = dirname(__FILE__) . "/css/";
	//header path
	$GLOBALS['HEADER_FILE_PATH'] = dirname(__FILE__) . "/templates/header/";
	//footer path
	$GLOBALS['FOOTER_FILE_PATH'] = dirname(__FILE__) . "/templates/footer/";
	//template global
	$GLOBALS['template'] = dirname(__FILE__) . "/templates/" . $template_name . ".php";
	//title of page 
	$GLOBALS['title'] = $title;


	

	require_once("functions/functions.php");


   
	display_template();




?>