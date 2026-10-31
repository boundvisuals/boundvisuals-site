<?php

if ( ! function_exists( 'stockholm_qode_import_export_options_map' ) ) {
	/**
	 * Import/Export options page
	 */
	function stockholm_qode_import_export_options_map() {
		
		$backupPage = new StockholmQodeAdminPage(
			"_backupoptions",
			esc_html__( "Backup Options", 'stockholm' ),
			"fa fa-database"
		);
		
		stockholm_qode_framework()->qodeOptions->addAdminPage(
			esc_html__( "Backup Options", 'stockholm' ),
			$backupPage
		);
		
		$panel1 = new StockholmQodeImportExport(
			esc_html__( "Import/Export", 'stockholm' ),
			"importexport_section"
		);
		
		$backupPage->addChild(
			"panel1",
			$panel1
		);
	}
	
	add_action( 'stockholm_qode_action_options_map', 'stockholm_qode_import_export_options_map', 209 );
}