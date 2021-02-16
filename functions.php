<?php 
// returns WP theme path
function script_urls() {
?>
    <script type="text/javascript">
     var stylesheetDir = '<?= get_bloginfo("stylesheet_directory"); ?>';
    </script>
<?php
}
add_action( 'wp_enqueue_scripts', 'script_urls' ); 

// load script bundle
function load_scripts(){        
   wp_enqueue_script('main',  get_stylesheet_directory_uri(). '/dist/main.bundle.js', [], '1.0', true);  
}
add_action( 'wp_enqueue_scripts', 'load_scripts', 100 );

// register fonts
function add_google_fonts() {
	wp_enqueue_style( 'google_web_fonts', 'https://fonts.googleapis.com/css?family=Nunito|Roboto&display=swap' );
}

add_action( 'enqueue_block_assets', 'add_google_fonts' );

// register menu
if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {
 
    function mytheme_register_nav_menu(){
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'minty' ),
            'footer_menu'  => __( 'Footer Menu', 'minty' ),
        ) );
    }
    add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}




// create new endpoint route WP API
add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', 'menu', array(
        'methods' => 'GET',
        'callback' => 'custom_wp_menu',
        'permission_callback' => '__return_true',
    ) );
} );

// create custom function to return nav menu
function custom_wp_menu() { 
    
    $menuLocations = get_nav_menu_locations(); //  returns an array of menu locations ([LOCATION_NAME] = MENU_ID);
    $menuID = $menuLocations['primary_menu'];

    return wp_get_nav_menu_items($menuID);
}

// Gutenberg
add_theme_support( 'editor-styles' );
add_editor_style( 'style-editor.css' );


// Register post type 'work'

add_action( 'init', 'my_work_cpt' );
function my_work_cpt() {
    $args = array(
      'public'       => true,
      'show_in_rest' => true,
      'rest_base'          => 'works',
      'rest_controller_class' => 'WP_REST_Posts_Controller',      
      'label'        => 'Works',
      'show_ui' => true,
      'show_in_menu'       => true,
      'menu_position' => 21,
      'has_archive'        => true,
      'hierarchical' => false,
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
      'rewrite' => array('slug' => 'work'),
      'capability_type' => 'post',
      'taxonomies'          =>  array('post_tag','category'),
    );
    register_post_type( 'work', $args );
}

// register rest route for CPT 'work' 

function rest_route_for_work( $route, $post ) {
    if ( $post->post_type === 'work' ) {
        $route = '/wp/v2/works/' . $post->ID;
    }
 
    return $route;
}
add_filter( 'rest_route_for_post', 'rest_route_for_work', 10, 2 );

add_theme_support('post-thumbnails');
add_post_type_support( 'works', 'thumbnail' );   

?>