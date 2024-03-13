<?php

if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
});


// Benutzerrolle Contributor (Mitarbeiter) mit Bild-Upload-Rechten versorgen.
if ( current_user_can('contributor') && !current_user_can('upload_files') )
add_action('admin_init', 'kb_allow_contributor_uploads');

function kb_allow_contributor_uploads() {
     $contributor = get_role('contributor');
     $contributor->add_cap('upload_files');
}
