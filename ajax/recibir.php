<?php
	var_dump ($_POST);
	var_dump ($_FILES);
	
	echo str_replace('  ', '&nbsp; ', nl2br(print_r($_POST, true)));
	echo str_replace('  ', '&nbsp; ', nl2br(print_r($_FILES, true)));
?>