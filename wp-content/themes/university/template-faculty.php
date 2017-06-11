<?php
/*
Template Name:Faculty template
*/
get_header(); the_post();?>
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
								$entriess = get_post_meta(get_the_ID(), 'faculty_designation', true );
								$author_id=get_post_meta( get_the_ID(), 'select_faculty_dean_for_faculty', true );
								$linkk=get_author_posts_url($author_id);
								$user_blogs = get_blogs_of_user($author_id);
								foreach ($user_blogs AS $user_blog) {
									switch_to_blog($user_blog->userblog_id);
									$author_switch_url=get_author_posts_url($author_id);
								}
								restore_current_blog();
								$auth_meta_data = get_userdata($author_id);
								$blog_details = get_blog_details($auth_meta_data->primary_blog);
								$site_url = $blog_details->siteurl;
								$domain_ad = $blog_details->domain;
								$path_ad = $blog_details->path;
								echo $author;
								if(!empty($auth_meta_data)){
									$iii=get_the_author_meta("profile_image", $author_id, true);
									if(!empty($iii)){
										echo'<a class="hover_of_profile" href="'.$author_switch_url.'"><div class="author_all_list"><div class="profile_image_part">
										<img src="'.$iii.'" alt="">
										</div>';
									}else{
										echo '<a class="hover_of_profile" href="'.$author_switch_url.'"><div class="author_all_list"><div class="profile_image_part">
										<img src="'.get_template_directory_uri().'/img/profile_image.jpg" alt="">
										</div>';
									}
									echo '<div class="profile_description_part"><ul>';
									echo '<li>'.get_the_author_meta('first_name', $author_id).' '.get_the_author_meta('last_name', $author_id).'</li>';
									if (isset($entriess)){
										echo '<li>'.$entriess.' of '.get_the_title().'</li>';
									}
									echo '<li>'.get_the_author_meta('user_email', $author_id).'</li>';
									echo '</ul></div>';
									//echo '<a class="view_detail" href="'.$author_switch_url.'">Read More<i class="fa fa-angle-right"></i></a>';
									echo '</div></a>';
								}			
							?>
							<h4><?php the_title(); ?></h4> 
							<?php the_content(); ?> 
							<?php
								$entries = get_post_meta( get_the_ID(), 'blogcat_select_for_faculty', true );
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
								echo "<h4>Departments under this faculty :</h4>";
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
					</div>
				</div>
			</div>
		</div>
<?php get_footer(); ?>			
