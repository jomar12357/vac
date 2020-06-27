<?php
	$rut='../';
	$db='db';
	$cl1='cursos';
	$dir1='cursos/';
	$dir2='cursos/detalle.php?p=';

	function index($rut){
		global $db, $cl1;
		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();

		$inf = $_cl1->listar($_db->conect01());

		return $inf;
	}
	function detalle($rut,$pid){
		global $db, $cl1;
		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();

		$inf = $_cl1->callID($_db->conect01(),$pid);

		return $inf;
	}
	if (isset($_POST['guardar'])) {
		session_start();
		require_once($rut.'constant.php');

		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();

		$nombre = $_POST['nombre'];
		$descrip = $_POST['descrip'];
		$created_at = date('Y-m-d H:i:s');

		$_SESSION['stat'] = $_cl1->add($_db->conect01(),$nombre,$descrip,$created_at);

		header("Location: ".URL.$dir1);
		exit();
	}
	if (isset($_POST['editar'])) {
		session_start();
		require_once($rut.'constant.php');

		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();

		$pid = base64_decode($_POST['pid']);
		$nombre = $_POST['nombre'];
		$descrip = $_POST['descrip'];
		$updated_at = date('Y-m-d H:i:s');

		$_SESSION['stat'] = $_cl1->edit($_db->conect01(),$pid,$nombre,$descrip,$updated_at);

		header("Location: ".URL.$dir2.base64_encode($pid));
		exit();
	}
?>