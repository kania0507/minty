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


// create custom function to return nav menu
function custom_wp_menu() { 
    
    $menuLocations = get_nav_menu_locations(); //  returns an array of menu locations ([LOCATION_NAME] = MENU_ID);
    $menuID = $menuLocations['primary_menu'];

    return wp_get_nav_menu_items($menuID);
}

// create new endpoint route WP API
add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', 'menu', array(
        'methods' => 'GET',
        'callback' => 'custom_wp_menu',
    ) );
} );


?>