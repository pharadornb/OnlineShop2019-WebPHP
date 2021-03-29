<?php
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	unset($_SESSION['status']);
	session_destroy();
	echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
?>