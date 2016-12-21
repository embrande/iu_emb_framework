<?php
	
	/*
		Start html, header, footer, body

		-in here register_javascript and register_css functions and add them to output buffer.
			***** LOOK INTO HOW TO REMOVE / ADD SPECIFIC JAVASCRIPT AND CSS FOR SPECIFIC TEMPLATES
	*/

	/*
		Use functions.php to pull in navigation

		To add a navigation, there should never be more than a third-child.

		A child must have a parent with one less dash unless it is the top-level parent. If it is two to three dashes and doesn't have a closest parent with one less dash, then it will fail to be added.

		USAGE:
			-First-parent-page-name
			--First-child-page-name
			---Third-child-page-name

	*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php $title ?></title>

<?php
	print_script('HEADER_JAVASCRIPT');
?>

</head>
 
<body id="index" class="home body">