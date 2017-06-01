<?php
	
	phpinfo();

	ini_set('output_buffering','on'); 
	//DETERMINE THE TEMPLATE
	//SET TITLE
	$title = "home - index";
	
	//set Template-name - defaults to default.php; Must have template- at the beginning
	//then - template-parent-child.php
	$template_name = "test_index";

	

	/*
		Begin output buffer - ends in template
	*/
	ob_start();

	echo ini_get('output_buffering');


?>

<div>

	Hello World!

</div>


<?php
	//require document setup - this sets up the backbone to the page.
	require_once ("setup.php");



?>