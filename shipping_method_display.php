<?php
/*
Plugin Name: Shipping Method Display
Description: Display the shipping method on the Shop Order page in the admin panel.
*/

// Add a new column to the Shop Order page
function custom_shop_order_column($columns) {
    $columns['shipping_method'] = 'Shipping Method';
    return $columns;
}
add_filter('manage_edit-shop_order_columns', 'custom_shop_order_column');

// Display the shipping method in the new column
function custom_shop_order_column_content($column) {
    global $post;
    if ($column === 'shipping_method') {
        $order = wc_get_order($post->ID);
        echo $order->get_shipping_method();
    }
}
add_action('manage_shop_order_posts_custom_column', 'custom_shop_order_column_content');

// Make the new column sortable
function custom_shop_order_column_sortable($columns) {
    $columns['shipping_method'] = 'shipping_method';
    return $columns;
}
add_filter('manage_edit-shop_order_sortable_columns', 'custom_shop_order_column_sortable');
