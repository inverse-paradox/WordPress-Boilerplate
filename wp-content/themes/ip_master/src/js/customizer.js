/**
 * Show or hide the URL field in the Header Button options when the select option is changed.
 *
 * @since January 31, 2020
 * @author Corey Collins
 */

/**
 * Adds A11Y Click and Keypress Function
 *
 * @source https://karlgroves.com/2014/11/24/ridiculously-easy-trick-for-keyboard-accessibility
 * @since January 25, 2021
 * @author Dustin Leer
 */
function a11yClick(event) {
	if (event.type === 'click') {
		return true;
	}
	else if (event.type === 'keypress') {
		var code = event.charCode || event.keyCode;
		if ((code === 32) || (code === 13)) {
			return true;
		}
	}
	else {
		return false;
	}
}

if ( ( 'complete' === document.readyState || 'loading' !== document.readyState ) && ! document.documentElement.doScroll ) {
	wdsCustomizer();
} else {
	document.addEventListener( 'DOMContentLoaded', wdsCustomizer );
}

/**
 * Fire off the customizer functions.
 *
 * @since January 31, 2020
 * @author Corey Collins
 */
function wdsCustomizer() {
	const headerButtonSelect = document.querySelector( '#customize-control-ip_master_header_button select' );

	if ( ! headerButtonSelect ) {
		return;
	}

	const headerLinkButton = document.querySelector( '#customize-control-ip_master_header_button_url' ),
		headerLinkText = document.querySelector( '#customize-control-ip_master_header_button_text' );

	headerButtonSelect.addEventListener( 'change', showHideLinkField );

	/**
	 * Handle showing/hiding the link field.
	 *
	 * @since January 31, 2020
	 * @author Corey Collins
	 */
	function showHideLinkField() {
		if ( 'link' === headerButtonSelect.value ) {
			headerLinkButton.style.display = '';
			headerLinkText.style.display = '';
		} else {
			headerLinkButton.style.display = 'none';
			headerLinkText.style.display = 'none';
		}
	}
}

//--------------------
//  HOME PAGE ANNOUNCEMENT
//--------------------
jQuery(function($){
	/**
	 * Click handler for hiding the announcement.
	 */
    $('.close-announcement').on("click", function(event) {

		// Check if the click was also triggered by a keyboard event.
		if (a11yClick(event) === true) {
			// Hide the announcement.
			$('.announcement').css({'display':'none'});

			// Set a cookie to remember that the announcement was closed.
			Cookies.set('closed_announcement', 'true', { expires: 1 });
		}
    });

	// Check if the announcement cookie is set or not.
    if( !Cookies.get('closed_announcement') ) {

		// Show the announcement if the cookie is not set.
        $('.announcement').css({'display':'block'});
    } else {

		// Hide the announcement if the cookie is set.
		$('.announcement').css({'display':'none'});
	}
});

//--------------------
//  SEARCH
//--------------------
jQuery(document).ready(function($) {
	window.addEventListener("load", function() {
		var search = $(".search-toggle_desktop button");
		var searchMobile = document.querySelector(".search-toggle_mobile");

		search.on('click', function() {
			$('.desktop-search').toggleClass('visible');
			$('.main-bar').toggleClass('visible');
		});

		if (searchMobile != null) {
			searchMobile.onclick = function() {
				document.querySelector(".menu-mobile-search").classList.toggle("visible");
				document.querySelector(".main-bar").classList.toggle("visible");
				iconClose.classList.toggle("visibility");
			};
		}

		document.addEventListener("touchstart", function() {}, true);
	});
});
