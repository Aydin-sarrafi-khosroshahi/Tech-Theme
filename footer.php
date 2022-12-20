<footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-3">
                    <h4 class="text-white font-20 text-bold3 mb-3">
                        <?php $footer_widget = get_option( 'widget_footer' );
                              echo $footer_widget[2]["title"];
                        ?>
                    </h4>
                    <p class="text-justify text-white">
                        <?php 
                            echo $footer_widget[2]["desc"];
                        ?>
                    </p>
                </div>
                <div class="col-md-3 my-3">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="text-white font-20 text-bold3 mb-3">
                                لینک های سریع
                            </h5>
                            <?php  wp_nav_menu(array(
                                'theme_location' => 'Tech_footer_menu',
                                'container_class' => 'footer-menu' 
                            )); 
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 my-3">
                    <div class="d-flex flex-column socail-links-widget">
                        <?php
                            if(is_active_sidebar('socail_media_widget')){
                                dynamic_sidebar('socail_media_widget');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- SCRIPT files !!!!!!!!!!!!!!!!!  -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/icons.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/libs/jquery/jquery-3.6.0.min.js"></script>

    <!-- custom js -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bookmark.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/load-more.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/remove-bookmark.js"></script>


    <!-- swiper  -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/libs/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".catSwiper", {
            slidesPerView: 2,
            spaceBetween: 20,
             slidesPerGroup: 1,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            breakpoints: {
                1300:{
                    slidesPerView: 4,
                },
                992: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 3,
                },
                540: {
                    slidesPerView: 2,
                },
                320: {
                    slidesPerView: 1,
                },
            }
        });
    </script>

</body>

</html>