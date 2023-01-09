<?php
	if(isset($_SESSION)){}else{ session_start(); }
	$rut='./';
	$pagina='Principal';
	$direc='index.php';
	require_once($rut.'config/0code.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?= $pagina.TIT; ?></title>
	<?php 
		include_once($rut.CONF.'1styles.php');
		//-----------------------------------
		$data = null;$inf=null;
		//-----------------------------------
		require_once($rut.DIRACT.$direc);
		$data = index($rut);
		//-----------------------------------
		if (isset($data->inf)) {
			$inf = $data->inf;
		}
	?>
</head>
<body>
	<!-- Header Section -->
		<?php include_once($rut.CONF.'2nav.php'); ?>
	<!-- Header Section end -->

	<!-- Hero Section -->
	<section class="hero__section">
		<?php echo $inf; $inf=null; ?>
	</section>
	<!-- Hero Section end -->

	<!-- Footer Section -->
		<?php include_once($rut.CONF.'3footer.php'); ?>
	<!-- Footer Section end -->

	<!--====== Javascripts & Jquery ======-->
		<?php include_once($rut.CONF.'4java.php'); ?>

	</body>
</html>