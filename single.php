<?php
    get_header();
?>


<section>
    <div class="single-title-bg">
        <div class="container">
            <div class="row align-items-center h-100">
                <div class="col-md-6">
                    <div class="d-flex justify-content-center flex-column w-100 h-100">
                        <h1 class="header-title mb-2 font-50 text-bold3 header-lh">
                            <?php
                                the_title();
                            ?>
                        </h1>
                        <p class="text-dark font-20 text-justify single-excerpt">
                            <?php $single_excerpt =  get_the_excerpt(); 
                                $single_excerpt = wp_strip_all_tags($single_excerpt);
                                echo $single_excerpt;
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 single-thumbnail">
                    <?php the_post_thumbnail( 'full' );?>
                <div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="font-20 mb-3 single-post-title">
                    محتوای کامل 
                    "<?php the_title(); ?>"
                </h1>
                <p class="font-14 text-secondary mb-0"><?php the_category(); ?></p>
                <p class="font-14 text-secondary mb-0"><?php echo get_the_date(); ?></p>
            </div>
        </div>
        <div class="row my-3">

            <!-- single content -->
            <div class="col-md-8">
                <div class="font-18 single-post-content">
                    <?php 
                        the_content();
                    ?>
                </div>
            </div>
            <!-- single sidebar -->
            <div class="col-md-4">
                
                <div class="mb-4">
                    <!-- monthly -->
                    <h4 class="font-18 text-dark mb-4">
                        بایگانی های ماهانه :
                    </h4>
                    <ul class="daily-archive">
                        <?php 
                            $args = array(
                                'type'            => 'monthly',
                                // 'year'            => get_query_var( 'year' ),
                                // 'monthnum'        => get_query_var( 'monthnum' ),
                                // 'day'             => get_query_var( 'day' ),
                            );
                            wp_get_archives( $args ); 
                        ?>
                    </ul>
                </div>

                <div class="mb-4">
                    <!-- yearly -->
                    <h4 class="font-18 text-dark mb-4">
                        بایگانی های سالانه :
                    </h4>
                    <ul class="daily-archive">
                        <?php 
                            $args = array(
                                'type'            => 'yearly',
                                // 'year'            => get_query_var( 'year' ),
                                // 'monthnum'        => get_query_var( 'monthnum' ),
                                // 'day'             => get_query_var( 'day' ),
                            );
                            wp_get_archives( $args ); 
                        ?>
                    </ul>
                </div>

                <p class="font-20 text-dark mb-4 mt-5 text-bold2">پست های مرتبط با همان دسته :</p>

                <?php
                $category_array = get_the_category();
                $category_name = $category_array[0]->name;

                $cat_posts = new WP_Query(array( 
                    'category_name' => $category_name, 
                )); 
                
                if( $cat_posts->have_posts() ) : while( $cat_posts->have_posts() ) : $cat_posts->the_post();
                ?>

                    <div class="mb-4">
                        <h5 class="font-18 text-dark mb-2"><?php the_title(); ?></h5>
                        <p class="font-14 text-secondary mb-0"><?php echo $category_name; ?></p>
                    </div>

                <?php
                endwhile;
                endif;  
                ?>
            </div>
        </div>
    </div>
</section>

<?php
    comments_template();
?>







<?php
    get_footer();
?>