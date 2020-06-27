<?php
	$rut='../';
	$db='db';
	$cl1='cursos';
	$dir1='cursos/';
	$dir2='cursos/detalle.php?pid=';

	function index($rut){
		global $db, $cl1;
		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();

		$inf = $_cl1->listar($_db->conect01());

		return $inf;
	}
?>