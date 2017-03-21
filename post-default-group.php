// This code add the group with id 160 as selected by default.
// Change the 160 to your group_id
// If you have selected the legacy mode, please use the code: https://github.com/eggemplo/Groups-Utilities/blob/master/post-default-capability.php

add_action( 'groups_access_meta_boxes_after_groups_read_update', 'my_groups_access_meta_boxes_after_groups_read_update', 10, 3);
function my_groups_access_meta_boxes_after_groups_read_update ( $post_id, $group_ids, $update_result ) {
		$group_ids[] = 160;
		Groups_Post_Access::update( array( 'post_id' => $post_id, 'groups_read' => $group_ids ) );
}
