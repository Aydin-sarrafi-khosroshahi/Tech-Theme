<div class="ms-content" id="ms-content">

    <ul class="nav nav-tabs mb-4 border-0" id="myTab">
            <li class="nav-item">
                <a href="#home" class="nav-link active" data-bs-toggle="tab">داغ ترین ها</a>
            </li>
            <li class="nav-item">
                <a href="#profile" class="nav-link" data-bs-toggle="tab">مطالب تصادفی</a>
            </li>
            <li class="nav-item">
                <a href="#messages" class="nav-link" data-bs-toggle="tab">پربازدید ترین</a>
            </li>
    </ul>

    <div class="tab-content">
            <div class="tab-pane fade show active" id="home">
            <?php

$args = array(
    'post_type'      => 'post',
    'orderby'        => 'comment_count',
    'posts_per_page' => '2',
);
$random_post_query = new WP_Query( $args );
if ( $random_post_query->have_posts() ) {
    while ( $random_post_query->have_posts() ) {
        $random_post_query->the_post();
        ?>
        <a class="text-dark" href="<?php the_permalink();?>">
        <div class="row align-items-center mb-5 pb-3">
                <div class="col-12">

                    <div class="">

                        <h3 class="font-18 text-bold3">
                            <?php the_title(); ?>
                        </h3>

                        <div class="text-secondary font-12 mb-3">
                            تعداد نظرات :
                            <?php 
                                echo get_comments_number();                                   
                            ?>
                        </div>

                        <div class="w-100 post-thumnail">
                        <?php the_post_thumbnail(array(250, 200));?>
                        </div>

                    </div>
                </div>
            </div>
        </a>
        <?php

    } // end while
} // end if
wp_reset_postdata();

?>
            </div>





            <div class="tab-pane fade" id="profile">
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
        <a class="text-dark" href="<?php the_permalink();?>">
        <div class="row align-items-center mb-5 pb-3">
                <div class="col-12">

                    <div class="">

                        <h3 class="font-18 text-bold3">
                            <?php the_title(); ?>
                        </h3>

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

                        <div class="w-100 post-thumnail">
                        <?php the_post_thumbnail(array(250, 200));?>
                        </div>

                    </div>
                </div>
            </div>
        </a>
        <?php

    } // end while
} // end if
wp_reset_postdata();

?>
            </div>
            <div class="tab-pane fade" id="messages">
                <?php 

                $posts_viewer_count = get_meta_values('wpb_post_views_count');
                //var_dump($posts_viewer_count[0]->post_title );


                foreach ( $posts_viewer_count as $item) {
                    //var_dump($item);
                    ?>
                        <a href="" class="text-dark">
                            <div class="pb-3 px-2 mb-5 d-flex flex-column">
                                <h3 class="font-18 text-bold3">
                                    <?php echo $item->post_title; ?>
                                </h3>
                                <p class="text-secondary font-14">
                                    تعداد بازدید :
                                    <?php echo $item->meta_value; ?>
                                </p>
                                <div class="w-100 post-thumnail">
                                    <?php 
                                        $post_thumbnail_url = get_the_post_thumbnail_url($item->ID); 
                                    ?>
                                    <img src="<?php echo $post_thumbnail_url ?>" />
                                </div>
                            </div>
                        </a>
                    <?php
                }
                ?>
            </div>
    </div>

</div>

