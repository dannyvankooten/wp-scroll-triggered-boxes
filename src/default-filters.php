<?php

defined('ABSPATH') or exit;

add_filter('boxzilla_box_content', 'wptexturize');
add_filter('boxzilla_box_content', 'convert_smilies');
add_filter('boxzilla_box_content', 'convert_chars');
add_filter('boxzilla_box_content', 'wpautop');
add_filter('boxzilla_box_content', 'shortcode_unautop');
add_filter('boxzilla_box_content', 'do_shortcode', 11);

/**
* Allow Jetpack Photon to filter on Boxzilla box content.
*/
if (class_exists('Jetpack') && class_exists('Jetpack_Photon') && method_exists('Jetpack', 'is_module_active') && Jetpack::is_module_active('photon')) {
    add_filter('boxzilla_box_content', [ 'Jetpack_Photon', 'filter_the_content' ], 999999);
}

/**
 * Filter nav menu items to use an onclick event instead of a href attribute.
 */
add_filter(
    'nav_menu_link_attributes',
    function ($atts) {
        if (isset($atts['href']) && strpos($atts['href'], '#boxzilla-') !== 0) {
            return $atts;
        }

        $id              = substr($atts['href'], strlen('#boxzilla-'));
        $atts['onclick'] = "Boxzilla.show({$id}); return false;";
        $atts['href']    = '';
        return $atts;
    },
    10,
    1
);
