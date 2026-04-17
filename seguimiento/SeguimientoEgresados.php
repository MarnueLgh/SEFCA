<?php
$registrado = false;
$nombre_completo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    $registrado = true;
    $nombre = trim(isset($_POST['nombre']) ? $_POST['nombre'] : '');
    $apellido_p = trim(isset($_POST['apellido_paterno']) ? $_POST['apellido_paterno'] : '');
    $apellido_m = trim(isset($_POST['apellido_materno']) ? $_POST['apellido_materno'] : '');
    $nombre_completo = "$nombre $apellido_p $apellido_m";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro de Egresados</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=Source+Sans+3:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="disenosefca2.css">
</head>
<body>
<div class="wrapper">
  <div class="header">
    <div class="escudo">🎓</div>
    <h1>Registro de Egresados</h1>
    <p>Complete los pasos para finalizar su registro</p>
  </div>

  <div class="progress-bar">
    <div class="step-dot active" id="dot-1">1</div>
    <div class="step-line" id="line-1"></div>
    <div class="step-dot" id="dot-2">2</div>
    <div class="step-line" id="line-2"></div>
    <div class="step-dot" id="dot-3">3</div>
  </div>

  <div class="success-screen <?= $registrado ? 'show' : '' ?>" id="success-screen">
    <div class="success-icon">
      <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <h2>¡Registrado con Éxito!</h2>
    <div class="name-display" id="success-name">
      <?= htmlspecialchars($nombre_completo) ?>
    </div>
    <p>Su información ha sido guardada correctamente.<br>Bienvenido de nuevo a nuestra comunidad de egresados.</p>
  </div>

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
          <div class="field-row">
            <div class="field-group">
              <label for="cuenta">Número de Cuenta <span class="req">*</span></label>
              <input type="text" id="cuenta" name="cuenta" placeholder="Ej. 317012345">
              <div class="error-msg" id="err-cuenta">Este campo es obligatorio.</div>
            </div>
            <div class="field-group">
              <label for="generacion">Generación <span class="req">*</span></label>
              <input type="text" id="generacion" name="generacion" placeholder="Ej. 2018-2022">
              <div class="error-msg" id="err-generacion">Este campo es obligatorio.</div>
            </div>
          </div>

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

          <!-- Licenciatura + Plan de Estudios -->
          <div class="field-row">
            <div class="field-group">
              <label for="licenciatura">Licenciatura <span class="req">*</span></label>
              <select name="licenciatura" id="licenciatura" onchange="updatePlanEstudios()">
                <option value="">Seleccione su Licenciatura</option>
                <option value="Licenciatura en Contaduría">Licenciatura en Contaduría</option>
                <option value="Licenciatura en Administración">Licenciatura en Administración</option>
                <option value="Licenciatura en Informática">Licenciatura en Informática</option>
                <option value="Licenciatura en Negocios Internacionales">Licenciatura en Negocios Internacionales</option>
              </select>
              <div class="error-msg" id="err-lic">Este campo es obligatorio.</div>
            </div>
            <div class="field-group">
              <label for="plan_estudios">Plan de Estudios <span class="req">*</span></label>
              <select name="plan_estudios" id="plan_estudios" disabled>
                <option value="">— Seleccione primero la Licenciatura —</option>
              </select>
              <div class="error-msg" id="err-plan">Este campo es obligatorio.</div>
            </div>
          </div>

          <!-- Año de Inicio y Año de Titulación -->
          <div class="field-row">
            <div class="field-group">
              <label for="anio_inicio">Año de Inicio <span class="req">*</span></label>
              <select name="anio_inicio" id="anio_inicio">
                <option value="">— Seleccione el año —</option>
                <?php
                  $anioActual = (int)date('Y');
                  for ($y = $anioActual; $y >= 1970; $y--) {
                      echo "<option value=\"$y\">$y</option>";
                  }
                ?>
              </select>
              <div class="error-msg" id="err-anio-inicio">Este campo es obligatorio.</div>
            </div>
            <div class="field-group">
              <label for="anio_titulacion">Año de Titulación <span class="opt-label"></span></label>
              <select name="anio_titulacion" id="anio_titulacion">
                <option value="">— No titulado —</option>
                <?php
                  for ($y = $anioActual; $y >= 1970; $y--) {
                      echo "<option value=\"$y\">$y</option>";
                  }
                ?>
              </select>
            </div>
          </div>

          <!-- Correo -->
          <div class="field-row">
            <div class="field-group">
              <label for="correo">Correo Electrónico <span class="req">*</span></label>
              <input type="email" id="correo" name="correo" placeholder="correo@ejemplo.com">
              <div class="error-msg" id="err-correo">Ingrese un correo válido.</div>
            </div>
          </div>

          <div class="section-title">Teléfonos de Contacto</div>
          <div class="phone-list" id="phone-list">
            <div class="phone-entry">
              <select name="tipo_tel[]">
                <option value="">Tipo</option>
                <option value="personal">Personal</option>
                <option value="casa">Casa</option>
                <option value="oficina">Oficina</option>
                <option value="trabajo">Trabajo</option>
                <option value="celular">Celular</option>
                <option value="otro">Otro</option>
              </select>
              <input type="text" name="telefono[]" placeholder="Ej. 55 1234 5678">
            </div>
          </div>
          <button type="button" class="btn-add" onclick="addPhone()">
            <span style="font-size:1.1rem">＋</span> Agregar Teléfono
          </button>
        </div>
        <div class="tab-footer">
          <button type="button" class="btn-next" onclick="nextTab(1)">
            Continuar
            <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </button>
        </div>
      </div>
    </div>

    <!-- ===================== TAB 2: HISTORIAL ACADÉMICO ===================== -->
    <div class="tab tab-locked" id="tab-2">
      <div class="tab-header" onclick="tryOpenTab(2)">
        <div class="tab-title-row">
          <div class="tab-number" id="num-2">2</div>
          <div class="tab-title-text">
            <h2>Historial Académico</h2>
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

          <!-- ---- POSGRADOS ---- -->
          <div class="section-title">Posgrados</div>
          <div class="field-group">
            <label>¿Cuentas con estudios de posgrado? <span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-btn">
                <input type="radio" name="tiene_posgrado" value="si" onchange="togglePosgrado(this)">
                <span class="radio-dot"></span> Sí
              </label>
              <label class="radio-btn">
                <input type="radio" name="tiene_posgrado" value="no" onchange="togglePosgrado(this)">
                <span class="radio-dot"></span> No
              </label>
            </div>
            <div class="error-msg" id="err-posgrado">Selecciona una opción.</div>
          </div>

          <div class="conditional" id="cond-posgrado">
            <div id="posgrado-list"></div>
            <button type="button" class="btn-add" onclick="addPosgrado()">
              <span style="font-size:1.1rem">＋</span> Agregar Posgrado
            </button>
          </div>

          <!-- ---- IDIOMAS ---- -->
          <div class="section-title">Idioma</div>
          <div class="field-group">
            <label>¿Hablas algún idioma? <span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-btn">
                <input type="radio" name="tiene_idioma" value="si" onchange="toggleSeccion('cond-idioma', this)">
                <span class="radio-dot"></span> Sí
              </label>
              <label class="radio-btn">
                <input type="radio" name="tiene_idioma" value="no" onchange="toggleSeccion('cond-idioma', this)">
                <span class="radio-dot"></span> No
              </label>
            </div>
            <div class="error-msg" id="err-idioma">Selecciona una opción.</div>
          </div>

          <div class="conditional" id="cond-idioma">
            <div id="idioma-list"></div>
            <button type="button" class="btn-add" onclick="addIdioma()">
              <span style="font-size:1.1rem">＋</span> Agregar Idioma
            </button>
          </div>

          <!-- ---- RECONOCIMIENTOS ---- -->
          <div class="section-title">Reconocimiento</div>
          <div class="field-group">
            <label>¿Posees algún reconocimiento? <span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-btn">
                <input type="radio" name="tiene_reconocimiento" value="si" onchange="toggleSeccion('cond-reconocimiento', this)">
                <span class="radio-dot"></span> Sí
              </label>
              <label class="radio-btn">
                <input type="radio" name="tiene_reconocimiento" value="no" onchange="toggleSeccion('cond-reconocimiento', this)">
                <span class="radio-dot"></span> No
              </label>
            </div>
            <div class="error-msg" id="err-reconocimiento">Selecciona una opción.</div>
          </div>

          <div class="conditional" id="cond-reconocimiento">
            <div id="reconocimiento-list"></div>
            <button type="button" class="btn-add" onclick="addReconocimiento()">
              <span style="font-size:1.1rem">＋</span> Agregar Reconocimiento
            </button>
          </div>

          <!-- ---- CERTIFICACIONES ---- -->
          <div class="section-title">Certificación</div>
          <div class="field-group">
            <label>¿Cuentas con alguna certificación? <span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-btn">
                <input type="radio" name="tiene_certificacion" value="si" onchange="toggleSeccion('cond-certificacion', this)">
                <span class="radio-dot"></span> Sí
              </label>
              <label class="radio-btn">
                <input type="radio" name="tiene_certificacion" value="no" onchange="toggleSeccion('cond-certificacion', this)">
                <span class="radio-dot"></span> No
              </label>
            </div>
            <div class="error-msg" id="err-certificacion">Selecciona una opción.</div>
          </div>

          <div class="conditional" id="cond-certificacion">
            <div id="certificacion-list"></div>
            <button type="button" class="btn-add" onclick="addCertificacion()">
              <span style="font-size:1.1rem">＋</span> Agregar Certificación
            </button>
          </div>

        </div>
        <div class="tab-footer">
          <button type="button" class="btn-next" onclick="nextTab(2)">
            Continuar
            <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </button>
        </div>
      </div>
    </div>

    <!-- ===================== TAB 3: EXPERIENCIA LABORAL ===================== -->
    <div class="tab tab-locked" id="tab-3">
      <div class="tab-header" onclick="tryOpenTab(3)">
        <div class="tab-title-row">
          <div class="tab-number" id="num-3">3</div>
          <div class="tab-title-text">
            <h2>Experiencia Laboral</h2>
            <div class="tab-badge" id="badge-3">Complete el paso anterior</div>
          </div>
          <div class="tab-arrow">
            <svg viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
          </div>
        </div>
      </div>
      <div class="locked-msg">🔒 Completa el Paso 2 para continuar.</div>

      <div class="tab-body">
        <div class="tab-inner">
          <div class="field-group">
            <label>¿Tienes experiencia laboral? <span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-btn">
                <input type="radio" name="ha_trabajado" value="si" onchange="toggleTrabajo(this)">
                <span class="radio-dot"></span> Sí
              </label>
              <label class="radio-btn">
                <input type="radio" name="ha_trabajado" value="no" onchange="toggleTrabajo(this)">
                <span class="radio-dot"></span> No
              </label>
            </div>
            <div class="error-msg" id="err-trabajo">Selecciona una opción.</div>
          </div>

          <div class="conditional" id="cond-trabajo">
            <div id="trabajo-list"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="submit-row">
      <button type="submit" name="enviar" id="btn-enviar">
        <svg viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
        Enviar Registro
      </button>
    </div>
  </form>
</div>

<script>
const tabDone = { 1: false, 2: false, 3: false };

// ===================== PLAN DE ESTUDIOS =====================
function updatePlanEstudios() {
    const lic = document.getElementById('licenciatura').value;
    const planSelect = document.getElementById('plan_estudios');

    if (!lic || lic.trim() === '') {
        planSelect.disabled = true;
        planSelect.innerHTML = '<option value="">— Seleccione primero la Licenciatura —</option>';
        planSelect.value = '';
        return;
    }

    // Limpiar opciones previas
    planSelect.innerHTML = '';
    
    // Habilitar el select
    planSelect.disabled = false;
    
    // Añadir opción por defecto
    const defaultOpt = document.createElement('option');
    defaultOpt.value = '';
    defaultOpt.textContent = '— Seleccione un Plan —';
    planSelect.appendChild(defaultOpt);

    // Definir planes por licenciatura
    let planes = [];
    if (lic === 'Licenciatura en Negocios Internacionales') {
        planes = ['2018'];
    } else if (lic === 'Licenciatura en Contaduría' || 
               lic === 'Licenciatura en Administración' || 
               lic === 'Licenciatura en Informática') {
        planes = ['1998', '2012', '2012 Actualizado', '2023'];
    }

    // Añadir las opciones de planes
    planes.forEach(p => {
        const opt = document.createElement('option');
        opt.value = p;
        opt.textContent = p;
        planSelect.appendChild(opt);
    });
    
    // Forzar actualización del DOM
    planSelect.dispatchEvent(new Event('change', { bubbles: true }));
}

// ===================== TABS =====================
function setDone(n) {
    tabDone[n] = true;
    const dot = document.getElementById('dot-' + n);
    if (dot) {
        dot.textContent = '✓';
        dot.classList.add('done');
        dot.classList.remove('active');
    }
    const line = document.getElementById('line-' + n);
    if (line) line.classList.add('done');
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

// ===================== VALIDACIONES =====================
function validateTab1() {
    let ok = true;
    const fields = [
        ['cuenta', 'err-cuenta'],
        ['generacion', 'err-generacion'],
        ['nombre', 'err-nombre'],
        ['apellido_paterno', 'err-ap'],
        ['licenciatura', 'err-lic'],
        ['correo', 'err-correo']
    ];
    fields.forEach(([id, err]) => {
        const el = document.getElementById(id);
        const errEl = document.getElementById(err);
        if (!el.value || !el.value.trim()) {
            el.classList.add('invalid');
            errEl.classList.add('visible');
            ok = false;
        } else {
            el.classList.remove('invalid');
            errEl.classList.remove('visible');
        }
    });

    // Validar año de inicio
    const anioEl = document.getElementById('anio_inicio');
    const anioErr = document.getElementById('err-anio-inicio');
    if (!anioEl.value) {
        anioEl.classList.add('invalid');
        anioErr.classList.add('visible');
        ok = false;
    } else {
        anioEl.classList.remove('invalid');
        anioErr.classList.remove('visible');
    }

    // Validar plan de estudios
    const planEl = document.getElementById('plan_estudios');
    const planErr = document.getElementById('err-plan');
    if (planEl.disabled || !planEl.value || !planEl.value.trim()) {
        planEl.classList.add('invalid');
        planErr.textContent = planEl.disabled ? 'Seleccione una licenciatura primero.' : 'Este campo es obligatorio.';
        planErr.classList.add('visible');
        ok = false;
    } else {
        planEl.classList.remove('invalid');
        planErr.classList.remove('visible');
    }

    // Validar correo
    const correo = document.getElementById('correo');
    if (!correo.value || !correo.value.trim()) {
        correo.classList.add('invalid');
        document.getElementById('err-correo').textContent = 'Este campo es obligatorio.';
        document.getElementById('err-correo').classList.add('visible');
        ok = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo.value)) {
        correo.classList.add('invalid');
        document.getElementById('err-correo').textContent = 'Ingrese un correo válido.';
        document.getElementById('err-correo').classList.add('visible');
        ok = false;
    } else {
        correo.classList.remove('invalid');
        document.getElementById('err-correo').classList.remove('visible');
    }
    
    return ok;
}

function validateTab2() {
    let ok = true;

    const checks = [
        ['tiene_posgrado', 'err-posgrado'],
        ['tiene_idioma', 'err-idioma'],
        ['tiene_reconocimiento', 'err-reconocimiento'],
        ['tiene_certificacion', 'err-certificacion']
    ];

    checks.forEach(([name, errId]) => {
        const checked = document.querySelector(`input[name="${name}"]:checked`);
        const errEl = document.getElementById(errId);
        if (!checked) {
            errEl.classList.add('visible');
            ok = false;
        } else {
            errEl.classList.remove('visible');
        }
    });

    return ok;
}

function nextTab(n) {
    n = parseInt(n);
    let valid = false;
    if (n === 1) valid = validateTab1();
    if (n === 2) valid = validateTab2();

    if (!valid) return;

    setDone(n);
    closeTab(n);
    setTimeout(function() {
        openTab(n + 1);
        checkSubmit();
    }, 80);
}

function validateTab3() {
    let ok = true;
    const trabajoVal = document.querySelector('input[name="ha_trabajado"]:checked');
    const trabajoErr = document.getElementById('err-trabajo');
    
    if (!trabajoVal) {
        trabajoErr.classList.add('visible');
        ok = false;
    } else {
        trabajoErr.classList.remove('visible');
    }
    
    return ok;
}

function checkSubmit() {
    const trabajoVal = document.querySelector('input[name="ha_trabajado"]:checked');
    const btnEnviar = document.getElementById('btn-enviar');
    
    // Verificar que todos los tabs esten completos
    if (tabDone[2] && trabajoVal) {
        if (trabajoVal.value === 'no' || document.querySelectorAll('.trabajo-entry').length > 0) {
            btnEnviar.classList.add('unlocked');
        } else {
            btnEnviar.classList.remove('unlocked');
        }
    } else {
        btnEnviar.classList.remove('unlocked');
    }
}

// ===================== TELÉFONOS =====================
function addPhone() {
    const list = document.getElementById('phone-list');
    const div = document.createElement('div');
    div.className = 'phone-entry';
    div.innerHTML = `
        <select name="tipo_tel[]">
            <option value="">Tipo</option>
            <option value="personal">Personal</option>
            <option value="casa">Casa</option>
            <option value="oficina">Oficina</option>
            <option value="trabajo">Trabajo</option>
            <option value="celular">Celular</option>
            <option value="otro">Otro</option>
        </select>
        <input type="text" name="telefono[]" placeholder="Ej. 55 1234 5678">
        <button type="button" class="btn-remove" onclick="this.parentElement.remove()">✕</button>
    `;
    list.appendChild(div);
}

// ===================== POSGRADOS =====================
let posgradoCount = 0;

function togglePosgrado(radio) {
    const cond = document.getElementById('cond-posgrado');
    cond.classList.toggle('show', radio.value === 'si');
    if (radio.value === 'si' && document.getElementById('posgrado-list').children.length === 0) {
        addPosgrado();
    }
}

function addPosgrado() {
    posgradoCount++;
    const list = document.getElementById('posgrado-list');
    const div = document.createElement('div');
    div.className = 'posgrado-entry';
    div.id = 'posgrado-' + posgradoCount;
    const currentYear = new Date().getFullYear();
    let yearOptions = '<option value="">— Seleccione —</option>';
    for (let y = currentYear; y >= 1970; y--) {
        yearOptions += `<option value="${y}">${y}</option>`;
    }
    div.innerHTML = `
        <button type="button" class="posgrado-remove" onclick="document.getElementById('posgrado-${posgradoCount}').remove()">✕</button>
        <div class="field-row">
            <div class="field-group">
                <label>Grado Académico</label>
                <select name="grado_posgrado[]">
                    <option value="">— Selecciona —</option>
                    <option value="maestria">Maestría</option>
                    <option value="doctorado">Doctorado</option>
                    <option value="postdoctorado">Postdoctorado</option>
                </select>
            </div>
            <div class="field-group">
                <label>Nombre del Posgrado</label>
                <input type="text" name="nombre_posgrado[]" placeholder="Ej. Maestría en Inteligencia Artificial">
            </div>
        </div>
        <div class="field-row">
            <div class="field-group">
                <label>Universidad</label>
                <input type="text" name="universidad_posgrado[]" placeholder="Ej. Universidad Nacional Autónoma de México">
            </div>
        </div>
        <div class="field-row">
            <div class="field-group">
                <label>Año de Inicio</label>
                <select name="anio_inicio_posgrado[]">
                    ${yearOptions}
                </select>
            </div>
            <div class="field-group">
                <label>Año de Fin <span class="opt-label">(Opcional)</span></label>
                <select name="anio_fin_posgrado[]">
                    <option value="">— No especificar —</option>
                    ${yearOptions.replace('<option value="">— Seleccione —</option>', '')}
                </select>
            </div>
        </div>
    `;
    list.appendChild(div);
}

// ===================== FUNCIÓN GENÉRICA TOGGLE SECCIÓN =====================
function toggleSeccion(condId, radio) {
    const cond = document.getElementById(condId);
    cond.classList.toggle('show', radio.value === 'si');
}

// ===================== IDIOMAS =====================
let idiomaCount = 0;

function addIdioma() {
    idiomaCount++;
    const list = document.getElementById('idioma-list');
    const div = document.createElement('div');
    div.className = 'posgrado-entry';
    div.id = 'idioma-' + idiomaCount;
    div.innerHTML = `
        <button type="button" class="posgrado-remove" onclick="document.getElementById('idioma-${idiomaCount}').remove()">✕</button>
        <div class="field-row">
            <div class="field-group">
                <label>Idioma <span class="req">*</span></label>
                <select name="idioma[]" onchange="toggleOtroIdioma(this, ${idiomaCount})">
                    <option value="">— Selecciona —</option>
                    <option value="ingles">Inglés</option>
                    <option value="frances">Francés</option>
                    <option value="italiano">Italiano</option>
                    <option value="aleman">Alemán</option>
                    <option value="chino">Chino</option>
                    <option value="portugues">Portugués</option>
                    <option value="otro">Otro</option>
                </select>
                
                <input type="text" id="otro-idioma-${idiomaCount}" name="idioma_otro[]" 
                       placeholder="¿Cuál idioma?" 
                       class="input-bonito"
                       style="display: none; margin-top: 10px;">
            </div>
            <div class="field-group">
                <label>Nivel <span class="req">*</span></label>
                <select name="nivel_idioma[]">
                    <option value="">— Selecciona —</option>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                </select>
            </div>
        </div>
    `;
    list.appendChild(div);
}

// Función para mostrar/ocultar el cuadro de texto
function toggleOtroIdioma(selectElement, id) {
    const inputOtro = document.getElementById(`otro-idioma-${id}`);
    if (selectElement.value === "otro") {
        inputOtro.style.display = "block";
        inputOtro.focus(); // Hace que el cursor aparezca automáticamente en la caja
    } else {
        inputOtro.style.display = "none";
        inputOtro.value = ""; 
    }
}

// Al mostrar la sección de idiomas, agregar automáticamente el primero
document.querySelectorAll('input[name="tiene_idioma"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.value === 'si' && document.getElementById('idioma-list').children.length === 0) {
            addIdioma();
        }
    });
});

// ===================== RECONOCIMIENTOS =====================
let reconocimientoCount = 0;

function addReconocimiento() {
    reconocimientoCount++;
    const list = document.getElementById('reconocimiento-list');
    const div = document.createElement('div');
    div.className = 'posgrado-entry';
    div.id = 'reconocimiento-' + reconocimientoCount;
    div.innerHTML = `
        <button type="button" class="posgrado-remove" onclick="document.getElementById('reconocimiento-${reconocimientoCount}').remove()">✕</button>
        <div class="field-row">
            <div class="field-group">
                <label>Reconocimiento <span class="req">*</span></label>
                <input type="text" name="reconocimiento[]" placeholder="Ej. Premio de Excelencia Académica">
            </div>
            <div class="field-group">
                <label>Fecha de Obtención <span class="req">*</span></label>
                <input type="date" name="fecha_reconocimiento[]">
            </div>
        </div>
    `;
    list.appendChild(div);
}

document.querySelectorAll('input[name="tiene_reconocimiento"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.value === 'si' && document.getElementById('reconocimiento-list').children.length === 0) {
            addReconocimiento();
        }
    });
});

// ===================== CERTIFICACIONES =====================
let certificacionCount = 0;

function addCertificacion() {
    certificacionCount++;
    const list = document.getElementById('certificacion-list');
    const div = document.createElement('div');
    div.className = 'posgrado-entry';
    div.id = 'certificacion-' + certificacionCount;
    
    div.innerHTML = `
        <button type="button" class="posgrado-remove" onclick="document.getElementById('certificacion-${certificacionCount}').remove()">✕</button>
        <div class="field-row">
            <div class="field-group">
                <label>Certificación <span class="req">*</span></label>
                <input type="text" name="certificacion[]" placeholder="Ej. Certificación en Gestión de Proyectos (PMP)">
            </div>
            <div class="field-group">
                <label>Entidad Certificadora <span class="req">*</span></label>
                <select name="entidad_certificadora[]" onchange="toggleOtroEntidad(this, ${certificacionCount})">
                    <option value="">— Selecciona —</option>
                    <option value="ciscoCcna">Cisco CCNA</option>
                    <option value="compTia">CompTIA</option>
                    <option value="oracle">Oracle</option>
                    <option value="microsoft">Microsoft</option>
                    <option value="googleCloud">Google Cloud</option>
                    <option value="ibm">IBM</option>
                    <option value="sap">SAP</option>
                    <option value="microsoftAzure">Microsoft Azure</option>
                    <option value="bureauVeritas">Bureau Veritas</option>
                    <option value="iso">ISO</option>
                    <option value="otro">Otro</option>
                </select>
                <input type="text" id="otro-entidad-${certificacionCount}" name="entidad_otra[]" 
                       placeholder="Nombre de la Entidad Certificadora" style="display: none; margin-top: 10px;">
            </div>
        </div>
        <div class="field-row">
            <div class="field-group" style="max-width: 50%;">
                <label>Fecha de Obtención <span class="req">*</span></label>
                <input type="date" name="fecha_certificacion[]">
            </div>
        </div>
    `;
    list.appendChild(div);
}

// Función para mostrar/ocultar el campo de Entidad Certificadora
function toggleOtroEntidad(selectElement, id) {
    const inputOtro = document.getElementById(`otro-entidad-${id}`);
    if (selectElement.value === "otro") {
        inputOtro.style.display = "block";
        inputOtro.required = true;
    } else {
        inputOtro.style.display = "none";
        inputOtro.value = "";
        inputOtro.required = false;
    }
}

document.querySelectorAll('input[name="tiene_certificacion"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.value === 'si' && document.getElementById('certificacion-list').children.length === 0) {
            addCertificacion();
        }
    });
});

// ===================== EXPERIENCIA LABORAL =====================
let trabajoCount = 0;

function toggleTrabajo(radio) {
    document.getElementById('cond-trabajo').classList.toggle('show', radio.value === 'si');
    if (radio.value === 'si' && document.querySelectorAll('.trabajo-entry').length === 0) {
        addTrabajo();
    }
    setDone(3);
    setTimeout(checkSubmit, 50);
}

function addTrabajo() {
    const list = document.getElementById('trabajo-list');
    const div = document.createElement('div');
    div.className = 'trabajo-entry';
    div.id = 'trabajo-' + trabajoCount;
    
    div.innerHTML = `
        <h4>Ingresa tu Última Experiencia Laboral</h4>
        <div class="field-row">
            <div class="field-group">
                <label>Empresa <span class="req">*</span></label>
                <input type="text" name="empresa[]" placeholder="Nombre de la empresa">
            </div>
            <div class="field-group">
                <label>Puesto / Cargo <span class="req">*</span></label>
                <select name="puesto[]" onchange="toggleOtroPuesto(this, ${trabajoCount})">
                    <option value="">— Selecciona —</option>
                    <option value="desarrolladorFullStack">Desarrollador Full Stack</option>
                    <option value="cdataScientis">Data Scientist</option>
                    <option value="analistaSistemas">Analista de Sistemas</option>
                    <option value="analistaBigData">Analista de Big Data</option>
                    <option value="ingenieroIA">Ingeniero de IA</option>
                    <option value="desarrolladorSoftware">Desarrollador de Software</option>
                    <option value="ingenieroDevOps">Ingeniero DevOps</option>
                    <option value="analistaCiberseguridad">Analista de Ciberseguridad</option>
                    <option value="informaticoForense">Informático Forense</option> 
                    <option value="administradorBD">Administrador de Base de Datos</option>
                    <option value="arquitectoCloud">Arquitecto Cloud</option>
                    <option value="gerenteProyectos">Gerente de Proyectos</option>
                    <option value="otro">Otro</option>
                </select>
                <input type="text" id="otro-puesto-${trabajoCount}" name="puesto_otro[]" 
                       placeholder="Nombre del Puesto" style="display: none; margin-top: 10px;">
            </div>
        </div>
        <div class="field-group">
            <label>Modalidad</label>
            <div class="radio-group">
                <label class="radio-btn"><input type="radio" name="modalidad_${trabajoCount}[]" value="presencial"><span class="radio-dot"></span> Presencial</label>
                <label class="radio-btn"><input type="radio" name="modalidad_${trabajoCount}[]" value="online"><span class="radio-dot"></span> Online</label>
                <label class="radio-btn"><input type="radio" name="modalidad_${trabajoCount}[]" value="hibrido"><span class="radio-dot"></span> Híbrido</label>
            </div>
        </div>
        <div class="field-row">
            <div class="field-group"><label>Fecha de Ingreso</label><input type="date" name="fecha_ingreso[]"></div>
            <div class="field-group"><label>Fecha de Salida</label><input type="date" name="fecha_salida[]"></div>
        </div>
    `;
    
    list.appendChild(div);
    
    // Verificación de seguridad para el botón
    const btnEnviar = document.getElementById('btn-enviar');
    if(btnEnviar) btnEnviar.classList.add('unlocked');
    
    trabajoCount++;
}

// Función para mostrar/ocultar el campo de Puesto/Cargo
function toggleOtroPuesto(selectElement, id) {
    const inputOtro = document.getElementById(`otro-puesto-${id}`);
    if (inputOtro) {
        inputOtro.style.display = (selectElement.value === "otro") ? "block" : "none";
    }
}

// ===================== LIMPIEZA DE ERRORES =====================
// ===================== INICIALIZACIÓN =====================
document.addEventListener('DOMContentLoaded', function() {
    // Inicializar plan de estudios si hay algo preseleccionado
    updatePlanEstudios();
    
    // Agregar event listener al select de licenciatura para mayor compatibilidad
    const licenciaturaSel = document.getElementById('licenciatura');
    if (licenciaturaSel) {
        licenciaturaSel.addEventListener('change', function() {
            updatePlanEstudios();
        });
    }
    
    // Agregar validacion al enviar el formulario
    const form = document.getElementById('main-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            // Validar tab 3 antes de enviar
            if (!validateTab3()) {
                e.preventDefault();
                return false;
            }
            
            // Si todo esta bien, permitir el envio
            return true;
        });
    }
    
    // Agregar listeners para opciones de trabajo
    document.querySelectorAll('input[name="ha_trabajado"]').forEach(radio => {
        radio.addEventListener('change', checkSubmit);
    });
});

document.addEventListener('input', function(e) {
    if (e.target.matches('input, select, textarea')) {
        if (e.target.value.trim()) e.target.classList.remove('invalid');
    }
});

<?php if ($registrado): ?>
    setDone(1);
    setDone(2);
    setDone(3);
<?php endif; ?>
</script>
</body>
</html>
