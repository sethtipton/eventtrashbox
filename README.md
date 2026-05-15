# EventTrashBox

A custom WordPress theme for the EventTrashBox site.

This repo is intended to track only the theme directory:

```sh
wp-content/themes/eventtrashbox
```

Keep WordPress core, plugins, uploads, database exports, and Local app configuration outside this repo.

## Requirements

- WordPress
- Node.js, for Sass and JavaScript linting
- Composer, for PHP coding-standard tooling

## Setup

Install development dependencies from the theme directory:

```sh
composer install
npm install
```

## Development Commands

- `npm run watch`: watch Sass files and compile CSS.
- `npm run compile:css`: compile Sass to `style.css`.
- `npm run compile:rtl`: generate `style-rtl.css`.
- `npm run lint:scss`: lint Sass files.
- `npm run lint:js`: lint JavaScript files.
- `npm run bundle`: build a distributable theme zip.
- `composer lint:wpcs`: check PHP against WordPress coding standards.
- `composer lint:php`: check PHP syntax.
- `composer make-pot`: regenerate the translation template.

## Credits

EventTrashBox began from the Underscores starter theme and keeps its GPL-compatible foundation. normalize.css is included under the MIT license.
