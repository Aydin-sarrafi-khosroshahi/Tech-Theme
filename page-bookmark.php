<!-- 

    **** BOOKMARK PAGE ****

-->

<?php get_header(); ?>

<!-- background section -->
<section>
    <div class="mp-header-section">
        <div class="container">
                <!-- header bg and content -->
                <div class="header-content-bg">
                    <div class="d-flex align-items-center w-100 h-100 my-5">
                        <div class="header-content">
                            <h1 class="font-50 text-bold1">
                                پست های مورد علاقه شما :
                            </h1>
                            <p class="mb-4 font-18 text-bold3">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<section>

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div id="bookmarks">

                    <?php
                    
                        $LP = get_option( 'bookmarked_posts' );
                        //var_dump($LP);

                        if( $LP ) {

                            $LP_attachment = get_posts( array(

                                'post_type'      => 'post',
                                'numberposts'    => -1,
                                'post_status'    => 'publish',
                                'include'        => $LP,
                        
                            ));

                            
                            if( $LP_attachment ) {

                            foreach ( $LP_attachment as $post ) {

                                ?>

                                    <!-- content -->
                                    <div class="row mb-5 pb-3 post-boxes">
                                        <div class="col-md-8">
                                            <div class="">

                                                <!-- remove from favorite btn -->
                                                <button id="remove-fav-btn" class="remove-fav-btn" data-url="<?php echo admin_url('admin-ajax.php') ?>" data-id="<?php echo get_the_ID(); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/close.svg" />
                                                </button>

                                                <!-- title -->
                                                <h3 class="font-18 text-bold3">
                                                    <?php the_title();?>
                                                </h3>

                                                <!-- excerpt -->
                                                <p class="text-secondary font-16 text-justify">
                                                    <?php $post_excerpt =  get_the_excerpt();
                                                        $post_excerpt = wp_strip_all_tags($post_excerpt);
                                                        echo $post_excerpt;
                                                    ?>
                                                </p>
                                                    
                                                <!-- category -->     
                                                <?php 
                                                    $categories = get_the_category();
                                                    if ( ! empty( $categories ) ) {
                                                        echo '<a class="post-cat-link" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"> دسته نوشته  : ' . esc_html( $categories[0]->name ) . '</a>';
                                                    }                                       
                                                ?>
                                                
                                                <!-- comments number -->
                                                <p> 
                                                    تعداد نظرات :
                                                    <?php 
                                                        echo get_comments_number();                                   
                                                    ?>
                                                </p>

                                                <!-- viewer count -->
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
                                                
                                                <!-- date time and reading time -->
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
                                                <!-- tags -->
                                                <div class="post-tags mb-3">
                                                    <?php the_tags( '<p>تگ ها :</p> ', ' _ ', '' ); ?>
                                                    <?php //the_category(); ?> 
                                                </div>
                                                
                                                <!-- read more -->
                                                <a class="read-more" href="<?php the_permalink();?>">
                                                    بیشتر بخوانید
                                                </a>


                                            </div>
                                        </div>
                                        <!-- thumbnail -->
                                        <div class="col-md-4 position-relative">
                                            <div class="w-100 post-thumnail">

                                                <?php $post_thumbnail_url = get_the_post_thumbnail_url(); ?>
                                                <img src="<?php echo $post_thumbnail_url ?>" />

                                            </div>
                                        </div>
                                    </div>

                                <?php

                            }

                            }

                        }
                        //var_dump($LP_attachment);

                        else {

                            echo 'شما هیچ پست مورد علاقه ندارید .';

                        }

                        wp_reset_postdata();

                        
                    ?>

                </div>

            </div>

        </div>


    </div>

</section>


<?php get_footer(); ?>
