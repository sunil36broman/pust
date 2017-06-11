<?php get_header();?>
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
					if($_GET['s'] != NULL ):
						if (have_posts()) : ?>
							<?php
							while(have_posts()): the_post(); ?>
							<div class="search_user_list">
								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
								<a href="<?php the_permalink(); ?>">Publish:<?php echo get_the_date('j,F Y'); ?></a>
								<?php
									echo '<p>'.wp_trim_words(get_the_content(), 15, '...').'</p>';
								?>
							</div>
							<?php endwhile;
							?>
						<?php endif; ?>
					<?php
					 endif;
					?>	
					<?php 
					if($_GET['s'] != NULL ){
						global $wpdb;
						$search = stripslashes(trim($_GET['s']));
						$results_user = $wpdb->get_results("SELECT ID, display_name, user_email
												  FROM $wpdb->users
												  WHERE display_name LIKE '%$search%' OR user_email LIKE '%$search%'
												  ORDER BY ID");
						
					}
					if(!empty($results_user)){
						foreach($results_user as $single_id_of_user){
							$id_of_user = $single_id_of_user->ID;
							$user_result="";
							$auth = get_userdata($id_of_user);
							$blog_details = get_blog_details($auth->primary_blog);
							$site_url = $blog_details->siteurl;
							$domain_ad = $blog_details->domain;
							$path_ad = $blog_details->path;
							$user_blogs = get_blogs_of_user($id_of_user);
							foreach ($user_blogs AS $user_blog) {
								switch_to_blog($user_blog->userblog_id);
								$author_switch_url=get_author_posts_url($id_of_user);
								$department=$user_blog->blogname;
								$siteurl=$user_blog->siteurl;
							}
							restore_current_blog();
							$displayname=$single_id_of_user->display_name;
							if(!empty($displayname)){
								echo '<div class="search_user_list">';
								$user_result .= '<h5><a href="'.$author_switch_url.'">'.$single_id_of_user->display_name .'</a></h5><p>';
								
								if($entry['indoor_group_designation']==''){
									$user_result .= get_the_author_meta('designation', $id_of_user).',<a href="'.$siteurl.'"> '.$department.'</a></br>';
								}else{
									$user_result .= $indoor_group_designation = esc_html($entry['indoor_group_designation']).',<a href="'.$siteurl.'"> '.$department.'</a></br>';
								}
								
								$bio = get_the_author_meta('description', $id_of_user);
								$user_result .= wp_trim_words($bio, 15, '...');	
								$user_result .= '</p></div>';
								echo $user_result;
							}
						}
					}
					?>
					<div class="pagi">
						<?php
						the_posts_pagination(array(
							'prev_text' => __('Previous', ''),
							'next_text' => __('Next', ''),
							'screen_reader_text' => ' ',
							'before_page_number' => '<b>',
							'after_page_number' => '</b>',
						));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			
