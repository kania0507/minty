<?php 
function script_urls() {
?>
    <script type="text/javascript">
     var stylesheetDir = '<?= get_bloginfo("stylesheet_directory"); ?>';
    </script>
<?php
}
add_action( 'wp_enqueue_scripts', 'script_urls' );

function load_scripts(){        
   wp_enqueue_script('main',  get_stylesheet_directory_uri(). '/dist/main.bundle.js', [], '1.0', true); 
}
add_action( 'wp_enqueue_scripts', 'load_scripts', 100 );
?>