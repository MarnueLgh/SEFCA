# AGENTS.md

## Repo Reality
- This is a **vanilla PHP site** (server-rendered) with Bootstrap + custom CSS + vanilla JS.
- No build pipeline, no package manager, no CI, no tests. Deploy via FTP/copy.
- View pages via `http://localhost/sefca/` (XAMPP) or direct file access.
- `includes/contador.txt` increments on every `index.php` view (don't commit accidental changes).

## Active Pages vs Legacy
- Active: `index.php`, `nosotros.php`, `carta_estrategica.php`, `historico.php`, `evento.php`.
- Legacy (avoid): `index_*.php`, `index_prueba_*.php` in root and `antiguo/` folder.
- Navbar (`includes/navbar.php`) links to active pages only.

## Page Composition (keep this pattern)
- Full pages stay at repo root; reusable fragments stay in `includes/`.
- Standard page wiring is: `includes/head.php` -> `includes/spinner.php` -> `includes/navbar.php` -> page content -> `includes/footer.php` -> back-to-top button -> `includes/scripts.php`.
- Keep custom CSS in `css/style.css` (loaded after `css/bootstrap.min.css` in `includes/head.php`).
- Keep custom JS in `js/main.js`; third-party/vendor scripts are loaded centrally from `includes/scripts.php` (from `lib/` and `_js/`).

## High-Risk Gotchas
- Viewing `index.php` increments `includes/contador.txt` via `includes/footer.php`; this file often changes during manual QA. Do not commit it unless intentionally updating the counter.
- `includes/hero-pagina.php` currently renders only `$heroTitulo` and `$heroTexto`; `$heroClase` is set by some pages but not used.
- Lightbox assets are already global (`includes/head.php` + `includes/scripts.php`); avoid re-adding per-page CDN includes.

## Event/Gallery Update Flow
- `historico.php` filtering depends on each card having valid `data-tipo`, `data-mes`, and `data-anio` attributes.
- For events with photo galleries, update both files:
  - `evento.php`: add/update the event entry in `$eventos` and image source config.
  - `historico.php`: add/update the `<article>` card and link it to `evento.php?evento=<clave>`.
- Keep downloadable docs in `docs/` and image assets under `img/`.

## Conventions Source of Truth
- Follow `skills/convenciones-desarrollo/SKILL.md` for project-specific style/naming rules when writing or editing code.
