add_filter( 'the_comments', 'my_the_comments', 10, 2 );

function my_the_comments( $results, &$comment_query ) {
	global $current_user;

	if ( !is_admin() ) {
		if ( isset( $current_user ) && ( $current_user instanceof WP_User ) ) {
			if ( is_array( $results ) ) {
				foreach ( $results as $key=>$comment ) {
					$post_id = $comment->comment_post_ID;
					$user_id = $current_user->ID;
					if ( !Groups_Post_Access::user_can_read_post( $post_id, $user_id ) ) {
						unset( $results[$key] );
					}
				}
			}
		}
	}
	return $results;
}
