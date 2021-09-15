<?php
/**
 * Plugin Name:       One Item Per Cart
 * Description:       When an item is added to the cart, remove other products.
 * Version:           1.0.0
 * Author:            Joel Yoder
 * Author URI:        https://joelyoder.com/
 * License:           MIT
 * 
 * Kudos to helgatheviking for the elegant solution posted here: https://stackoverflow.com/questions/21363268/need-woocommerce-to-only-allow-1-product-in-the-cart-if-a-product-is-already-in
 */

function joelyoder_one_item_per_cart( $valid, $product_id, $quantity ) {

   if( ! empty ( WC()->cart->get_cart() ) && $valid ){
       WC()->cart->empty_cart();
       wc_add_notice( 'You can only have 1 item in your cart - other items have been removed.', 'error' );
   }

   return $valid;

}
add_filter( 'woocommerce_add_to_cart_validation', 'joelyoder_one_item_per_cart', 10, 3 );