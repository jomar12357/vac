<?php
	$ru0='../';
	$cls = array(
		"dbs"	=>	"db",
		"cl1"	=>	"cursos",
	);
	$di1=$cls['cl1'].'/';
	$di2=$di1.'detalle/?p=';
	$destino= $ru0."img/cursos/";
	$dt = array();
	//------------------------------
	function index($rut){
		global $cls;
		require_once($rut.DIRMOR.$cls['dbs'].'.php');
		require_once($rut.DIRMOR.$cls['cl1'].'.php');
		$_dbs = new $cls['dbs']();
		$_cl1 = new $cls['cl1']();
		$data = new stdClass();
		//----------------------------------------
		$data->inf = $_cl1->listar($_dbs->conect01());
		//----------------------------------------
		return $data;
	}
	function exportar($rut,$tip){
		global $cls;
		require_once($rut.DIRMOR.$cls['dbs'].'.php');
		require_once($rut.DIRMOR.$cls['cl1'].'.php');
		$_dbs = new $cls['dbs']();
		$_cl1 = new $cls['cl1']();
		$data = new stdClass();
		//----------------------------------------
		$data->inf = $_cl1->exportar($_dbs->conect01(),$tip);
		//----------------------------------------
		return $data;
	}
	function detalle($rut,$pid){
		global $cls;
		require_once($rut.DIRMOR.$cls['dbs'].'.php');
		require_once($rut.DIRMOR.$cls['cl1'].'.php');
		$_dbs = new $cls['dbs']();
		$_cl1 = new $cls['cl1']();
		$data = new stdClass();
		//----------------------------------------
		$data->inf = $_cl1->callID($_dbs->conect01(),$pid);
		//----------------------------------------
		return $data;
	}
	if (isset($_POST['guardar'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'config/constant.php');
		//----------------------------------------
		if (isset($_SESSION['sid'])) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//----------------------------------------
			$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$descrip = str_replace("'", '´', $_POST['descrip']);
			//----------------------------------------
			if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
				$nombfile=$_FILES["imagen"]["name"];
				$taman=$_FILES["imagen"]["size"];
				$type=$_FILES["imagen"]["type"];
				$imagen=date("YmdHis").str_replace(' ', '_', $nombfile);
				$sub_file = true;
			}else{
				$imagen='user.png';
				$sub_file = false;
			}
			//----------------------------------------
			$dt = array(
				"nombre"	=>	$nombre,
				"descrip"	=>	$descrip,
				"imagen"	=>	$imagen,
				"created_at"	=>	date('Y-m-d H:i:s')
			);
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$resp = $_cl1->add($_dbs->conect01(),$dt);
			if ($resp->result) {
				if ($sub_file) {
					move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino.$imagen);
				}
			}
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
	if (isset($_POST['editar'])) {
		if(isset($_SESSION)){}else{ session_start(); }
		require_once($ru0.'config/constant.php');
		//----------------------------------------
		if (isset($_SESSION['sid'])) {
			require_once($ru0.DIRMOR.$cls['dbs'].'.php');
			require_once($ru0.DIRMOR.$cls['cl1'].'.php');
			$_dbs = new $cls['dbs']();
			$_cl1 = new $cls['cl1']();
			//----------------------------------------
			$pid = base64_decode($_POST['pid']);
			$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$descrip = str_replace("'", '´', $_POST['descrip']);
			//----------------------------------------
			if (is_uploaded_file($_FILES["imagen"]["tmp_name"])) {
				$nombfile=$_FILES["imagen"]["name"];
				$taman=$_FILES["imagen"]["size"];
				$type=$_FILES["imagen"]["type"];
				$imagen=date("YmdHis").str_replace(' ', '_', $nombfile);
				$sub_file = true;
			}else{
				$imagen=$_POST['imagen_ant'];
				$sub_file = false;
			}
			//----------------------------------------
			$dt = array(
				"nombre"	=>	$nombre,
				"descrip"	=>	$descrip,
				"imagen"	=>	$imagen,
				"updated_at"	=>	date('Y-m-d H:i:s')
			);
			//----------------------------------------
			$url = base64_decode($_POST['url']);
			//----------------------------------------
			$resp = $_cl1->edit($_dbs->conect01(),$dt,$pid);
			if ($resp->result) {
				if ($sub_file) {
					move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino.$imagen);
				}
			}
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
		require_once($ru0.'config/constant.php');
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
		require_once($ru0.'config/constant.php');
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