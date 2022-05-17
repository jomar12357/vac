<?php
	$ru0='../';
	$db='db';
	$cl1='contacto';
	$dir1='contacto/';
	$dir2='contacto/detalle.php?p=';
	//-------------------------------
	function index($rut){
		global $db, $cl1;
		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();
		$data = new stdClass();
		//-------------------------------
		$data->inf = $_cl1->listar($_db->conect01());
		//-------------------------------
		return $data;
	}
	function exportar($rut){
		global $db, $cl1;
		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();
		$data = new stdClass();
		//-------------------------------
		$data->inf = $_cl1->exportar($_db->conect01());
		//-------------------------------
		return $data;
	}
	function detalle($rut,$pid){
		global $db, $cl1;
		require_once($rut.DIRMOR.$db.'.php');
		require_once($rut.DIRMOR.$cl1.'.php');
		$_db = new $db();
		$_cl1 = new $cl1();
		$data = new stdClass();
		//-------------------------------
		$data->inf = $_cl1->callID($_db->conect01(),$pid);
		//-------------------------------
		return $data;
	}
	if (isset($_POST['guardar'])) {
		if(isset($_SESSION)){}else{ if(isset($_SESSION)){}else{ session_start(); } }
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
			$dt->correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
			$dt->telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
			$dt->mensaje = str_replace("'", '´', $_POST['mensaje']);
			$dt->fecha = date('Y-m-d H:i:s');
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$_SESSION['stat'] = $_cl1->add($_db->conect01(),$dt);
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
		if(isset($_SESSION)){}else{ if(isset($_SESSION)){}else{ session_start(); } }
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
			$dt->respuesta = $_POST['respu_ant'].'<h3>Respuesta '.date('Y-m-d H:i:s').':</h3><br>'.$_POST['respuesta'];
			$dt->fecha = date('Y-m-d H:i:s');
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$_SESSION['stat'] = $_cl1->edit($_db->conect01(),$dt);
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
		if(isset($_SESSION)){}else{ if(isset($_SESSION)){}else{ session_start(); } }
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
		if(isset($_SESSION)){}else{ if(isset($_SESSION)){}else{ session_start(); } }
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