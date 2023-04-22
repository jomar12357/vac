<?php
	/**
	 * 
	 */
	class contacto extends db
	{
		private $table ='contacto';
		private $table1='seg_contacto';
		private $action='contacto.php?met=';
		private $detail='detalle/?p=';
		private $tid = 'id';
		private $tid2= 'id_seg';
		//---------------------
		function listar($c1){
			$inf=null;$n=1;$cant=7;
			//-------------------------------------
			$inf.='<thead>';
				$inf.='<tr>';
					$inf.='<th>#</th>';
					$inf.='<th>Nombre</th>';
					$inf.='<th>Correo</th>';
					$inf.='<th>Teléfono</th>';
					$inf.='<th>Mensaje</th>';
					$inf.='<th>Creado</th>';
					$inf.='<th>Gestión</th>';
				$inf.='</tr>';
			$inf.='</thead>';
			$inf.='<tbody>';
				$sql = "SELECT * FROM ".$this->table." WHERE status <> 2 ORDER BY ".$this->tid." DESC;";
				$res = mysqli_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (mysqli_error($c1));
				//$res = sqlsrv_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (sqlsrv_errors($c1));
				if ($res) {
					if ($res->num_rows > 0) {
					//if (sqlsrv_num_rows($res) > 0) {
						while ($row = mysqli_fetch_array($res)) {
						//while ($row = sqlsrv_fetch_array($res)) {
							$inf.='<tr>';
								$inf.='<th scope="row">'.$n.'</th>';
								$inf.='<td>'.$row['nombre'].'</td>';
								$inf.='<td>'.$row['correo'].'</td>';
								$inf.='<td>'.$row['telefono'].'</td>';
								$inf.='<td>'.$row['mensaje'].'</td>';
								$inf.='<td>'.$row['created_at'].'</td>';
								$inf.='<td>';
									$inf.='<a href="'.$this->detail.base64_encode($row[$this->tid]).'" class="btn btn-outline-warning" title="Editar">';
										$inf.='<i class="fa fa-edit"></i>';
									$inf.='</a>';
									switch ($row['status']) {
										case 0:
											$inf.='<a href="'.ACTI.$this->action.'acti&p='.base64_encode($row[$this->tid]).'" class="btn btn-outline-warning" title="Clic para Activar">';
												$inf.='<i class="fa fa-ban"></i>';
											$inf.='</a>';
										break;
										case 1:
											$inf.='<a href="'.ACTI.$this->action.'desact&p='.base64_encode($row[$this->tid]).'" class="btn btn-outline-success" title="Clic para Desactivar">';
												$inf.='<i class="fa fa-check"></i>';
											$inf.='</a>';
										break;
										default:
											$inf.='<a href="'.ACTI.$this->action.'acti&p='.base64_encode($row[$this->tid]).'" class="btn btn-outline-danger" title="Clic para Activar">';
												$inf.='<i class="fa fa-times"></i>';
											$inf.='</a>';
										break;
									}
									$inf.='<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#drop" onclick="drop('."'".base64_encode($row[$this->tid])."||".base64_encode($row['nombre'])."||'".');"><i class="fa fa-trash"></i></button>';
								$inf.='</td>';
							$inf.='</tr>';

							$n++;
						}
						mysqli_free_result($res);//liberar memoria del resultado
						//sqlsrv_free_stmt($res);//liberar memoria del resultado
					}else{
						$inf.='<tr><td colspan="'.$cant.'"><div class="alert alert-warning">No se encontró ningún registro</div></td></tr>';
					}
				}else{
					$inf.='<tr><td colspan="'.$cant.'"><div class="alert alert-danger">Error: '.$_SESSION['Mysqli_Error'].'</div></td></tr>';
				}
			$inf.='</tbody>';
			//-----------------------------
			mysqli_close($c1);
			return $inf;
		}
		function listarSeg($c1,$pid){
			$inf=null;$n=1;$cant=7;
			//-------------------------------------
			$inf.='<thead>';
				$inf.='<tr>';
					$inf.='<th>#</th>';
					$inf.='<th>Respuesta</th>';
					$inf.='<th>Nombre Cliente</th>';
					$inf.='<th>Correo Cliente</th>';
					$inf.='<th>Teléfono Cliente</th>';
					$inf.='<th>Fecha de respuesta</th>';
					$inf.='<th>Gestión</th>';
				$inf.='</tr>';
			$inf.='</thead>';
			$inf.='<tbody>';
				$sql = "SELECT r.*, c.nombre, c.correo, c.telefono FROM ".$this->table1." r INNER JOIN ".$this->table." c ON r.".$this->tid."=c.".$this->tid." WHERE r.status=1 AND r.".$this->tid."=".$pid." ORDER BY r.".$this->tid2." DESC;";
				$res = mysqli_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (mysqli_error($c1));
				//$res = sqlsrv_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (sqlsrv_errors($c1));
				if ($res) {
					if ($res->num_rows > 0) {
					//if (sqlsrv_num_rows($res) > 0) {
						while ($row = mysqli_fetch_array($res)) {
						//while ($row = sqlsrv_fetch_array($res)) {
							$inf.='<tr>';
								$inf.='<th scope="row">'.$n.'</th>';
								$inf.='<td>'.$row['respuesta'].'</td>';
								$inf.='<td>'.$row['nombre'].'</td>';
								$inf.='<td>'.$row['correo'].'</td>';
								$inf.='<td>'.$row['telefono'].'</td>';
								$inf.='<td>'.$row['created_at'].'</td>';
								$inf.='<td>';
									$inf.='<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#dropSeg" onclick="dropSeg('."'".base64_encode($row[$this->tid2])."||".$row['nombre']."||'".');"><i class="fa fa-trash"></i></button>';
								$inf.='</td>';
							$inf.='</tr>';

							$n++;
						}
						mysqli_free_result($res);//liberar memoria del resultado
						//sqlsrv_free_stmt($res);//liberar memoria del resultado
					}else{
						$inf.='<tr><td colspan="'.$cant.'"><div class="alert alert-warning">No se encontró ningún registro</div></td></tr>';
					}
				}else{
					$inf.='<tr><td colspan="'.$cant.'"><div class="alert alert-danger">Error: '.$_SESSION['Mysqli_Error'].'</div></td></tr>';
				}
			$inf.='</tbody>';
			//-----------------------------
			mysqli_close($c1);
			return $inf;
		}
		function exportar($c1){
			$inf=null;$n=1;$cant=10;
			//-------------------------------------
			$inf.='<thead>';
				$inf.='<tr>';
					$inf.='<th>#</th>';
					$inf.='<th>Nombre</th>';
					$inf.='<th>Correo</th>';
					$inf.='<th>Teléfono</th>';
					$inf.='<th>Mensaje</th>';
					$inf.='<th>Respuesta</th>';
					$inf.='<th>Creado</th>';
					$inf.='<th>Editado</th>';
					$inf.='<th>Eliminado</th>';
					$inf.='<th>Estado</th>';
				$inf.='</tr>';
			$inf.='</thead>';
			$inf.='<tbody>';
				$sql = "SELECT * FROM ".$this->table." ;";
				$res = mysqli_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (mysqli_error($c1));
				if ($res) {
					if ($res->num_rows > 0) {
						while ($row = mysqli_fetch_array($res)) {
							$inf.='<tr>';
								$inf.='<th>'.$n.'</th>';
								$inf.='<td>'.$row['nombre'].'</td>';
								$inf.='<td>'.$row['correo'].'</td>';
								$inf.='<td>'.$row['telefono'].'</td>';
								$inf.='<td>'.$row['mensaje'].'</td>';
								$inf.='<td>'.$row['respuesta'].'</td>';
								$inf.='<td>'.$row['created_at'].'</td>';
								$inf.='<td>'.$row['updated_at'].'</td>';
								$inf.='<td>'.$row['drop_at'].'</td>';
								$inf.='<td>';
									switch ($row['status']) {
										case 0:
											$inf.='Inactivo';
										break;
										case 1:
											$inf.='Activo';
										break;
										case 2:
											$inf.='Eliminado';
										break;
									}
								$inf.='</td>';
							$inf.='</tr>';

							$n++;
						}
						mysqli_free_result($res);//liberar memoria del resultado
					}else{
						$inf.='<tr><td colspan="'.$cant.'">No se encontró ningún registro</td></tr>';
					}
				}else{
					$inf.='<tr><td colspan="'.$cant.'">Error: '.$_SESSION['Mysqli_Error'].'</td></tr>';
				}
			$inf.='</tbody>';
			//-------------------------------------
			mysqli_close($c1);
			return $inf;
		}
		function callID($c1,$pid){
			$data= new stdClass();
			//-------------------------
			$sql = "SELECT * FROM ".$this->table." WHERE id=".$pid." ;";
			$res = mysqli_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (mysqli_error($c1));
			if ($res) {
				if ($res->num_rows > 0) {
					$data->result = 1;
					$data->mensaje = 'Registro encontrado.';
					while ($row = mysqli_fetch_array($res)) {
						$data->nombre = $row['nombre'];
						$data->correo = $row['correo'];
						$data->telefono = $row['telefono'];
						$data->mensaje = $row['mensaje'];
						$data->ip_cli = $row['ip_cli'];
						$data->nav_cli = $row['nav_cli'];
						$data->sist_cli = $row['sist_cli'];
					}
					mysqli_free_result($res);//liberar memoria del resultado
				}else{
					$data->result = 2;
					$data->mensaje = 'No se encontraron coincidencias.';
				}
			}else{
				$data->result = 3;
				$data->mensaje = 'No se ejecutó la consulta. Error: '.$_SESSION['Mysqli_Error'];
			}
			//-------------------------------------
			mysqli_close($c1);
			return $data;
		}
		function add($c1,$dt,$json){
			$data = new stdClass(); $sql=null;
			//------------------------------
			$er=1;
			if ($json->table == 1) {
				if(is_null($dt['nombre'])){ $er=0; }
				if(is_null($dt['correo'])){ $er=0; }
				if(is_null($dt['telefono'])){ $er=0; }
				if(is_null($dt['mensaje'])){ $er=0; }
			}else{
				if(is_null($dt['id'])){ $er=0; }
				if($dt['id'] <= 0){ $er=0; }
				if(is_null($dt['respuesta'])){ $er=0; }
			}
			//------------------------------
			if ($er == 1) {
				$sql = $this->get_sql((($json->table==1) ? $this->table : $this->table1), $dt, 1);
				$res = mysqli_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (mysqli_error($c1));
				if ($res) {
					$data->result = true;
					$data->inf = $json->success;
				}else{
					$data->result = false;
					$data->inf = $json->danger;
				}
			}else{
				$data->result = false;
				$data->inf = 'null';
			}
			//------------------
			$data->sql = $sql;
			//------------------
			mysqli_close($c1);
			return $data;
		}
		function estado($c1,$dt,$json){
			$data = new stdClass(); $sql=null;
			//------------------------------
			$er=1;
			if(is_null($json->pid)){ $er=0; }
			if($json->pid <= 0){ $er=0; }
			//------------------------------
			if ($er==1) {
				$sql = $this->get_sql((($json->table==1) ? $this->table : $this->table1), $dt, 2, (($json->table==1) ? $this->tid : $this->tid2), $json->pid);
				$res=mysqli_query($c1,$sql) or $_SESSION['Mysqli_Error'] = (mysqli_error($c1));
				if ($res) {
					$data->result = true;
					switch ($dt['status']) {
						case 0:
							$data->inf = 'desact';
						break;
						case 1:
							$data->inf = 'acti';
						break;
						default:
							$data->inf = 'drop';
						break;
					}
				}else{
					$data->result = false;
					switch ($dt['status']) {
						case 0:
							$data->inf = 'nodesact';
						break;
						case 1:
							$data->inf = 'noacti';
						break;
						default:
							$data->inf = 'nodrop';
						break;
					}
				}
			}else{
				$data->result = false;
				$data->inf="null";
			}
			//------------------
			$data->sql = $sql;
			//------------------------------------
			mysqli_close($c1);
			return $data;
		}
	}