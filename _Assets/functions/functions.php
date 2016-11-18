<?php 

	/* Global Variables:

		$HEADER_JAVASCRIPT

	/*
		-Get and register chunks from the chunks folder
	*/


	/*
		-Get and register header javascript and css specific folders
		-Function expects (name,path[use variable $jsPath to reference js folder] / file name,name of dependant on)
	*/
	function function_register_javascript_header(){

		register_javascript_header(
			'jquery',
			'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',
			''
		);

		register_javascript_header(
			'name',
			$jsPath . 'global.js',
			'jquery'
		);

	}
	enqueue_function('function_register_javascript_header');

	
	/*
		-Get and register footer javascript folders
	*/


	/*
		- BEGIN OUTPUT BUFFERING
		- get header
		- check template -> get information from commented section at top of page -> get content
		- get footer
		- END OUTPUT BUFFERING
	*/


?>