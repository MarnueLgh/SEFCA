# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Ejecutar el proyecto

Sitio PHP renderizado en servidor, **sin framework, sin gestor de paquetes, sin build, sin tests, sin lint y sin CI**. No hay comandos que ejecutar: se sirve con XAMPP desde `C:\xampp\htdocs\sefca` y se abre en `http://localhost/sefca/`. Los cambios se ven recargando el navegador.

`scss/` no se compila en este repo: editar siempre `css/style.css` directamente (cargado después de `css/bootstrap.min.css`).

## Convenciones (obligatorias)

Están definidas en `skills/convenciones-desarrollo/SKILL.md` y se aplican a todo el código. Resumen operativo:

- Todo en **español**: variables, funciones, archivos, comentarios (se permiten términos universales: `main`, `header`, `footer`, `hero`, `nav`, `index`).
- PHP/JS: `snake_case` (`$nombre_usuario`, `obtener_eventos_listado()`).
- Clases CSS: `seccion-elemento`, un solo guión medio (`.footer-visitas-item`). Nunca `id` para estilos.
- Archivos: `guion_bajo.php`. Indentación con **tabs**.
- Encabezado de archivo con Autor/Fecha/Versión/Descripción; versionado `MAYOR.MENOR` que se actualiza al modificar el archivo.

## Arquitectura

### Contrato de armado de páginas

Las páginas completas viven en la raíz; `includes/` es solo para fragmentos. Cada página raíz sigue este orden exacto:

`includes/head.php` → `includes/spinner.php` → `includes/navbar.php` → contenido → `includes/footer.php` → `includes/volver_arriba_btn.php` → `includes/scripts.php`

Los assets están centralizados: CSS en `head.php`, librerías JS + `js/main.js` en `scripts.php`. **No agregar `<link>`/`<script>` sueltos en las páginas**; el JS propio va en `js/main.js`.

### Fuente única de datos de eventos

`includes/datos_eventos.php` es el catálogo central. Expone cuatro funciones derivadas del mismo arreglo:

- `obtener_eventos_sefca()` — catálogo completo, indexado por clave del evento
- `obtener_eventos_listado()` — los que llevan `listado => true`, para `eventos.php`
- `obtener_eventos_galeria()` — los que tienen galería, para `evento.php`
- `obtener_eventos_carrusel()` — los que llevan `home.mostrar`, para `includes/carrusel.php`

Agregar o cambiar un evento se hace **solo aquí**. El filtrado y la paginación de `eventos.php` dependen de que cada tarjeta conserve `data-tipo`, `data-mes` y `data-anio` (vienen de esas claves en el arreglo).

Una galería se define con `inicio`/`cantidad`/`extension` (numeración secuencial `01.jpg`, `02.jpg`…) **o** con una lista explícita `fotos`. `includes/evento.php` resuelve ambas formas.

### Ruteo de galerías

`evento.php?evento=<clave>` en la raíz solo hace `require` de `includes/evento.php`, que contiene la página entera. Ese include se autoprotege: si alguien lo abre por URL redirige a `../evento.php`; si la clave no existe redirige a `eventos.php`.

### Navbar

`includes/navbar.php` deduce el estado activo con `basename($_SERVER['PHP_SELF'])` y variables `$activo_*`. Al agregar una página nueva hay que registrarla ahí, incluidos los arreglos `$activo_nosotros` / `$activo_iniciativas` que marcan el dropdown padre.

### Formulario de afiliación (fuera del pipeline)

`afiliacion_forms.php` **no** usa `head.php`/`navbar.php`/`scripts.php`: es una página autónoma con su propio `<head>`, `css/diseno_afiliacion.css` y `js/afiliacion.js`. Se abre desde el CTA del navbar con `target="_blank"`.

- Procesa `POST` en sí misma, valida el comprobante de pago por MIME real (`finfo`), máx. 5 MB, y lo guarda en `uploads/comprobantes/` con nombre aleatorio.
- **La persistencia en base de datos aún no existe**: el `INSERT` está comentado dentro del archivo como plantilla PDO. `config/database.php` (clase `Database`, PostgreSQL/PDO) está escrito pero sin usar y con credenciales de placeholder.

Ojo: `afiliacion.php` es otra cosa — una página del dropdown "Nosotros" que hoy está prácticamente vacía (su hero está comentado).

## Trampas conocidas

- **Contador de visitas**: `includes/footer.php` incrementa `includes/contador.txt` y reescribe `includes/contador_visitantes.txt` (huellas IP+UA con ventana de 30 min), solo cuando la página es `index.php`. Ambos archivos se ensucian durante QA manual — **no commitear esos diffs**.
- Ese contador usa rutas relativas (`"includes/contador.txt"`), así que depende de que el script de entrada esté en la raíz del proyecto.
- **Contenido duplicado**: la carta estratégica vive en `includes/carta_estrategica.php` y la incluyen tanto `index.php` como `carta_estrategica.php` (esta última no está en el navbar).
- `includes/hero-pagina.php` no renderiza nada si faltan `$heroTitulo` o `$heroTexto`; `$heroClase` sí se aplica pero sanitizado (se eliminan caracteres fuera de `[a-zA-Z0-9_ -]`).
- Varias páginas llevan `<script>` inline pese a la convención (`eventos.php`, `includes/consejo.php`, `includes/listado_beneficios.php`); no lo repliques en código nuevo.
- `css/style.css?v=N` y `js/main.js?v=N` traen cache-busting manual: sube el número al cambiar esos archivos.

## Nota

`AGENTS.md` cubre parte de lo mismo para otros agentes. Si cambia la arquitectura, actualiza ambos.
