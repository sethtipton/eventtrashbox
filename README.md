# EventTrashBox

A custom WordPress theme for the EventTrashBox site.

This repository tracks only the theme directory:

```sh
wp-content/themes/eventtrashbox
```

WordPress core, plugins, uploads, database exports, logs, and Local app configuration should stay outside this repo.

## Local Development

This site is run locally with the Local app on macOS. Work from the theme folder:

```sh
cd "/Users/sethtipton/Local Sites/eventtrashbox/app/public/wp-content/themes/eventtrashbox"
```

Install dependencies:

```sh
npm install
```

Watch Sass while editing:

```sh
npm run watch
```

Build CSS manually:

```sh
npm run build
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

## Editing the Homepage

The homepage uses native WordPress page content.

1. In WordPress admin, go to Pages and create or edit the page you want to use as the homepage.
2. Go to Settings > Reading.
3. Set "Your homepage displays" to "A static page".
4. Choose that page as "Homepage".
5. Edit the page with the WordPress block editor.

The theme's `front-page.php` template renders that page content directly. Insert EventTrashBox block patterns for structured homepage sections, then edit the inserted blocks as normal page content. Use wide/full alignment when a section should stretch beyond the default text width.

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

Practical rules:

- Prefer landscape photos with the subject centered enough to survive cropping.
- Add descriptive alt text when the image communicates real content.
- Leave alt text empty for decorative images that repeat adjacent text.
- Avoid uploading screenshots, logos, or text-heavy graphics as primary page imagery.
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

## Git Workflow

Keep commits focused and theme-only:

```sh
git status
git add .
git commit -m "Describe the theme change"
git push
```

## Credits

EventTrashBox began from the Underscores starter theme and keeps its GPL-compatible foundation. normalize.css is included under the MIT license.
