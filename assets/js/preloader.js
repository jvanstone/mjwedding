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
 * Remove preloader
 */
 mjwedding.removePreloader = {
	init: function() {
		this.remove();	
	},

	remove: function() {
		const preloader = document.getElementsByClassName( 'preloader' )[0];

        preloader.classList.add( 'disable' );
        setTimeout(function(){ preloader.classList.add( 'hide' ); }, 1000);
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
    //vonline.backToTop.init();
    mjwedding.removePreloader.init();
    //vonline.stickyMenu.init();
	//vonline.mobileMenu.init();
} );