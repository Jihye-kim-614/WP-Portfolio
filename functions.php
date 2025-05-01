<?php

if ( ! function_exists( 'supernormal_setup' ) ) :

// 기본 세팅 
function supernormal_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'post-thumbnail-img', 345 );
	
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // supernormal_setup
add_action( 'after_setup_theme', 'supernormal_setup' );


function supernormal_style_sheet() {
    wp_enqueue_style( 'supernormal-style', get_stylesheet_directory_uri() . '/style.min.css' );
    }
add_action('wp_enqueue_scripts', 'supernormal_style_sheet');


function supernormal_script_enqueue(){
    // jQuery
    wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array('jquery'));

    wp_enqueue_script( 'jquery-ui-script', get_stylesheet_directory_uri() . '/js/jquery-ui.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'jquery-sticky-script', get_stylesheet_directory_uri() . '/js/jquery.sticky-sidebar.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/js/custom.min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'supernormal_script_enqueue' );

// 커스텀 메뉴
function supernormal_custom_menu() {
    register_nav_menus(
      array(
        'primary-menu'   => __( 'Primary Menu', 'supernormal' ),
        'footer-menu' => __( 'Footer Menu', 'supernormal' ),
        'sidebar-menu' => __( 'Sidebar Menu', 'supernormal' )
      )
    );
  }
  add_action( 'init', 'supernormal_custom_menu' );


// 커스텀 사이드바 위젯
function supernormal_widgets_sidebar_init() {
	register_sidebar( 
        array(
            'name'          => __( 'Sidebar', 'supernormal' ),
            'id'            => 'sidebar-widget',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) 
    );
}
add_action( 'widgets_init', 'supernormal_widgets_sidebar_init' );

// 커스텀 푸터 위젯
function supernormal_widgets_footer_init() {
	register_sidebar( 
        array(
            'name'          => __( 'Footer', 'supernormal' ),
            'id'            => 'footer-widget',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) 
    );
}
add_action( 'widgets_init', 'supernormal_widgets_footer_init' );


add_filter('get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false);
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = __( 'Archives' );
    }
    return $title;
});

add_action('wpforms_process_complete', function($fields, $entry, $form_data) {
    if ($form_data['id'] == 292) {
        $title    = sanitize_text_field($fields[5]['value']);
        $content  = wp_kses_post($fields[3]['value']);
        $author   = sanitize_text_field($fields[1]['value']);
        $dropdown = sanitize_text_field($fields[4]['value']); // Ask, Work, Hi

        // ✅ '질문' 카테고리 ID 가져오기
        $question_category_id = get_cat_ID('Q&A');

        $post_id = wp_insert_post([
            'post_title'   => $title,
            'post_content' => $content,
            'post_status'  => 'publish',
            'post_type'    => 'post',
            'post_category' => array($question_category_id), // ✅ 여기에 지정!
            'post_author'  => 1
        ]);

        if ($post_id) {
            update_post_meta($post_id, '_custom_author_name', $author);
            update_post_meta($post_id, '_custom_category_label', $dropdown); // 여기에 저장됨
            error_log('폼 제출 전체: ' . print_r($fields, true));

        }
    }
}, 10, 3);



add_action('pre_get_posts', function($query) {
    if (
        $query->is_main_query() &&
        !is_admin() &&
        is_home() // "게시물 페이지"로 설정된 블로그 페이지일 경우
    ) {
        $query->set('cat', '-' . get_cat_ID('Q&A'));  // '질문' 카테고리 제외
    }
});

function remove_comment_fields($fields) {
    if (isset($fields['url'])) {
        unset($fields['url']); // 웹사이트(URL) 필드 제거
    }
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_comment_fields');



add_action('wp_ajax_get_time_slots', 'get_time_slots_callback');
add_action('wp_ajax_nopriv_get_time_slots', 'get_time_slots_callback');


function register_booking_date_cpt() {
    $labels = array(
        'name'               => 'Booking Dates',
        'singular_name'      => 'Booking Date',
        'menu_name'          => 'Booking Manager',
        'name_admin_bar'     => 'Booking Date',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Booking Date',
        'new_item'           => 'New Booking Date',
        'edit_item'          => 'Edit Booking Date',
        'view_item'          => 'View Booking Date',
        'all_items'          => 'All Booking Dates',
        'search_items'       => 'Search Booking Dates',
        'not_found'          => 'No booking dates found',
        'not_found_in_trash' => 'No booking dates found in Trash',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array('title','copy', 'revisions'), // Just use the title field (e.g. the date)
    );

    register_post_type('booking_date', $args);
}
add_action('init', 'register_booking_date_cpt');


function load_datepicker_script() {
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_style('jquery-ui-datepicker-style', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
}
add_action('wp_enqueue_scripts', 'load_datepicker_script');



add_action('wp_ajax_get_time_slots', 'get_time_slots_callback');
add_action('wp_ajax_nopriv_get_time_slots', 'get_time_slots_callback');

function get_time_slots_callback() {
    $post_id = intval($_POST['post_id']);

    $slots = [];
    for ($i = 1; $i <= 10; $i++) {
        $slot = get_field('slot_' . $i, $post_id);
        if ($slot) {
            $slots[] = $slot;
        }
    }

    if (!empty($slots)) {
        foreach ($slots as $slot) {
            echo '<option value="' . esc_attr($slot) . '">' . esc_html($slot) . '</option>';
        }
    } else {
        echo '<option disabled>시간 없음</option>';
    }

    wp_die();
}


function create_team_post_type() {
    register_post_type('team',
        array(
            'labels' => array(
                'name' => __('Team'),
                'singular_name' => __('Team Member'),
                'add_new' => __('Add New'),
                'add_new_item' => __('Add New Team Member'),
                'edit_item' => __('Edit Team Member'),
                'new_item' => __('New Team Member'),
                'view_item' => __('View Team Member'),
                'search_items' => __('Search Team Members'),
                'not_found' => __('No Team Members found'),
                'not_found_in_trash' => __('No Team Members found in Trash'),
                'menu_name' => __('Team')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'team-members'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-groups', 
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('category', 'post_tag')
        )
    );
}
add_action('init', 'create_team_post_type');







function enqueue_swiper_assets() {
    $theme_dir = get_template_directory_uri();

    // ✅ 1. Swiper CSS CDN
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css'
    );

    // ✅ 2. Swiper JS (로컬 파일)
    wp_enqueue_script(
        'swiper-js',
        $theme_dir . '/js/swiper.min.js', // 예: 테마 폴더에 swiper.min.js 넣었을 경우
        array(),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');

