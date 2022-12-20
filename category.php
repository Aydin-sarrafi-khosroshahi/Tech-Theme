<?php get_header();?>

<section>
    <div class="single-title-bg">
        <div class="container">
            <div class="row align-items-center h-100">
                <div class="col-md-6">
                    <div class="d-flex justify-content-center flex-column w-100 h-100">
                        <h1 class="header-title mb-5 font-50 text-bold3 header-lh">
                            <?php $related_cat = get_the_category();
echo $related_cat[0]->name;
?>
                        </h1>
                        <p class="text-secondary font-20 text-justify">
                        <?php $related_cat = get_the_category();
echo $related_cat[0]->description;
?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">

                    <?php $term_id = get_queried_object_id();
$key_value = 'category-' . $term_id;
$uploaded_img_src_front = '';
$uploaded_img_src_front = get_term_meta($term_id)[$key_value][0];
?>

                    <div class="front-cats-img">
                        <img src="http://localhost/wordpress/<?php echo $uploaded_img_src_front; ?>"/>
                    </div>
                <div>
            </div>
        </div>
    </div>
</section>






<section>
    <div class="container">
        <div class="row">

            <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
            ?>

            <div class="col-12">
                <div class="shadow px-4 py-5">
                        <!-- title -->
		                <h3 class="font-18 text-bold3">
		                    <?php the_title();?>
		                </h3>

                        <!-- excerpt -->
		                <p class="text-secondary font-14 text-justify fourlane-break">
		                    <?php $post_excerpt = get_the_excerpt();
                                $post_excerpt = wp_strip_all_tags($post_excerpt);
                                echo $post_excerpt;
                            ?>
		                </p>

                        <!-- date and time and reading time -->
		                <div class="text-secondary font-12 mb-3">

		                                    <span><?php echo get_the_date(); ?></span>
                                            <span> _ </span>
                                            <span><?php echo get_the_time(); ?></span>
                                            <span> _ </span>

                                            <span class="text-dark">
                                            <?php $content = get_the_content();
                                            $content = str_word_count($content);
                                            $count_time = ceil($content / 100);
                                            $totalreadingtime = $count_time . " دقیقه برای خواندن";
                                            echo $totalreadingtime;
                                            ?>
                                            </span>
		                </div>
                        <!-- read more btn to single page -->
		                <a class="read-more" href="<?php the_permalink();?>">
		                    بیشتر بخوانید
		                </a>

		        </div>
            <?php
            // end while
        } 
            ?>

            <!-- adding paganation here -->
            <div class="posts-paganation">
                <?php the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('قبلی', 'textdomain'),
                    'next_text' => __('بعدی', 'textdomain'),
                    ));
                ?>
            </div>

        <?php
        // end if
            }
        ?>
        </div>
    </div>
</section>

<?php get_footer();?>



