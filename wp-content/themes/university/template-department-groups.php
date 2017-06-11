<?php
/*
Template Name:Department groups template
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
					<?php the_content(); ?> 
					<?php
					$entries = get_post_meta( get_the_ID(), 'wiki_test_indoor_repeat_group', true );
					$user_result="";
					if(!empty($entries)){
						foreach ( (array) $entries as $entry ) {
							$id_of_user=$entry['indoor_user_select_for_designation'];
							$auth = get_userdata($id_of_user);
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
								$user_result .= '<a class="hover_of_profile" href="'.$author_switch_url.'"><div class="author_all_list"><div class="profile_image_part">
									<img src="'.$iii.'" alt="">
									</div>';
							}else{
								$user_result .= '<a class="hover_of_profile" href="'.$author_switch_url.'"><div class="author_all_list"><div class="profile_image_part">
									
									<img src="'.get_template_directory_uri().'/img/profile_image.jpg" alt="">
									
									</div>';
							}
							$user_result .= '<div class="profile_description_part"><ul>';
							$user_result .= '<li><b>'.get_the_author_meta('first_name', $id_of_user).' '.get_the_author_meta('last_name', $id_of_user).'</b></li>';
							if($entry['indoor_group_designation']==''){
								$user_result .= '<li>'.get_the_author_meta('designation', $id_of_user).'</li>';
							}else{
								$user_result .= '<li>'.$indoor_group_designation = esc_html($entry['indoor_group_designation']).'</li>';
							}
							$user_result .= '<li><i class="fa fa-envelope-o"></i>'.get_the_author_meta('user_email', $id_of_user).'</li>';
							$contact_number=get_the_author_meta('contactnumber', $id_of_user);
							if($contact_number!=''){
								$user_result .= '<img class="con_num" src="'.get_template_directory_uri().'/img/phone.png" alt="" />'.$contact_number.'</li>';	
							}
							$user_result .= '</ul>';
							$user_result .= '</div>';
							//$user_result .= '<a class="view_detail" href="'.$author_switch_url.'">View profile<i class="fa fa-angle-right"></i></a>';
							$user_result .= '</div></a>';
						}
					}
					echo $user_result;
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>			
