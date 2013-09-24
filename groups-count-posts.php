<?php
/**
 * groups-count-posts.php
 *
 * Copyright (c) 2013 "eggemplo" Antonio Blanco www.eggemplo.com
 *
 * This code is released under the GNU General Public License.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @author eggemplo
 * @version 1.0
 *
 * Counts the number of post that have a certain capability.
 * 
 * Example:   [groups_count_posts cap="premium"]
 *
 */
 function groups_count_posts( $atts ){
	global $wpdb;

	extract( shortcode_atts( array(
	'cap' => '',
	), $atts ) );
	
	$caps = "'" . $cap . "'";
	
	$query = sprintf(
			"   SELECT ID FROM $wpdb->posts WHERE post_type = 'post' AND post_status='publish' AND ID IN ( 
SELECT post_id AS ID FROM $wpdb->postmeta WHERE {$wpdb->postmeta}.meta_key = '%s' AND {$wpdb->postmeta}.meta_value IN (%s) )",
			Groups_Post_Access::POSTMETA_PREFIX . Groups_Post_Access::READ_POST_CAPABILITY,
			$caps
	);
	
	$num = $wpdb->query($query);
	
	if (!$num)
		$num = 0;
	
	return $num;

}
add_shortcode( 'groups_count_posts', 'groups_count_posts' );
?>
