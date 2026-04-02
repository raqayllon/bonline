<?php
defined('ABSPATH') || exit;

/* ─── Theme Setup ─── */
function bonline_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', ['search-form','comment-form','gallery','caption','style','script']);
    add_theme_support('customize-selective-refresh-widgets');

    register_nav_menus(['primary' => __('Menú principal', 'bonline')]);
    load_theme_textdomain('bonline', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'bonline_setup');

/* ─── Enqueue ─── */
function bonline_scripts() {
    wp_enqueue_style(
        'bonline-fonts',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400;500;600;700;800&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'bonline-style',
        get_template_directory_uri() . '/assets/css/bonline.css',
        ['bonline-fonts'],
        '1.0.0'
    );
    wp_enqueue_script(
        'bonline-script',
        get_template_directory_uri() . '/assets/js/bonline.js',
        [],
        '1.0.0',
        true
    );
    wp_localize_script('bonline-script', 'bonlineData', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('bonline_contact_nonce'),
        'phone'   => get_theme_mod('bonline_phone', '34600000000'),
    ]);
}
add_action('wp_enqueue_scripts', 'bonline_scripts');

/* ─── Favicon SVG (override WordPress default) ─── */
remove_action('wp_head', 'wp_site_icon', 99);
function bonline_favicon() {
    $favicon = get_template_directory_uri() . '/assets/images/favicon.svg';
    echo '<link rel="icon" type="image/svg+xml" href="' . esc_url($favicon) . '">' . "\n";
    echo '<link rel="shortcut icon" href="' . esc_url($favicon) . '">' . "\n";
    echo '<link rel="apple-touch-icon" href="' . esc_url($favicon) . '">' . "\n";
}
add_action('wp_head', 'bonline_favicon', 1);

/* ─── Page title filter ─── */
function bonline_title($title) {
    if (is_front_page()) {
        return 'b online | Agencia de diseño web y marketing digital';
    }
    return $title;
}
add_filter('pre_get_document_title', 'bonline_title');

/* ─── Customizer ─── */
function bonline_customizer(WP_Customize_Manager $wp_customize) {
    $wp_customize->add_section('bonline_contact', [
        'title'    => __('b online — Contacto', 'bonline'),
        'priority' => 30,
    ]);

    $fields = [
        'bonline_phone'     => ['label' => 'WhatsApp (solo números, ej: 34612345678)', 'default' => '34600000000'],
        'bonline_email'     => ['label' => 'Email de contacto',  'default' => 'hola@bonline.es'],
        'bonline_email_to'  => ['label' => 'Email donde recibir formularios', 'default' => 'hola@bonline.es'],
    ];

    foreach ($fields as $id => $args) {
        $wp_customize->add_setting($id, ['default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field']);
        $wp_customize->add_control($id, ['label' => $args['label'], 'section' => 'bonline_contact', 'type' => 'text']);
    }
}
add_action('customize_register', 'bonline_customizer');

/* ─── Contact Form AJAX ─── */
require_once get_template_directory() . '/inc/ajax-contact.php';

/* ─── Remove WP emoji / bloat ─── */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
