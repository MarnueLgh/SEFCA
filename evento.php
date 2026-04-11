<!DOCTYPE html>
<html lang="es">

<?php require_once("includes/head.php"); ?>



<?php
/*
 * 
 *  CONFIGURACIÓN DE EVENTOS                                    
 *  Para agregar un nuevo evento con galería:                   
 *  1. Crea una carpeta en img/ con las fotos del evento        
 *  2. Agrega una entrada al array $eventos con:                
 *     - titulo: nombre del evento                              
 *     - fecha: fecha del evento                                
 *     - descripcion: texto descriptivo                         
 *     - carpeta: ruta de la carpeta con las imágenes           
 *     - extension: extensión de las fotos (jpg, JPG, png)      
 *     - cantidad: número de fotos en la carpeta                
 *     - inicio: número del primer archivo (ej: 1 para 01.jpg)  
 *  3. En historico.php, agrega un <article> apuntando    
 *     a evento.php?evento=TU_CLAVE                     
 * 
 */

$eventos = [
    '30_aniversario' => [
        'titulo'      => '30 aniversario de egresados de la SEFCA',
        'fecha'       => 'Miércoles, 1 de marzo de 2023 · 14:00 h',
        'descripcion' => 'Celebración del trigésimo aniversario de la Sociedad de Egresados en el Palacio de Autonomía. Evento conmemorativo con la presencia de autoridades y miembros distinguidos.',
        'carpeta'     => 'img/30_aniversario',
        'extension'   => 'jpg',
        'cantidad'    => 13,
        'inicio'      => 1,
    ],
    'alfredo_helu' => [
        'titulo'      => 'Visita de Alfredo Harp Helú',
        'fecha'       => '2023',
        'descripcion' => 'Visita del empresario y filántropo Alfredo Harp Helú a las instalaciones de la Facultad de Contaduría y Administración.',
        'carpeta'     => 'img',
        'extension'   => 'jpg',
        'fotos'       => [
            'visita_alfredo_helu_1.jpg',
            'visita_alfredo_helu_2.jpg',
            'visita_alfredo_helu_3.jpg',
            'visita_alfredo_helu_4.jpg',
        ],
    ],
    'conferencias_magistrales' => [
        'titulo'      => 'Conferencias Magistrales',
        'fecha'       => '',
        'descripcion' => 'Galería fotográfica de las Conferencias Magistrales organizadas por la SEFCA UNAM.',
        'carpeta'     => 'img/conferencias_magistrales',
        'extension'   => 'JPG',
        'fotos'       => [
            '02.JPG','03.JPG','04.JPG','05.JPG','06.JPG','07.JPG','08.JPG','09.JPG',
            '11.JPG','12.JPG','13.JPG','14.JPG','15.JPG','16.JPG','17.JPG','18.JPG','19.JPG','20.JPG',
        ],
    ],
];

// Obtener evento seleccionado
$clave = isset($_GET['evento']) ? $_GET['evento'] : '';
$evento = isset($eventos[$clave]) ? $eventos[$clave] : null;

if (!$evento) {
    // Redirigir si no existe
    header('Location: historico.php');
    exit;
}

// Construir lista de fotos
$fotos = [];
if (isset($evento['fotos'])) {
    // Lista explícita de archivos
    foreach ($evento['fotos'] as $archivo) {
        $fotos[] = $evento['carpeta'] . '/' . $archivo;
    }
} else {
    // Archivos numerados secuenciales
    for ($i = $evento['inicio']; $i <= $evento['cantidad']; $i++) {
        $num = str_pad($i, 2, '0', STR_PAD_LEFT);
        $fotos[] = $evento['carpeta'] . '/' . $num . '.' . $evento['extension'];
    }
}
?>

<body>
    <?php include("includes/spinner.php"); ?>
    <?php include("includes/navbar.php"); ?>

    <!-- Hero de la galería -->
    <?php
        $heroTitulo = htmlspecialchars($evento['titulo']);
        $heroTexto  = htmlspecialchars($evento['fecha']);
        include("includes/hero-pagina.php");
    ?>


    <!-- Galería -->
    <div class="galeria-container">

        <?php if (!empty($evento['descripcion'])): ?>
            <div class="galeria-info">
                <?php if (!empty($evento['fecha'])): ?>
                    <span class="galeria-info-fecha"><?php echo htmlspecialchars($evento['fecha']); ?></span>
                <?php endif; ?>
                <p class="galeria-info-desc"><?php echo htmlspecialchars($evento['descripcion']); ?></p>
            </div>
        <?php endif; ?>

        <div class="galeria-grid">
            <?php foreach ($fotos as $index => $foto): ?>
                <div class="galeria-item">
                    <img src="<?php echo $foto; ?>" alt="Foto <?php echo $index + 1; ?> - <?php echo htmlspecialchars($evento['titulo']); ?>" loading="lazy">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php require_once("includes/footer.php"); ?>

    <!-- Volver a inicio -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <?php require_once("includes/scripts.php"); ?>
</body>

</html>
