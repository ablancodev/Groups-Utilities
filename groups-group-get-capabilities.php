function groups_group_get_capabilities ( $group_id ) {
  global $wpdb;
  $result = false;
  
  $group_capability_table = _groups_get_tablename( 'group_capability' );
  $group_capability = $wpdb->get_row( $wpdb->prepare(
      "SELECT * FROM $group_capability_table WHERE group_id = %d",
    Groups_Utility::id( $group_id )
  ) );
  if ( $group_capability !== null ) {
    $result = $group_capability;
  }
  return $result;
}
