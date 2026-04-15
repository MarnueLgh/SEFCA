<!-- Footer Start -->

<footer class="mt-auto">
    <!-- Sección superior: visitas, redes sociales, logo UNAM -->
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center">

                <!-- Número de visitas -->
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <div class="footer-visitas">
                        <p class="footer-visitas-item">&rarr; Número de visitas: <strong>
                            <?php
                                $archivo_contador = "includes/contador.txt";
                                if (!file_exists($archivo_contador)) {
                                    file_put_contents($archivo_contador, "0");
                                }
                                $visitas = (int)file_get_contents($archivo_contador);
                                // Incrementar solo en la página principal
                                if (basename($_SERVER['PHP_SELF']) === 'index.php') {
                                    $visitas++;
                                    file_put_contents($archivo_contador, $visitas);
                                }
                                echo number_format($visitas);
                            ?>
                        </strong></p>
                        <p class="footer-visitas-item">&rarr; Desde: 01/03/2026</p>
                    </div>
                </div>

                <!-- Redes sociales -->
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <p class="footer-redes-titulo">Síguenos en</p>
                    <div class="footer-redes">
                        <a href="https://www.facebook.com/SEFCAUNAM" target="_blank" rel="noopener noreferrer" class="footer-redes-enlace" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    <!--                         
                        <a href="https://x.com/FCAUNAMOFICIAL" target="_blank" rel="noopener noreferrer" class="footer-redes-enlace" aria-label="X (Twitter)">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/fcaunamoficial/" target="_blank" rel="noopener noreferrer" class="footer-redes-enlace" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a> 
                    -->

                        <a href="https://www.youtube.com/@SEFCA" target="_blank" rel="noopener noreferrer" class="footer-redes-enlace" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Logo UNAM -->
                <div class="col-md-4 text-center text-md-end">
                    <img src="img/unam_gran_universidad.png" alt="UNAM - Nuestra gran Universidad" class="footer-unam-logo">
                </div>

            </div>
        </div>
    </div>

    <!-- Sección inferior: copyright y legales -->
    <div class="container-fluid copyright text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-2 text-center text-md-start mb-3 mb-md-0">
                    Hecho en México
                    <br>
                    D.R. &copy;
                    <?php echo date('Y'); ?>
                </div>
                <div class="col-md-10 text-center text-md-end">
                    Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se
                    cite la fuente completa y su dirección electrónica. De otra forma requiere permiso previo
                    por escrito de la institución.
                    <a href="https://www.fca.unam.mx/docs/aviso_privacidad.pdf" target="_blank" rel="noopener noreferrer">AVISO DE PRIVACIDAD</a>.
                    Sitio web administrado por el Centro de Informática de la Facultad de Contaduría y
                    Administración (<a href="https://cifca.fca.unam.mx/" target="_blank" rel="noopener noreferrer">CIFCA</a>).
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer End -->