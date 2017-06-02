<?php
	$ob_pause = ob_get_clean();
	ob_start();

	get_header('header_test_header');
?>	

<?php

	/*
		End output buffer
	*/
	echo ob_get_clean();
	echo $ob_pause;
	ob_start();

?>


<?php
	get_footer('footer_test_footer');
	
	echo ob_get_clean();
?>