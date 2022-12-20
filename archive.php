<?php get_header(); ?>

<section>
    <div class="single-title-bg">
        <div class="container">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="d-flex justify-content-center flex-column w-100 h-100">
                        <h1 class="header-title mb-5 font-50 text-bold3 header-lh">
                            بایگانی ها
                        </h1>
                        <p class="text-secondary font-20 text-justify">
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
            <div class="row cp-margin">
                <!-- main contant -->
                <div class="col-12">
                    <div class="archive-title">
                        <h2 class="font-20 text-dark mb-5">
                            <?php
                                if( is_day() ) {
                                    echo 'بایگانی های روزانه :<br>' . get_the_date('d/m/Y');
                                }
                                elseif ( is_month() ) {
                                    echo 'بایگانی های ماهانه :<br>' . get_the_date('m / Y');
                                }
                                elseif ( is_year() ) {
                                    echo 'بایگانی های سالانه :<br>' . get_the_date('Y');
                                }
                                else {
                                    echo 'بایگانی ها :';
                                } 
                            ?>
                        </h2>
                    </div>
                    <!-- archive content (posts loop) -->
                    <?php if( have_posts() ) : while( have_posts() ) : the_post() ?>

                        <!-- posts main content -->
                        <div class="posts_content_archive mb-4">
                            <h3 class="font-18 text-dark mb-2">
                                <?php the_title();?>
                            </h3>
                            <p class="font-14 text-secondary mb-0">
                                <?php echo get_the_date(); ?>
                            </p>
                        </div>
                    
                    <?php endwhile; ?>

                        <!-- paganation -->
                        <div class="posts-paganation">
                            <?php the_posts_pagination(array(
                                'mid_size' => 2,
                                'prev_text' => __('قبلی', 'textdomain'),
                                'next_text' => __('بعدی', 'textdomain'),
                            ));?>
                        </div>

                    <?php endif; ?>
                </div>
            </div>
        </div>
</section>


<?php get_footer(); ?>