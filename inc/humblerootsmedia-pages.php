<?php
add_action( 'after_setup_theme', 'humblerootsmedia_default_pages' );
function humblerootsmedia_default_pages() {
  // Set-up Default Pages
  if (isset($_GET['activated']) && is_admin()) {

    $new_page_title = 'Clientele';
    $new_page_content = '';
    $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
    );
    if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            if(!empty($new_page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
    }

    $new_page_title = 'Humble Thoughts';
    $new_page_content = '';
    $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
    );
    if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            if(!empty($new_page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
    }

    $new_page_title = 'Contact';
    $new_page_content = '';
    $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.

    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
    );
    if(!isset($page_check->ID)){
            $new_page_id = wp_insert_post($new_page);
            if(!empty($new_page_template)){
                    update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
            }
    }

    // $new_page_title = 'Our Journey';
    // $new_page_content = '';
    // $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.
    // 
    // $page_check = get_page_by_title($new_page_title, OBJECT, 'footer');
    // $new_page = array(
    //         'post_type' => 'footer',
    //         'post_title' => $new_page_title,
    //         'post_content' => $new_page_content,
    //         'post_status' => 'publish',
    //         'post_author' => 1,
    //         'menu_order' => 1
    // );
    // if(!isset($page_check->ID)){
    //         $new_page_id = wp_insert_post($new_page);
    //         if(!empty($new_page_template)){
    //                 update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
    //         }
    // }
    //
    // $new_page_title = 'Our Focus';
    // $new_page_content = '';
    // $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.
    //
    // $page_check = get_page_by_title($new_page_title, OBJECT, 'footer');
    // $new_page = array(
    //         'post_type' => 'footer',
    //         'post_title' => $new_page_title,
    //         'post_content' => $new_page_content,
    //         'post_status' => 'publish',
    //         'post_author' => 1,
    //         'menu_order' => 2
    // );
    // if(!isset($page_check->ID)){
    //         $new_page_id = wp_insert_post($new_page);
    //         if(!empty($new_page_template)){
    //                 update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
    //         }
    // }
    //
    // $new_page_title = 'Our Contact';
    // $new_page_content = '';
    // $new_page_template = ''; //ex. template-custom.php. Leave blank if you don't want a custom page template.
    //
    // $page_check = get_page_by_title($new_page_title, OBJECT, 'footer');
    // $new_page = array(
    //         'post_type' => 'footer',
    //         'post_title' => $new_page_title,
    //         'post_content' => $new_page_content,
    //         'post_status' => 'publish',
    //         'post_author' => 1,
    //         'menu_order' => 3
    // );
    // if(!isset($page_check->ID)){
    //         $new_page_id = wp_insert_post($new_page);
    //         if(!empty($new_page_template)){
    //                 update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
    //         }
    // }
  }
}
