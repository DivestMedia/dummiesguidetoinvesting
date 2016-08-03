<?



// include_once('_inc/backstage_template.php');
include_once('_inc/custom-page-template.php');
// include_once('_inc/widget-invest-or-divest.php');



remove_action('wp_head', 'wp_generator');

add_filter('login_errors', create_function('$a', "return 'Error: Login';"));


add_filter('page_template',
    function ($template) {
        global $post;

		//gigs sked subpage template
        if ($post->post_parent ==1669) {

            // get top level parent page
            $parent = get_post(
               reset(array_reverse(get_post_ancestors($post->ID)))
            );

            // or ...
            // when you need closest parent post instead
            // $parent = get_post($post->post_parent);

            $child_template = locate_template(
                [
                    'page-'.$parent->post_name . '.php',
                    //$parent->post_name . '/page-' . $post->post_name . '.php',
                    //$parent->post_name . '/page-' . $post->ID . '.php',
                    //$parent->post_name . '/page.php',
                ]
            );

            if ($child_template) return $child_template;
        }
        return $template;
    }
);


function backstage_smarty_setup() {

	load_theme_textdomain( 'xyr_smarty', get_template_directory() . '/languages' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'footer_ext'  => __( 'Footer Ext', XYR_SMARTY),
	) );
	
	
	add_image_size( 'main-image', 600, 400, true ); // Hard Crop Mode
	add_image_size( 'mid-image', 450, 300, true ); // Hard Crop Mode
	add_image_size( 'thumb-image', 150, 99, true ); // Hard Crop Mode
	add_image_size( 'horizontal-image',500,200, true ); // Hard Crop Mode
	add_image_size( 'ratio-image',400,400, false ); // Hard Crop False
	add_image_size( 'mid-ratio-image',400,800, false ); // Hard Crop False - poster

}
add_action( 'after_setup_theme', 'backstage_smarty_setup' );



add_action( 'widgets_init', 'backstage_smarty_widgets_init' );
function backstage_smarty_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', XYR_SMARTY),
        'id' => 'sidebar-single',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', XYR_SMARTY ),
        'before_widget' => '<div id="%1$s" class="row widget %2$s"><div class="col-sm-12 col-md-6 col-lg-12">',
		'after_widget'  => '</div></div>',
		'before_title'  => '',
		'after_title'   => '',
	));
}





add_filter('next_posts_link_attributes', 'xyr_smarty_link_attributes');
add_filter('previous_posts_link_attributes', 'xyr_smarty_link_attributes');

function xyr_smarty_link_attributes() {
    return 'class="btn btn-sm btn-default btn-black-hover btn-bordered noradius padding-10 width-300"';
}


define('CUSTOM_ASSETS', get_stylesheet_directory_uri().'/assets/');



class custom_xyren_smarty_walker_nav_menu extends Walker_Nav_Menu {
  
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";                       
    }
     function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
  
  
      
    // add main/sub classes to li's and links
     function start_el( &$output, $item, $depth, $args ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
      
        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
        
        
        
            
        $active = $item->current ? ' active' : '';
      
        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
      
        // build html
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . ' '. $active .'">';
      
        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        
        $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
        if( !empty($children )){
            $attributes .= ' class="dropdown-toggle"';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '#';
        }else{
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
        }
        
      
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
      
        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

$CustomPageTemplate = New CustomPageTemplate();


