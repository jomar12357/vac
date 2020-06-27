<?php
	require_once($rut.'constant.php');

	$pid=0;

	if (isset($_REQUEST['user'])) {
		$pid = base64_decode($_REQUEST['user']);
	}
?>