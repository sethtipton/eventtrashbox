#!/usr/bin/env node
import { cpSync, existsSync, mkdirSync, rmSync } from 'node:fs';
import { dirname, join } from 'node:path';
import { execFileSync } from 'node:child_process';

const root = process.cwd();
const packageDir = join(root, '..', 'eventtrashbox-package', 'eventtrashbox');
const zipPath = join(root, '..', 'eventtrashbox.zip');

const paths = [
	'404.php',
	'archive.php',
	'footer.php',
	'front-page.php',
	'functions.php',
	'header.php',
	'index.php',
	'LICENSE',
	'page.php',
	'readme.txt',
	'screenshot.png',
	'search.php',
	'single.php',
	'style.css',
	'style-rtl.css',
	'theme.json',
	'inc',
	'js',
	'languages',
	'patterns',
	'template-parts',
];

rmSync(dirname(packageDir), { force: true, recursive: true });
rmSync(zipPath, { force: true });
mkdirSync(packageDir, { recursive: true });

for (const path of paths) {
	const source = join(root, path);

	if (!existsSync(source)) {
		continue;
	}

	cpSync(source, join(packageDir, path), { recursive: true });
}

execFileSync('zip', ['-qr', zipPath, 'eventtrashbox'], {
	cwd: dirname(packageDir),
	stdio: 'inherit',
});

rmSync(dirname(packageDir), { force: true, recursive: true });
