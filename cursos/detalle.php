<?php
	session_start();
	$rut='../';
	$pagina='Detalle del Curso';
	$padre='Curso';
	$direc='cursos.php';
	require_once($rut.'0code.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $pagina.TIT; ?></title>
	<?php require_once($rut.'1styles.php'); ?>

	<?php
		$inf=null;

		require_once($rut.DIRACT.$direc);
		$inf = detalle($rut,$pid);

		if(isset($_SESSION['nombre'])){ $nombre = $_SESSION['nombre']; unset($_SESSION['nombre']); }else{ $nombre=null; }
		if(isset($_SESSION['descrip'])){ $descrip = $_SESSION['descrip']; unset($_SESSION['descrip']); }else{ $descrip=null; }

		require_once($rut.'0mens.php');
	?>
</head>
<body>

	<div class="container">
		<div class="row pb-5">
			<br>
		</div>

		<hr>
		
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 text-center">
				<h2><?= $pagina; ?></h2>
			</div>
			<div class="col-sm-3 text-right">
			</div>
		</div>
		
		<?php include_once($rut.'0error.php'); ?>
		
		<hr>

		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<form class="col-sm-12" method="post" action="<?= ACTI.$direc; ?>">
					<div class="card">
					  <div class="card-header">
					    Editar el <?= $padre; ?>
					  </div>
					  <div class="card-body">
					    <div class="form-group">
				            <label for="recipient-name" class="col-form-label">Nombre:</label>
				            <input type="text" class="form-control" name="nombre" value="<?= $nombre; ?>" required="required">
				          </div>
				          <div class="form-group">
				            <label for="message-text" class="col-form-label">Descripción:</label>
				            <textarea class="form-control ckeditor" id="ckeditor" name="descrip"><?= $descrip; ?></textarea>
				          </div>
				          <div class="form-group">
						    <a href="./" class="btn btn-secondary">Regresar</a>
						    <input type="hidden" name="pid" value="<?= base64_encode($pid); ?>">
						    <button type="submit" name="editar" class="btn btn-primary">Editar</button>
				          </div>
					  </div>
					</div>
				</form>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>

	<?php require_once($rut.'2java.php'); ?>
	<?php require_once($rut.'3toastr.php'); ?>
</body>
</html>
<?php
	if (isset($_SESSION['Mysqli_Error'])) { unset($_SESSION['Mysqli_Error']); }
	if (isset($_SESSION['stat'])) { unset($_SESSION['stat']); }
?>