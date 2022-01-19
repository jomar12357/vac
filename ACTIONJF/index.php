<?php
	$ru0='./';
	$db='db';
	$cl1='cursos';
	$dir1='./';
	$dir2='./detalle.php?p=';
	//-----------------------------
	function index($rut){
		global $db, $cl1;
		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();
		$data = new stdClass();
		//----------------------------------------
		$data->inf = $_cl1->cliente($_db->conect01(),$_db->conect01());
		//----------------------------------------
		return $data;
	}
	function detalle($rut,$pid){
		global $db, $cl1;
		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();
		$data = new stdClass();
		//----------------------------------------
		$data->inf = $_cl1->callID($_db->conect01(),$pid);
		//----------------------------------------
		return $data;
	}