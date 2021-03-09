function toggleDarkMode() { // jshint ignore:line
	var toggler = document.getElementById( 'dark-mode-toggler' );

	if ( 'false' === toggler.getAttribute( 'aria-pressed' ) ) {
		toggler.setAttribute( 'aria-pressed', 'true' );
		document.documentElement.classList.add( 'is-dark-theme' );
		document.body.classList.add( 'is-dark-theme' );
		window.localStorage.setItem( 'mjweddingDarkMode', 'yes' );
	} else {
		toggler.setAttribute( 'aria-pressed', 'false' );
		document.documentElement.classList.remove( 'is-dark-theme' );
		document.body.classList.remove( 'is-dark-theme' );
		window.localStorage.setItem( 'mjweddingDarkMode', 'no' );
	}
}

function mjweddingIsDarkMode() {
	var isDarkMode = window.matchMedia( '(prefers-color-scheme: dark)' ).matches;

	if ( 'yes' === window.localStorage.getItem( 'mjweddingDarkMode' ) ) {
		isDarkMode = true;
	} else if ( 'no' === window.localStorage.getItem( 'mjweddingDarkMode' ) ) {
		isDarkMode = false;
	}

	return isDarkMode;
}

function darkModeInitialLoad() {
	var toggler = document.getElementById( 'dark-mode-toggler' ),
		isDarkMode = mjweddingIsDarkMode();

	if ( isDarkMode ) {
		document.documentElement.classList.add( 'is-dark-theme' );
		document.body.classList.add( 'is-dark-theme' );
	} else {
		document.documentElement.classList.remove( 'is-dark-theme' );
		document.body.classList.remove( 'is-dark-theme' );
	}

	if ( toggler && isDarkMode ) {
		toggler.setAttribute( 'aria-pressed', 'true' );
	}
}

function darkModeRepositionTogglerOnScroll() {
	var prevScroll = window.scrollY || document.documentElement.scrollTop,
		currentScroll,

		checkScroll = function() {
			currentScroll = window.scrollY || document.documentElement.scrollTop;
			if (
				currentScroll + ( window.innerHeight * 1.5 ) > document.body.clientHeight ||
				currentScroll < prevScroll
			) {
				document.getElementById( 'dark-mode-toggler' ).classList.remove( 'hide' );
			} else if ( currentScroll > prevScroll && 250 < currentScroll ) {
				document.getElementById( 'dark-mode-toggler' ).classList.add( 'hide' );
			}
			prevScroll = currentScroll;
		};
	window.addEventListener( 'scroll', checkScroll );
}

darkModeInitialLoad();
darkModeRepositionTogglerOnScroll();
