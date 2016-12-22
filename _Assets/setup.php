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


	


	require_once("functions/functions.php");




	/*
		End output buffer
	*/
	$ob_data = ob_get_clean();
	echo $ob_data;


?>