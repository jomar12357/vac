<?php
	/**
	 * 
	 */
	class cursos
	{
		private $table ='cursos';

		function listar($c1){
			$inf=null;$n=1;$cant=5;
			$inf.='<thead>';
				$inf.='<tr>';
					$inf.='<th scope="col">#</th>';
					$inf.='<th scope="col">Nombre</th>';
					$inf.='<th scope="col">Descripción</th>';
					$inf.='<th scope="col">Creado</th>';
					$inf.='<th scope="col">Gestión</th>';
				$inf.='</tr>';
			$inf.='</thead>';
			$inf.='<tbody>';
				$sql = "SELECT * FROM ".$this->table." WHERE status=1;";
				$res = mysqli_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (mysqli_error($c1));
				if ($res) {
					if ($res->num_rows > 0) {
						while ($row = mysqli_fetch_array($res)) {
							$inf.='<tr>';
								$inf.='<th scope="row">'.$n.'</th>';
								$inf.='<td>'.$row['nombre'].'</td>';
								$inf.='<td>'.$row['descrip'].'</td>';
								$inf.='<td>'.$row['created_at'].'</td>';
								$inf.='<td>';
									$inf.='';
								$inf.='</td>';
							$inf.='</tr>';

							$n++;
						}
						mysqli_free_result($res);//liberar memoria del resultado
					}else{
						$inf.='<tr><td colspan="'.$cant.'"><div class="alert alert-warning">No se encontró ningún registro</div></td></tr>';
					}
				}else{
					$inf.='<tr><td colspan="'.$cant.'"><div class="alert alert-danger">Error: '.$_SESSION['Mysqli_Error'].'</div></td></tr>';
				}
			$inf.='</tbody>';

			mysqli_close($c1);
			return $inf;
		}
		function add($c1,$nombre,$descrip,$created_at){
			$inf=null;$er=1;
			$sql="INSERT INTO ".$this->table." (nombre, descrip, created_at) VALUES ('".$nombre."', '".$descrip."', '".$created_at."');";
			$res = mysqli_query($c1,$sql) OR $_SESSION['Mysqli_Error'] = (mysqli_error($c1));
			if ($res) {
				$inf='add';
			}else{
				$inf='noadd';
			}

			mysqli_close($c1);
			return $inf;
		}
	}
?>