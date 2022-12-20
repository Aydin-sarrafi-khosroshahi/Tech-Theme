<?php


add_action( 'wp_ajax_nopriv_remove_data', 'remove_process' );
add_action( 'wp_ajax_remove_data', 'remove_process' );

function remove_process( $post ) {

    $post_id = $_POST["post_ID"];
    // echo $post_id;

    $newLPs = array();
    $LPs = get_option( 'bookmarked_posts' );
    foreach ( $LPs as $LP ) {
        if( $LP != $post_id ) {
            array_push( $newLPs , $LP );
        }
    }
    update_option( 'bookmarked_posts' , $newLPs );

    wp_die();

}




?>