<?php
	/**
	 * 
	 */
	class db
	{
		function conect01(){//mysqli
			$con1 = mysqli_connect("localhost","root","");
			mysqli_select_db($con1,"vac");
			return($con1);
		}
		function conect02(){//sqlsrv
			$serverName = "serverName\sqlexpress"; //serverName\instanceName
			//$serverName = "serverName\sqlexpress, 1542"; //serverName\instanceName, portNumber (por defecto es 1433)
			//$connectionInfo = array( "Database"=>"dbName");
			$connectionInfo = array( "Database"=>"dbName", "UID"=>"userName", "PWD"=>"password");
			$con1 = sqlsrv_connect($serverName, $connectionInfo);
			return($con1);
		}
		function muestra_mysqli(){//muestra_mysqli
			$con1 = mysqli_connect("HOST","USUARIO","CONTRASEÑA");
			mysqli_select_db($con1,"BASE DE DATOS");
			return($con1);
		}
		function muestra_sql(){//muestra_sqlsrv
			$serverName = "serverName\sqlexpress"; //serverName\instanceName
			//$serverName = "serverName\sqlexpress, 1542"; //serverName\instanceName, portNumber (por defecto es 1433)
			//$connectionInfo = array( "Database"=>"dbName");
			$connectionInfo = array( "Database"=>"dbName", "UID"=>"userName", "PWD"=>"password");
			$con1 = sqlsrv_connect($serverName, $connectionInfo);
			return($con1);
		}
		function get_sql(
			$table, //nombre de talba
			$dt, //array con los datos a insertar. El nombre de las Key debe ser igual al nombre de los campos en la tabla
			$tipo=1, //Tipo de sentencia: 1 para INSERT / 2 para UPDATE
			$tid_n=null, //Nombre del campo Primary Key(PK) de la Tabla. Solo usar para UPDATE
			$pid=null //valor del PK a editar. Solo usar para UPDATE
		){
			switch ($tipo) {
				case 1://GENERAR SENTENCIA INSERT
					$sql = "INSERT INTO ".$table." ( ";
					//-----------campos----------------
						foreach ($dt as $key => $value) {
							$sql .= $key.", ";
						}
					//-----------fin-campos------------
					$sql = substr($sql, 0, -2).") VALUES (";
					//-----------valores----------------
						foreach ($dt as $key => $value) {
							$sql .= "'".$value."', ";
						}
					//-----------fin-valores------------
					$sql = substr($sql, 0, -2);
					$sql .= " );";
				break;
				case 3://GENERRAR SENTENCIA PARALLAMAR PROCEDIMIENTOS ALMACENADOS
					$sql = "CALL ".$table." ( ";
					//-----------valores----------------
						foreach ($dt as $key => $value) {
							$sql .= "'".$value."', ";
						}
					//-----------fin-valores------------
					$sql = substr($sql, 0, -2);
					$sql .= " );";
				break;
				default://GENERAR SENTENCIA UPDATE
					$sql = "UPDATE ".$table." SET ";
					//-----------campos-valores----------------
						foreach ($dt as $key => $value) {
							$sql .= $key."='".$value."', ";
						}
					//-----------fin-campos-valores------------
					$sql = substr($sql, 0, -2);
					$sql .= " WHERE ".$tid_n."=".$pid.";";
				break;
			}
			//----------------------------------
			return $sql;
		}
	}