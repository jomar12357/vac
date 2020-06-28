<?php
	null;$msm2=null;$sms3=null;

	if (isset($_SESSION['stat'])) {
		switch ($_SESSION['stat']) {
			case 'add':
				$_SESSION['smstrue1'] = '<b>Se guardó</b> el registro con éxito.';
			break;
			case 'edit':
				$_SESSION['smstrue1'] = '<b>Se editó</b> el registro con éxito.';
			break;
			case 'acti':
				$_SESSION['smstrue1'] = '<b>Se activó</b> el registro con éxito.';
			break;
			case 'desact':
				$_SESSION['smstrue1'] = '<b>Se descativó</b> el registro con éxito.';
			break;
			case 'drop':
				$_SESSION['smstrue1'] = '<b>Se eliminó</b> el registro con éxito.';
			break;
			case 'send':
				$_SESSION['smstrue1'] = '<b>Se envió</b> el registro con éxito.';
			break;
			case 'find':
				$_SESSION['smstrue1'] = '<b>Se encontró</b> el registro con éxito.';
			break;
			case 'noadd':
				$_SESSION['smsfalse1'] = '<b>No se logró guardar</b> el registro.';
			break;
			case 'noedit':
				$_SESSION['smsfalse1'] = '<b>No se logró editar</b> el registro.';
			break;
			case 'noacti':
				$_SESSION['smsfalse1'] = '<b>No se logró activar</b> el registro.';
			break;
			case 'nodesact':
				$_SESSION['smsfalse1'] = '<b>No se logró descativar</b> el registro.';
			break;
			case 'nodrop':
				$_SESSION['smsfalse1'] = '<b>No se logró eliminar</b> el registro.';
			break;
			case 'nosend':
				$_SESSION['smsfalse1'] = '<b>No se logró enviar</b> el registro.';
			break;
			case 'nofind':
				$_SESSION['smsfalse1'] = '<b>No se logró encontrar</b> el registro.';
			break;
			case 'null':
				$_SESSION['smsnull1'] = '<b>No se logró ejecutar</b> la consulta.';
			break;
		}
	}
	if (isset($_SESSION['stat2'])) {
		switch ($_SESSION['stat2']) {
			case 'add':
				$_SESSION['smstrue2'] = '<b>Se guardó</b> el registro con éxito.';
			break;
			case 'edit':
				$_SESSION['smstrue2'] = '<b>Se editó</b> el registro con éxito.';
			break;
			case 'acti':
				$_SESSION['smstrue2'] = '<b>Se activó</b> el registro con éxito.';
			break;
			case 'desact':
				$_SESSION['smstrue2'] = '<b>Se descativó</b> el registro con éxito.';
			break;
			case 'drop':
				$_SESSION['smstrue2'] = '<b>Se eliminó</b> el registro con éxito.';
			break;
			case 'send':
				$_SESSION['smstrue2'] = '<b>Se envió</b> el registro con éxito.';
			break;
			case 'find':
				$_SESSION['smstrue2'] = '<b>Se encontró</b> el registro con éxito.';
			break;
			case 'noadd':
				$_SESSION['smsfalse2'] = '<b>No se logró guardar</b> el registro.';
			break;
			case 'noedit':
				$_SESSION['smsfalse2'] = '<b>No se logró editar</b> el registro.';
			break;
			case 'noacti':
				$_SESSION['smsfalse2'] = '<b>No se logró activar</b> el registro.';
			break;
			case 'nodesact':
				$_SESSION['smsfalse2'] = '<b>No se logró descativar</b> el registro.';
			break;
			case 'nodrop':
				$_SESSION['smsfalse2'] = '<b>No se logró eliminar</b> el registro.';
			break;
			case 'nosend':
				$_SESSION['smsfalse2'] = '<b>No se logró enviar</b> el registro.';
			break;
			case 'nofind':
				$_SESSION['smsfalse2'] = '<b>No se logró encontrar</b> el registro.';
			break;
			case 'null':
				$_SESSION['smsnull2'] = '<b>No se logró ejecutar</b> la consulta.';
			break;
		}
	}
?>