<?php
	/**
	 * 
	 */
	class database
	{
		function connect(){
			$con1 = mysqli_connect('HOST','USUARIO','CONTRASEÑA');
			mysqli_select_db($con1,'BASE DE DATOS');
			return($con1);
		}
		function get_sql(
			$table, //nombre de tabla
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
				case 3://GENERRAR SENTENCIA PARA LLAMAR PROCEDIMIENTOS ALMACENADOS
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