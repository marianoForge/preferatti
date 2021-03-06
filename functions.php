<?php
/* SETUP INIT */


add_action('after_setup_theme', 'dsq_setup');
function dsq_setup()
{
    load_theme_textdomain('dsq', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
    add_theme_support('custom-logo', array(
        'header-text' => array('site-title', 'site-description'),
    ));

    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array('main-menu-options' => esc_html__('Main Menu Options', 'dsq')));
    register_nav_menus(array('main-menu-artists' => esc_html__('Menu Artists', 'dsq')));
}


add_filter('wp_nav_menu_objects', 'dsq_add_filter_menu', 10, 2);

function dsq_add_filter_menu($sorted_menu_objects, $args)
{
    if ($args->menu->name != 'Menu Artist')
        return $sorted_menu_objects;

    foreach ($sorted_menu_objects as $menu_object) {
        //	die('meee' .print_r($args, true));

        // searching for menu items linking to posts or pages
        // can add as many post types to the array
        if (in_array($menu_object->object, array('post', 'page', 'piece'))) {
            // set the title to the post_thumbnail if available
            // thumbnail size is the second parameter of get_the_post_thumbnail()
            if (has_post_thumbnail($menu_object->object_id)) {
                $title = get_field('artist', $menu_object->object_id)->post_title;

                if (strpos($title, " ") !== FALSE) {
                    $title = substr($title, 0, strpos($title, " "));
                }
                $menu_object->title =
                    "<span class='menu-artist-image'>" . get_the_post_thumbnail($menu_object->object_id, 'thumbnail') . "</span>" . "<span class='artist-title'>" . $title . "</span>";
            }
        }
    }

    return $sorted_menu_objects;
}

function dsq_add_piece_to_dropdown($pages)
{
    $args = array(
        'post_type' => 'piece'
    );
    $items = get_posts($args);
    $pages = array_merge($pages, $items);

    return $pages;
}
add_filter('get_pages', 'dsq_add_piece_to_dropdown');



function dsq_next_page_ID($id)
{

    // Get all pages under this section
    $post = get_post($id);
    $post_parent = $post->post_parent;
    $get_pages_query = 'child_of=' . $post_parent . '&parent=' . $post_parent . '&sort_column=menu_order&sort_order=asc';
    $get_pages_query = 'child_of=' . $post_parent . '&post_type=piece&sort_column=menu_order&sort_order=asc';
    $get_pages = get_pages($get_pages_query);
    $next_page_id = '';

    // Count results
    $page_count = count($get_pages);

    for ($p = 0; $p < $page_count; $p++) {
        // Get the array key for our entry
        if ($id == $get_pages[$p]->ID) break;
    }

    // Assign our next key
    $next_key = $p + 1;

    // If there isn't a value assigned for the previous key, go all the way to the end
    if (isset($get_pages[$next_key])) {
        $next_page_id = $get_pages[$next_key]->ID;
    }

    return $next_page_id;
}

function dsq_previous_page_ID($id)
{

    // Get all pages under this section
    $post = get_post($id);
    $post_parent = $post->post_parent;
    $get_pages_query = 'child_of=' . $post_parent . '&parent=' . $post_parent . '&sort_column=menu_order&sort_order=asc';
    $get_pages_query = 'child_of=' . $post_parent . '&post_type=piece&sort_column=menu_order&sort_order=asc';
    $get_pages = get_pages($get_pages_query);
    $prev_page_id = '';

    // Count results
    $page_count = count($get_pages);

    for ($p = 0; $p < $page_count; $p++) {
        // get the array key for our entry
        if ($id == $get_pages[$p]->ID) break;
    }

    // assign our next & previous keys
    $prev_key = $p - 1;
    $last_key = $page_count - 1;

    // if there isn't a value assigned for the previous key, go all the way to the end
    if (isset($get_pages[$prev_key])) {
        $prev_page_id = $get_pages[$prev_key]->ID;
    }

    return $prev_page_id;
}






/* JAVASCRIPT AND STYLES */
add_action('wp_enqueue_scripts', 'dsq_load_scripts');
function dsq_load_scripts()
{
    wp_enqueue_style('dsq-style', get_stylesheet_directory_uri() .
        '/assets/css/style.css', false, null);
    wp_enqueue_style('css-fancy', get_stylesheet_directory_uri() .
        '/assets/css/fancybox.min.css', false, null);
    wp_enqueue_style('css-tailwinds', get_stylesheet_directory_uri() .
        '/assets/css/tailwind.min.css', false, null);
    wp_enqueue_script('jquery');
}
add_action('wp_footer', 'dsq_footer_scripts');
function dsq_footer_scripts()
{
    /* Plugins Js */
    wp_enqueue_script('js-swup', get_template_directory_uri() . '/assets/js/swup.min.js', array('jquery'));
    wp_enqueue_script('js-fancy', get_template_directory_uri() . '/assets/js/fancybox.min.js', array('jquery'));
    wp_enqueue_script('js-hammer', get_template_directory_uri() . '/assets/js/hammer.min.js', array('jquery'));

    /* Init Js */
    wp_enqueue_script('js-initial', get_template_directory_uri() . '/assets/js/init.js', array('jquery'));
?>
    <script>
        jQuery(document).ready(function($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
    </script>

<?php
}
add_filter('document_title_separator', 'dsq_document_title_separator');
function dsq_document_title_separator($sep)
{
    $sep = '|';
    return $sep;
}
add_filter('the_title', 'dsq_title');
function dsq_title($title)
{
    if ($title == '') {
        return '...';
    } else {
        return $title;
    }
}
add_filter('the_content_more_link', 'dsq_read_more_link');
function dsq_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
    }
}
add_filter('excerpt_more', 'dsq_excerpt_read_more_link');
function dsq_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
    }
}
add_filter('intermediate_image_sizes_advanced', 'dsq_image_insert_override');
function dsq_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    return $sizes;
}
/* SIDEBAR WIDGET
add_action('widgets_init', 'dsq_widgets_init');
function dsq_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'dsq'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
*/
add_action('widgets_init', 'dsq_footer_widget_init');


function dsq_footer_widget_init()
{
    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area', 'dsq'),
        'id' => 'footer-widget-area',
        'before_widget' => '<div id="footer-widget-area">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
}

add_action('wp_head', 'dsq_pingback_header');
function dsq_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('comment_form_before', 'dsq_enqueue_comment_reply_script');
function dsq_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
function dsq_custom_pings($comment)
{
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter('get_comments_number', 'dsq_comment_count', 0);
function dsq_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}
/*
add_filter('acf/format_value/name=price', 'fix_number', 20, 3);
function fix_number($value, $post_id, $field)
{
    $value = number_format($value);
    return $value;
}*/
