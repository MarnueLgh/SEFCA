<?php
/*
 * Autor: MarnueLgh
 * Fecha: 20/04/2026
 * Versión: 1.0
 * Descripción: Formulario de afiliación para socios SEFCA (Sociedad de Egresados FCA, UNAM).
 *              Recoge datos personales, profesionales y categoría de aportación.
 */

$registrado = false;
$nombre_completo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
	$registrado = true;
	$nombre       = trim(isset($_POST['nombre'])           ? $_POST['nombre']           : '');
	$apellido_p   = trim(isset($_POST['apellido_paterno']) ? $_POST['apellido_paterno'] : '');
	$apellido_m   = trim(isset($_POST['apellido_materno']) ? $_POST['apellido_materno'] : '');
	$nombre_completo = "$nombre $apellido_p $apellido_m";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Afiliación SEFCA</title>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/diseno_afiliacion.css">
</head>
<body>
<div class="wrapper">

	<!-- ── Encabezado ──────────────────────────────────────── -->
	<div class="header">
		<div class="escudo">🎓</div>
		<h1>Afiliación SEFCA</h1>
		<p>Sociedad de Egresados de la FCA, UNAM &mdash; Complete los pasos para finalizar su registro</p>
	</div>

	<!-- ── Barra de progreso (2 pasos) ────────────────────── -->
	<div class="progress-bar">
		<div class="step-dot active" id="dot-1">1</div>
		<div class="step-line" id="line-1"></div>
		<div class="step-dot" id="dot-2">2</div>
	</div>

	<!-- ── Pantalla de éxito ──────────────────────────────── -->
	<div class="success-screen <?= $registrado ? 'show' : '' ?>" id="success-screen">
		<div class="success-icon">
			<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
		</div>
		<h2>¡Solicitud Enviada!</h2>
		<div class="name-display" id="success-name">
			<?= htmlspecialchars($nombre_completo) ?>
		</div>
		<p>Su solicitud de afiliación ha sido recibida.<br>Bienvenido a la comunidad de egresados SEFCA.</p>
	</div>

	<!-- ── Formulario principal ───────────────────────────── -->
	<form method="POST" id="main-form" class="form-container <?= $registrado ? 'hide' : '' ?>">

		<!-- ===================== TAB 1: DATOS PERSONALES ===================== -->
		<div class="tab open" id="tab-1">
			<div class="tab-header" onclick="toggleTab(1)">
				<div class="tab-title-row">
					<div class="tab-number" id="num-1">1</div>
					<div class="tab-title-text">
						<h2>Datos Personales</h2>
						<div class="tab-badge required">Paso obligatorio</div>
					</div>
					<div class="tab-arrow">
						<svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
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
							<input type="text" id="nombre" name="nombre" placeholder="Ej. Juan Carlos">
							<div class="error-msg" id="err-nombre">Este campo es obligatorio.</div>
						</div>
						<div class="field-group">
							<label for="apellido_paterno">Apellido Paterno <span class="req">*</span></label>
							<input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="Ej. García">
							<div class="error-msg" id="err-ap">Este campo es obligatorio.</div>
						</div>
						<div class="field-group">
							<label for="apellido_materno">Apellido Materno</label>
							<input type="text" id="apellido_materno" name="apellido_materno" placeholder="Ej. López">
						</div>
					</div>

					<!-- Fecha de nacimiento -->
					<div class="field-row">
						<div class="field-group">
							<label for="fecha_nacimiento">Fecha de Nacimiento <span class="req">*</span></label>
							<input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
							<div class="error-msg" id="err-fecha">Este campo es obligatorio.</div>
						</div>
					</div>

					<!-- Contacto -->
					<div class="section-title">Contacto</div>
					<div class="field-row">
						<div class="field-group">
							<label for="tel_celular">Teléfono Celular <span class="req">*</span></label>
							<input type="tel" id="tel_celular" name="tel_celular" placeholder="Ej. 55 1234 5678" maxlength="15">
							<div class="error-msg" id="err-tel">Este campo es obligatorio.</div>
						</div>
						<div class="field-group">
							<label for="correo">E-mail <span class="req">*</span></label>
							<input type="email" id="correo" name="correo" placeholder="correo@ejemplo.com">
							<div class="error-msg" id="err-correo">Ingrese un correo válido.</div>
						</div>
					</div>

					<!-- Datos UNAM -->
					<div class="section-title">Datos UNAM</div>
					<div class="field-row">
						<div class="field-group">
							<label for="generacion">Generación <span class="req">*</span></label>
							<input type="text" id="generacion" name="generacion" placeholder="Ej. 2014-2018">
							<div class="error-msg" id="err-generacion">Este campo es obligatorio.</div>
						</div>
						<div class="field-group">
							<label for="no_cuenta">No. de Cuenta (UNAM) <span class="req">*</span></label>
							<input type="text" id="no_cuenta" name="no_cuenta" placeholder="9 dígitos" maxlength="9" pattern="\d{9}">
							<div class="error-msg" id="err-cuenta">Ingrese los 9 dígitos de su número de cuenta.</div>
						</div>
					</div>

				</div>
				<div class="tab-footer">
					<button type="button" class="btn-next" onclick="nextTab(1)">
						Continuar
						<svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
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
						<svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
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
							<label for="compania">Compañía</label>
							<input type="text" id="compania" name="compania" placeholder="Nombre de la empresa u organización">
						</div>
						<div class="field-group">
							<label for="tel_oficina">Teléfono de Oficina</label>
							<input type="tel" id="tel_oficina" name="tel_oficina" placeholder="Ej. 55 8765 4321" maxlength="15">
						</div>
					</div>
					<div class="field-row">
						<div class="field-group">
							<label for="cargo_actual">Cargo Actual</label>
							<input type="text" id="cargo_actual" name="cargo_actual" placeholder="Ej. Director de Finanzas">
						</div>
					</div>

					<!-- Categoría de aportación -->
					<div class="section-title">Tu Aportación</div>
					<div class="field-row">
						<div class="field-group">
							<label for="categoria_socio">Categoría de Socio <span class="req">*</span></label>
							<select id="categoria_socio" name="categoria_socio">
								<option value="">— Seleccione una categoría —</option>
								<option value="azul_oro">Azul y Oro &mdash; $10,000 MXN</option>
								<option value="oro">Oro &mdash; $5,000 MXN</option>
								<option value="plata">Plata &mdash; $2,500 MXN</option>
								<option value="bronce">Bronce &mdash; $1,000 MXN</option>
							</select>
							<div class="error-msg" id="err-categoria">Seleccione una categoría de socio.</div>
						</div>
					</div>

					<!-- Trayectoria -->
					<div class="section-title">Trayectoria</div>
					<div class="field-group">
						<label for="trayectoria">Datos Relevantes en su Trayectoria</label>
						<textarea id="trayectoria" name="trayectoria" rows="5"
							placeholder="Describa los logros, reconocimientos o aspectos destacados de su trayectoria profesional y académica…"></textarea>
					</div>

				</div>
			</div>
		</div>

		<!-- ── Botón de envío ──────────────────────────────── -->
		<div class="submit-row">
			<button type="submit" name="enviar" id="btn-enviar">
				<svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
				Enviar Solicitud
			</button>
		</div>

	</form>
</div><!-- /.wrapper -->

<script>
// ── Estado de tabs ──────────────────────────────────────────
const tabDone = { 1: false, 2: false };

// ── Marcar tab como completado ──────────────────────────────
function setDone(n) {
	tabDone[n] = true;
	const dot = document.getElementById('dot-' + n);
	if (dot) {
		dot.textContent = '✓';
		dot.classList.add('done');
		dot.classList.remove('active');
	}
	const linea = document.getElementById('line-' + n);
	if (linea) linea.classList.add('done');
	const num = document.getElementById('num-' + n);
	if (num) {
		num.textContent = '✓';
		num.classList.add('done');
	}
}

function setActive(n) {
	const dot = document.getElementById('dot-' + n);
	if (dot && !tabDone[n]) dot.classList.add('active');
}

// ── Control de apertura/cierre de tabs ─────────────────────
function toggleTab(n) {
	const tab = document.getElementById('tab-' + n);
	if (tab.classList.contains('tab-locked')) return;
	tab.classList.toggle('open');
}

function tryOpenTab(n) {
	const tab = document.getElementById('tab-' + n);
	if (!tab.classList.contains('tab-locked')) tab.classList.toggle('open');
}

function openTab(n) {
	const tab = document.getElementById('tab-' + n);
	tab.classList.remove('tab-locked');
	tab.classList.add('open');
	const badge = document.getElementById('badge-' + n);
	if (badge) {
		badge.textContent = 'Paso obligatorio';
		badge.classList.add('required');
	}
	setActive(n);
	tab.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function closeTab(n) {
	document.getElementById('tab-' + n).classList.remove('open');
}

// ── Validación Tab 1 ────────────────────────────────────────
function validateTab1() {
	let ok = true;

	// Campos de texto simples
	const campos = [
		['nombre',          'err-nombre'],
		['apellido_paterno','err-ap'],
		['fecha_nacimiento','err-fecha'],
		['tel_celular',     'err-tel'],
		['correo',          'err-correo'],
		['generacion',      'err-generacion'],
		['no_cuenta',       'err-cuenta'],
	];

	campos.forEach(([id, err]) => {
		const el     = document.getElementById(id);
		const errEl  = document.getElementById(err);
		if (!el || !el.value.trim()) {
			if (el) el.classList.add('invalid');
			if (errEl) errEl.classList.add('visible');
			ok = false;
		} else {
			el.classList.remove('invalid');
			if (errEl) errEl.classList.remove('visible');
		}
	});

	// Validar formato de correo
	const correoEl = document.getElementById('correo');
	if (correoEl && correoEl.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correoEl.value.trim())) {
		correoEl.classList.add('invalid');
		document.getElementById('err-correo').classList.add('visible');
		ok = false;
	}

	// Validar 9 dígitos en número de cuenta
	const cuentaEl = document.getElementById('no_cuenta');
	if (cuentaEl && cuentaEl.value.trim() && !/^\d{9}$/.test(cuentaEl.value.trim())) {
		cuentaEl.classList.add('invalid');
		document.getElementById('err-cuenta').classList.add('visible');
		ok = false;
	}

	return ok;
}

// ── Validación Tab 2 ────────────────────────────────────────
function validateTab2() {
	let ok = true;
	const categoriaEl  = document.getElementById('categoria_socio');
	const categoriaErr = document.getElementById('err-categoria');

	if (!categoriaEl.value) {
		categoriaEl.classList.add('invalid');
		categoriaErr.classList.add('visible');
		ok = false;
	} else {
		categoriaEl.classList.remove('invalid');
		categoriaErr.classList.remove('visible');
	}

	return ok;
}

// ── Avanzar al siguiente tab ────────────────────────────────
function nextTab(n) {
	if (n === 1) {
		if (!validateTab1()) return;
		setDone(1);
		closeTab(1);
		openTab(2);
		// Desbloquear botón de envío
		const btnEnviar = document.getElementById('btn-enviar');
		if (btnEnviar) btnEnviar.classList.add('unlocked');
	}
}

// ── Limpieza de errores en tiempo real ─────────────────────
document.addEventListener('input', function(e) {
	if (e.target.matches('input, select, textarea')) {
		if (e.target.value.trim()) e.target.classList.remove('invalid');
	}
});

// ── Validar antes de enviar ─────────────────────────────────
document.addEventListener('DOMContentLoaded', function() {
	const form = document.getElementById('main-form');
	if (form) {
		form.addEventListener('submit', function(e) {
			if (!validateTab2()) {
				e.preventDefault();
				return false;
			}
			return true;
		});
	}
});

// ── Solo permite ingresar números en el no. de cuenta ──────
document.addEventListener('DOMContentLoaded', function() {
	const cuentaInput = document.getElementById('no_cuenta');
	if (cuentaInput) {
		cuentaInput.addEventListener('input', function() {
			this.value = this.value.replace(/\D/g, '');
		});
	}
});

<?php if ($registrado): ?>
	setDone(1);
	setDone(2);
<?php endif; ?>
</script>

</body>
</html>
