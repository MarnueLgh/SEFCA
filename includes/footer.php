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
                                /*
                                 * Contador de visitas SEFCA
                                 * Compatible con PHP 5.3.
                                 *
                                 * Cuenta solo una visita por entrada de usuario.
                                 * Evita que el contador suba al hacer refresh.
                                 */

                                $archivo_contador = "includes/contador.txt";
                                $archivo_visitantes = "includes/contador_visitantes.txt";

                                /*
                                 * Para contar cada 30 minutos:
                                 * $tiempo_entrada = 1800;
                                 *
                                 * Para contar una vez por día, cambia a:
                                 * $tiempo_entrada = 86400;
                                 */
                                $tiempo_entrada = 1800;

                                $pagina_actual = basename($_SERVER["PHP_SELF"]);
                                $visitas = 0;

                                /*
                                 * Crear carpeta includes si no existe.
                                 * Normalmente ya existe, pero esto evita errores si el proyecto se mueve.
                                 */
                                if (!is_dir("includes")) {
                                    mkdir("includes", 0755);
                                }

                                /*
                                 * Crear archivos si no existen.
                                 */
                                if (!file_exists($archivo_contador)) {
                                    file_put_contents($archivo_contador, "0", LOCK_EX);
                                }

                                if (!file_exists($archivo_visitantes)) {
                                    file_put_contents($archivo_visitantes, "", LOCK_EX);
                                }

                                /*
                                 * Leer visitas actuales.
                                 */
                                $contenido_contador = file_get_contents($archivo_contador);
                                $visitas = (int) $contenido_contador;

                                /*
                                 * Solo incrementar en index.php.
                                 */
                                if ($pagina_actual == "index.php") {

                                    /*
                                     * Crear una huella básica del usuario.
                                     * Esto evita depender de sesiones/cookies, porque este footer normalmente
                                     * se carga después de que ya empezó el HTML.
                                     */
                                    $ip_usuario = isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : "";
                                    $agente_usuario = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "";
                                    $idioma_usuario = isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]) ? $_SERVER["HTTP_ACCEPT_LANGUAGE"] : "";

                                    $huella_usuario = md5($ip_usuario . "|" . $agente_usuario . "|" . $idioma_usuario);

                                    $ahora = time();
                                    $limite = $ahora - $tiempo_entrada;

                                    $usuario_ya_contado = false;
                                    $visitantes_validos = array();

                                    /*
                                     * Abrir archivo de visitantes y bloquearlo para evitar conteos dobles
                                     * si hay varias visitas simultáneas.
                                     */
                                    $fp_visitantes = fopen($archivo_visitantes, "c+");

                                    if ($fp_visitantes) {
                                        if (flock($fp_visitantes, LOCK_EX)) {

                                            $contenido_visitantes = "";

                                            rewind($fp_visitantes);

                                            while (!feof($fp_visitantes)) {
                                                $contenido_visitantes .= fread($fp_visitantes, 8192);
                                            }

                                            $lineas = explode("\n", $contenido_visitantes);

                                            foreach ($lineas as $linea) {
                                                $linea = trim($linea);

                                                if ($linea == "") {
                                                    continue;
                                                }

                                                $partes = explode("|", $linea);

                                                if (count($partes) != 2) {
                                                    continue;
                                                }

                                                $huella_guardada = $partes[0];
                                                $tiempo_guardado = (int) $partes[1];

                                                /*
                                                 * Mantener solo registros recientes.
                                                 */
                                                if ($tiempo_guardado >= $limite) {
                                                    $visitantes_validos[] = $huella_guardada . "|" . $tiempo_guardado;

                                                    if ($huella_guardada == $huella_usuario) {
                                                        $usuario_ya_contado = true;
                                                    }
                                                }
                                            }

                                            /*
                                             * Si el usuario no ha sido contado durante esta entrada,
                                             * se registra y se incrementa el contador.
                                             */
                                            if (!$usuario_ya_contado) {
                                                $visitantes_validos[] = $huella_usuario . "|" . $ahora;

                                                /*
                                                 * Incrementar contador con bloqueo.
                                                 */
                                                $fp_contador = fopen($archivo_contador, "c+");

                                                if ($fp_contador) {
                                                    if (flock($fp_contador, LOCK_EX)) {
                                                        $contenido_actual = "";

                                                        rewind($fp_contador);

                                                        while (!feof($fp_contador)) {
                                                            $contenido_actual .= fread($fp_contador, 8192);
                                                        }

                                                        $visitas = (int) $contenido_actual;
                                                        $visitas++;

                                                        rewind($fp_contador);
                                                        ftruncate($fp_contador, 0);
                                                        fwrite($fp_contador, (string) $visitas);
                                                        fflush($fp_contador);

                                                        flock($fp_contador, LOCK_UN);
                                                    }

                                                    fclose($fp_contador);
                                                }
                                            }

                                            /*
                                             * Guardar lista limpia de visitantes recientes.
                                             */
                                            rewind($fp_visitantes);
                                            ftruncate($fp_visitantes, 0);

                                            if (count($visitantes_validos) > 0) {
                                                fwrite($fp_visitantes, implode("\n", $visitantes_validos) . "\n");
                                            }

                                            fflush($fp_visitantes);
                                            flock($fp_visitantes, LOCK_UN);
                                        }

                                        fclose($fp_visitantes);
                                    }
                                }

                                echo number_format($visitas);
                                ?>
                            </strong></p>
                        <p class="footer-visitas-item">&rarr; Desde: 01/03/2026</p>
                        <p class="footer-visitas-item">&rarr; Tramita tu credencial de egresado <a href="https://www.pveaju.unam.mx/credencial/" target="_blank" rel="noopener noreferrer">aquí</a></p>
                    </div>
                </div>

                <!-- Redes sociales -->
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <p class="footer-redes-titulo">Síguenos en</p>
                    <div class="footer-redes">
                        <a href="https://www.facebook.com/SEFCAUNAM" target="_blank" rel="noopener noreferrer"
                            class="footer-redes-enlace" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>

                        <!--
                        <a href="https://x.com/FCAUNAMOFICIAL" target="_blank" rel="noopener noreferrer" class="footer-redes-enlace" aria-label="X (Twitter)">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/fcaunamoficial/" target="_blank" rel="noopener noreferrer" class="footer-redes-enlace" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        -->

                        <a href="https://www.youtube.com/@SEFCA" target="_blank" rel="noopener noreferrer"
                            class="footer-redes-enlace" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Logo UNAM -->
                <div class="col-md-4">
                    <div class="d-flex flex-nowrap justify-content-center justify-content-md-end align-items-center gap-3">
                        <div class="footer-logo-dorado"
                            style="width: 150px; -webkit-mask-image: url('img/unam_gran_universidad_dorado.png'); mask-image: url('img/unam_gran_universidad_dorado.png');"
                            role="img" aria-label="UNAM - Nuestra gran Universidad">
                        </div>

                        <div class="footer-logo-dorado"
                            style="width: 150px; -webkit-mask-image: url('img/475_logo_dorado.png'); mask-image: url('img/475_logo_dorado.png');"
                            role="img" aria-label="475+ años de historia">
                        </div>
                    </div>
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
                    <?php echo date("Y"); ?>
                </div>
                <div class="col-md-10 justify">
                    Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la
                    fuente completa y su dirección electrónica. De otra forma requiere permiso previo por escrito de la
                    institución.
                    <a href="https://www.fca.unam.mx/docs/aviso_privacidad.pdf" target="_blank"
                        rel="noopener noreferrer">AVISO DE PRIVACIDAD</a>.
                    Sitio web administrado por el Centro de Informática de la Facultad de Contaduría y
                    Administración (<a href="https://cifca.fca.unam.mx/" target="_blank"
                        rel="noopener noreferrer">CIFCA</a>).
                    <br>
                    <a href="https://www.fca.unam.mx/docs/permanentes/seguridad.pdf" target="_blank"
                        rel="noopener noreferrer">Documento de seguridad</a> |
                    <a href="https://www.fca.unam.mx/docs/permanentes/aws.pdf" target="_blank"
                        rel="noopener noreferrer">Instrumento jurídico</a> |
                    <a href="https://www.fca.unam.mx/docs/permanentes/aviso_simplificado.pdf">Aviso de privacidad
                        simplificado</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer End -->