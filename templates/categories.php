<?php ?>
<section>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <div>
                    <h2 class="font-16 text-bold3 posts-title">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icnos/corner-down-left (2).svg" alt="">
                        <span>دسته های نوشته ها</span>
                    </h2>
                </div>
            </div>
        </div>

        <div class="swiper catSwiper">
            <div class="swiper-wrapper">
            <?php
$args = array(
    'hide_empty' => 0,
    'orderby' => "name",
    'exclude' => array(1),
);

$categories = get_categories($args);
foreach ($categories as $category) {
    ?>
                <div class="swiper-slide">
                    <a href="<?php echo get_category_link($category->term_id) ?>">
                        <div class="card shadow cat-slides">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <h2 class="font-18 mb-0 text-dark">
                                        <?php echo $category->name ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
}
?>
            </div>
        </div>

    </div>
</section>


