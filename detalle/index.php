<?php
	session_start();
	$rut='../';
	$pagina='Detalle del Curso';
	$direc='index.php';
	require_once($rut.'0code.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?= $pagina.TIT; ?></title>
	<?php
		include_once($rut.'1styles.php');
		//---------------------------------
		$data=null;$inf=null;
		//---------------------------------
		require_once($rut.DIRACT.$direc);
		$data = detalle($rut,$pid);
		//---------------------------------
		if (isset($data->inf)) {
			$inf = $data->inf;
		}else{
			header("Location: ".$rut);
			exit();
		}
	?>
</head>
<body>
	<!-- Header Section -->
		<?php include_once($rut.'2nav.php'); ?>
	<!-- Header Section end -->

	<!-- Hero Section -->
	<section class="about__page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="about__text">
						<h3 class="about__title"><?= $inf->nombre; ?></h3>
						<?= $inf->descrip; ?>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="experience__text">
						<h3 class="about__title">Imagen:</h3>
						<img src=" <?= IMG.'cursos/'.$inf->imagen; ?>" alt="<?= $inf->nombre; ?>">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="skills__text">
						<h3 class="about__title">Skills</h3>
						<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Vivamus at nibh tincidunt, bibendum ligula id. </p>
						<div class="single-progress-item">
							<h6>Development</h6>
							<div class="progress-bar-style" data-progress="70"></div>
						</div>
						<div class="single-progress-item">
							<h6>APP Design</h6>
							<div class="progress-bar-style" data-progress="70"></div>
						</div>
						<div class="single-progress-item">
							<h6>Graphic Design</h6>
							<div class="progress-bar-style" data-progress="70"></div>
						</div>
						<div class="single-progress-item">
							<h6>Photography</h6>
							<div class="progress-bar-style" data-progress="70"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero Section end -->
	<!-- Footer Section -->
		<?php include_once($rut.'3footer.php'); ?>
	<!-- Footer Section end -->
	<!--====== Javascripts & Jquery ======-->
		<?php include_once($rut.'4java.php'); ?>
	</body>
</html>
