<?php
/**
 * groups-list-posts.php
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
 * Show the posts that current user can access.
 * 
 * Example:   [groups_list_posts]
 *
 */
 function my_groups_list_posts() {

	$posts = Groups_Post_Access::the_posts(get_posts(array('posts_per_page'=>-1)));
	echo '<ul>';
	foreach ($posts as $post)  {
		echo '<li><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></li>';
	}
	echo '</ul>';
	

}
add_shortcode( 'groups_list_posts', 'my_groups_list_posts' );
?>
