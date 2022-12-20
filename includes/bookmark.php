<?php 

add_action( 'wp_ajax_nopriv_like_data', 'like_process' );
add_action( 'wp_ajax_like_data', 'like_process' );


$exist_posts = get_option( 'bookmarked_posts' );

    if(!$exist_posts){

        add_option( 'bookmarked_posts' ,  []  );

    }

function like_process( $post ) {

    // getting post id
    $post_id = $_POST["post_ID"];


    // getting ids posts
    $attachment = get_posts( array(

        'post_type'      => 'post',
        'numberposts'    => -1,
        'post_status'    => 'publish',
        'include'        => $post_id,

    ));
    

    if ( $attachment ) {
        

        $exist_posts = get_option( 'bookmarked_posts' );

        if( count( $exist_posts ) == 0 ){

            // update first time
            update_option( 'bookmarked_posts' ,  [ $attachment[0]->ID ]  );
        }
        else {

            $current_posts = get_option( 'bookmarked_posts' );
            if( !in_array( $attachment[0]->ID , $current_posts , true ) ) {

                array_push( $current_posts , $attachment[0]->ID );

            }

            // update any time
            update_option( 'bookmarked_posts' , $current_posts );

        }

  
    }// end if

    wp_reset_postdata();


    wp_die();

}



?>