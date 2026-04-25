/**
 * Autor: MarnueLgh
 * Fecha: 22/04/2026
 * Versión: 2.0
 * Descripción: Lógica de formulario de afiliación SEFCA.
 *              - Generación dinámica de generaciones (FCA fundada 1929, bloques de 4 años)
 *              - Categoría de socio automática según monto
 *              - Validación completa de todos los campos
 *              - Clipboard para datos bancarios
 *              - Navegación scrollable de generaciones
 */

// ── Estado de tabs ──────────────────────────────────────────
const tabDone = { 1: false, 2: false };

// ══════════════════════════════════════════════════════════════
// GENERACIONES
// ══════════════════════════════════════════════════════════════

/**
 * Genera la lista completa de generaciones desde 1929 en bloques de 4 años.
 * La última generación es 2026-2030.
 */
function generarGeneraciones() {
	const generaciones = [];
	const ANIO_INICIO = 1929;
	const ULTIMA_GEN_INICIO = 2026;
	const BLOQUE = 4;

	// Anclar desde la última generación (2026-2030) y generar hacia atrás
	for (let inicio = ULTIMA_GEN_INICIO; inicio >= ANIO_INICIO; inicio -= BLOQUE) {
		const fin = inicio + BLOQUE;
		generaciones.unshift(`${inicio}-${fin}`);
	}

	return generaciones;
}

/**
 * Inicializa el picker de generaciones con scroll y navegación.
 * Muestra las 10 más recientes inicialmente, pero permite navegar
 * a todas las demás con la barra de scroll y las flechas.
 */
function inicializarGeneracionPicker() {
	const track = document.getElementById('gen-track');
	const navLeft = document.getElementById('gen-nav-left');
	const navRight = document.getElementById('gen-nav-right');
	if (!track) return;

	const generaciones = generarGeneraciones();

	// Crear chips
	generaciones.forEach(function (gen) {
		const chip = document.createElement('button');
		chip.type = 'button';
		chip.className = 'gen-chip';
		chip.textContent = gen;
		chip.setAttribute('data-gen', gen);
		chip.addEventListener('click', function () {
			seleccionarGeneracion(gen);
		});
		track.appendChild(chip);
	});

	// Scroll a las 10 más recientes (al final del track)
	requestAnimationFrame(function () {
		track.scrollLeft = track.scrollWidth;
		actualizarNavButtons();
	});

	// Navegación con flechas
	var scrollStep = 260;
	navLeft.addEventListener('click', function () {
		track.scrollBy({ left: -scrollStep, behavior: 'smooth' });
	});
	navRight.addEventListener('click', function () {
		track.scrollBy({ left: scrollStep, behavior: 'smooth' });
	});

	// Actualizar visibilidad de flechas al scrollear
	track.addEventListener('scroll', actualizarNavButtons);
}

function actualizarNavButtons() {
	var track = document.getElementById('gen-track');
	var navLeft = document.getElementById('gen-nav-left');
	var navRight = document.getElementById('gen-nav-right');
	if (!track || !navLeft || !navRight) return;

	navLeft.style.opacity = track.scrollLeft > 10 ? '1' : '0.3';
	navLeft.style.pointerEvents = track.scrollLeft > 10 ? 'auto' : 'none';

	var maxScroll = track.scrollWidth - track.clientWidth;
	navRight.style.opacity = track.scrollLeft < maxScroll - 10 ? '1' : '0.3';
	navRight.style.pointerEvents = track.scrollLeft < maxScroll - 10 ? 'auto' : 'none';
}

function seleccionarGeneracion(gen) {
	// Desmarcar todas
	var chips = document.querySelectorAll('.gen-chip');
	chips.forEach(function (c) {
		c.classList.remove('selected');
	});

	// Marcar la seleccionada
	var chip = document.querySelector('.gen-chip[data-gen="' + gen + '"]');
	if (chip) chip.classList.add('selected');

	// Actualizar campo oculto
	document.getElementById('generacion').value = gen;

	// Limpiar error
	var errEl = document.getElementById('err-generacion');
	if (errEl) errEl.classList.remove('visible');
}

// ══════════════════════════════════════════════════════════════
// CATEGORÍA DE SOCIO (automática según monto)
// ══════════════════════════════════════════════════════════════

function actualizarCategoria() {
	var montoInput = document.getElementById('monto_aportacion');
	var badge = document.getElementById('categoria-badge');
	var hidden = document.getElementById('categoria_socio');
	var errEl = document.getElementById('err-monto');

	if (!montoInput || !badge || !hidden) return;

	var monto = parseFloat(montoInput.value);

	if (isNaN(monto) || monto < 1000) {
		badge.textContent = monto > 0 && monto < 1000 ? 'Mínimo $1,000 MXN' : 'Ingrese un monto';
		badge.className = 'categoria-badge';
		hidden.value = '';
		return;
	}

	// Limpiar error
	if (errEl) errEl.classList.remove('visible');
	if (montoInput) montoInput.classList.remove('invalid');

	if (monto >= 10000) 
	{
		badge.textContent = '🏆 Azul y Oro';
		badge.className = 'categoria-badge cat-azul-oro';
		hidden.value = 'azul_oro';
	} 
	else if (monto >= 5000 && monto <= 5999) 
	{
		badge.textContent = '🥇 Oro';
		badge.className = 'categoria-badge cat-oro';
		hidden.value = 'oro';
	} 
	else if (monto >= 2500 && monto <= 4999) 
	{
		badge.textContent = '🥈 Plata';
		badge.className = 'categoria-badge cat-plata';
		hidden.value = 'plata';
	} 
	else if (monto >= 1000 && monto <= 2499) 
	{
		badge.textContent = '🥉 Bronce';
		badge.className = 'categoria-badge cat-bronce';
		hidden.value = 'bronce';
	} 
	else 
	{
		// Montos entre 6000 y 9999 no encajan exactamente en las reglas dadas
		// Los asignamos a Plata ya que $6,000-$9,999 > Oro ($5,000-$5,999)
		// pero < Azul y Oro ($10,000+). Ajustable según negocio.
		badge.textContent = '🥈 Plata';
		badge.className = 'categoria-badge cat-plata';
		hidden.value = 'plata';
	}
}

// ══════════════════════════════════════════════════════════════
// CONTADOR DE CARACTERES – TRAYECTORIA
// ══════════════════════════════════════════════════════════════

function actualizarContadorTrayectoria() {
	var textarea = document.getElementById('trayectoria');
	var counter = document.getElementById('trayectoria-count');
	if (!textarea || !counter) return;

	counter.textContent = textarea.value.length;

	// Color de advertencia cuando se acerca al límite
	var parent = counter.parentElement;
	if (textarea.value.length >= 180) {
		parent.classList.add('near-limit');
	} else {
		parent.classList.remove('near-limit');
	}
}

// ══════════════════════════════════════════════════════════════
// CLIPBOARD – DATOS BANCARIOS
// ══════════════════════════════════════════════════════════════

function inicializarClipboard() {
	var botones = document.querySelectorAll('.btn-copy');
	botones.forEach(function (btn) {
		btn.addEventListener('click', function () {
			var texto = this.getAttribute('data-copiar');
			if (!texto) return;

			navigator.clipboard.writeText(texto).then(function () {
				btn.classList.add('copied');
				var original = btn.innerHTML;
				btn.innerHTML = '<svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>';
				setTimeout(function () {
					btn.classList.remove('copied');
					btn.innerHTML = original;
				}, 1500);
			}).catch(function () {
				// Fallback: seleccionar texto
				var tempInput = document.createElement('input');
				tempInput.value = texto;
				document.body.appendChild(tempInput);
				tempInput.select();
				document.execCommand('copy');
				document.body.removeChild(tempInput);
			});
		});
	});
}

// ══════════════════════════════════════════════════════════════
// CONTROL DE TABS
// ══════════════════════════════════════════════════════════════

function setDone(n) {
	tabDone[n] = true;
	var dot = document.getElementById('dot-' + n);
	if (dot) {
		dot.textContent = '✓';
		dot.classList.add('done');
		dot.classList.remove('active');
	}
	var linea = document.getElementById('line-' + n);
	if (linea) linea.classList.add('done');
	var num = document.getElementById('num-' + n);
	if (num) {
		num.textContent = '✓';
		num.classList.add('done');
	}
}

function setActive(n) {
	var dot = document.getElementById('dot-' + n);
	if (dot && !tabDone[n]) dot.classList.add('active');
}

function toggleTab(n) {
	var tab = document.getElementById('tab-' + n);
	if (tab.classList.contains('tab-locked')) return;
	tab.classList.toggle('open');
}

function tryOpenTab(n) {
	var tab = document.getElementById('tab-' + n);
	if (!tab.classList.contains('tab-locked')) tab.classList.toggle('open');
}

function openTab(n) {
	var tab = document.getElementById('tab-' + n);
	tab.classList.remove('tab-locked');
	tab.classList.add('open');
	var badge = document.getElementById('badge-' + n);
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

// ══════════════════════════════════════════════════════════════
// VALIDACIÓN
// ══════════════════════════════════════════════════════════════

function mostrarError(inputId, errorId) {
	var el = document.getElementById(inputId);
	var errEl = document.getElementById(errorId);
	if (el) el.classList.add('invalid');
	if (errEl) errEl.classList.add('visible');
}

function limpiarError(inputId, errorId) {
	var el = document.getElementById(inputId);
	var errEl = document.getElementById(errorId);
	if (el) el.classList.remove('invalid');
	if (errEl) errEl.classList.remove('visible');
}

function validarCampoTexto(id, errorId) {
	var el = document.getElementById(id);
	if (!el || !el.value.trim()) {
		mostrarError(id, errorId);
		return false;
	}
	limpiarError(id, errorId);
	return true;
}

function validarTelefono(id, errorId) {
	var el = document.getElementById(id);
	if (!el) return false;
	var digitos = el.value.replace(/\D/g, '');
	if (digitos.length !== 10) {
		mostrarError(id, errorId);
		return false;
	}
	limpiarError(id, errorId);
	return true;
}

function validateTab1() {
	var ok = true;

	// Campos de texto simples
	if (!validarCampoTexto('nombre', 'err-nombre')) ok = false;
	if (!validarCampoTexto('apellido_paterno', 'err-ap')) ok = false;
	if (!validarCampoTexto('apellido_materno', 'err-am')) ok = false;
	if (!validarCampoTexto('fecha_nacimiento', 'err-fecha')) ok = false;

	// Teléfonos (10 dígitos)
	if (!validarTelefono('tel_celular', 'err-tel')) ok = false;
	if (!validarTelefono('tel_oficina', 'err-tel-ofi')) ok = false;

	// E-mail
	var correoEl = document.getElementById('correo');
	if (!correoEl || !correoEl.value.trim()) {
		mostrarError('correo', 'err-correo');
		ok = false;
	} else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correoEl.value.trim())) {
		mostrarError('correo', 'err-correo');
		ok = false;
	} else {
		limpiarError('correo', 'err-correo');
	}

	// Carrera de egreso
	var carreraEl = document.getElementById('carrera_egreso');
	if (!carreraEl || !carreraEl.value) {
		mostrarError('carrera_egreso', 'err-carrera');
		ok = false;
	} else {
		limpiarError('carrera_egreso', 'err-carrera');
	}

	// No. de cuenta (9 dígitos)
	var cuentaEl = document.getElementById('no_cuenta');
	if (!cuentaEl || !cuentaEl.value.trim()) {
		mostrarError('no_cuenta', 'err-cuenta');
		ok = false;
	} else if (!/^\d{9}$/.test(cuentaEl.value.trim())) {
		mostrarError('no_cuenta', 'err-cuenta');
		ok = false;
	} else {
		limpiarError('no_cuenta', 'err-cuenta');
	}

	// Generación
	var genEl = document.getElementById('generacion');
	if (!genEl || !genEl.value) {
		var errGen = document.getElementById('err-generacion');
		if (errGen) errGen.classList.add('visible');
		ok = false;
	} else {
		var errGen = document.getElementById('err-generacion');
		if (errGen) errGen.classList.remove('visible');
	}

	return ok;
}

function validateTab2() {
	var ok = true;

	// Compañía
	if (!validarCampoTexto('compania', 'err-compania')) ok = false;

	// Cargo actual
	if (!validarCampoTexto('cargo_actual', 'err-cargo')) ok = false;

	// Trayectoria
	if (!validarCampoTexto('trayectoria', 'err-trayectoria')) ok = false;

	// Monto de aportación
	var montoEl = document.getElementById('monto_aportacion');
	if (!montoEl || !montoEl.value || parseFloat(montoEl.value) < 1000) {
		mostrarError('monto_aportacion', 'err-monto');
		ok = false;
	} else {
		limpiarError('monto_aportacion', 'err-monto');
	}

	// Categoría (debe tener valor)
	var catEl = document.getElementById('categoria_socio');
	if (!catEl || !catEl.value) {
		ok = false;
	}

	// Referencia de pago
	if (!validarCampoTexto('referencia_pago', 'err-referencia')) ok = false;

	return ok;
}

// ══════════════════════════════════════════════════════════════
// NAVEGACIÓN ENTRE TABS
// ══════════════════════════════════════════════════════════════

function nextTab(n) {
	if (n === 1) {
		if (!validateTab1()) return;
		setDone(1);
		closeTab(1);
		openTab(2);
		// Desbloquear botón de envío
		var btnEnviar = document.getElementById('btn-enviar');
		if (btnEnviar) btnEnviar.classList.add('unlocked');
	}
}

// ══════════════════════════════════════════════════════════════
// FORMATEO DE TELÉFONO
// ══════════════════════════════════════════════════════════════

function formatearTelefono(input) {
	var digitos = input.value.replace(/\D/g, '');
	if (digitos.length > 10) digitos = digitos.substring(0, 10);

	// Formato: XX XXXX XXXX
	var formateado = '';
	if (digitos.length > 0) formateado = digitos.substring(0, 2);
	if (digitos.length > 2) formateado += ' ' + digitos.substring(2, 6);
	if (digitos.length > 6) formateado += ' ' + digitos.substring(6, 10);

	input.value = formateado;
}

// ══════════════════════════════════════════════════════════════
// INICIALIZACIÓN
// ══════════════════════════════════════════════════════════════

document.addEventListener('DOMContentLoaded', function () {
	// Generaciones
	inicializarGeneracionPicker();

	// Clipboard
	inicializarClipboard();

	// Monto → Categoría automática
	var montoInput = document.getElementById('monto_aportacion');
	if (montoInput) {
		montoInput.addEventListener('input', actualizarCategoria);
	}

	// Contador de trayectoria
	var trayectoriaEl = document.getElementById('trayectoria');
	if (trayectoriaEl) {
		trayectoriaEl.addEventListener('input', actualizarContadorTrayectoria);
	}

	// Formateo de teléfonos
	var telCelular = document.getElementById('tel_celular');
	var telOficina = document.getElementById('tel_oficina');
	if (telCelular) {
		telCelular.addEventListener('input', function () {
			formatearTelefono(this);
		});
	}
	if (telOficina) {
		telOficina.addEventListener('input', function () {
			formatearTelefono(this);
		});
	}

	// Solo números en no. de cuenta
	var cuentaInput = document.getElementById('no_cuenta');
	if (cuentaInput) {
		cuentaInput.addEventListener('input', function () {
			this.value = this.value.replace(/\D/g, '');
		});
	}

	// Limpieza de errores en tiempo real
	document.addEventListener('input', function (e) {
		if (e.target.matches('input, select, textarea')) {
			if (e.target.value.trim()) e.target.classList.remove('invalid');
		}
	});

	// Validar antes de enviar
	var form = document.getElementById('main-form');
	if (form) {
		form.addEventListener('submit', function (e) {
			if (!validateTab2()) {
				e.preventDefault();
				return false;
			}
			return true;
		});
	}
});
