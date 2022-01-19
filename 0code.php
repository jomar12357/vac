<?php
	require_once($rut.'constant.php');
	//------------------------------------
    $location = HTTP.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	//------------------------------------
	$pid=0;
	//------------------------------------
	if (isset($_REQUEST['sid'])) { $sid = $_SESSION['sid']; }else{ $sid = $_SESSION['sid'] = session_id(); }
	if (isset($_REQUEST['p'])) { $pid = base64_decode($_REQUEST['p']); }