<?php
/**
*Plugin Name: Home hook
*Plugin URI:  http://pust.ac.bd
*Description: All network post publish in main site using this plugin.
*Version:     0.1
*Author:      pust
*License:GPL2
*Author URI:  http://pust.ac.bd
*/

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
	if(current_user_can( 'manage_sites' ) ){
    add_meta_box( 'my-meta-box-id', 'Switch Posts Homepage', 'cd_meta_box_cb', array('post','admission-info','download'), 'normal', 'high' );
	}
}

function cd_meta_box_cb($post)
{
global $post;
?>
 
    <p>
		<?php $check=get_post_meta($post->ID, 'my_meta_box_check', true); ?>
        <input type="checkbox" id="my_meta_box_check" name="my_meta_box_check" <?php checked( $check, 'on' ); ?> />
        <label for="my_meta_box_check">Checked and displays this post.</label>
    </p>
	<p>
		<?php $check_announcements=get_post_meta($post->ID, 'my_meta_box_check_announcements', true); ?>
        <input type="checkbox" id="my_meta_box_check_announcements" name="my_meta_box_check_announcements" <?php checked( $check_announcements, 'on' ); ?> />
        <label for="my_meta_box_check_announcements">Checked for announcements</label>
    </p>
    <?php    
}

add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
	if(current_user_can( 'manage_sites' ) ){
		$chk = isset( $_POST['my_meta_box_check'] ) ? 'on' : 'off';
        update_post_meta( $post_id, 'my_meta_box_check', $chk );
	   
		$chk_announcements = isset( $_POST['my_meta_box_check_announcements'] ) ? 'on' : 'off';
		update_post_meta( $post_id, 'my_meta_box_check_announcements', $chk_announcements ); 
	}   
}