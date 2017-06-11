<?php 
/*
Template Name: All department template
*/
get_header();?>
<div class="slider2_area">
	<div class="container">
		<div class="row department_background_content">
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="dep_side">
					<?php get_sidebar(); ?>
				</div>
			</div>
			<div class="col-md-9 col-lg-9 col-sm-9">
				<div class="department_right_content">
					<h5 class="custom_breadcrump">
					<?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>
					</h5>
					<?php
					if ( have_posts() ) :
						while(have_posts()): the_post(); ?>
							<h4><?php the_title(); ?></h4>
							<?php
							$slide_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
							$slide_image_url=$slide_image[0];
							if(!empty($slide_image_url)){
								echo '<img class="parent_page_thum" src="'.$slide_image_url.'">';
							}
							?>
							
							<?php the_content(); ?>
						<?php endwhile;
					endif;
					?>	
					<?php
						global $redux_demo;
						$message_page_id=$redux_demo["faculty_parent_page_selection_for_department"];
						$message_page_info = get_post($message_page_id); 
						$message_page_link=get_page_link($message_page_id);
						$message_page_title=$message_page_info->post_title;
						$message_page_description=$message_page_info->post_content;
					?>
					<?php
					$total_faculty_page=query_posts("order=ASC&posts_per_page=-1&post_type=page&post_parent=$message_page_id");
					while(have_posts()): the_post(); ?>
						<div class="department_under_fac">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<?php ;
							$entries = get_post_meta($post->ID, 'blogcat_select_for_faculty', true );
							$has_categoryy=get_blog_option($entries, 'site_category');
							global $wpdb;
							$blogs = $wpdb->get_results("SELECT blog_id,domain,path,mature FROM wp_blogs where blog_id > 1 ORDER BY blog_id");
							$total_category_find = array();
							foreach($blogs as $single_blog_value){
								$has_category = get_blog_option( $single_blog_value->blog_id, 'site_category' );
								if(in_array($has_category, $total_category_find)){
									continue;
								}
								$total_category_find[$single_blog_value->blog_id]=$has_category;
							}
							global $wpdb;
							$total_blogs_info = $wpdb->get_results("SELECT blog_id,domain,path,mature FROM wp_blogs where blog_id > 1 ORDER BY blog_id");
							foreach($total_blogs_info as $single_blog_inf){
								$blog_cat_check = get_blog_option( $single_blog_inf->blog_id, 'site_category' );
								$blog_name_find = get_blog_option( $single_blog_inf->blog_id, 'blogname' );
								$domain_ad=$single_blog_inf->domain;
								$path_ad=$single_blog_inf->path;
								if(strcasecmp( $has_categoryy, $blog_cat_check )== 0){
								?>
								<a href="http://<?php echo $domain_ad.$path_ad; ?>"><i class="fa fa-caret-right"></i><?php echo $blog_name_find; ?></a><br>													
								<?php }
							}
							?>
						</div>
					<?php endwhile;
					?>	
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			
