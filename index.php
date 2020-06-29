<?php
	session_start();
	$rut='./';
	$pagina='Principal';
	$direc='index.php';
	require_once($rut.'0code.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?= $pagina.TIT; ?></title>
	<?php include_once($rut.'1styles.php'); ?>

	<?php
		$inf=null;

		require_once($rut.DIRACT.$direc);
		$inf = index($rut);
	?>
</head>
<body>
	<!-- Header Section -->
		<?php include_once($rut.'2nav.php'); ?>
	<!-- Header Section end -->

	<!-- Hero Section -->
	<section class="hero__section">
		<?php echo $inf; $inf=null; ?>
	</section>
	<!-- Hero Section end -->

	<!-- Footer Section -->
		<?php include_once($rut.'3footer.php'); ?>
	<!-- Footer Section end -->

	<!--====== Javascripts & Jquery ======-->
		<?php include_once($rut.'4java.php'); ?>

	</body>
</html>
