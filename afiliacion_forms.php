<?php
/*
 * Autor: MarnueLgh
 * Fecha: 20/04/2026
 * Versión: 2.1
 * Descripción: Formulario de afiliación para socios SEFCA (Sociedad de Egresados FCA, UNAM).
 *              Recoge datos personales, académicos, profesionales y categoría de aportación.
 *              Preparado para conexión futura con PostgreSQL.
 */

$registrado = false;
$nombre_completo = '';
$ruta_comprobante_pago = '';
$error_comprobante_pago = '';

function generar_token_comprobante($longitud_bytes = 6)
{
	if (function_exists('openssl_random_pseudo_bytes')) {
		$bytes = openssl_random_pseudo_bytes($longitud_bytes);

		if ($bytes !== false && strlen($bytes) === $longitud_bytes) {
			return bin2hex($bytes);
		}
	}

	$bytes = '';
	for ($i = 0; $i < $longitud_bytes; $i++) {
		$bytes .= chr(mt_rand(0, 255));
	}

	return bin2hex($bytes);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
	$nombre = trim(isset($_POST['nombre']) ? $_POST['nombre'] : '');
	$apellido_p = trim(isset($_POST['apellido_paterno']) ? $_POST['apellido_paterno'] : '');
	$apellido_m = trim(isset($_POST['apellido_materno']) ? $_POST['apellido_materno'] : '');
	$nombre_completo = "$nombre $apellido_p $apellido_m";
	$comprobante_pago = isset($_FILES['comprobante_pago']) ? $_FILES['comprobante_pago'] : null;
	$tamano_maximo_comprobante = 5 * 1024 * 1024;
	$tipos_comprobante_permitidos = [
		'image/jpeg' => 'jpg',
		'image/png' => 'png',
		'image/webp' => 'webp',
	];

	if (!$comprobante_pago || $comprobante_pago['error'] === UPLOAD_ERR_NO_FILE) {
		$error_comprobante_pago = 'Adjunte una imagen del comprobante de pago.';
	} elseif ($comprobante_pago['error'] !== UPLOAD_ERR_OK) {
		$error_comprobante_pago = 'No se pudo cargar el comprobante. Intente nuevamente.';
	} elseif ($comprobante_pago['size'] > $tamano_maximo_comprobante) {
		$error_comprobante_pago = 'El comprobante no debe superar los 5 MB.';
	} else {
		$mime_comprobante = '';

		if (function_exists('finfo_open')) {
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime_comprobante = $finfo ? finfo_file($finfo, $comprobante_pago['tmp_name']) : '';
			if ($finfo) {
				finfo_close($finfo);
			}
		} elseif (function_exists('mime_content_type')) {
			$mime_comprobante = mime_content_type($comprobante_pago['tmp_name']);
		}

		if (!isset($tipos_comprobante_permitidos[$mime_comprobante])) {
			$error_comprobante_pago = 'El comprobante debe ser una imagen JPG, PNG o WEBP.';
		} else {
			$directorio_comprobantes = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'comprobantes';

			if (!is_dir($directorio_comprobantes) && !mkdir($directorio_comprobantes, 0755, true)) {
				$error_comprobante_pago = 'No se pudo preparar la carpeta para guardar el comprobante.';
			} else {
				$extension_comprobante = $tipos_comprobante_permitidos[$mime_comprobante];
				$token_comprobante = generar_token_comprobante(6);
				$nombre_archivo_comprobante = 'comprobante_' . date('Ymd_His') . '_' . $token_comprobante . '.' . $extension_comprobante;
				$ruta_destino_comprobante = $directorio_comprobantes . DIRECTORY_SEPARATOR . $nombre_archivo_comprobante;

				if (move_uploaded_file($comprobante_pago['tmp_name'], $ruta_destino_comprobante)) {
					$ruta_comprobante_pago = 'uploads/comprobantes/' . $nombre_archivo_comprobante;
					$registrado = true;
				} else {
					$error_comprobante_pago = 'No se pudo guardar el comprobante. Intente nuevamente.';
				}
			}
		}
	}

	/*
	 * ── Preparación para PostgreSQL ──────────────────────────────────
	 * Cuando la base de datos esté lista, descomentar el bloque
	 * siguiente y ajustar la ruta del archivo de conexión.
	 *
	 * require_once __DIR__ . '/../config/database.php';
	 * $db = new Database();
	 * $conn = $db->conectar();
	 *
	 * if ($conn) {
	 *     $sql = "INSERT INTO afiliados (
	 *                 nombre, apellido_paterno, apellido_materno,
	 *                 fecha_nacimiento, tel_celular, tel_oficina,
	 *                 carrera_egreso, correo, generacion, no_cuenta,
	 *                 compania, cargo_actual, trayectoria,
	 *                 monto_aportacion, categoria_socio, referencia_pago, ruta_comprobante_pago
	 *             ) VALUES (
	 *                 :nombre, :apellido_paterno, :apellido_materno,
	 *                 :fecha_nacimiento, :tel_celular, :tel_oficina,
	 *                 :carrera_egreso, :correo, :generacion, :no_cuenta,
	 *                 :compania, :cargo_actual, :trayectoria,
	 *                 :monto_aportacion, :categoria_socio, :referencia_pago, :ruta_comprobante_pago
	 *             )";
	 *
	 *     $stmt = $conn->prepare($sql);
	 *     $stmt->execute([
	 *         ':nombre'            => $nombre,
	 *         ':apellido_paterno'  => $apellido_p,
	 *         ':apellido_materno'  => trim($_POST['apellido_materno'] ?? ''),
	 *         ':fecha_nacimiento'  => $_POST['fecha_nacimiento'] ?? '',
	 *         ':tel_celular'       => $_POST['tel_celular'] ?? '',
	 *         ':tel_oficina'       => $_POST['tel_oficina'] ?? '',
	 *         ':carrera_egreso'    => $_POST['carrera_egreso'] ?? '',
	 *         ':correo'            => $_POST['correo'] ?? '',
	 *         ':generacion'        => $_POST['generacion'] ?? '',
	 *         ':no_cuenta'         => $_POST['no_cuenta'] ?? '',
	 *         ':compania'          => $_POST['compania'] ?? '',
	 *         ':cargo_actual'      => $_POST['cargo_actual'] ?? '',
	 *         ':trayectoria'       => $_POST['trayectoria'] ?? '',
	 *         ':monto_aportacion'  => $_POST['monto_aportacion'] ?? '',
	 *         ':categoria_socio'   => $_POST['categoria_socio'] ?? '',
	 *         ':referencia_pago'   => $_POST['referencia_pago'] ?? '',
	 *         ':ruta_comprobante_pago' => $ruta_comprobante_pago,
	 *     ]);
	 * }
	 */
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Afiliación SEFCA</title>
	<link
		href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600&display=swap"
		rel="stylesheet">
	<link rel="stylesheet" href="css/diseno_afiliacion.css">
</head>

<body>
	<div class="wrapper">

		<!-- ── Encabezado ──────────────────────────────────────── -->
		<div class="header">
			<div class="escudo">🎓</div>
			<h1>Afiliación SEFCA</h1>
			<p>Sociedad de Egresados de la FCA, UNAM &mdash; Sigue formando parte de tu Facultad, son dos sencillos pasos:</p>
		</div>

		<!-- ── Barra de progreso (2 pasos) ────────────────────── -->
		<div class="progress-bar">
			<div class="step-dot active" id="dot-1">1</div>
			<div class="step-line" id="line-1"></div>
			<div class="step-dot" id="dot-2">2</div>
		</div>

		<!-- ── Pantalla de éxito ──────────────────────────────── -->
		<div class="success-screen <?php echo $registrado ? 'show' : ''; ?>" id="success-screen">
			<div class="success-icon">
				<svg viewBox="0 0 24 24">
					<polyline points="20 6 9 17 4 12" />
				</svg>
			</div>
			<h2>¡Solicitud Enviada!</h2>
			<div class="name-display" id="success-name">
				<?php echo htmlspecialchars($nombre_completo); ?>
			</div>
			<p>Su solicitud de afiliación ha sido recibida.<br>Bienvenido a la comunidad de egresados SEFCA.</p>
		</div>

		<!-- ── Formulario principal ───────────────────────────── -->
		<form method="POST" id="main-form" class="form-container <?php echo $registrado ? 'hide' : ''; ?>" enctype="multipart/form-data">

			<!-- ===================== TAB 1: DATOS PERSONALES Y ACADÉMICOS ===================== -->
			<div class="tab open" id="tab-1">
				<div class="tab-header" onclick="toggleTab(1)">
					<div class="tab-title-row">
						<div class="tab-number" id="num-1">1</div>
						<div class="tab-title-text">
							<h2>Datos Personales y Académicos</h2>
							<div class="tab-badge required">Paso obligatorio</div>
						</div>
						<div class="tab-arrow">
							<svg viewBox="0 0 24 24">
								<polyline points="6 9 12 15 18 9" />
							</svg>
						</div>
					</div>
				</div>

				<div class="tab-body">
					<div class="tab-inner">

						<!-- Nombre completo -->
						<div class="section-title">Nombre Completo</div>
						<div class="field-row-3">
							<div class="field-group">
								<label for="nombre">Nombre(s) <span class="req">*</span></label>
								<input type="text" id="nombre" name="nombre" placeholder="Ej. Juan Carlos" required>
								<div class="error-msg" id="err-nombre">Este campo es obligatorio.</div>
							</div>
							<div class="field-group">
								<label for="apellido_paterno">Apellido Paterno <span class="req">*</span></label>
								<input type="text" id="apellido_paterno" name="apellido_paterno"
									placeholder="Ej. García" required>
								<div class="error-msg" id="err-ap">Este campo es obligatorio.</div>
							</div>
							<div class="field-group">
								<label for="apellido_materno">Apellido Materno <span class="req">*</span></label>
								<input type="text" id="apellido_materno" name="apellido_materno"
									placeholder="Ej. López" required>
								<div class="error-msg" id="err-am">Este campo es obligatorio.</div>
							</div>
						</div>

						<!-- Fecha de nacimiento -->
						<div class="field-row">
							<div class="field-group">
								<label for="fecha_nacimiento">Fecha de Nacimiento <span class="req">*</span></label>
								<input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
								<div class="error-msg" id="err-fecha">Este campo es obligatorio.</div>
							</div>
						</div>

						<!-- Contacto -->
						<div class="section-title">Contacto</div>
						<div class="field-row">
							<div class="field-group">
								<label for="tel_celular">Teléfono Celular <span class="req">*</span></label>
								<div class="phone-input-wrapper">
									<select id="lada_celular" name="lada_celular" class="lada-select" required>
										<option value="+52" selected>🇲🇽 +52</option>
										<option value="+1">🇺🇸 +1</option>
										<option value="+34">🇪🇸 +34</option>
										<option value="+44">🇬🇧 +44</option>
										<option value="+49">🇩🇪 +49</option>
										<option value="+33">🇫🇷 +33</option>
										<option value="+55">🇧🇷 +55</option>
										<option value="+54">🇦🇷 +54</option>
										<option value="+57">🇨🇴 +57</option>
										<option value="+56">🇨🇱 +56</option>
									</select>
									<input type="tel" id="tel_celular" name="tel_celular"
										placeholder="Ej. 55 1234 5678" maxlength="15" required>
								</div>
								<div class="error-msg" id="err-tel">Ingrese un número de 10 dígitos.</div>
							</div>
							<div class="field-group">
								<label for="tel_oficina">Teléfono de Oficina <span class="req">*</span></label>
								<div class="phone-input-wrapper">
									<select id="lada_oficina" name="lada_oficina" class="lada-select" required>
										<option value="+52" selected>🇲🇽 +52</option>
										<option value="+1">🇺🇸 +1</option>
										<option value="+34">🇪🇸 +34</option>
										<option value="+44">🇬🇧 +44</option>
										<option value="+49">🇩🇪 +49</option>
										<option value="+33">🇫🇷 +33</option>
										<option value="+55">🇧🇷 +55</option>
										<option value="+54">🇦🇷 +54</option>
										<option value="+57">🇨🇴 +57</option>
										<option value="+56">🇨🇱 +56</option>
									</select>
									<input type="tel" id="tel_oficina" name="tel_oficina"
										placeholder="Ej. 55 8765 4321" maxlength="15" required>
								</div>
								<div class="error-msg" id="err-tel-ofi">Ingrese un número de 10 dígitos.</div>
							</div>
						</div>

						<div class="field-row">
							<div class="field-group">
								<label for="correo">E-mail <span class="req">*</span></label>
								<input type="email" id="correo" name="correo" placeholder="correo@ejemplo.com"
									required>
								<div class="error-msg" id="err-correo">Ingrese un correo válido.</div>
							</div>
						</div>

						<!-- Datos UNAM -->
						<div class="section-title">Datos UNAM</div>
						<div class="field-row">
							<div class="field-group">
								<label for="carrera_egreso">Carrera de Egreso <span class="req">*</span></label>
								<select id="carrera_egreso" name="carrera_egreso" required>
									<option value="" disabled selected hidden>Seleccione una carrera</option>
									<option value="contaduria">Contaduría</option>
									<option value="administracion">Administración</option>
									<option value="informatica">Informática</option>
									<option value="negocios_internacionales">Negocios Internacionales</option>
									<option value="posgrado">Posgrado</option>
									<option value="educacion_continua">Educación Continua</option>
								</select>
								<div class="error-msg" id="err-carrera">Seleccione su carrera de egreso.</div>
							</div>
							<div class="field-group">
								<label for="no_cuenta">No. de Cuenta (UNAM) <span class="req">*</span></label>
								<input type="text" id="no_cuenta" name="no_cuenta" placeholder="9 dígitos"
									maxlength="9" pattern="\d{9}" required>
								<div class="error-msg" id="err-cuenta">Ingrese los 9 dígitos de su número de cuenta.
								</div>
							</div>
						</div>

						<!-- Generación (lista desplegable) -->
						<div class="field-group">
							<label for="generacion">Generación <span class="req">*</span></label>
							<select id="generacion" name="generacion" required>
								<option value="" disabled selected hidden>Seleccione su generación</option>
								<!-- Opciones generadas dinámicamente con JS -->
							</select>
							<div class="error-msg" id="err-generacion">Seleccione su generación.</div>
						</div>

					</div>
					<div class="tab-footer">
						<button type="button" class="btn-next" onclick="nextTab(1)">
							Continuar
							<svg viewBox="0 0 24 24">
								<line x1="5" y1="12" x2="19" y2="12" />
								<polyline points="12 5 19 12 12 19" />
							</svg>
						</button>
					</div>
				</div>
			</div>

			<!-- ===================== TAB 2: DATOS PROFESIONALES Y APORTACIÓN ===================== -->
			<div class="tab tab-locked" id="tab-2">
				<div class="tab-header" onclick="tryOpenTab(2)">
					<div class="tab-title-row">
						<div class="tab-number" id="num-2">2</div>
						<div class="tab-title-text">
							<h2>Datos Profesionales y Aportación</h2>
							<div class="tab-badge" id="badge-2">Complete el paso anterior</div>
						</div>
						<div class="tab-arrow">
							<svg viewBox="0 0 24 24">
								<polyline points="6 9 12 15 18 9" />
							</svg>
						</div>
					</div>
				</div>
				<div class="locked-msg">🔒 Completa el Paso 1 para continuar.</div>

				<div class="tab-body">
					<div class="tab-inner">

						<!-- Datos laborales actuales -->
						<div class="section-title">Situación Profesional Actual</div>
						<div class="field-row">
							<div class="field-group">
								<label for="compania">Compañía <span class="req">*</span></label>
								<input type="text" id="compania" name="compania"
									placeholder="Nombre de la empresa u organización" required>
								<div class="error-msg" id="err-compania">Este campo es obligatorio.</div>
							</div>
							<div class="field-group">
								<label for="cargo_actual">Cargo Actual <span class="req">*</span></label>
								<input type="text" id="cargo_actual" name="cargo_actual"
									placeholder="Ej. Director de Finanzas" required>
								<div class="error-msg" id="err-cargo">Este campo es obligatorio.</div>
							</div>
						</div>

						<!-- Trayectoria -->
						<div class="section-title">Trayectoria</div>
						<div class="field-group">
							<label for="trayectoria">Datos Relevantes en su Trayectoria <span
									class="req">*</span></label>
							<textarea id="trayectoria" name="trayectoria" rows="4" maxlength="200"
								placeholder="Describa los logros o aspectos destacados de su trayectoria (máx. 200 caracteres)…"
								required></textarea>
							<div class="char-counter">
								<span id="trayectoria-count">0</span> / 200 caracteres
							</div>
							<div class="error-msg" id="err-trayectoria">Este campo es obligatorio.</div>
						</div>

						<!-- Categoría de aportación -->
						<div class="section-title">Tu Aportación</div>
						<div class="field-row">
							<div class="field-group">
								<label for="monto_aportacion">Monto de Aportación (MXN) <span
										class="req">*</span></label>
								<div class="monto-input-wrapper">
									<span class="monto-prefix">$</span>
									<input type="number" id="monto_aportacion" name="monto_aportacion"
										placeholder="Ej. 5000" min="1000" step="1" required>
								</div>
								<div class="error-msg" id="err-monto">La aportación mínima es de $1,000 MXN.</div>
							</div>
							<div class="field-group">
								<label>Categoría de Socio</label>
								<div class="categoria-display" id="categoria-display">
									<span class="categoria-badge" id="categoria-badge">Ingrese un monto</span>
								</div>
								<input type="hidden" id="categoria_socio" name="categoria_socio">
							</div>
						</div>

						<!-- Referencia de pago -->
						<div class="field-group">
							<label for="referencia_pago">Referencia de Pago <span class="req">*</span></label>
							<input type="text" id="referencia_pago" name="referencia_pago"
								placeholder="Ingrese la referencia de su comprobante de pago" required>
							<div class="error-msg" id="err-referencia">Ingrese la referencia de su pago.</div>
						</div>

						<!-- Imagen del comprobante de pago -->
						<div class="field-group comprobante-archivo">
							<label for="comprobante_pago">Imagen del Comprobante <span class="req">*</span></label>
							<input type="file" id="comprobante_pago" name="comprobante_pago"
								accept="image/jpeg,image/png,image/webp" required>
							<div class="field-help">Formatos permitidos: JPG, PNG o WEBP. Tama&ntilde;o m&aacute;ximo: 5 MB.</div>
							<div class="error-msg <?php echo $error_comprobante_pago !== '' ? 'visible' : ''; ?>" id="err-comprobante">
								<?php echo htmlspecialchars($error_comprobante_pago !== '' ? $error_comprobante_pago : 'Adjunte una imagen JPG, PNG o WEBP menor a 5 MB.', ENT_QUOTES, 'UTF-8'); ?>
							</div>
						</div>

						<!-- Datos bancarios -->
						<div class="datos-bancarios">
							<div class="datos-bancarios-titulo">
								<svg viewBox="0 0 24 24">
									<rect x="1" y="4" width="22" height="16" rx="2" ry="2" />
									<line x1="1" y1="10" x2="23" y2="10" />
								</svg>
								Datos para Realizar su Aportación
							</div>
							<div class="datos-bancarios-body">
								<p class="datos-bancarios-dest">
									<strong>Realiza tu aportación a:</strong><br>
									Sociedad de Egresados de la Facultad de Contaduría y Administración de la
									Universidad Nacional Autónoma de México, A.C.
								</p>
								<div class="datos-bancarios-grid">
									<div class="dato-item">
										<span class="dato-label">RFC</span>
										<span class="dato-valor" id="dato-rfc">SEF 930810 L93</span>
										<button type="button" class="btn-copy" data-copiar="SEF 930810 L93"
											title="Copiar">
											<svg viewBox="0 0 24 24">
												<rect x="9" y="9" width="13" height="13" rx="2" ry="2" />
												<path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
											</svg>
										</button>
									</div>
									<div class="dato-item">
										<span class="dato-label">Banco</span>
										<span class="dato-valor">Inbursa, S.A.</span>
									</div>
									<div class="dato-item">
										<span class="dato-label">Cuenta</span>
										<span class="dato-valor" id="dato-cuenta">50062843887</span>
										<button type="button" class="btn-copy" data-copiar="50062843887"
											title="Copiar">
											<svg viewBox="0 0 24 24">
												<rect x="9" y="9" width="13" height="13" rx="2" ry="2" />
												<path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
											</svg>
										</button>
									</div>
									<div class="dato-item">
										<span class="dato-label">Cuenta CLABE</span>
										<span class="dato-valor" id="dato-clabe">036180500628438875</span>
										<button type="button" class="btn-copy" data-copiar="036180500628438875"
											title="Copiar">
											<svg viewBox="0 0 24 24">
												<rect x="9" y="9" width="13" height="13" rx="2" ry="2" />
												<path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
											</svg>
										</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<!-- ── Botón de envío ──────────────────────────────── -->
			<div class="submit-row">
				<button type="submit" name="enviar" id="btn-enviar">
					<svg viewBox="0 0 24 24">
						<line x1="22" y1="2" x2="11" y2="13" />
						<polygon points="22 2 15 22 11 13 2 9 22 2" />
					</svg>
					Enviar Solicitud
				</button>
			</div>

		</form>
	</div><!-- /.wrapper -->

	<script src="js/afiliacion.js"></script>

	<?php if ($registrado): ?>
		<script>
			setDone(1);
			setDone(2);
		</script>
	<?php endif; ?>

</body>

</html>
