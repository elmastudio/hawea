<?php
/**
 * Demo Installer content, One Click Demo Import plugin required
 * See: https://wordpress.org/plugins/one-click-demo-import/
 *
 * @package Hawea
 * @since Hawea 1.0.7
 * @version 1.0
 */

function ocdi_import_files() {
	return array(

		array(
			'import_file_name'            	=> 'Demo Hawea',
			'categories'                   	=> array( 'WooCommerce' ),
			'local_import_file'            	=> trailingslashit( get_template_directory() ) . 'demos/hawea-content.xml',
			'local_import_widget_file'     	=> trailingslashit( get_template_directory() ) . 'demos/hawea-widgets.wie',
			'local_import_customizer_file'	=> trailingslashit( get_template_directory() ) . 'demos/hawea-customizer.dat',
			'import_notice'            			=> esc_html__( 'Make sure you have the WooCommerce plugin installed, before importing this demo!', 'hawea' ),
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );
