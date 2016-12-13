<?php 
	
	require_once("functions_classes.php");

	/* Global Variables:

		$HEADER_JAVASCRIPT

	*/

	/*
		-Get and register chunks from the chunks folder
	*/

	/*
		-Get and register header javascript and css specific folders
		-Function expects (name,path[use variable $jsPath to reference js folder] / file name,name of dependant on, false if not a local file)
	*/
	function function_register_javascript_header(){

		register_javascript_header(
			'jquery',
			'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',
			'javascript',
			'false'
		);

		register_javascript_header(
			'name',
			'global.js',
			'jquery',
			''
		);

	}
	enqueue_functions('function_register_javascript_header', '');

	



	/*
		Executes functions from array
	*/
	function_register_javascript_header();
	execute_functions();

?>