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
	}