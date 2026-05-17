#!/usr/bin/env node
import { accessSync, constants, existsSync, readdirSync, statSync } from 'node:fs';
import { join } from 'node:path';
import { execFileSync } from 'node:child_process';

const root = process.cwd();
const localServicesPath = join(
	process.env.HOME || '',
	'Library/Application Support/Local/lightning-services'
);
const requiredFiles = ['package.json', 'sass/style.scss', 'style.css', 'functions.php'];
const localBins = ['sass', 'rtlcss', 'eslint', 'stylelint', 'prettier'];

let hasError = false;

function pass(message) {
	console.log(`ok   ${message}`);
}

function warn(message) {
	console.log(`warn ${message}`);
}

function fail(message) {
	hasError = true;
	console.log(`fail ${message}`);
}

function commandVersion(command, args = ['--version']) {
	try {
		return execFileSync(command, args, { encoding: 'utf8' }).trim().split('\n')[0];
	} catch (error) {
		void error;
		return '';
	}
}

function isExecutable(path) {
	try {
		accessSync(path, constants.X_OK);
		return true;
	} catch (error) {
		void error;
		return false;
	}
}

function findLocalPhp() {
	if (!existsSync(localServicesPath)) {
		return '';
	}

	const stack = [localServicesPath];

	while (stack.length > 0) {
		const current = stack.pop();
		const entries = readdirSync(current, { withFileTypes: true });

		for (const entry of entries) {
			const path = join(current, entry.name);

			if (entry.isDirectory()) {
				stack.push(path);
				continue;
			}

			if (entry.name === 'php' && isExecutable(path)) {
				return path;
			}
		}
	}

	return '';
}

console.log('EventTrashBox development environment\n');

const nodeVersion = commandVersion('node');
const npmVersion = commandVersion('npm');

if (nodeVersion) {
	pass(`Node available: ${nodeVersion}`);
} else {
	fail('Node is not available');
}

if (npmVersion) {
	pass(`npm available: ${npmVersion}`);
} else {
	fail('npm is not available');
}

for (const file of requiredFiles) {
	if (existsSync(join(root, file))) {
		pass(`Required file exists: ${file}`);
	} else {
		fail(`Required file missing: ${file}`);
	}
}

if (!existsSync(join(root, 'node_modules'))) {
	warn('node_modules is missing. Run npm install.');
} else {
	pass('node_modules exists');

	for (const bin of localBins) {
		const path = join(root, 'node_modules/.bin', bin);

		if (existsSync(path)) {
			pass(`Local binary available: ${bin}`);
		} else {
			fail(`Local binary missing: ${bin}`);
		}
	}
}

const phpPath = findLocalPhp();

if (phpPath) {
	pass(`Local PHP found: ${phpPath}`);
} else {
	warn('Local PHP was not found under ~/Library/Application Support/Local/lightning-services');
}

const mapPath = join(root, 'style.css.map');

if (existsSync(mapPath) && statSync(mapPath).isFile()) {
	warn('style.css.map exists. Run npm run clean to remove stale source maps.');
}

if (hasError) {
	process.exit(1);
}
