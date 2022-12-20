<?php 


// $args = array(
// 	'max_depth'         => '',
// 	'style'             => 'ul',
// 	'type'              => 'all',
// 	'per_page'          => '4',
//     'reverse_top_level' => false,
// 	'avatar_size'       => 32,
// 	'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
// );

// $comments = get_comments(array(
//   'post_id' => $post->ID,
//    'status' => 'approve'
// ));

// wp_list_comments( $args , $comments );

?>

<!-- Comments list -->
<section>
    <div class="container">
        <ul id="comments" class="post-comments-list">
            <?php wp_list_comments( [
                'type' => 'comment',
                'reverse_top_level' => true,
                'max_depth' => 10,
                'avatar_size' => 50,
                'callback' => 'post_comments',
            ] ); ?>
        </ul>
    </div>
</section>


<?php
function post_comments($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <div class="comment-author vcard"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
            printf( __( '<cite class="fn">%s</cite> <span class="says">:</span>' ), get_comment_author_link() ); ?>
        </div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
        } ?>

        <!-- date -->
        <div class="comment-meta commentmetadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                    /* translators: 1: date, 2: time */
                    printf( 
                        __('%1$s at %2$s'), 
                        get_comment_date(),  
                        get_comment_time() 
                    ); 
                ?>
            </a>
        </div>
        
        <!-- comment text -->
        <div class="comment-text-content">
            <?php $my_comment_text = comment_text();  
                $my_comment_text = wp_strip_all_tags($my_comment_text);
                echo $my_comment_text;
            ?>
        </div>
        
        <!-- reply link -->
        <div class="reply">
            <?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); 
            ?>
        </div>

        <?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}








?>
<sction>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="comment-title">
                    <h3>نظر خود را  در مورد نوشته بنویسید .</h3>
                </div>
                <?php 
                    comment_form();
                ?>
            </div>
        </div>
    </div>
</section>