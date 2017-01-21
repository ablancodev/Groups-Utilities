function get_all_capabilities (  ) {
		global $wpdb;
		
		$capabilities_table = _groups_get_tablename( 'capability' );
		
		return $wpdb->get_results( "SELECT * FROM $capabilities_table ORDER BY capability" );
		
}
