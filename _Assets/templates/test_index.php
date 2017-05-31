<?php
	get_header('header_test_header');
?>	

	<?php

		/*
			End output buffer
		*/
		$ob_data = ob_get_clean();
		echo $ob_data;

	?>


<?php
	get_footer('footer_test_footer');
?>