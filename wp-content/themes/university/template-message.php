<?php
/*
Template Name:Message template
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
							<h4><?php the_title(); ?></h4>
							<?php
								$entries = get_post_meta( get_the_ID(), 'wiki_test_repeat_group', true );
								$member_result="";
								if(!empty($entries)){
									foreach ( (array) $entries as $entry ) {
										$id_of_user=$entry['user_select_for_designation'];
										$auth = get_userdata($id_of_user);
										$auth->display_name;
										$blog_details = get_blog_details($auth->primary_blog);
										$site_url = $blog_details->siteurl;
										$domain_ad = $blog_details->domain;
										$path_ad = $blog_details->path;
										$user_blogs = get_blogs_of_user($id_of_user);
										foreach ($user_blogs AS $user_blog) {
											switch_to_blog($user_blog->userblog_id);
											$author_switch_url=get_author_posts_url($id_of_user);
										}
										restore_current_blog();
										$link=get_author_posts_url($id_of_user);
										$iii=get_the_author_meta("profile_image", $id_of_user, true);
										if(!empty($iii)){
											$member_result .= '<a class="hover_of_profile" href="'.$author_switch_url.'"><div class="author_all_list"><div class="profile_image_part">
											<img src="'.$iii.'" alt="">
											</div>';
										}else{
											$member_result .= '<a class="hover_of_profile" href="'.$author_switch_url.'"><div class="author_all_list"><div class="profile_image_part">
											<img src="'.get_template_directory_uri().'/img/profile_image.jpg" alt="">
											</div>';
										}
										$member_result .= '<div class="profile_description_part"><ul>';
										if($entry['group_designation']==''){
											$member_result .= '<li>'.get_the_author_meta('designation', $id_of_user).'</li>';
										}else{
										$member_result .= '<li><b>'.$group_designation = esc_html($entry['group_designation']).'</b></li>';
										}
										$member_result .= '<li>'.get_the_author_meta('first_name', $id_of_user).' '.get_the_author_meta('last_name', $id_of_user).'</li>';
										$member_result .= '<li><i class="fa fa-envelope-o"></i>'.get_the_author_meta('user_email', $id_of_user).'</li>';
										$contact_number=get_the_author_meta('contactnumber', $id_of_user);
										if($contact_number!=''){
											$member_result .= '<img class="con_num" src="'.get_template_directory_uri().'/img/phone.png" alt="" />'.$contact_number.'</li>';
										}
										$member_result .= '</ul>';
										$member_result .= '</div>';
										//$member_result .= '<a class="view_detail" href="'.$author_switch_url.'">Read More<i class="fa fa-angle-right"></i></a>';
										$member_result .= '</div></a>';
									}
								}
								echo $member_result;		
							?>
							<?php the_content(); ?> 
						</div>
					</div>
				</div>
			</div>
		</div>
<?php get_footer(); ?>			