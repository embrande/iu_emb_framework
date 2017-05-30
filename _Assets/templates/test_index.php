<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $GLOBALS['title']; ?></title>
	<link rel="stylesheet" href="">
</head>

<body>
	
	<?php

		/*
			End output buffer
		*/
		$ob_data = ob_get_clean();
		echo $ob_data;

	?>


</body>
</html>