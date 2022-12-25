<?php get_header(); ?>

<section>
    <div class="single-title-bg">
        <div class="container">
            <div class="row align-items-center h-100">
                <div class="col-md-6">
                        <div class="header-content">
                                <h1 class="font-50 text-bold1">
                                    About Us
                                </h1>
                                <p class="mb-4 font-18 text-bold3">
                                    لورم ایپسوم چیست؟ اگر شما یک طراح هستین و یا با طراحی های گرافیکی سروکار دارید به متن های برخورده اید که با نام 
                                </p>
                                <button class="btn bg-dark text-white rounded-pill px-5 py-2 font-18">
                                    بیشتر بخوانید
                                </button>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="page-img">
                        <?php $page_img_url = get_the_post_thumbnail_url(); ?>
                        <img src="<?php echo $page_img_url; ?>" />
                    </div>
                <div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>

