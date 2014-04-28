jQuery(function($){
    
    /* change to the setup function for the menu you're using */
    setupNavVert();
    
});

function setupNavVert()
{
    jQuery('#main-nav-toggle').click(function(e){
        e.preventDefault();
        jQuery('#main-nav').toggleClass('expanded');
    });
    jQuery('#main-nav .menu-item-has-children .arrow').click(function(e){
        e.preventDefault();
        var container = jQuery(this).parent().parent();
        container.toggleClass('expanded');
        if (container.hasClass('expanded')) {
            container.find('> ul').slideDown(200);
        } else {
            container.find('> ul').slideUp(200);
        }
    });   
}

function setupNavVertOffCanvas()
{
    fixOffCanvasPageHeight();
    jQuery('#main-nav-toggle').click(function(e){
        e.preventDefault();
        jQuery('body').toggleClass('menu-expanded');
        fixOffCanvasPageHeight();
    });
    jQuery('#main-nav .menu-item-has-children .arrow').click(function(e){
        e.preventDefault();
        e.preventDefault();
        var container = jQuery(this).parent().parent();
        container.toggleClass('expanded');
        if (container.hasClass('expanded')) {
            container.find('> ul').slideDown(200);
        } else {
            container.find('> ul').slideUp(200);
        }
        fixOffCanvasPageHeight();
    });
}

function setupNavHorz()
{
    jQuery('#main-nav ul').each(function(){
        jQuery(this).prepend('<li class="back"><a href="#">Back</a></li>');
    });
    jQuery('#main-nav-toggle').click(function(e){
        e.preventDefault();
        if (jQuery('#main-nav').hasClass('expanded')) {
            jQuery('#main-nav').removeClass('expanded');
            jQuery('#main-nav ul').css('display', '');
        } else {
            jQuery('#main-nav').addClass('expanded');
            jQuery('#main-nav ul').css('display', 'none');
        }
    });
    jQuery('#main-nav .menu-item-has-children > .link-wrap .arrow').click(function(e){
        e.preventDefault();
        var container = jQuery(this).parent().parent();
        container.toggleClass('expanded');
        if (container.hasClass('expanded')) {
            jQuery('#main-nav').addClass('level-below-expanded');
        }
        var container_lvl_up = container.parent().parent();
        container_lvl_up.toggleClass('level-below-expanded').toggleClass('expanded');
        container.find('> ul').css('display', 'block');
    });
    jQuery('#main-nav .back a').click(function(e){
        e.preventDefault();
        var container = jQuery(this).parent().parent().parent();
        container.removeClass('expanded');
        if (container.parent().attr('id') == 'main-nav') {
            jQuery('#main-nav').removeClass('level-below-expanded');
        } else {
            container.parent().parent().removeClass('level-below-expanded').addClass('expanded');
        }
        window.setTimeout(function(){
            container.find('> ul').css('display', 'none');
        }, 500);
    });
}

function setupNavHorzOffCanvas()
{
    jQuery('#main-nav ul').each(function(){
        jQuery(this).prepend('<li class="back"><a href="#">Back</a></li>');
    });
    jQuery('#main-nav').prepend('<li class="back top-back"><a href="#">Back</a></li>');
    fixOffCanvasPageHeight();
    jQuery('#main-nav-toggle').click(function(e){
        e.preventDefault();
        jQuery('body').toggleClass('menu-expanded');
        fixOffCanvasPageHeight();
    });
    jQuery('#main-nav .menu-item-has-children > .link-wrap .arrow').click(function(e){
        e.preventDefault();
        var container = jQuery(this).parent().parent();
        container.siblings().removeClass('expanded');
        container.addClass('expanded');
        jQuery('#main-nav').addClass('level-below-expanded');
        var container_lvl_up = container.parent().parent();
        container_lvl_up.toggleClass('level-below-expanded').toggleClass('expanded');
        fixOffCanvasPageHeight();
    });
    jQuery('#main-nav .back a').click(function(e){
        e.preventDefault();
        if ($(this).parent().hasClass('top-back')) {
            jQuery('body').toggleClass('menu-expanded');
            fixOffCanvasPageHeight();
        } else {
            var container = jQuery(this).parent().parent().parent();
            if (container.parent().attr('id') == 'main-nav') {
                jQuery('#main-nav').removeClass('level-below-expanded');
            } else {
                container.parent().parent().removeClass('level-below-expanded').addClass('expanded');
            }
            fixOffCanvasPageHeight();
        } 
    });
}

function fixOffCanvasPageHeight()
{
    if (jQuery('body').hasClass('menu-expanded')) {
        var nav_height = 0;
        var body_height = jQuery('body').outerHeight(true);
        jQuery('#main-nav > li').each(function(){
            nav_height += jQuery(this).outerHeight(true);
        });
        if (body_height < nav_height) {
            jQuery('.all-content-wrapper-inner').css('min-height', nav_height+'px');
        }
    }
}