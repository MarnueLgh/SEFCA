# SEFCA - Guía de Desarrollo (CLAUDE.md)

Este archivo contiene pautas rápidas de desarrollo y comandos para trabajar en el proyecto **SEFCA**.

## 1. Entorno y Comandos Básicos

El proyecto es un sitio PHP renderizado en servidor (sin framework) estructurado con Bootstrap, CSS personalizado y JS vanilla. No cuenta con un gestor de paquetes (como npm/composer) ni pipeline de compilación.

*   **Servidor Local**: Correr con XAMPP (Apache + PHP) en la ruta `http://localhost/sefca/`
*   **Editor**: Usar tabulaciones (tabs) para la indentación en todos los lenguajes.

## 2. Convenciones de Nomenclatura e Idioma

*   **Idioma**: Todo el código (variables, funciones, clases, comentarios, carpetas y archivos) debe escribirse en **español** (excepto términos web comunes como `main`, `nav`, `header`, `footer`, `hero`, `index`, `include`, `style`).
*   **Variables y Funciones**: `snake_case` (ej. `$nombre_usuario`, `obtener_socios()`).
*   **Clases CSS**: `seccion-elemento` con guión medio simple (ej. `.footer-texto`). No usar guiones bajos ni camelCase en CSS.
*   **Archivos**: `snake_case` con guión bajo (ej. `galeria_socios.php`).
*   **IDs**: Solo para anclas, JS y asociar `label` con `input`. **Nunca** utilizarlos para dar estilos CSS.

## 3. Estructura y Cableado (Wiring) de Páginas

*   Las páginas completas (ej. `index.php`, `nosotros.php`, `eventos.php`, `proyectos.php`) se ubican en la raíz del proyecto.
*   Los fragmentos reutilizables se ubican exclusivamente en la carpeta `includes/`.
*   **Orden de Inclusión de Plantillas**:
    `includes/head.php` -> `includes/spinner.php` -> `includes/navbar.php` -> *Contenido de la Página* -> `includes/footer.php` -> Botón Back-to-Top -> `includes/scripts.php`.

## 4. Estilos y Scripts

*   **CSS**: Todo estilo personalizado se agrega en `css/style.css`, cargado después de Bootstrap. Las variables se definen al inicio en `:root` y las Media Queries se agrupan al final del archivo.
*   **JS**: El JS personalizado del proyecto va en `js/main.js`. Las librerías externas se enlazan en `includes/scripts.php`.

## 5. Versionado y Comentarios

*   **Comentarios**: Añadir encabezado de archivo en la parte superior con `Autor: [Tu Nombre]`, `Fecha`, `Versión` (formato `MAYOR.MENOR`, ej. `1.0`) y `Descripción`.
