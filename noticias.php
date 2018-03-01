<?php require_once ('conexion.php');

$menu = 'noticias';
if (!isset($_SESSION['paginacion'])) {
$_SESSION['paginacion'] = 0;
} else if (isset($_SESSION['paginacion']) && $_SESSION['paginacion'] != 0) {
$porpagina += $_SESSION['paginacion'];
}

$accion_post   = sprintf("SELECT * FROM post ORDER BY id DESC LIMIT $porpagina ");
$consulta_post = mysqli_query($conexion, $accion_post);
$datos_post    = mysqli_fetch_assoc($consulta_post);
$cantidad_post = mysqli_num_rows($consulta_post);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $dato_post['title'];?></title>
<link rel="shorcut icon" type="image/x-icon" href="<?php echo $dato[0];?>img/HELMI1.ico">
<link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $daro[0];?>css/styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo $dato[0];?>css/my-style.css">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="description" content="<?php echo strip_tags($dato[5]);?>">
<meta name="robots" content="index, follow">
</head>
<body>
<?php include 'inc/header.php';?>
<div class="ed-container">
<div class="main-conent ed-container">
<div class="ed-item m-75 l-75">
<h1>POSTS</h1>
<div id="listar">


<?php

if ($cantidad_post != 0) {
	do {

		$imagenes = $datos_post['image'];
		$partes   = explode('####', $imagenes);

		?>
		<div class="ed-container">
			<div class="ed-item l-25 m-25">

				<?php if ($imagenes != '') {?>
				<img src=" <?php echo $dato[0];?>img/upload/<?php echo $partes[0];?>">
				<?php } else {?>
				<img src="<?php echo $dato[0];?>img/HELMI1.png">
				<?php }?>

			</div>
			<div class="ed-item m-75 l-75">
				<h2><a class="title-pub" href=" <?php echo $dato[0];?>post/<?php echo $datos_post['seo'];?> "><?php echo $datos_post['title'];
					?></a> </h2>
					<p class="content-pub">
						<?php echo substr(strip_tags($datos_post['content']), 0, 1000);?></p><br><br>
						<div class="etiqueta etiqueta-pequenia fecha">
							<p>
								<time datetime="<?php echo $datos_post['fecha'];?>">
									Publicado el  dia <strong><?php echo date('d/m/Y H:i', strtotime($datos_post['fecha']));?></strong>
								</time>
							</p></div>
						</div>

					</div>

					<?php } while ($datos_post = mysqli_fetch_assoc($consulta_post));
				}?>
			</div>

			<div class="texto-centrado main-center" id="cargar">
				<a onclick="paginar();" class="button button-enviar" id="ocultar">cargar mas</a>
			</div>
			<br>
		</div>

		<aside class="ed-item m-25 l-25">


			<?php include ('inc/sidebar.php');?>
		</aside>

	</div>
</div>
<div  style="max-width: 100%;">
	<?php include 'inc/footer.php';?>

	<script type="text/javascript" src="<?php echo $dato[o];?>js/ed-grid.js"></script>
	<script type="text/javascript" src="<?php echo $dato[0];?>js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $dato[0];?>/js/efectos.js"></script>
	<script type="text/javascript">
		edgrid.menu('nav','menu');
	</script>
</body>
</html>


<?php mysqli_free_result($consulta_post);