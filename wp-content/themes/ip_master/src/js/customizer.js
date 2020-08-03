/**
 * Show or hide the URL field in the Header Button options when the select option is changed.
 *
 * @since January 31, 2020
 * @author Corey Collins
 */

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
    $('.close-announcement').on("click", function() {
        $('.announcement').hide()
        Cookies.set('closed_announcement', 'true', { expires: 1 });
    });

    if(Cookies.get('closed_announcement')) {
        $('.announcement').hide();
    }
});

//--------------------
//  SEARCH
//-------------------- 
jQuery(document).ready(function($) {
	window.addEventListener("load", function() {
		var search = document.querySelector(".search-toggle_desktop");
		var searchMobile = document.querySelector(".search-toggle_mobile");

		search.onclick = function() {
			document.querySelector(".desktop-search").classList.toggle("visible");
			document.querySelector(".main-bar").classList.toggle("visible");
		};

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