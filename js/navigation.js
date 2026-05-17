/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
	const siteNavigation = document.getElementById('site-navigation');

	// Return early if the navigation doesn't exist.
	if (!siteNavigation) {
		return;
	}

	const button = siteNavigation.querySelector('button');

	// Return early if the button doesn't exist.
	if (!button) {
		return;
	}

	const menu = siteNavigation.querySelector('ul');

	// Hide menu toggle button if menu is empty and return early.
	if (!menu) {
		button.style.display = 'none';
		return;
	}

	if (!menu.classList.contains('nav-menu')) {
		menu.classList.add('nav-menu');
	}

	/**
	 * Closes the mobile navigation and optionally returns focus to the toggle.
	 *
	 * @param {boolean} returnFocus Whether to move focus back to the toggle.
	 */
	function closeNavigation(returnFocus) {
		siteNavigation.classList.remove('toggled');
		button.setAttribute('aria-expanded', 'false');

		if (returnFocus) {
			button.focus();
		}
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener('click', function () {
		siteNavigation.classList.toggle('toggled');

		const isExpanded = button.getAttribute('aria-expanded') === 'true';
		button.setAttribute('aria-expanded', String(!isExpanded));
	});

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener('click', function (event) {
		const isClickInside = siteNavigation.contains(event.target);

		if (!isClickInside) {
			closeNavigation(false);
		}
	});

	// Close the mobile navigation with Escape.
	document.addEventListener('keydown', function (event) {
		if ('Escape' === event.key && siteNavigation.classList.contains('toggled')) {
			closeNavigation(true);
		}
	});

	// Get all the link elements within the menu.
	const links = menu.querySelectorAll('a');

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll(
		'.menu-item-has-children > a, .page_item_has_children > a'
	);

	// Toggle focus each time a menu link is focused or blurred.
	for (const link of links) {
		link.addEventListener('focus', toggleFocus, true);
		link.addEventListener('blur', toggleFocus, true);
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for (const link of linksWithChildren) {
		link.addEventListener('touchstart', toggleFocus, false);
	}

	/**
	 * Sets or removes .focus class on an element.
	 *
	 * @param {Event} event Focus, blur, or touch event.
	 */
	function toggleFocus(event) {
		if (event.type === 'focus' || event.type === 'blur') {
			let self = event.target;

			// Move up through the ancestors of the current link until we hit .nav-menu.
			while (self && !self.classList.contains('nav-menu')) {
				// On li elements toggle the class .focus.
				if ('li' === self.tagName.toLowerCase()) {
					self.classList.toggle('focus');
				}
				self = self.parentNode;
			}
		}

		if (event.type === 'touchstart') {
			const menuItem = event.target.parentNode;
			event.preventDefault();
			for (const link of menuItem.parentNode.children) {
				if (menuItem !== link) {
					link.classList.remove('focus');
				}
			}
			menuItem.classList.toggle('focus');
		}
	}
})();
