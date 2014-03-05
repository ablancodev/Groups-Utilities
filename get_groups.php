function get_all_groups (  ) {
		global $wpdb;
		
		$groups_table = _groups_get_tablename( 'group' );
		
		return $wpdb->get_results( "SELECT * FROM $groups_table ORDER BY name" );
		
}
