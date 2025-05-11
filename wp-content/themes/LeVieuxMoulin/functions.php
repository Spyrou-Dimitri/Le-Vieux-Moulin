<?php
// Désactiver l'éditeur de texte Gutenberg de Wordpress :
add_filter('use_block_editor_for_post', '__return_false');
add_filter( 'use_widgets_block_editor', '__return_false' );
add_action('init', function () {
    remove_post_type_support('page', 'editor');
});



//Enregistrer mes menus de navigation
register_nav_menu('header_menu', 'Navigation principale, le header');
register_nav_menu('usefull_links_menu', 'Menu pour accéder à des liens utiles');
register_nav_menu('social_media_menu', 'Menu pour accéder à mes réseaux sociaux');

//Charger un fichier : chemin + nom du fichier
function pf_asset ($file) : string
{
    return get_template_directory_uri().'/assets/'.$file;
}

function pf_get_navigation_links(string $location): array
{
    $locations = get_nav_menu_locations();
    $menu_id = $locations[$location] ?? null;

    if (is_null($menu_id)) {
        return [];
    }

    $raw_items = wp_get_nav_menu_items($menu_id);
    $items = [];

    // On organise les items par ID
    foreach ($raw_items as $item) {
        $obj = new stdClass();
        $obj->id = $item->ID;
        $obj->parent_id = $item->menu_item_parent;
        $obj->url = $item->url;
        $obj->label = $item->title;
        $obj->children = [];

        $items[$item->ID] = $obj;
    }

    // On reconstruit la hiérarchie
    $menu = [];
    foreach ($items as $item) {
        if ($item->parent_id && isset($items[$item->parent_id])) {
            $items[$item->parent_id]->children[] = $item;
        } else {
            $menu[] = $item;
        }
    }

    return $menu;
}

//Autoriser l'import des svg pour ACF
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

add_theme_support('post-thumbnails', ['houses']);
add_theme_support('post-thumbnails', ['actualites']);

//Création du post customisé pour mes projets
register_post_type('houses', [
    'label' => 'Foyers',
    'description' => 'Les différentes maisons au sein du Vieux Moulin',
    'menu_position' => 5,
    'menu_icon' => 'dashicons-admin-home',
    'public' => true,
    'rewrite' => [
        'slug' => 'houses',
    ],
    'supports' => ['title','thumbnail'],
]);
register_post_type('actualites', [
    'labels' => [
        'name' => 'Actualités',
        'singular_name' => 'Actualité',
        'add_new_item' => 'Ajouter une actualité',
        'edit_item' => 'Modifier l’actualité',
        'new_item' => 'Nouvelle actualité',
        'view_item' => 'Voir l’actualité',
        'search_items' => 'Rechercher dans les actualités',
        'not_found' => 'Aucune actualité trouvée',
        'not_found_in_trash' => 'Aucune actualité dans la corbeille',
        'excerpt' => 'Résumé de l’actualité'
    ],
    'label' => 'Actualités',
    'add_new_item' => 'Ajouter une actualité',
    'description' => 'Les actualités du Vieux Moulin',
    'menu_position' => 6,
    'menu_icon' => 'dashicons-admin-site',
    'public' => true,
    'rewrite' => [
        'slug' => 'actualites',
    ],
    'supports' => ['title','excerpt','thumbnail'],
]);



function create_site_options_page() {
    if (function_exists('acf_add_options_page')) {
        // Page principale
        acf_add_options_page([
            'page_title'  => 'Nos coordonnées',
            'menu_title'  => 'Nos coordonnées',
            'menu_slug'   => 'nos coordonnées',
            'capability'  => 'edit_posts',
            'redirect'    => false
        ]);

        // Sous-pages
        acf_add_options_sub_page([
            'page_title'  => 'Company Settings',
            'menu_title'  => 'Company',
            'parent_slug' => 'site-options',
        ]);

        acf_add_options_sub_page([
            'page_title'  => 'SEO Settings',
            'menu_title'  => 'SEO',
            'parent_slug' => 'site-options',
        ]);
    }
}

add_action('acf/init', 'create_site_options_page');



