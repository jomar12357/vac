<?php
	session_start();
	$rut='../';
	$pagina='Cursos';
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
		$inf = index($rut);

		//require_once($rut.'0mens.php');
	?>
</head>
<body>

	<div class="container">
		<div class="row pb-5">
			<?php if (isset($_SESSION['Mysqli_Error'])): ?>
				<div class="alert alert-danger"><?= $_SESSION['Mysqli_Error']; ?></div>
			<?php endif ?>
			<?php if (isset($_SESSION['stat'])): ?>
				<div class="alert alert-secondary"><?= $_SESSION['stat']; ?></div>
			<?php endif ?>
		</div>

		<hr>
		
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 text-center">
				<h2>Lista de <?= $pagina; ?></h2>
			</div>
			<div class="col-sm-3 text-right">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Nuevo <?= substr($pagina, 0, -1); ?></button>
			</div>
		</div>
		
		<hr>

		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<table class="table table-dark">
					<?php echo $inf; $inf=null; ?>
				</table>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>

	<?php require_once($rut.'2java.php'); ?>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Nuevo <?= substr($pagina, 0, -1); ?></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form>
	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Nombre:</label>
	            <input type="text" class="form-control" name="nombre">
	          </div>
	          <div class="form-group">
	            <label for="message-text" class="col-form-label">Message:</label>
	            <textarea class="form-control ckeditor" id="ckeditor" name="descrip"></textarea>
	          </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="guardar" class="btn btn-primary">Guardar <?= substr($pagina, 0, -1); ?></button>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>
<?php
	if (isset($_SESSION['Mysqli_Error'])) { unset($_SESSION['Mysqli_Error']); }
	if (isset($_SESSION['stat'])) { unset($_SESSION['stat']); }
?>