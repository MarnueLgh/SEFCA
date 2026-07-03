<?php
/*
 * Fecha: 17/04/2026
 * Descripcion: Carrusel horizontal de eventos recientes con datos centralizados.
 */

require_once __DIR__ . '/datos_eventos.php';

$cards_eventos = array_slice(obtener_eventos_carrusel(), 0, 8);

if (!function_exists('escapar_carrusel_eventos')) {
    function escapar_carrusel_eventos($valor)
    {
        return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
    }
}
?>

<section class="carrusel-eventos section-gap">
    <div class="container-fluid px-0">
        <div>
            <h2 class="carrusel-marquee-header-title text-center mb-5">Eventos Recientes</h2>

            <div class="owl-carousel eventos-carousel owl-theme">
                <?php foreach ($cards_eventos as $card): ?>
                    <?php
                    $atributos_externos = !empty($card['target_blank'])
                        ? ' target="_blank" rel="noopener noreferrer"'
                        : '';
                    ?>
                    <a href="<?php echo escapar_carrusel_eventos($card['enlace']); ?>"<?php echo $atributos_externos; ?> class="carrusel-cyber-card">
                        <div class="carrusel-cyber-card-img-wrap">
                            <img
                                src="<?php echo escapar_carrusel_eventos($card['imagen']); ?>"
                                alt="<?php echo escapar_carrusel_eventos($card['titulo']); ?>"
                                class="carrusel-cyber-card-img"
                            >
                        </div>
                        <div class="carrusel-cyber-card-body">
                            <h3 class="carrusel-cyber-title"><?php echo escapar_carrusel_eventos($card['titulo']); ?></h3>
                            <p class="carrusel-cyber-excerpt"><?php echo escapar_carrusel_eventos($card['excerpt']); ?></p>

                            <div class="carrusel-cyber-btn-wrapper mt-auto">
                                <span class="carrusel-cyber-btn">
                                    <i class="bi bi-arrow-return-right me-1"></i> <?php echo escapar_carrusel_eventos($card['boton']); ?>
                                </span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>