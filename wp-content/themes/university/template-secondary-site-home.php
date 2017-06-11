<?php 
/*
Template Name:Secondray site home template
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
				<div class="department_header_image">
					<?php if(!empty($redux_demo["opt-media"]["url"])){?>
						<img src="<?php echo $redux_demo["opt-media"]["url"]; ?>" alt="" />
					<?php }else{ ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/img3.jpg" alt="" />
					<?php } ?>
				</div> 
				<div class="dep_chairman_part">
					<?php
					global $redux_demo;
					$message_page_id=$redux_demo["main_vice_or_chairman_page_selection"];
					$message_page_info = get_post($message_page_id); 
					$message_page_link=get_page_link($message_page_id);
					$message_page_title=$message_page_info->post_title;
					$message_page_description=$message_page_info->post_content;
					$entries = get_post_meta( $message_page_id, 'wiki_test_repeat_group', true );
					$user_result="";
					if(!empty($entries)){
						foreach ( (array) $entries as $entry ) {
							$id_of_user=$entry['user_select_for_designation'];
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
								$user_result .= '<div class="chairman_of_dept"><a href="'.$author_switch_url.'"><img src="'.$iii.'" alt=""></a>';
							}else{
								$user_result .= '<div class="chairman_of_dept">
								<a href="'.$author_switch_url.'"><img src="'.get_template_directory_uri().'/img/profile_image.jpg" alt=""></a>';
							}
							$user_result .= '<p>';
							$user_result .= '<b>'.get_the_author_meta('first_name', $id_of_user).' '.get_the_author_meta('last_name', $id_of_user).'</b></br>';
							if($entry['indoor_group_designation']==''){
								$user_result .= get_the_author_meta('designation', $id_of_user).'</br>';
							}else{
								$user_result .= $indoor_group_designation = esc_html($entry['indoor_group_designation']).'</br>';
							}
							$user_result .= '</p>';
							$user_result .= '</div>';
						}
					}
					echo '<h5>Message from the Chairman</h5>';
					echo $user_result;
					$readmore='<a class="readmore" href="'.$message_page_link.'">Read More</a>';
					echo '<p>'.wp_trim_words($message_page_description, 100, $readmore).'</p>';	
					?>
				</div>
				<div class="link_2nd_tab_content">
					<?php
						global $redux_demo;
						$cat_total=$redux_demo["opt_multi_select_cat_iteam"];
						echo '<ul class="nav nav-tabs" role="tablist" id="myTab">';
						if(!empty($cat_total)){
						foreach($cat_total as $cat_single){
							$catname=get_cat_name($cat_single);
							$termname = strtolower($catname);
							$termname = str_replace(' ', '-', $termname);
							 echo '<li role="presentation"><a href="#'.$termname.'" aria-controls="'.$termname.'" role="tab" data-toggle="tab">'.$catname.'</a></li>';
						}
						}
						echo '</ul>';
					?>	
					<?php
						global $redux_demo;
						$cat_total=$redux_demo["opt_multi_select_cat_iteam"];
						echo '<div class="tab-content">';
						if(!empty($cat_total)){
						foreach($cat_total as $cat_single){
							$catname=get_cat_name($cat_single);
							$termname = strtolower($catname);
							$termname = str_replace(' ', '-', $termname);
							$category_link = get_category_link( $cat_single );
							echo '<div role="tabpanel" class="tab-pane" id="'.$termname.'">';
								$result_cat=new WP_Query(array(
									'post_type' => 'post',
									'posts_per_page'=>2,
									'cat'=>$cat_single,
								));
								echo '<table class="table table-condensed archive-table">';
									echo '<tbody>'; 
								while($result_cat->have_posts()): $result_cat->the_post(); ?>
									<tr>
										<td>
											<div class="main_site_single_blog_post">
												<?php
													$slide_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'archive-thumb' );
													if(!empty($slide_image)){
														echo '<img src="'.$slide_image[0].'" >';
														echo '<p>'.get_the_date('j F Y').'</p>'; 
													}else{
														echo '<img src="'.get_template_directory_uri().'/img/defult.jpg" alt="" />';
														echo '<p>'.get_the_date('j F Y').'</p>'; 
													}
												?>
											</div>
										</td> 
										<td> 
											<b><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></b>
											<?php
											$readmore='<a class="readmore" href="'.get_permalink().'">(Read more)</a>';
											echo '<p>'.wp_trim_words(get_the_content(), 30, $readmore).'</p>';
											?>
										</td> 	
									</tr>
								<?php endwhile;
									echo '</tbody>';
								echo '</table>';
								echo '<a href="'.esc_url( $category_link ).'">All '.$catname.'</a>';
							echo '</div>';
						}
						}
						echo '</div>';
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			