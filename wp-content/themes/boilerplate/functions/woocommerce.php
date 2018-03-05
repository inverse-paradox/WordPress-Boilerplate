<?php


/* ===============================================================
==================================================================

I.  woocommerce.php function list

    1.  ip_theme_wrapper_start()
            - customize start wrapper
    2.  ip_change_breadcrumb_delimiter()
            - change breadcrumb delimiter
    3.  ip_loop_columns
            - change number of products per row
    4.  ip_remove_woo_tabs( $tabs )
            - remove unwanted tabs from woocommerce
    5.  ip_sidebar_add_to_cart_fragment( $fragments )
            - ensure cart contents update when products are added to the cart via AJAX

==================================================================
=============================================================== */



/* ===========================================================
        customize start wrapper
=========================================================== */

function ip_theme_wrapper_start() {
    global $post;
    echo '<div class="content woo-content" role="main">';
    if ( is_singular( 'product' ) ) :
        $product_cats = get_the_terms( $post->ID, 'product_cat' );
        $cat_title = end( $product_cats )->name;
        echo '<h2 class="cat-title">' . $cat_title . '</h2>';
    endif;
}
//remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
//add_action('woocommerce_before_main_content', 'ip_theme_wrapper_start', 10);

/* ===========================================================
        change breadcrumb delimiter
=========================================================== */

function ip_change_breadcrumb_delimiter( $defaults ) {
    $defaults['delimiter'] = ' &gt; ';
    return $defaults;
}
//add_filter( 'woocommerce_breadcrumb_defaults', 'ip_change_breadcrumb_delimiter' );

/* ===========================================================
        change number of products per row
=========================================================== */

function ip_loop_columns() {
    return 3;
}
//add_filter( 'loop_shop_columns', 'ip_loop_columns' );

/* ===========================================================
        Remove unwanted tabs from woocommerce
=========================================================== */

function ip_remove_woo_tabs( $tabs ) {
    unset( $tabs['reviews'] );
    return ( $tabs );
}
//add_filter( 'woocommerce_product_tabs', 'ip_remove_woo_tabs', 98);

/* ===========================================================
        ensure cart contents update when products
        are added to the cart via AJAX
=========================================================== */

function ip_sidebar_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    // the code below would be the same code you are using to display the cart
    ?>
    <div class="cart-totals">
        <p class="cart-items"><strong>There's <span class="item-count"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span> in your cart</strong></p>
        <p class="subtotal">Subtotal: <?php echo $woocommerce->cart->get_cart_total(); ?></p>
    </div><!--END cart-totals-->
    <?php
    $fragments['div.cart-totals'] = ob_get_clean();
    return $fragments;
}
//add_filter('add_to_cart_fragments', 'ip_sidebar_add_to_cart_fragment');

?>