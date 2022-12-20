<?php 



// adding action to ajax ( load more posts in index.php process  )
add_action( 'wp_ajax_nopriv_get_data', 'load_more_process' );
add_action( 'wp_ajax_get_data', 'load_more_process' );

function load_more_process() {
    // wp_send_json_success( 'It works' );

    $paged = $_POST["page"] + 1;

    // echo '<h1>'. $paged .'</h1>';

    $more_posts = new WP_Query( array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged,
    ));

    if( $more_posts->have_posts() ) : while( $more_posts->have_posts() ) : $more_posts->the_post();
    ?>
        <!-- new loaded posts -->
        		                    <!-- content -->
                                    <div class="row mb-5 pb-3 post-boxes">
		                        <div class="col-md-8">
		                            <div class="">
		                                <h3 class="font-18 text-bold3">
		                                    <?php the_title();?>
		                                </h3>
		                                <p class="text-secondary font-16 text-justify">
		                                    <?php $post_excerpt =  get_the_excerpt();
                                                  $post_excerpt = wp_strip_all_tags($post_excerpt);
                                                  echo $post_excerpt;
                                            ?>
		                                </p>
                                        
                                        
                                        <?php 
                                            $categories = get_the_category();
                                            if ( ! empty( $categories ) ) {
                                                echo '<a class="post-cat-link" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"> دسته نوشته  : ' . esc_html( $categories[0]->name ) . '</a>';
                                            }                                       
                                        ?>

                                        <p>
                                            تعداد نظرات :
                                            <?php 
                                                echo get_comments_number();                                   
                                            ?>
                                        </p>
                                        <div>
                                            <li>
                                                <img class="viewer-count-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/eye.svg" >                           
                                                <?php                             
                                                    if ( get_post_meta( get_the_ID() , 'wpb_post_views_count', true ) == '') {
                                                        echo '0' ;                            
                                                    } 
                                                    else { 
                                                        echo get_post_meta( get_the_ID() , 'wpb_post_views_count', true ); 
                                                    }
                                                ?>                             
                                            </li>
                                        </div>

		                                <div class="text-secondary font-12 mb-3">
		                                    <span><?php echo get_the_date(); ?></span>
                                            <span> _ </span>
                                            <span><?php echo get_the_time(); ?></span>
                                            <span> _ </span>
                                            <span class="text-dark">
                                                <?php $content = get_the_content();
                                                $content = str_word_count($content);
                                                $count_time = ceil($content/100);
                                                $totalreadingtime = $count_time . " دقیقه برای خواندن";
                                                echo $totalreadingtime;
                                                ?>
                                            </span>
		                                </div>
                                        <div class="post-tags mb-3">
                                            <?php the_tags( '<p>تگ ها :</p> ', ' _ ', '' ); ?>
                                            <?php //the_category(); ?> 
                                        </div>

		                                <a class="read-more" href="<?php the_permalink();?>">
		                                    بیشتر بخوانید
                                        </a>


                                        <div class="post-saved-box bkm-<?php echo get_the_ID(); ?>">
                                                <div class="post-saved">
                                                    <p class="mb-0 font-18 text-bold3">پست شما در مورد علاقه ها ذخیره شد .</p>
                                                    <i class="fa-solid fa-square-check"></i>
                                                </div>
                                        </div>


		                            </div>
		                        </div>
		                        <div class="col-md-4 position-relative">
		                            <div class="w-100 post-thumnail">
                                        <?php $post_thumbnail_url = get_the_post_thumbnail_url(); ?>
                                        <img src="<?php echo $post_thumbnail_url ?>" />

                                        <button class="like-btn border-0 bg-transparent <?php 
                                            $LPs = get_option('bookmarked_posts'); 
                                            foreach ( $LPs as $LP ) {
                                                if( $LP == get_the_ID() ) {
                                                    echo 'post_Liked';
                                                }else {
                                                    echo '';
                                                }
                                            }?>" type="button" data-id="<?php echo get_the_ID(); ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                                            <i class="fa-solid fa-bookmark"></i>
                                        </button>
		                            </div>
		                        </div>
		                    </div>
    <?php
    // end while
    endwhile;
    // end if
    endif;
    wp_reset_postdata();
    wp_die();
}











?>