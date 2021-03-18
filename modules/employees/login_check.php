<?php

	if(!$_SESSION['user']){
		header('location: ../../index.php?log=invalid');
	}

?>