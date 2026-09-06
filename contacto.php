<?php
/*
	Autor: Anuar Manuel Olvera Ramirez
	Fecha: 06/09/2026
	Versión: 1.0
	Descripción: Página "Contacto".

	SEFCA pidió Contacto con dos subpáginas (Correo electrónico y Ubicación).
	Son dos datos cortos, así que se resolvieron como dos columnas de una sola
	página en vez de dos páginas casi vacías.

	PENDIENTE SEFCA: llenar las variables de abajo. Mientras estén vacías, cada
	bloque muestra un aviso visible en lugar de datos inventados.
*/

$contacto_correo    = 'contacto@sefca.unam.mx'; // PENDIENTE SEFCA — ej. 'contacto@sefca.org.mx'
$contacto_telefono  = '+52 (55) 5622 8565'; // PENDIENTE SEFCA — opcional
$contacto_direccion = 'Facultad de Contaduría y Administración UNAM, Cto. Exterior, C.U., Coyoacán, 04510 Ciudad de México, CDMX'; // PENDIENTE SEFCA — dirección completa en una línea
$contacto_horario   = 'Lunes a viernes, 9:00 a 18:00 h'; // PENDIENTE SEFCA — ej. 'Lunes a viernes, 9:00 a 18:00 h'

/*
	PENDIENTE SEFCA: pegar aquí la URL del mapa.
	Google Maps → Compartir → Insertar un mapa → copiar solo el valor del src.
*/
$contacto_mapa_embed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.040837687447!2d-99.18719872369938!3d19.324034144136952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce0008a3c63a55%3A0xe302d1d12e5e67a2!2sFacultad%20de%20Contadur%C3%ADa%20y%20Administraci%C3%B3n%20UNAM!5e0!3m2!1ses-419!2smx!4v1788714450389!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin';

// Redes sociales activas (las mismas que ya usa el footer).
$contacto_redes = array(
	array('nombre' => 'Facebook', 'icono' => 'fab fa-facebook-f', 'url' => 'https://www.facebook.com/SEFCAUNAM'),
	array('nombre' => 'YouTube',  'icono' => 'fab fa-youtube',    'url' => 'https://www.youtube.com/@SEFCA'),
);

if (!function_exists('escapar_contacto')) {
	function escapar_contacto($valor)
	{
		return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
	}
}
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
		$heroTitulo = "Contacto";
		$heroTexto  = "Escríbenos o visítanos. La Sociedad de Egresados de la FCA está para su comunidad.";
		include("includes/hero-pagina.php");
	?>

	<section class="contacto-seccion section-gap">
		<div class="container">
			<div class="contacto-rejilla">

				<!-- Columna: correo electrónico y redes -->
				<div class="contacto-bloque" data-aos="fade-up">
					<span class="text-uppercase subtitle-gold">Correo electrónico</span>
					<h2 class="contacto-bloque-titulo">Escríbenos</h2>

					<?php if ($contacto_correo !== ''): ?>
						<p class="contacto-dato">
							<i class="fas fa-envelope contacto-icono" aria-hidden="true"></i>
							<a href="mailto:<?php echo escapar_contacto($contacto_correo); ?>">
								<?php echo escapar_contacto($contacto_correo); ?>
							</a>
						</p>
					<?php else: ?>
						<p class="contacto-pendiente">
							<i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
							Falta el correo de contacto. Se define en <code>$contacto_correo</code>, al inicio de <code>contacto.php</code>.
						</p>
					<?php endif; ?>

					<?php if ($contacto_telefono !== ''): ?>
						<p class="contacto-dato">
							<i class="fas fa-phone contacto-icono" aria-hidden="true"></i>
							<a href="tel:<?php echo escapar_contacto(preg_replace('/[^0-9+]/', '', $contacto_telefono)); ?>">
								<?php echo escapar_contacto($contacto_telefono); ?>
							</a>
						</p>
					<?php endif; ?>

					<?php if ($contacto_horario !== ''): ?>
						<p class="contacto-dato">
							<i class="fas fa-clock contacto-icono" aria-hidden="true"></i>
							<?php echo escapar_contacto($contacto_horario); ?>
						</p>
					<?php endif; ?>
				</div>

				<!-- Columna: ubicación -->
				<div class="contacto-bloque" data-aos="fade-up" data-aos-delay="100">
					<span class="text-uppercase subtitle-gold">Ubicación</span>
					<h2 class="contacto-bloque-titulo">Visítanos</h2>

					<?php if ($contacto_direccion !== ''): ?>
						<p class="contacto-dato">
							<i class="fas fa-map-marker-alt contacto-icono" aria-hidden="true"></i>
							<?php echo escapar_contacto($contacto_direccion); ?>
						</p>
					<?php else: ?>
						<p class="contacto-pendiente">
							<i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
							Falta la dirección. Se define en <code>$contacto_direccion</code>, al inicio de <code>contacto.php</code>.
						</p>
					<?php endif; ?>

					<?php if ($contacto_mapa_embed !== ''): ?>
						<div class="contacto-mapa">
							<iframe
								src="<?php echo escapar_contacto($contacto_mapa_embed); ?>"
								title="Mapa de ubicación de la SEFCA"
								loading="lazy"
								referrerpolicy="no-referrer-when-downgrade"
								allowfullscreen></iframe>
						</div>
					<?php else: ?>
						<div class="contacto-mapa contacto-mapa-pendiente">
							<i class="fas fa-map-marked-alt" aria-hidden="true"></i>
							<p>Falta el mapa. Se define en <code>$contacto_mapa_embed</code>, al inicio de <code>contacto.php</code>.</p>
						</div>
					<?php endif; ?>
				</div>

			</div>
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
