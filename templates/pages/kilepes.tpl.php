<?php

try {
	session_destroy();
	header("Location: /");
}
catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
    	header("Location: /");
}
?>


