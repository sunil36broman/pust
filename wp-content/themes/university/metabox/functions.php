<?php
function cmb2_text_email_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_email_metabox',
        'title'        => 'Person Information',
        'object_types' => array( 'user' ),
	 ) );
	$cmb->add_field( array(
		'name' => 'Profile Information',
		'type' => 'title',
		'id'   => 'wiki_test_title'
	) );
	$cmb->add_field( array(
		'name' => __( 'Profile Image', 'cmb2' ),
		'desc' => __( 'Please Upload Your Profile Image', 'cmb2' ),
		'id'   => 'profile_image',
		'type' => 'file',
	) );
	$cmb->add_field( array(
		'name' => __( 'Designation', 'cmb2' ),
		'desc' => __( 'Please Writedown Your Designation', 'cmb2' ),
		'id'   => 'designation',
		'type' => 'text',
	) );
	$cmb->add_field( array(
		'name' => __( 'Education Degree', 'cmb2' ),
		'desc' => __( 'Please Writedown Your Education', 'cmb2' ),
		'id'   => 'degree',
		'type' => 'text',
	) );
	$cmb->add_field( array(
		'name' => __( 'Research Area', 'cmb2' ),
		'desc' => __( 'Please Writedown Your Research Area', 'cmb2' ),
		'id'   => 'research',
		'type' => 'text',
	) );
	$cmb->add_field( array(
		'name' => 'Entry Teaching Title',
		'id'   => 'teaching_title',
		'type' => 'text',
		'repeatable' => true, 
	) );
	$cmb->add_field( array(
		'name' => 'Entry Research Interests Title',
		'id'   => 'research_interests_title',
		'type' => 'text',
		'repeatable' => true, 
	) );
}
add_action( 'cmb2_init', 'cmb2_text_email_metabox' );



function cmb2_text_publish_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_publish_metabox',
        'title'        => 'PUBLICATION INFORMATION :',
        'object_types' => array( 'publication' ),
    ) );
	$cmb->add_field( array(
		'name' => __( 'PUBLISH BY :', 'cmb2' ),
		'class' => 'regular-text',
		'id'   => 'publish_by',
		'type' => 'text',
	) );
	$cmb->add_field( array(
		'name' => __( 'PUBLISH IN:', 'cmb2' ),
		'class' => 'regular-text',
		'id'   => 'where_publish',
		'type' => 'text',
	) );
	$cmb->add_field( array(
    'name' => 'ACCEPTED DATE :',
	'id'   => 'wiki_test_textdate_timestamp',
    'type' => 'text_date_timestamp',
		'timezone_meta_key' => 'Asia/Dhaka',
		'date_format' => 'd-m-Y'
	) );
	$cmb->add_field( array(
		'name' => __( 'AVAILABLE LINK :', 'cmb' ),
		'class' => 'regular-text',
		'id'   => 'publication_link_meta_id',
		'type' => 'text_url',
	) );
}
add_action( 'cmb2_init', 'cmb2_text_publish_metabox' );


function cmb2_text_gallery_new_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_gallery_new_metabox',
        'title'        => 'Gallery Images',
        'object_types' => array( 'gallery' ),
    ) );
	$cmb->add_field( array(
		'name'    => 'image link',
		'desc'    => 'Upload image',
		'id'      => 'gallery_files_idd',
		'type' => 'file_list',
		
	) );
}
add_action( 'cmb2_init', 'cmb2_text_gallery_new_metabox' );


function cmb2_text_syllabus_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_syllabus_metabox',
        'title'        => 'syllabus Information',
        'object_types' => array( 'syllabus' ),
    ) );
	$cmb->add_field( array(
		'name'    => 'syllabus link',
		'desc'    => 'Upload syllabus file',
		'id'      => 'syllabus_files_idd',
		'type' => 'file_list',
	) );
}
add_action( 'cmb2_init', 'cmb2_text_syllabus_metabox' );


function cmb2_text_routine_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_routine_metabox',
        'title'        => 'routine Information',
        'object_types' => array( 'routine' ),
    ) );
	$cmb->add_field( array(
		'name'    => 'routine link',
		'desc'    => 'Upload routine file',
		'id'      => 'routine_files_idd',
		'type' => 'file_list',
	) );
}
add_action( 'cmb2_init', 'cmb2_text_routine_metabox' );


function cmb2_text_download_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_download_metabox',
        'title'        => 'Download Information',
        'object_types' => array( 'download' ),
    ) );
	$cmb->add_field( array(
		'name'    => 'Download files',
		'desc'    => 'Upload your download  file',
		'id'      => 'download_files_idd',
		'type' => 'file_list',
	) );
	$cmb->add_field( array(
		'name' => __( 'Download Link', 'cmb' ),
		'id'   => 'download_link_id',
		'type' => 'text_url',
	) );
}
add_action( 'cmb2_init', 'cmb2_text_download_metabox' );


function cmb2_text_document_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_document_metabox',
        'title'        => 'Document Information',
        'object_types' => array( 'document' ),
    ) );
	$cmb->add_field( array(
		'name'    => 'Document files',
		'desc'    => 'Upload your document file',
		'id'      => 'document_files_id',
		'type' => 'file_list',
	) );
	$cmb->add_field( array(
		'name' => __( 'Other Link', 'cmb' ),
		'id'   => 'other_link_id_for_document',
		'type' => 'text_url',
	) );
}
add_action( 'cmb2_init', 'cmb2_text_document_metabox' );

function cmb2_text_admission_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_admission_metabox',
        'title'        => 'Admission Information',
        'object_types' => array( 'admission-info' ),
    ) );
	$cmb->add_field( array(
		'name'    => 'File upload',
		'desc'    => 'Upload your download  file',
		'id'      => 'admission_files_id',
		'type' => 'file_list',
		
	) );
}
add_action( 'cmb2_init', 'cmb2_text_admission_metabox' );

function more_image_for_single_post_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'more_image_for_single_post_metabox',
        'title'        => 'More image if needed',
        'object_types' => array( 'post' ),
    ) );
	$cmb->add_field( array(
		'name'    => 'Upload images',
		'desc'    => 'Upload your images',
		'id'      => 'more_image_in_single_post',
		'type'    => 'file_list',
		'options' => array(
			'url' => false, 
			'add_upload_file_text' => 'Add Images' 
		),
	) );
}
add_action( 'cmb2_init', 'more_image_for_single_post_metabox' );





//===============start==================
// text for all user in meta box meta field and grup create
//https://wordpress.org/support/topic/pass-cmb-object_id-to-function-in-select
function display_all_member_funtion_for_oneselect($cmb){
	global $wpdb;
	$blogs = $wpdb->get_results("SELECT blog_id,domain,path,mature FROM wp_blogs ORDER BY blog_id");
	$users = array();
	foreach($blogs as $single_blog_value){
		$blog_details = get_blog_details($single_blog_value->blog_id);
		$blog_details->blogname;
		$users[$blog_details->blogname] = esc_html($blog_details->blogname);
		//$users[$single_blog_value->blog_id] = esc_html( $blog_details->blogname);
		$args  = array(
			'blog_id' => $single_blog_value->blog_id,
			'orderby' => 'display_name',
			'fields' => 'all',
			'order'   => 'ASC',
		);
		$wp_user_query = new WP_User_Query($args);
		foreach($wp_user_query->results as $indivisual_blog_user){
			$users[$indivisual_blog_user->ID] = esc_html( $indivisual_blog_user->display_name );
			
		}
	}
	return $users;
}

function cmb2_text_group_create_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_group_create_metabox',
        'title'        => 'Group create information',
        'object_types' => array( 'page' ),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-group.php' ),
        'context'      => 'normal', //  'normal', 'advanced', or 'side'
        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ) );
	$group_field_id = $cmb->add_field( array(
		'id'          => 'wiki_test_repeat_group',
		'type'        => 'group',
		
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'cmb' ),
			'remove_button' => __( 'Remove Entry', 'cmb' ),
			'sortable'      => true, // beta
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Group Designation',
		'id'   => 'group_designation',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'One Member select for Designation',
		'id'   => 'user_select_for_designation',
		//'type'             => 'select',
		'type'             => 'pw_select',
		'show_option_none' => true,
		'default'          => 'custom',
		'options'          => 'display_all_member_funtion_for_oneselect',
	) );
	
}
add_action( 'cmb2_init', 'cmb2_text_group_create_metabox' );

//message for chairman start

function cmb2_text_message_create_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_message_create_metabox',
        'title'        => 'Member selection for message',
        'object_types' => array( 'page' ),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-message.php' ),
        'context'      => 'normal', //  'normal', 'advanced', or 'side'
        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ) );
	$group_field_id = $cmb->add_field( array(
		'id'          => 'wiki_test_repeat_group',
		'type'        => 'group',
		
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'cmb' ),
			'remove_button' => __( 'Remove Entry', 'cmb' ),
			'sortable'      => true, // beta
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Designation of member',
		'id'   => 'group_designation',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'One Member select for Designation',
		'id'   => 'user_select_for_designation',
		//'type'             => 'select',
		'type'             => 'pw_select',
		'show_option_none' => true,
		'default'          => 'custom',
		'options'          => 'display_all_member_funtion_for_oneselect',
	) );
	
}
add_action( 'cmb2_init', 'cmb2_text_message_create_metabox' );

//===============end==================

function display_all_member_for_oneselect($cmb){
	global $wpdb;
	$blogusers = $wpdb->get_results("SELECT ID, user_nicename, display_name FROM $wpdb->users");
	$users = array();
	foreach ( $blogusers as $user ) {
		$users[$user->ID] = esc_html( $user->display_name );
	}
	return $users;
}

function display_blog_category_for_oneselect($cmb){
	//Start All Blog catgegory show
	global $wpdb;
	$blogs = $wpdb->get_results("SELECT blog_id,domain,path,mature FROM wp_blogs where blog_id > 1 ORDER BY blog_id");
	$total_category_find = array();
	foreach($blogs as $single_blog_value){
		$has_category = get_blog_option( $single_blog_value->blog_id, 'site_category' );
		//echo $has_category = get_blog_option( $single_blog_value->blog_id, 'blogname' )."<br>";
		if(in_array($has_category, $total_category_find)){
			continue;
		}
		$total_category_find[$single_blog_value->blog_id]=$has_category;
	}
	return $total_category_find;
	//End All Blog catgegory show
	
}

function cmb2_blogcategory_publish_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_blogcategory_publish_metabox',
        'title'        => 'Faculty Selection',
        'object_types' => array( 'page' ), // post type
        'show_on'      => array( 'key' => 'page-template', 'value' => 'template-faculty.php' ),
        'context'      => 'normal', //  'normal', 'advanced', or 'side'
        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ) );
	$cmb->add_field( array(
		'name' => __( 'Designation', 'cmb2' ),
		'desc' => __( 'Please Writedown Your Designation', 'cmb2' ),
		'id'   => 'faculty_designation',
		'type' => 'text',
		
	) );
	$cmb->add_field( array(
		'name' => __( 'Select Teacher', 'cmb2' ),
		'desc' => __( 'Please Select', 'cmb2' ),
		'id'   => 'select_faculty_dean_for_faculty',
		//'type'             => 'select',
		'type'             => 'pw_select',
		'show_option_none' => true,
		'default'          => 'custom',
		'options'          => 'display_all_member_for_oneselect',
		
	) );
	
	$cmb->add_field( array(
		'name' => __( 'Select Facultry', 'cmb2' ),
		'desc' => __( 'Please Select', 'cmb2' ),
		'id'   => 'blogcat_select_for_faculty',
		'type'             => 'select',
		'show_option_none' => true,
		'default'          => 'custom',
		'options'          => 'display_blog_category_for_oneselect',
		
	) );
	

}
add_action( 'cmb2_init', 'cmb2_blogcategory_publish_metabox' );

//====================end========================
// book post type 

function cmb2_text_book_metabox() {

    $cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_book_metabox',
        'title'        => 'BOOK INFORMATION :',
        'object_types' => array( 'book' ),
    ) );

	
    $cmb->add_field( array(
		'name' => __( 'AUTHOR/EDITOR :', 'cmb2' ),
		'class' => 'regular-text',
		'id'   => 'author_editor_name',
		'type' => 'text',
		
	) );
	$cmb->add_field( array(
		'name' => __( 'EDITION :', 'cmb2' ),
		'class' => 'regular-text',
		'id'   => 'edition_id',
		'type' => 'text',
		
	) );
	$cmb->add_field( array(
		'name' => __( 'AVAILABLE LINK :', 'cmb' ),
		'class' => 'regular-text',
		'id'   => 'abailable_download_link_id',
		'type' => 'text_url',
		// 'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
	) );
	
	$cmb->add_field( array(
		'name'    => 'BOOK PDF :',
		'id'      => 'pdf_book_id',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
			'add_upload_file_text' => 'ADD BOOK' // Change upload button text. Default: "Add or Upload File"
		),
	) );

}
add_action( 'cmb2_init', 'cmb2_text_book_metabox' );

//indoor author member select field create 
//https://wordpress.org/support/topic/pass-cmb-object_id-to-function-in-select
function display_indoor_member_funtion_for_oneselect($cmb){
	//Start All user show
	//$blogusers = get_users( array( 'fields' => array( 'display_name', 'ID' ) ) );
	
	$blogidd=$GLOBALS['blog_id'];
	$args  = array(
		'blog_id' => $blogidd,
		'orderby' => 'display_name',
		'fields' => 'all'
	);
	$wp_user_query = new WP_User_Query($args);
	foreach($wp_user_query->results as $indivisual_blog_user){
		$users[$indivisual_blog_user->ID] = esc_html( $indivisual_blog_user->display_name );
	}
	return $users;
}

function cmb2_text_indoor_group_create_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_indoor_group_create_metabox',
        'title'        => 'Indoor Group create information',
        'object_types' => array( 'page' ),
		'show_on'      => array( 'key' => 'page-template', 'value' => 'template-department-groups.php' ),
        'context'      => 'normal', //  'normal', 'advanced', or 'side'
        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ) );
	$group_field_id = $cmb->add_field( array(
		'id'          => 'wiki_test_indoor_repeat_group',
		'type'        => 'group',
		
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'cmb' ),
			'remove_button' => __( 'Remove Entry', 'cmb' ),
			'sortable'      => true, // beta
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Group Designation',
		'id'   => 'indoor_group_designation',
		'type' => 'text',
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'One Member select for Designation',
		'id'   => 'indoor_user_select_for_designation',
		//'type'             => 'select',
		'type'             => 'pw_select',
		'show_option_none' => true,
		'default'          => 'custom',
		'options'          => 'display_indoor_member_funtion_for_oneselect',
	) );
}
add_action( 'cmb2_init', 'cmb2_text_indoor_group_create_metabox' );

//===============end==================
//Extra page content(such as there have title,some content,image) if need  
function cmb2_text_extra_page_content_row_grouping_create_metabox() {
	$cmb = new_cmb2_box( array(
        'id'           => 'cmb2_text_extra_page_content_row_grouping_create_metabox',
        'title'        => 'Adding extra page content for row grouping',
		'desc'         => 'If your need title,some content and image',
        'object_types' => array( 'page' ),
		'context'      => 'normal', //  'normal', 'advanced', or 'side'
        'priority'     => 'high',  //  'high', 'core', 'default' or 'low'
        'show_names'   => true, // Show field names on the left
    ) );
	$group_field_id = $cmb->add_field( array(
		'id'          => 'page_content_row_grouping',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Add Another Entry', 'cmb' ),
			'remove_button' => __( 'Remove Entry', 'cmb' ),
			'sortable'      => true, // beta
		),
	) );
	$cmb->add_group_field( $group_field_id, array(
		'name' => 'Title',
		'id'   => 'page_content_row_grouping_title',
		'type' => 'text',
	) );
	$cmb->add_group_field($group_field_id, array(
		'name' => 'Description',
		'desc' => 'Please Writedown',
		'id' => 'page_content_row_grouping_description',
		'type' => 'wysiwyg',
		'options' => array(
			'textarea_rows' => get_option('default_post_edit_rows', 10),
			'media_buttons' => false
		   ),
		));
	$cmb->add_group_field($group_field_id, array(
		'name'    => 'Upload extra image',
		'desc'    => 'Upload your images',
		'id'      => 'page_content_row_grouping_image',
		'type'    => 'file_list',
		'options' => array(
			'url' => false, // Hide the text input for the url
			'add_upload_file_text' => 'Add Files or images' // Change upload button text. Default: "Add or Upload File"
		),
	) );	
		
}
add_action( 'cmb2_init', 'cmb2_text_extra_page_content_row_grouping_create_metabox' );
