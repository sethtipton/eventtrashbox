# EventTrashBox

A custom WordPress theme for the EventTrashBox site.

This repository tracks only the theme directory:

```sh
wp-content/themes/eventtrashbox
```

WordPress core, plugins, uploads, database exports, logs, and Local app configuration should stay outside this repo.

Private client notes stay in `CLIENT_NOTES.md` inside the theme directory for local reference, but that file is intentionally ignored by Git and excluded from theme bundles.

## Local Development

This site is run locally with the Local app on macOS. Work from the theme folder:

```sh
cd "/Users/sethtipton/Local Sites/eventtrashbox/app/public/wp-content/themes/eventtrashbox"
```

Use the pinned Node version:

```sh
nvm use
```

Install dependencies:

```sh
npm install
```

Run a lightweight environment check:

```sh
npm run doctor
```

Install dependencies after checking the local environment:

```sh
npm run setup
```

Watch Sass while editing:

```sh
npm run dev
```

Build CSS manually:

```sh
npm run build
```

Create a deployable theme zip:

```sh
npm run bundle
```

The bundle command copies an explicit allowlist of theme runtime files into a temporary package directory before zipping. Private notes, source Sass, `node_modules`, local editor settings, and development configuration are intentionally excluded.

Remove stale generated source maps:

```sh
npm run clean
```

`style.css` and `style-rtl.css` are generated from Sass but are still committed because WordPress requires a root `style.css` file for themes. Do not edit those compiled files directly.

## Development Environment

This theme includes:

- `.nvmrc`: pins the Node version for local development.
- `.npmrc`: keeps newly saved package versions exact.
- `.vscode/extensions.json`: recommends ESLint, Stylelint, Prettier, PHP Intelephense, and WordPress tooling.
- `.vscode/settings.json`: enables project formatter/linter defaults.
- `scripts/dev-doctor.mjs`: checks the local Node/npm/tooling setup and tries to find Local's PHP binary.

Useful development scripts:

```sh
npm run setup
npm run doctor
npm run dev
npm run clean
npm run check
```

## Quality Checks

Run the JS, Sass, formatting, and CSS build checks:

```sh
npm run check
```

Run individual checks:

```sh
npm run lint
npm run lint:js
npm run lint:scss
npm run format:check
```

Apply JS, Sass, JSON, and Markdown formatting:

```sh
npm run format
```

Run a PHP syntax sweep with Local's bundled PHP:

```sh
LOCAL_PHP="$HOME/Library/Application Support/Local/lightning-services/php-8.2.29+0/bin/darwin-arm64/bin/php"
find . -path './node_modules' -prune -o -name '*.php' -print0 | xargs -0 -n1 "$LOCAL_PHP" -l
```

The exact PHP version directory can change when Local updates PHP. If that path does not exist, find the active Local PHP binary in `~/Library/Application Support/Local/lightning-services/`.

## Environment Troubleshooting

If `npm install` fails, run `nvm use`, confirm `node --version` matches `.nvmrc`, then remove `node_modules` and run `npm install` again.

If Sass changes are not recompiling, confirm `npm run dev` is running from the theme directory, then run `npm run build` once to check for Sass errors.

If the PHP syntax command fails because the Local PHP path changed, run `npm run doctor` and use the Local PHP path it reports.

If files under `Local Sites` cannot be edited, check macOS file permissions on the theme directory and confirm the files are not owned by another user.

## Editing the Homepage

The homepage uses native WordPress page content.

1. In WordPress admin, go to Pages and create or edit the page you want to use as the homepage.
2. Go to Settings > Reading.
3. Set "Your homepage displays" to "A static page".
4. Choose that page as "Homepage".
5. Edit the page with the WordPress block editor.

The theme's `front-page.php` template renders that page content directly. Insert EventTrashBox block patterns for structured homepage sections, then edit the inserted blocks as normal page content. Use wide/full alignment when a section should stretch beyond the default text width.

## Quote CTA Pattern

The `Quote CTA` pattern is a theme-registered starter layout. In a classic theme, inserting it copies the blocks into the page; future edits to the PHP pattern file do not update already-inserted copies.

If the CTA should stay globally synced across product, use-case, FAQ, gallery, and support pages, insert the `Quote CTA` pattern once in the block editor, choose "Create pattern", and make it synced. Reuse that synced pattern anywhere the CTA needs centralized wording or link updates.

## Navigation

The theme registers two menu locations:

- `Primary`: the main header navigation.
- `Footer`: a simple footer menu displayed next to the footer quote CTA.

Set these in Appearance > Menus after creating the site's core pages.

## Media Guidelines

Use real site photography whenever possible. Upload images at least as large as the largest display size needed, then let WordPress generate the cropped theme sizes.

Registered theme image sizes:

- `eventtrashbox-hero`: 1920 x 960, cropped. Use for full-width hero or page lead images.
- `eventtrashbox-page-feature`: 1280 x 720, cropped. Used for singular post/page featured images.
- `eventtrashbox-card`: 720 x 540, cropped. Used for post cards, search results, service previews, and compact teasers.
- `eventtrashbox-gallery`: 960 x 720, cropped. Use for gallery previews and project photo grids.

These sizes are exposed in the WordPress media/image size picker so editor choices match the theme's front-end layouts.

Practical rules:

- Prefer landscape photos with the subject centered enough to survive cropping.
- Add descriptive alt text when the image communicates real content.
- Leave alt text empty for decorative images that repeat adjacent text.
- Avoid uploading screenshots, logos, or text-heavy graphics as primary page imagery.
- Use `EventTrashBox Hero` only for full-width page lead images.
- Use `EventTrashBox Gallery` for gallery grids instead of full-size originals.
- Use `EventTrashBox Card` for repeated card, teaser, or archive images.
- Keep full-size originals for source quality, but do not insert full-size images into ordinary page content unless the layout truly needs them.
- Compress final photography before upload and prefer WebP/AVIF output if the production host supports it.
- After changing these sizes, regenerate thumbnails for existing uploads before launch.

## Accessibility QA

Before shipping visible theme changes, check the frontend in Local:

- Navigate the header, footer, links, buttons, forms, and details blocks with the keyboard only.
- Confirm every interactive element has a visible focus state.
- Confirm the skip link appears on focus and moves keyboard focus to the main content.
- Check heading order on the homepage and core pages.
- Check color contrast for text, buttons, cards, and CTAs.
- Confirm images have useful alt text, or empty alt text when decorative.
- Confirm forms have visible labels and understandable error messages.
- Test at mobile, tablet, and desktop widths for overlapping text or inaccessible controls.
- Run `npm run check` before committing.

## Theme Structure

- `front-page.php`: renders the assigned WordPress homepage page content.
- `patterns/`: native WordPress block patterns for homepage sections.
- `theme.json`: block palette, typography, spacing, and layout settings.
- `template-parts/`: standard WordPress loop partials for posts, pages, search results, and empty states.
- `sass/abstracts/variables/_tokens.scss`: site design tokens.
- `sass/components/_site-sections.scss`: shared site and section styles.
- `style.css`: compiled WordPress stylesheet.
- `style-rtl.css`: generated RTL stylesheet.
- `scripts/dev-doctor.mjs`: local development environment check.
- `.vscode/`: editor recommendations and project settings.

## Git Workflow

Keep commits focused and theme-only:

```sh
git status
git add .
git commit -m "Describe the theme change"
git push
```
