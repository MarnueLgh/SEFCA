<?php
/*
	Autor: Anuar Manuel Olvera Ramirez
	Fecha: 06/09/2026
	Versión: 1.0
	Descripción: Componente único del listado de eventos (sidebar de filtros,
	grid de tarjetas, paginación y lightbox). Lo consumen eventos.php,
	conferencias.php, tomas_protesta.php y egresados_distinguidos.php,
	de modo que el listado existe una sola vez en el proyecto.

	USO:
	Antes de incluir este archivo, definir:
		$eventos_a_listar    → (obligatorio) arreglo de eventos ya filtrado,
		                       normalmente obtener_eventos_listado('<tipo>')
		$eventos_vacio_texto → (opcional) mensaje cuando ningún evento coincide

	El filtro por año se construye solo a partir de $eventos_a_listar, así que
	cada página muestra únicamente sus propios años. Si hay menos de dos años
	distintos el sidebar se omite y el grid ocupa todo el ancho.

	El comportamiento (filtros, paginación y lightbox) vive en js/main.js,
	que se activa al detectar #eventos-grid en la página.
*/

if (!isset($eventos_a_listar) || !is_array($eventos_a_listar)) {
	return;
}

if (!isset($eventos_vacio_texto)) {
	$eventos_vacio_texto = 'No se encontraron eventos con los filtros seleccionados.';
}

if (!function_exists('escapar_eventos')) {
	function escapar_eventos($valor)
	{
		return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
	}
}

$anios_eventos = [];

foreach ($eventos_a_listar as $evento_listado) {
	// Los eventos sin fecha confirmada no aportan un año al filtro.
	if (empty($evento_listado['anio'])) {
		continue;
	}

	$anio_evento = (string) $evento_listado['anio'];

	if (!in_array($anio_evento, $anios_eventos, true)) {
		$anios_eventos[] = $anio_evento;
	}
}

rsort($anios_eventos, SORT_NUMERIC);

$mostrar_filtros = count($anios_eventos) > 1;
?>

<div class="galeria-layout">
	<?php if ($mostrar_filtros): ?>
		<aside class="galeria-sidebar" id="galeria-sidebar">
			<div class="filtro-sidebar-header">
				<span class="filtro-sidebar-titulo">Filtros</span>
				<button class="filtro-limpiar" id="filtro-limpiar" title="Limpiar filtros">
					<i class="fas fa-trash-alt"></i> Limpiar
				</button>
			</div>

			<div class="filtro-grupo">
				<span class="filtro-etiqueta">Por año:</span>
				<div class="filtro-pills" data-filter="anio">
					<button class="boton-sm-filtro activo" data-value="todos">Todos</button>
					<?php foreach ($anios_eventos as $anio_evento): ?>
						<button class="boton-sm-filtro" data-value="<?php echo escapar_eventos($anio_evento); ?>">
							<?php echo escapar_eventos($anio_evento); ?>
						</button>
					<?php endforeach; ?>
				</div>
			</div>
		</aside>
	<?php endif; ?>

	<div class="galeria-wrapper">
		<div class="galeria-main">
			<p class="filtro-vacio" id="filtro-vacio" style="display:none;">
				<?php echo escapar_eventos($eventos_vacio_texto); ?>
			</p>

			<div class="eventos-grid" id="eventos-grid">
				<?php foreach ($eventos_a_listar as $evento): ?>
					<article
						class="evento-card"
						data-tipo="<?php echo escapar_eventos(isset($evento['tipo']) ? $evento['tipo'] : ''); ?>"
						data-mes="<?php echo escapar_eventos(isset($evento['mes']) ? $evento['mes'] : ''); ?>"
						data-anio="<?php echo escapar_eventos(isset($evento['anio']) ? $evento['anio'] : ''); ?>"
					>
						<div class="evento-card-img">
							<img
								src="<?php echo escapar_eventos($evento['imagen']); ?>"
								alt="<?php echo escapar_eventos($evento['imagen_alt']); ?>"
							>
						</div>
						<div class="evento-card-cuerpo">
							<?php if (!empty($evento['fecha_etiqueta'])): ?>
								<div class="evento-card-meta">
									<span class="evento-card-tag"><?php echo escapar_eventos($evento['fecha_etiqueta']); ?></span>
								</div>
							<?php endif; ?>
							<h2 class="evento-card-titulo"><?php echo escapar_eventos($evento['titulo']); ?></h2>
							<p class="evento-card-desc">
								<?php echo escapar_eventos(isset($evento['descripcion']) ? $evento['descripcion'] : ''); ?>
							</p>
							<?php if (!empty($evento['acciones'])): ?>
								<div class="evento-card-acciones">
									<?php foreach ($evento['acciones'] as $accion): ?>
										<?php
										$clase_accion = 'evento-card-enlace';

										if (!empty($accion['clase'])) {
											$clase_accion .= ' ' . $accion['clase'];
										}

										$atributos_externos = !empty($accion['target_blank'])
											? ' target="_blank" rel="noopener noreferrer"'
											: '';
										?>
										<a class="<?php echo escapar_eventos($clase_accion); ?>" href="<?php echo escapar_eventos($accion['url']); ?>"<?php echo $atributos_externos; ?>>
											<?php echo escapar_eventos($accion['texto']); ?> <i class="fas fa-arrow-right"></i>
										</a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<nav class="paginacion" id="paginacion" aria-label="Paginación de eventos"></nav>
		</div>
	</div>
</div>

<div class="lightbox-overlay" id="lightboxOverlay">
	<div class="lightbox-cerrar" id="lightboxCerrar">&times;</div>
	<!-- Sin src inicial: js/main.js lo asigna al abrir. Un src="" pide una
	     imagen vacía y la pinta como rota en algunos navegadores. -->
	<img alt="Zoom" class="lightbox-img" id="lightboxImg">
</div>
