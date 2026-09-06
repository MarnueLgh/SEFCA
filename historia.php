<?php
/*
	Autor: Anuar Manuel Olvera Ramirez
	Fecha: 06/09/2026
	Versión: 2.0
	Descripción: Página "Historia" (rubro Somos SEFCA).

	La cronología NO se escribe a mano: se deriva de includes/datos_eventos.php
	ordenando los eventos fechados de más antiguo a más reciente. Así cada
	evento nuevo que se registre en el catálogo aparece solo aquí, y la historia
	nunca se desincroniza del resto del sitio.

	PENDIENTE SEFCA: falta el relato de origen (fundación, fundadores, motivo).
	Se escribe en $historia_texto; mientras esté vacío se muestra un aviso.
*/

require_once __DIR__ . '/includes/datos_eventos.php';

// PENDIENTE SEFCA: párrafos de la reseña histórica, uno por elemento.
$historia_texto = array();

// Construir la cronología a partir del catálogo de eventos.
$hitos_historia = array();

foreach (obtener_eventos_listado() as $clave_hito => $evento_hito) {
	// Los eventos sin fecha confirmada no se pueden ubicar en la línea de tiempo.
	if (empty($evento_hito['anio']) || empty($evento_hito['mes'])) {
		continue;
	}

	$hitos_historia[] = array(
		'clave' => $clave_hito,
		'anio' => (int) $evento_hito['anio'],
		'mes' => (int) $evento_hito['mes'],
		'titulo' => $evento_hito['titulo'],
		'fecha_etiqueta' => isset($evento_hito['fecha_etiqueta']) ? $evento_hito['fecha_etiqueta'] : '',
		'descripcion' => isset($evento_hito['descripcion']) ? $evento_hito['descripcion'] : '',
		'imagen' => isset($evento_hito['imagen']) ? $evento_hito['imagen'] : '',
		'imagen_alt' => isset($evento_hito['imagen_alt']) ? $evento_hito['imagen_alt'] : '',
		'acciones' => isset($evento_hito['acciones']) ? $evento_hito['acciones'] : array(),
	);
}

// De lo más antiguo a lo más reciente: una historia se lee hacia adelante.
usort($hitos_historia, function ($a, $b) {
	if ($a['anio'] !== $b['anio']) {
		return $a['anio'] - $b['anio'];
	}

	return $a['mes'] - $b['mes'];
});

if (!function_exists('escapar_historia')) {
	function escapar_historia($valor)
	{
		return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
	}
}

$anio_previo_historia = null;
?>
<!DOCTYPE html>
<html lang="es">

<?php require_once("includes/head.php"); ?>

<body>
	<!-- Spinner -->
	<?php include("includes/spinner.php"); ?>
	<!-- Navbar -->
	<?php include("includes/navbar.php"); ?>

	<!-- Hero pagina -->
	<?php
		$heroTitulo = "Historia";
		$heroTexto  = "Somos SEFCA: los orígenes y la evolución de la Sociedad de Egresados de la Facultad de Contaduría y Administración.";
		include("includes/hero-pagina.php");
	?>

	<!-- Reseña histórica -->
	<section class="historia-intro section-gap">
		<div class="container">
			<div class="historia-intro-texto" data-aos="fade-up">
				<span class="text-uppercase subtitle-gold">Nuestro origen</span>
				<h2 class="carta-section-titulo">Una comunidad que <em>no se desliga</em> de su Facultad</h2>

				<?php if (!empty($historia_texto)): ?>
					<?php foreach ($historia_texto as $parrafo_historia): ?>
						<p class="carta-section-cuerpo"><?php echo escapar_historia($parrafo_historia); ?></p>
					<?php endforeach; ?>
				<?php else: ?>
					<p class="historia-pendiente">
						<i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
						Falta la reseña histórica de la SEFCA (fundación, fundadores y motivo).
						Se escribe en <code>$historia_texto</code>, al inicio de <code>historia.php</code>.
					</p>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Cronología derivada del catálogo de eventos -->
	<section class="historia-linea section-gap">
		<div class="container">
			<div class="text-center" data-aos="fade-up">
				<span class="text-uppercase subtitle-gold">Cronología</span>
				<h2 class="carta-section-titulo">Lo que hemos <em>construido</em> juntos</h2>
			</div>

			<ol class="historia-hitos">
				<?php foreach ($hitos_historia as $hito): ?>
					<li class="historia-hito" data-aos="fade-up">
						<?php if ($anio_previo_historia !== $hito['anio']): ?>
							<span class="historia-hito-anio"><?php echo escapar_historia($hito['anio']); ?></span>
							<?php $anio_previo_historia = $hito['anio']; ?>
						<?php endif; ?>

						<div class="historia-hito-cuerpo">
							<?php if ($hito['imagen'] !== ''): ?>
								<div class="historia-hito-img">
									<img
										src="<?php echo escapar_historia($hito['imagen']); ?>"
										alt="<?php echo escapar_historia($hito['imagen_alt']); ?>"
										loading="lazy">
								</div>
							<?php endif; ?>

							<div class="historia-hito-texto">
								<?php if ($hito['fecha_etiqueta'] !== ''): ?>
									<span class="historia-hito-fecha"><?php echo escapar_historia($hito['fecha_etiqueta']); ?></span>
								<?php endif; ?>
								<h3 class="historia-hito-titulo"><?php echo escapar_historia($hito['titulo']); ?></h3>
								<p class="historia-hito-desc"><?php echo escapar_historia($hito['descripcion']); ?></p>

								<?php if (!empty($hito['acciones'])): ?>
									<?php $accion_hito = $hito['acciones'][0]; ?>
									<a
										class="evento-card-enlace"
										href="<?php echo escapar_historia($accion_hito['url']); ?>"
										<?php echo !empty($accion_hito['target_blank']) ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
										<?php echo escapar_historia($accion_hito['texto']); ?> <i class="fas fa-arrow-right"></i>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>

	<!-- Footer -->
	<?php require_once("includes/footer.php"); ?>

	<!-- Botón para volver arriba -->
	<?php include("includes/volver_arriba_btn.php"); ?>

	<!-- Scripts -->
	<?php require_once("includes/scripts.php"); ?>
</body>

</html>
