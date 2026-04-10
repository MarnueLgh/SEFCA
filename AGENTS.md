# AGENTS.md

## Repo Reality
- This repo has no README, package/composer manifest, lockfile, CI workflow, or lint/test config. Do not assume npm/composer/test commands exist.
- The project is a server-rendered PHP site with static assets (Bootstrap + custom CSS + vanilla JS). There is no build/codegen pipeline in-repo.

## Active Surface vs Legacy Files
- Treat `index.php`, `nosotros.php`, `carta_estrategica.php`, `galeria_eventos.php`, `proyectos.php`, and `evento.php` as the active modular pages.
- `index.php` and the many `index_*.php` / `index_prueba_*.php` files are legacy snapshots; avoid editing them unless the task explicitly targets them.
- `includes/navbar.php` routes Inicio to `index.php`; this is the safest default homepage for ongoing work.

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
- `galeria_eventos.php` filtering depends on each card having valid `data-tipo`, `data-mes`, and `data-anio` attributes.
- For events with photo galleries, update both files:
  - `evento.php`: add/update the event entry in `$eventos` and image source config.
  - `galeria_eventos.php`: add/update the `<article>` card and link it to `evento.php?evento=<clave>`.
- Keep downloadable docs in `docs/` and image assets under `img/`.

## Conventions Source of Truth
- Follow `skills/convenciones-desarrollo/SKILL.md` for project-specific style/naming rules when writing or editing code.
