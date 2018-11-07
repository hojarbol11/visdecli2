<?php	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
		echo "voy";
        header("location: ../login.php");
		exit;
    }