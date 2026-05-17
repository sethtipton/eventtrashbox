import js from '@eslint/js';

const browserGlobals = {
	document: 'readonly',
	Event: 'readonly',
	jQuery: 'readonly',
	Node: 'readonly',
	wp: 'readonly',
	window: 'readonly',
};

const nodeGlobals = {
	console: 'readonly',
	process: 'readonly',
};

export default [
	{
		ignores: ['node_modules/**', 'vendor/**', 'style.css', 'style-rtl.css', 'style.css.map'],
	},
	js.configs.recommended,
	{
		files: ['js/**/*.js'],
		languageOptions: {
			globals: browserGlobals,
		},
	},
	{
		files: ['scripts/**/*.mjs'],
		languageOptions: {
			globals: nodeGlobals,
		},
		rules: {
			'no-console': 'off',
		},
	},
];
