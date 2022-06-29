<?php
	$ru0='../';
	$cls = array(
		"dbs"	=>	"db",
		"cl1"	=>	"contacto",
	);
	$di1=$cls['cl1'].'/';
	$di2=$di1.'detalle/?p=';
	$dt = array();
	//-------------------------------
	function index($rut){
		global $cls;
		require_once($rut.DIRMOR.$cls['dbs'].'.php');
		require_once($rut.DIRMOR.$cls['cl1'].'.php');
		$_dbs = new $cls['dbs']();
		$_cl1 = new $cls['cl1']();
		$data = new stdClass();
		//-------------------------------
		$data->inf = $_cl1->listar($_dbs->conect01());
		//-------------------------------
		return $data;
	}
	function exportar($rut){
		global $cls;
		require_once($rut.DIRMOR.$cls['dbs'].'.php');
		require_once($rut.DIRMOR.$cls['cl1'].'.php');
		$_dbs = new $cls['dbs']();
		$_cl1 = new $cls['cl1']();
		$data = new stdClass();
		//-------------------------------
		$data->inf = $_cl1->exportar($_dbs->conect01());
		//-------------------------------
		return $data;
	}
	function detalle($rut,$pid){
		global $cls;
		require_once($rut.DIRMOR.$cls['dbs'].'.php');
		require_once($rut.DIRMOR.$cls['cl1'].'.php');
		$_dbs = new $cls['dbs']();
		$_cl1 = new $cls['cl1']();
		$data = new stdClass();
		//-------------------------------
		$data->inf = $_cl1->callID($_dbs->conect01(),$pid);
		$data->seg = $_cl1->listarSeg($_dbs->conect01(),$pid);
		//-------------------------------
		return $data;
	}
	if (isset($_POST['guardar'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'constant.php');
		//----------------------------------------
		if (isset($_SESSION['sid'])) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//----------------------------------------
			$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
			$telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
			$mensaje = str_replace("'", '´', $_POST['mensaje']);
			$ip_cli = filter_var(base64_decode($_POST['ip_cli']), FILTER_SANITIZE_STRING);
			$nav_cli = filter_var(base64_decode($_POST['nav_cli']), FILTER_SANITIZE_STRING);
			$sist_cli = filter_var(base64_decode($_POST['sist_cli']), FILTER_SANITIZE_STRING);
			//----------------------------------------
			$dt = array(
				"nombre"	=>	$nombre,
				"correo"	=>	$correo,
				"telefono"	=>	$telefono,
				"mensaje"	=>	$mensaje,
				"ip_cli"	=>	$ip_cli,
				"nav_cli"	=>	$nav_cli,
				"sist_cli"	=>	$sist_cli,
				"created_at"	=>	date('Y-m-d H:i:s')
			);
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$resp = $_cl1->add($_dbs->conect01(),$dt);
			$_SESSION['stat'] = $resp->inf;
			$_SESSION['sql'] = $resp->sql;
			//----------------------------------------
			$_POST = null;
			//----------------------------------------
			header("Location: ".$url);
			exit();
		}else{
			include_once($ru0.'403.shtml');
		}
	}
	if (isset($_POST['addSeg'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'constant.php');
		//----------------------------------------
		if (isset($_SESSION['sid'])) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//----------------------------------------
			$pid = base64_decode($_POST['pid']);
			$respuesta = $_POST['respuesta'];
			//----------------------------------------
			$dt = array(
				"id"	=>	$pid,
				"respuesta"	=>	$respuesta,
				"created_at"	=>	date('Y-m-d H:i:s')
			);
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$resp = $_cl1->addSeg($_dbs->conect01(),$dt);
			$_SESSION['stat'] = $resp->inf;
			$_SESSION['sql'] = $resp->sql;
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
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//----------------------------------------
			$pid = base64_decode($_REQUEST['p']);
			//----------------------------------------
			$dt = array(
				"status"	=>	(($_REQUEST['met'] == 'acti') ?  1 : 0),
				"updated_at"	=>	date('Y-m-d H:i:s')
			);
			//----------------------------------------
			$resp = $_cl1->estado($_dbs->conect01(),$dt,$pid);
			$_SESSION['stat'] = $resp->inf;
			$_SESSION['sql'] = $resp->sql;
			//----------------------------------------
			$_REQUEST = null;
			//----------------------------------------
			header("Location: ".SIST.$di1);
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
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//----------------------------------------
			$pid = base64_decode($_POST['pid']);
			$dt = array(
				"status"	=>	2,
				"drop_at"	=>	date('Y-m-d H:i:s')
			);
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$resp = $_cl1->estado($_dbs->conect01(),$dt,$pid);
			$_SESSION['stat'] = $resp->inf;
			$_SESSION['sql'] = $resp->sql;
			//----------------------------------------
			$_POST = null;
			//----------------------------------------
			header("Location: ".$url);
			exit();
		}else{
			include_once($ru0.'403.shtml');
		}
	}
	if (isset($_POST['dropSeg'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'constant.php');
		//----------------------------------------
		if (isset($_SESSION['sid'])) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//----------------------------------------
			$pid = base64_decode($_POST['pid']);
			$dt = array(
				"status"	=>	2,
				"drop_at"	=>	date('Y-m-d H:i:s')
			);
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$resp = $_cl1->estado2($_dbs->conect01(),$dt,$pid);
			$_SESSION['stat'] = $resp->inf;
			$_SESSION['sql'] = $resp->sql;
			//----------------------------------------
			$_POST = null;
			//----------------------------------------
			header("Location: ".$url);
			exit();
		}else{
			include_once($ru0.'403.shtml');
		}
	}