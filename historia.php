<?php
/*
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
$historia_texto = array("La Sociedad de Egresados de la Facultad de Contaduría y Administración (SEFCA) surge como una iniciativa de egresados de la Facultad de Contaduría y Administración de la Universidad Nacional Autónoma de México, con el objetivo de crear un espacio de encuentro y colaboración entre egresados de la Facultad de Contaduría y Administración de la Universidad Nacional Autónoma de México, así como promover el desarrollo profesional y personal de sus agremiados.");

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

	<!-- AGREGAR CONTENIDO -->
	<section>
	</section>

	<!-- Footer -->
	<?php require_once("includes/footer.php"); ?>

	<!-- Botón para volver arriba -->
	<?php include("includes/volver_arriba_btn.php"); ?>

	<!-- Scripts -->
	<?php require_once("includes/scripts.php"); ?>
</body>

</html>
