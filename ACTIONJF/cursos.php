<?php
	$ru0='../';
	$db='db';
	$cl1='cursos';
	$dir1='cursos/';
	$dir2='cursos/detalle/?p=';
	$destino= $ru0."img/cursos/";
	//------------------------------
	function index($rut){
		global $db, $cl1;
		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();
		$data = new stdClass();
		//----------------------------------------
		$data->inf = $_cl1->listar($_db->conect01());
		//----------------------------------------
		return $data;
	}
	function exportar($rut,$tip){
		global $db, $cl1;
		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();
		$data = new stdClass();
		//----------------------------------------
		$data->inf = $_cl1->exportar($_db->conect01(),$tip);
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
	if (isset($_POST['guardar'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'constant.php');
		//----------------------------------------
		if (isset($_SESSION['sid'])) {
			require_once($ru0.DIRMOR.$db.'.php');
			require_once($ru0.DIRMOR.$cl1.'.php');
			$_db = new $db();
			$_cl1 = new $cl1();
			$dt = new stdClass();
			//----------------------------------------
			$dt->nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$dt->descrip = str_replace("'", '´', $_POST['descrip']);
			//----------------------------------------
			if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
				$nombfile=$_FILES["imagen"]["name"];
				$taman=$_FILES["imagen"]["size"];
				$type=$_FILES["imagen"]["type"];
				$dt->imagen=date("YmdHis").str_replace(' ', '_', $nombfile);
				$sub_file = true;
			}else{
				$dt->imagen='user.png';
				$sub_file = false;
			}
			//----------------------------------------
			$dt->fecha = date('Y-m-d H:i:s');
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$_SESSION['stat'] = $resp = $_cl1->add($_db->conect01(),$dt);
			if ($resp == 'add') {
				if ($sub_file) {
					move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino.$dt->imagen);
				}
			}
			//----------------------------------------
			$_POST = null;
			//----------------------------------------
			header("Location: ".$url);
			exit();
		}else{
			include_once($ru0.'403.shtml');
		}
	}
	if (isset($_POST['editar'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'constant.php');
		//----------------------------------------
		if (isset($_SESSION['sid'])) {
			require_once($ru0.DIRMOR.$db.'.php');
			require_once($ru0.DIRMOR.$cl1.'.php');
			$_db = new $db();
			$_cl1 = new $cl1();
			$dt = new stdClass();
			//----------------------------------------
			$dt->pid = base64_decode($_POST['pid']);
			$dt->nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$dt->descrip = str_replace("'", '´', $_POST['descrip']);
			//----------------------------------------
			if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
				$nombfile=$_FILES["imagen"]["name"];
				$taman=$_FILES["imagen"]["size"];
				$type=$_FILES["imagen"]["type"];
				$dt->imagen=date("YmdHis").str_replace(' ', '_', $nombfile);
				$sub_file = true;
			}else{
				$dt->imagen=$_POST['imagen_ant'];
				$sub_file = false;
			}
			//----------------------------------------
			$dt->fecha = date('Y-m-d H:i:s');
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$_SESSION['stat'] = $resp = $_cl1->edit($_db->conect01(),$dt);
			if ($resp == 'edit') {
				if ($sub_file) {
					move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino.$dt->imagen);
				}
			}
			//----------------------------------------
			$_POST = null;
			//----------------------------------------
			header("Location: ".$url);
			exit();
		}else{
			include_once($ru0.'403.shtml');
		}
	}
	if (isset($_REQUEST['met'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'constant.php');
		//----------------------------------------
		if (isset($_SESSION['sid'])) {
			require_once($ru0.DIRMOR.$db.'.php');
			require_once($ru0.DIRMOR.$cl1.'.php');
			$_db = new $db();
			$_cl1 = new $cl1();
			$dt = new stdClass();
			//----------------------------------------
			$dt->pid = base64_decode($_REQUEST['p']);
			$dt->fecha = date('Y-m-d H:i:s');
			//----------------------------------------
			switch ($_REQUEST['met']) {
				case 'acti':
					$dt->status = 1;
				break;
				case 'desact':
					$dt->status = 0;
				break;
			}
			//----------------------------------------
			$resp = $_cl1->estado($_db->conect01(),$dt);
			if ($resp->result < 3) {
				$_SESSION['stat'] = $resp->inf;
			}else{
				$_SESSION['stat'] = 'noedit';
			}
			//----------------------------------------
			$_REQUEST = null;
			//----------------------------------------
			header("Location: ".SIST.$dir1);
			exit();
		}else{
			include_once($ru0.'403.shtml');
		}
	}
	if (isset($_POST['eliminar'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'constant.php');
		//----------------------------------------
		if (isset($_SESSION['sid'])) {
			require_once($ru0.DIRMOR.$db.'.php');
			require_once($ru0.DIRMOR.$cl1.'.php');
			$_db = new $db();
			$_cl1 = new $cl1();
			$dt = new stdClass();
			//----------------------------------------
			$dt->pid = base64_decode($_POST['pid']);
			$dt->status = 2;
			$dt->fecha = date('Y-m-d H:i:s');
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$resp = $_cl1->estado($_db->conect01(),$dt);
			if ($resp->result < 3) {
				$_SESSION['stat'] = $resp->inf;
			}else{
				$_SESSION['stat'] = 'noedit';
			}
			//----------------------------------------
			$_POST = null;
			//----------------------------------------
			header("Location: ".$url);
			exit();
		}else{
			include_once($ru0.'403.shtml');
		}
	}