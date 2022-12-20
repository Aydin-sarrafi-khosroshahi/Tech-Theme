<?php

?>

<html lang="en" dir="rtl">

<head dir="rtl">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON !!!!!!!!!!!!!!!!!  -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/fav.png" type="image/x-icon">
    <!-- CSS files !!!!!!!!!!!!!!!!!  -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/icons.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/libs/bootstrap/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/libs/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/template.css">
    <title>
    <?php bloginfo('name');?> | <?php bloginfo('description');?> | <?php wp_title(); ?>
    </title>

</head>

<body dir="rtl">
    <header class="main-header">
        <!-- top menu -->
        <div class="fixed-menu">
                <!-- header menu position absolute -->
                <div class="top-header d-flex align-items-center justify-content-around">

                    <button class="d-lg-none menu-btn" id="sidebar-toggeler" type="button">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/top-menu.svg" />
                    </button>

                    <div class="d-flex align-items-center">
                        <!-- page LOGO -->
                        <?php echo get_custom_logo(); ?>

                        <!-- NAV MENUS -->
                        <?php  wp_nav_menu(array(
                            'theme_location' => 'Tech_header_menu',
                            'container_class' => 'header-menu d-none d-lg-block' 
                            )); 
                        ?>

                    </div>

                    <div class="d-flex align-items-center">
                        <form class="search-box mb-0 d-none d-sm-block" action="<?php echo esc_url( home_url() ); ?>" method="get" >
                            <input type="text" name="s" placeholder="عبارت مورد نظر را وارد کنید ..." />
                            <button>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/search.svg" />
                            </button>
                        </form>
                        <div class="ms-4">
                            <a class="text-white font-24" href="<?php echo esc_url( site_url() ); ?>/bookmark/">
                                <i class="fa-solid fa-bookmark"></i>
                                <span class="font-16" id="bookmark-count">

                                    <?php

                                            $LP = get_option( 'bookmarked_posts' );
                                            if( $LP ) {
                                                $LP_count = count( $LP );
                                                echo $LP_count;
                                            }
                                            else {
                                                echo '0';
                                            }
                                            
                                    ?>

                                </span>
                            </a>
                        </div>
                    </div>
                </div>
        </div>

        <!-- side bar menu -->
        <div class="sidebar-box" id="sidebar-box">
            <button class="close-sb-btn" id="close-sb-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/close.svg" />
            </button>
            <?php  wp_nav_menu(array(
                'theme_location' => 'Tech_header_menu',
                'container_class' => 'sidebar-menu' 
                )); 
            ?>
        </div>
    </header>