<?php

// register menu !!!!!!!!!!!!!!
function add_nav_menus()
{
    register_nav_menus(array(
        'Tech_header_menu' => 'Header Menu',
        'Tech_footer_menu' => 'Footer Menu',
    ));
}
add_action('init', 'add_nav_menus');

// theme supports !!!!!!!!!!!!!!!!!!
function add_some_supports_to_theme()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('category-thumbnails');
    add_post_type_support('post', 'excerpt');

    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
    ));

}
add_action('after_setup_theme', 'add_some_supports_to_theme');

// seach box !!!!!!!!!!!!!!!!
function custom_searchbox_result($query)
{

    if ($query->is_main_query() && !is_admin() && $query->is_search()) {
        $query->set('post_type', array('post'));
        $query->set('post_per_page', 3);
    }

}
add_action('pre_get_posts', 'custom_searchbox_result');

add_action('edit_category_form_fields', 'extra_category_fields', 10);
// add_action( 'category_add_form_fields', 'extra_category_fields' );

function extra_category_fields($tag)
{
    $key_value = 'category-' . $tag->term_id;
    $uploaded_img_src_dash = '';

    if (get_term_meta($tag->term_id)) {
        $uploaded_img_src_dash = get_term_meta($tag->term_id)[$key_value][0];
    } else {
        $uploaded_img_src_dash = 'wp-content/themes/tech/assets/images/main-page-images/empty.png';
    }
    ?>
        <div id="cats-img-box">
            <label for="upload_img_btn" class="cats-img-label">تصویر شاخص برای دسته</label>
            <input class="cats-img-btn" id="upload_img_btn" type="button" value="آپلود تصویر" />
            <input id="uploaded_img_src" name="uploaded_img_src" type="text" hidden value=""/>
            <img id="cats-img" src ="http://localhost/wordpress/<?php echo $uploaded_img_src_dash; ?>" class="cats-img"/>
        </div>

    <?php

}

add_action('edit_category', 'wp_custom_edit_taxonomy');

// save category image src in database
function wp_custom_edit_taxonomy($term_id)
{

    $uploaded_img_src = get_term_meta($term_id);

    if (!isset($uploaded_img_src)) {
        $meta_key = 'category-' . $term_id;
        $meta_value = $_POST['uploaded_img_src'];
        add_term_meta($term_id, $meta_key, $meta_value);
    } else {
        $meta_key = 'category-' . $term_id;
        $meta_value = $_POST['uploaded_img_src'];
        update_term_meta($term_id, $meta_key, $meta_value);
    }
}

add_action('admin_enqueue_scripts', 'load_wp_media_files');

function load_wp_media_files($page)
{

    // Enqueue WordPress media scripts
    wp_enqueue_media();
    // Enqueue custom script that will interact with wp.media
    wp_enqueue_script('jquery_script', get_template_directory_uri() . '/assets/libs/jquery/jquery-3.6.0.min.js', array('jquery'));
    wp_enqueue_script('custom_script', get_template_directory_uri() . '/assets/js/media-uploader.js', array('jquery'), '0.1');

    // Enqueue custom css
    wp_enqueue_style('custom_css', get_template_directory_uri() . '/assets/css/media.css');

}

/**
 * Add a sidebar.
 */
function footer_widget_registering()
{
    register_sidebar(array(
        'name' => __('Footer Widget', 'textdomain'),
        'id' => 'footer_widget',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'footer_widget_registering');


function socail_media_widget_registering()
{
    register_sidebar(array(
        'name' => __('Socail Media Widget', 'textdomain'),
        'id' => 'socail_media_widget',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'socail_media_widget_registering');












// Creating the widget
class wpb_widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'footer',

            // Widget name will appear in UI
            __('ابزارک فوتر', 'wpb_widget_domain'),

            // Widget description
            array('description' => __('توضیحات بخش فوتر', 'wpb_widget_domain'))
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $desc = apply_filters('widget_description', $instance['desc']);


        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        if (!empty($desc)) {
            echo $args['before_title'] . $desc . $args['after_title'];
        }

        // This is where you run the code and display the output
        echo __('', 'wpb_widget_domain');
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'wpb_widget_domain');
        }
        if (isset($instance['desc'])) {
            $desc = $instance['desc'];
        } else {
            $desc = __('New desc', 'wpb_widget_domain');
        }
        // Widget admin form
        ?>
    <p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:');?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>

    <label for="<?php echo $this->get_field_id('desc'); ?>"><?php _e('Description:');?></label>
    <textarea class="widefat" id="<?php echo $this->get_field_id('desc'); ?>" name="<?php echo $this->get_field_name('desc'); ?>" type="text"><?php echo esc_attr($desc); ?></textarea> 
    </p>
    <?php
}

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance )
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['desc'] = (!empty($new_instance['desc'])) ? strip_tags($new_instance['desc']) : '';
        return $instance;
    }

    // Class wpb_widget ends here
}

// Register and load the widget
function wpb_load_widget()
{
    register_widget('wpb_widget');
}
add_action('widgets_init', 'wpb_load_widget');









// adding max post coun on categories posts
function be_exclude_category_from_blog( $query ) {

	if( is_category() ) {
		$query->set( 'posts_per_page', '1' );
	}
}
add_action( 'pre_get_posts', 'be_exclude_category_from_blog' );





    
    
    
function viwers_count( $content )
{
    global $post;
    if( is_singular( array( 'post' )) ){

        $count_key = 'wpb_post_views_count';    
        $count = get_post_meta( $post->ID, $count_key, true );    
    
        if( $count =='' ){   

            $count = 1;        
            delete_post_meta($post->ID, $count_key);        
            add_post_meta($post->ID, $count_key, '1');   

        } 

        else { 

        $count++;        
        update_post_meta($post->ID, $count_key, $count); 

        }

        return $content;
    }
 
}
add_action('the_content', 'viwers_count');




// get post to sidebar
function get_meta_values( $key = '' ) {
    
    global $wpdb;
    
    if( empty( $key ) )
        return;
    
    $r = $wpdb->get_results("SELECT ps.ID, ps.post_title,pm.meta_value FROM wp_postmeta as pm INNER JOIN  wp_posts as ps on pm.post_id = ps.ID where pm.meta_key = 'wpb_post_views_count' ORDER BY pm.meta_value DESC LIMIT 2;");
    return $r;
}


include get_template_directory() . "/includes/bookmark.php";

include get_template_directory() . "/includes/ajax.php";

include get_template_directory() . "/includes/remove-bookmark.php";





