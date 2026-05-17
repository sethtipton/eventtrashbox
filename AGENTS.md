# AGENTS.md

## Project

EventTrashBox is a custom WordPress theme for a standalone Event Boxes business.

## Working Rules

- Work only inside this theme directory unless explicitly asked otherwise.
- Treat this repository as theme-only. Do not add WordPress core, plugins, uploads, Local app files, database exports, or logs.
- Use native WordPress page content and block patterns for marketing sections.
- Do not style the WordPress admin/editor side unless explicitly requested.
- Keep PHP template parts for theme structure, loops, and reusable theme chrome.
- Keep block patterns as the primary system for editable marketing content.
- Keep the theme independent from CompanyBox in naming, copy, design, and user-facing experience.
- Read `CLIENT_NOTES.md` before making product, content, design, integration, or information architecture decisions.

## Local Workflow

- Use the Local app for the WordPress runtime.
- Use the Node version pinned in `.nvmrc`.
- Work from this directory:

```sh
/Users/sethtipton/Local Sites/eventtrashbox/app/public/wp-content/themes/eventtrashbox
```

- Run `npm run watch` while editing Sass.
- `npm run dev` is the preferred alias for Sass watch mode.
- Run `npm run doctor` when local tooling or Local PHP paths look wrong.
- Run `npm run clean` only for stale generated artifacts such as source maps.
- Run `npm run check` before considering frontend/theme changes complete.
- Do not edit `style.css` or `style-rtl.css` directly; rebuild them from Sass.
