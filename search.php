<?php get_header(); ?>

<section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-result-title">
                        <h1 class="font-28 text-dark">
                             نتیجه جستجوی شما برای عبارت
                             "<?php echo get_search_query(); ?>"
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row cp-margin">
                <!-- main contant -->
                <div class="col-md-12">
                    <!-- post loops -->
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <!-- content -->
                    <div class="row align-items-center mb-5 pb-3">
                        <div class="col-8">
                            <div class="border-bottom border-dark pb-5">
                                <h3 class="font-18 text-bold3">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="text-secondary font-14">
                                    <?php the_excerpt(); ?>
                                </p>
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
                                <a class="read-more" href="<?php the_permalink();?>">
                                    بیشتر بخوانید
                                </a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="w-100 post-thumnail">
                                <?php the_post_thumbnail(array(250, 200));?>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; else : ?>

                        <?php

                            $args = array(
                                'post_type'      => 'post',
                                'orderby'        => 'rand',
                                'posts_per_page' => '2',
                            );
                            $random_post_query = new WP_Query( $args );
                            if ( $random_post_query->have_posts() ) {
                                while ( $random_post_query->have_posts() ) {
                                    $random_post_query->the_post();
                                    ?>
                                        <div class="row align-items-center mb-5 pb-3">
                                            <div class="col-8">
                                                <h2 class="font-18 mb-5">نوشته های تصادفی :</h2>
                                                <div class="border-bottom border-dark pb-5">
                                                    <h3 class="font-18 text-bold3">
                                                        <?php the_title(); ?>
                                                    </h3>
                                                    <p class="text-secondary font-14">
                                                        <?php the_excerpt(); ?>
                                                    </p>
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
                                                    <a class="read-more" href="<?php the_permalink();?>">
                                                        بیشتر بخوانید
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="w-100 post-thumnail">
                                                    <?php the_post_thumbnail(array(250, 200));?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php

                                } // end while
                            } // end if

                        ?>

                    <?php endif; ?>

                </div>
            </div>
        </div>
</section>

<?php get_footer(); ?>


