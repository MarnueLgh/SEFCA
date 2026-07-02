<?php
if (isset($_SERVER['SCRIPT_FILENAME']) && realpath($_SERVER['SCRIPT_FILENAME']) === __FILE__) {
    $queryString = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== ''
        ? '?' . $_SERVER['QUERY_STRING']
        : '';

    header('Location: ../evento.php' . $queryString);
    exit;
}

require_once __DIR__ . '/datos_eventos.php';

$eventos = obtener_eventos_galeria();
$clave = isset($_GET['evento']) ? $_GET['evento'] : '';

if (!isset($eventos[$clave])) {
    header('Location: eventos.php');
    exit;
}

$evento = $eventos[$clave];
$galeria = $evento['galeria'];
$eventoTitulo = $evento['titulo'];
$eventoFecha = isset($evento['fecha_etiqueta']) ? $evento['fecha_etiqueta'] : '';
$eventoDescripcion = isset($evento['descripcion']) ? $evento['descripcion'] : '';
$fotos = [];

if (isset($galeria['fotos'])) {
    foreach ($galeria['fotos'] as $archivo) {
        $fotos[] = $galeria['carpeta'] . '/' . $archivo;
    }
} else {
    $inicio = isset($galeria['inicio']) ? (int) $galeria['inicio'] : 1;
    $cantidad = isset($galeria['cantidad']) ? (int) $galeria['cantidad'] : 0;
    $fin = $inicio + $cantidad - 1;

    for ($i = $inicio; $i <= $fin; $i++) {
        $num = str_pad($i, 2, '0', STR_PAD_LEFT);
        $fotos[] = $galeria['carpeta'] . '/' . $num . '.' . $galeria['extension'];
    }
}

if (!function_exists('escapar_evento')) {
    function escapar_evento($valor)
    {
        return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
    }
}
?>

<!-- Estructura html -->
<!DOCTYPE html>
<html lang="es">

    <!-- Head -->
    <?php require_once __DIR__ . "/head.php"; ?>

<body>
    <!-- Spinner -->
    <?php include __DIR__ . "/spinner.php"; ?>

    <!-- Navbar -->
    <?php include __DIR__ . "/navbar.php"; ?>

    <!-- Hero pagina -->
    <?php
        $heroTitulo = $eventoTitulo;
        $heroTexto = !empty($eventoFecha) ? $eventoFecha : 'Galería fotográfica del evento.';
        include __DIR__ . "/hero-pagina.php";
    ?>

    <div class="galeria-container">
        <?php if (!empty($eventoFecha) || !empty($eventoDescripcion)): ?>
            <div class="galeria-info">
                <?php if (!empty($eventoFecha)): ?>
                    <span class="galeria-info-fecha"><?php echo escapar_evento($eventoFecha); ?></span>
                <?php endif; ?>
                <?php if (!empty($eventoDescripcion)): ?>
                    <p class="galeria-info-desc"><?php echo escapar_evento($eventoDescripcion); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="galeria-grid">
            <?php foreach ($fotos as $index => $foto): ?>
                <div class="galeria-item">
                    <img
                        src="<?php echo escapar_evento($foto); ?>"
                        alt="Foto <?php echo escapar_evento($index + 1); ?> - <?php echo escapar_evento($eventoTitulo); ?>"
                        loading="lazy"
                    >
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once __DIR__ . "/footer.php"; ?>

    <!-- Botón volver arriba -->
    <?php include __DIR__ . "/volver_arriba_btn.php"; ?>

    <!-- Scripts -->
    <?php require_once __DIR__ . "/scripts.php"; ?>
</body>

</html>
