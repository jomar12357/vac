<?php
	require_once($rut.'constant.php');
	//------------------------------------
    $location = HTTP.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	//------------------------------------
	$pid=0;$nav=null;$sist=null;
	$ip_cli = $_SERVER['REMOTE_ADDR'];
	//------------------------------------
	if (isset($_REQUEST['sid'])) { $sid = $_SESSION['sid']; }else{ $sid = $_SESSION['sid'] = session_id(); }
	if (isset($_REQUEST['p'])) { $pid = base64_decode($_REQUEST['p']); }
	//------------------------------------
	require_once($rut.'Seguridad.php');
	$_seg = new Seguridad();
	//------------------------------------
	$nav_cli = $_seg->getBrowser($_SERVER['HTTP_USER_AGENT']);
	$sist_cli = $_seg->getPlatform($_SERVER['HTTP_USER_AGENT']);
	//------------------------------------