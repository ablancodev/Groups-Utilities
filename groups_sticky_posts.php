// Filters the sticky posts

// Add this code in your functions.php theme file

add_filter( 'option_sticky_posts', 'my_option_sticky_posts', 10, 2 );

function my_option_sticky_posts ( $values, $options ) {

	$result = $values;
	if ( is_array( $values ) && ( sizeof( $values ) > 0 ) ) {
		$result = array();
		foreach ( $values as $post_id ) {
			if ( Groups_Post_Access::user_can_read_post( $post_id ) ) {
				$result[] = $post_id;
			}
		}
	}
	return $result;
}
