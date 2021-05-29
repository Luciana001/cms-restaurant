<?php 

function theme_supports () {    //fct qui definit ce que mon theme supporte (img, titre, menu...)
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header','En tête du menu');
    register_nav_menu('footer','Pied de page');

    // add_image_size('card-header',375, 250, true);
};
//============================== Equivalent des balises Link du head =============================================================================
function theme_register_assets () {
    wp_register_style ('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css',[]);//param1:nom, param2: src, param3:dependances, param 4: version, param 5: footer
    wp_register_script('bootsrap','https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js',['popper'],false,true);
    wp_register_script('popper','https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js',[],false,true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootsrap');
    wp_enqueue_style('mystyle', get_template_directory_uri().'/style.css');
};
//============================= Title ===========================================================================================================
function theme_title_separator () {
    return '|';
}
function theme_document_title_parts ($title) {
    //var_dump($title); die(); //affiche en tab les infos du titre du site
    unset($title['tagline']); //supprime les parties du titre qu on ne veut pas
    return $title;
}
//============================== Barre nav ======================================================================================================
function theme_menu_class ($classes) {
    $classes[] = 'nav-item';
    return $classes;
}
function theme_menu_link_class ($attrs) {
    $attrs['class'] = 'nav-link';
    return $attrs;
}

function theme_pagination() {
    echo '<nav aria-label="Pagination" class="my-4">';
    echo '<ul class="pagination">';
    $pages = paginate_links((['type' => 'array']));
    foreach($pages as $page) {
        $active = strpos($page,'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= 'active';
        }
        echo '<li class=".$class.">';
        echo str_replace('page-numbers','page-link',$page);
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
}
//============================= métadonnées ===============================================================================================================
function theme_add_custom_box() {
    add_meta_box('theme_sponso','Sponsoring','theme_render_sponso_box','post','side');
}

function theme_render_sponso_box() {
    ?>
    <input type="hidden" value="0" name="theme_sponso">
    <input type="checkbox" value="1" name="theme_sponso">
    <label for="themesponso">Cet article est sponsorisé ?</label>
    <?php
}
function theme_save_sponso($post_id) {  //enregistré ds la bd si l'article est sponsorisé ou pas
    if (array_key_exists('theme_sponso', $_POST) && current_user_can('edit_post', $post_id)) {
        if ($_POST['theme_sponso'] === '0') {
            delete_post_meta($post_id, 'theme_sponso');
        } else {
            update_post_meta($post_id, 'theme_sponso', 1);
        }
    }
}
//============================= Actions & filtres ==========================================================================================================
add_action('after_setup_theme','theme_supports');           //1er param: action, 2eme param: la fct qu'il doit appeler
add_action('wp_enqueue_scripts','theme_register_assets');
add_filter('document_title_separator','theme_title_separator');
add_filter('document_title_parts','theme_document_title_parts');
add_filter('nav_menu_css_class','theme_menu_class');
add_filter('nav_menu_link_attributes','theme_menu_link_class');
add_action('add_meta_boxes','theme_add_custom_box');
add_action('save_post','theme_save_sponso');