<?php
	session_start();
	$rut='../';
	$pagina='Contacto';
	$direc='contacto.php';
	require_once($rut.'0code.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?= $pagina.TIT; ?></title>
	<?php include_once($rut.'1styles.php'); ?>

	<?php
		require_once($rut.'sistem/0mens.php');
	?>
</head>
<body>
	<!-- Header Section -->
		<?php include_once($rut.'2nav.php'); ?>
	<!-- Header Section end -->

	<!-- Hero Section -->
	<section class="contact__page">
		<div class="contact__warp">
			<div class="row">
				<div class="col-md-6">
					<h2>Contacto</h2>
					<div class="contact__social">
						<a href="<?= FACE; ?>"><i class="fa fa-facebook"></i></a>
						<a href="<?= TWIT; ?>"><i class="fa fa-twitter"></i></a>
						<!--<a href=""><i class="fa fa-linkedin"></i></a>-->
						<a href="<?= INST; ?>"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
				<div class="col-md-6">
					<div class="contact__text">
						<p>Phone: 001-1234-666666</p>
						<p>Email: hi.colorlib@gmail.com</p>
						<p>Address: 562 Domenic Corner Suite 613</p>
					</div>
				</div>
			</div>
			<form method="post" action="<?= ACTI.$direc; ?>" class="contact__form">
				<input type="text" name="nombre" placeholder="Nombre Completo" required="required">
				<input type="text" name="correo" placeholder="Correo electrónico" required="required">
				<input type="text" name="telefono" placeholder="Teléfono" required="required">
				<textarea placeholder="Message" class="ckeditor" id="ckeditor" name="mensaje" required="required"></textarea>
				<button type="submit" name="guardar" class="site-btn">Enviar Mensaje</button>
			</form>
		</div>
	</section>
	<!-- Hero Section end -->

	<!-- Footer Section -->
		<?php include_once($rut.'3footer.php'); ?>
	<!-- Footer Section end -->

	<!--====== Javascripts & Jquery ======-->
		<?php include_once($rut.'4java.php'); ?>
	<?php require_once($rut.'sistem/3toastr.php'); ?>

	</body>
</html>
<?php
	if (isset($_SESSION['Mysqli_Error'])) { unset($_SESSION['Mysqli_Error']); }
	if (isset($_SESSION['stat'])) { unset($_SESSION['stat']); }
?>