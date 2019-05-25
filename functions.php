<?php
function enqueue_styles_child_theme() {

	$parent_style = 'adaptativo-style';
	$child_style  = 'adaptativo-child-style';

	wp_enqueue_style( $parent_style,
				get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( $child_style,
				get_stylesheet_directory_uri() . '/style.css',
				array( $parent_style ),
				wp_get_theme()->get('Version')
				);

	wp_enqueue_style( 'adaptativo-gfont', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400|Palanquin:200,400,700' );

}
add_action( 'wp_enqueue_scripts', 'enqueue_styles_child_theme');


function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );


// Remove title Home
add_filter( 'the_title', 'remove_home_page_title', 10, 2 );
function remove_home_page_title( $title, $id ) {
	if ( is_front_page() ){
		// $hide_title_page_ids = array(34);//Page ID Home
		// foreach($hide_title_page_ids as $page_id) {
		// 	if( $page_id == $id ) return '';
		// }
		$home_id = get_option('page_on_front');
		if ( $home_id == $id ) return '';	
	}
	return $title;	
}

