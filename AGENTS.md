# AGENTS.md

## Repo Snapshot
- Server-rendered PHP site (no framework) with Bootstrap, custom CSS, and vanilla JS.
- No package manager, build pipeline, tests, lint, or CI config in this repo.
- Run locally with XAMPP at `http://localhost/sefca/`.

## Where To Work
- Main navbar pages: `index.php`, `nosotros.php`, `eventos.php`, `proyectos.php`.
- Additional routed pages: `evento.php?evento=<clave>` and standalone `carta_estrategica.php` (not in current navbar).
- Reusable fragments belong in `includes/`; full pages stay in repo root.
- `antiguo/` is legacy snapshots; avoid editing unless explicitly requested.
- `afiliacion_forms.php` is standalone and opens from the main navbar CTA.

## Page Wiring Contract
- Keep this page order: `includes/head.php` -> `includes/spinner.php` -> `includes/navbar.php` -> page content -> `includes/footer.php` -> back-to-top button -> `includes/scripts.php`.
- Shared assets are centralized:
  - CSS in `includes/head.php` (`css/bootstrap.min.css`, `css/style.css`)
  - JS in `includes/scripts.php` (`lib/wow/wow.min.js`, `lib/easing/easing.min.js`, `lib/owlcarousel/owl.carousel.min.js`, `_js/aos.js`, then `js/main.js?v=2`)
- Prefer editing `css/style.css` and `js/main.js`; `scss/` is not compiled inside this repo.

## High-Risk Gotchas
- `includes/footer.php` increments `includes/contador.txt` only on `index.php`; this file changes during manual QA. Do not commit accidental counter diffs.
- Active counter storage is `includes/contador.txt`.
- `includes/hero-pagina.php` currently renders only `$heroTitulo` and `$heroTexto`; `$heroClase` is ignored.

## Events And Galleries
- `eventos.php` filtering/pagination depends on each card keeping valid `data-tipo`, `data-mes`, and `data-anio`.
- Event cards, gallery metadata, and home carousel entries are centralized in `includes/datos_eventos.php`.
- For gallery-backed events, define the event key in `includes/datos_eventos.php` with either sequential `inicio/cantidad/extension` or explicit `fotos` list.
- `eventos.php`, `includes/evento.php`, and `includes/carrusel.php` render from that shared source.

## Duplicate Content Trap
- Strategic-letter content lives in `includes/carta_estrategica.php`; `index.php` and `carta_estrategica.php` both include it.

## Conventions Source
- Follow `skills/convenciones-desarrollo/SKILL.md` for project naming/style conventions.
