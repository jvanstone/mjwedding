"use strict";

if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = function (callback, thisArg) {
        thisArg = thisArg || window;
        for (var i = 0; i < this.length; i++) {
            callback.call(thisArg, this[i], i, this);
        }
    };
}

var mjwedding = mjwedding || {};

/**
 * Back to top
 */
 mjwedding.backToTop = {
	init: function() {
		this.displayButton();	
	},

	setup: function() {
		const icon 	= document.getElementsByClassName( 'go-top' )[0];

		var vertDist = window.pageYOffset;

		if ( vertDist > 600 ) {
			icon.classList.add( 'show' );
		} else {
			icon.classList.remove( 'show' );
		}
	
		icon.addEventListener( 'click', function() {
			window.scrollTo({
				top: 0,
				left: 0,
				behavior: 'smooth',
			});
		} );
	},

	displayButton: function() {
		this.setup();

		window.addEventListener( 'scroll', function() {
			this.setup();
		}.bind( this ) );		
	},
};

/**
 * Remove preloader
 */
 mjwedding.removePreloader = {
	init: function() {
		this.remove();	
	},

	remove: function() {
		const preloader = document.getElementsByClassName( 'preloader' )[0];

        preloader.classList.add( 'disable' );
        setTimeout(function(){ preloader.classList.add( 'hide' ); }, 600);
	},
};


/**
 * DOM ready
 */
 function mjweddingDomReady( fn ) {
	if ( typeof fn !== 'function' ) {
		return;
	}

	if ( document.readyState === 'interactive' || document.readyState === 'complete' ) {
		return fn();
	}

	document.addEventListener( 'DOMContentLoaded', fn, false );
}

mjweddingDomReady( function() {
    mjwedding.backToTop.init();
    mjwedding.removePreloader.init();
    //mjwedding.stickyMenu.init();
	//mjwedding.mobileMenu.init();
} );