<?php
	require_once($rut.'constant.php');

	$pid=0;

	if (isset($_REQUEST['p'])) { $pid = base64_decode($_REQUEST['p']); }
?>