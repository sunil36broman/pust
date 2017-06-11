<?php 
/*
Template Name:Main site home template
*/
get_header();?>
<div class="slider11_area">
	<div class="container">
		<div class="row university_main_site_background_content">
			<div class="col-md-12 col-lg-12 col-sm-12">
				<!-- Jssor Slider Begin -->
				<div class="sli">
					<div id="slider1_container" style="position: relative; width:830px;height: 277px; overflow: hidden;">
					<!-- Loading Screen --> 
					<div u="loading" style="position: absolute; top: 0px; left: 0px;">
						<div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
						background-color: #000; top: 0px; left: 0px;width: 100%; height:100%;"> 
						</div> 
						<div style="position: absolute; display: block; background: url(<?php echo get_template_directory_uri(); ?>/img/loading.gif) no-repeat center center;
							top: 0px; left: 0px;width: 100%;height:100%;">
						</div> 
					</div> 
					<!-- Slides Container --> 
					<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 830px; height: 277px;overflow: hidden;">
						 <?php
						 global $post;
						 $args = array( 'posts_per_page' => 5, 'post_type'=> 'slider' );
						 $myposts = get_posts( $args );
						 foreach( $myposts as $post ) : setup_postdata($post); ?>
						 <div>
							<img u="image" src="<?php $slide_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $slide_image[0]; ?>" alt="" title="#<?php the_ID(); ?>"/>
							<a class="captionOrange captiontext" u="caption" t="CLIP|L" d=-300 href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						 </div>
						 <?php endforeach; ?>
					</div> 
					<!-- bullet navigator container -->
					<div u="navigator" class="jssorb03" style="bottom: 16px; right: 6px;">
						<div u="prototype"><div u="numbertemplate"></div></div>
					</div>
					<!-- Arrow Left -->
					<span u="arrowleft" class="jssora20l" style="top: 123px; left: 8px;"></span>
					<!-- Arrow Right -->
					<span u="arrowright" class="jssora20r" style="top: 123px; right: 8px;"></span>
					<!--#endregion Arrow Navigator Skin End -->
					<a style="display: none" href="http://www.jssor.com">Bootstrap Slider</a>
					</div> 
				</div> 
				<!-- Jssor Slider End -->	
			
				<div class="slider_bottom_in_main_site">
					<div class="row" style="margin-left:0px;margin-right:0px;">
						<?php
							$blogs = get_last_updated('',0,1);
							foreach ($blogs AS $blog) {
								switch_to_blog($blog["blog_id"]);
								$args_announcements = array(
									'posts_per_page' =>-1,
									'orderby' => 'modified',
									'post_type' => array('post','admission-info','download'),
									'meta_query' => array(
										array(
										'key' => 'my_meta_box_check_announcements',
										'value' => 'on',
										)
										)
									);
									$lastposts = get_posts($args_announcements);
									if(!empty($lastposts)){
										echo '<div class="col-md-12 col-lg-12 col-sm-12" style="padding-left:0px;padding-right:0px;">';
										   echo '<div class="new_annuncement">';
											echo '<img src="'.get_template_directory_uri().'/img/news.png" alt="" />';											   
												foreach($lastposts as $post) :
												setup_postdata($post);
													?>
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
												<?php
												endforeach;
											echo '</div>';
										echo '</div>';
									}
							restore_current_blog();
							} 
						?>
						<div class="col-md-3 col-lg-3 col-sm-3 col-xs-6" style="padding-left:0px;padding-right:0px;border-right: 1px solid #1482b4;">
							<div class="link_content">
								<?php
								/*page select from reduxframe work*/
								global $redux_demo;
								$page_total=$redux_demo["opt_multi_select_page_iteam"];
								echo '<i class="fa fa-university"></i><ul>';
								//echo '<li>Pust</li>';
								if(!empty($page_total)){
									foreach($page_total as $single_page_id){
										$page_info = get_post($single_page_id); 
										
										echo '<li><a href="'.get_page_link($single_page_id).'">'.$page_info->post_title .'</a></li>';
									}
								}
								echo '</ul>';
								?>
							</div>
						</div>
						<div class="col-md-3 col-lg-3 col-sm-3 col-xs-6" style="padding-left:0px;padding-right:0px;border-right: 1px solid #1482b4;">
							<div class="link_content">
								<?php
									/*page select from reduxframe work*/
									global $redux_demo;
									$page_total=$redux_demo["opt_multi_select_page_iteam2"];
									echo '<i class="fa fa-book"></i><ul>';
									//echo '<li>Research</li>';
									if(!empty($page_total)){
										foreach($page_total as $single_page_id){
											$page_info = get_post($single_page_id); 
											echo '<li><a href="'.get_page_link($single_page_id).'">'.$page_info->post_title .'</a></li>';
										}
									}
									echo '</ul>';
								?>
							</div>
						</div>
						<div class="col-md-3 col-lg-3 col-sm-3 col-xs-6" style="padding-left:0px;padding-right:0px;border-right: 1px solid #1482b4;">
							<div class="link_content">
								<?php
								/*page select from reduxframe work*/
								global $redux_demo;
								$page_total=$redux_demo["opt_multi_select_page_iteam3"];
								echo '<i class="fa fa-graduation-cap"></i><ul>';
								//echo '<li>Students & Staffs</li>';
								if(!empty($page_total)){
									foreach($page_total as $single_page_id){
										$page_info = get_post($single_page_id); 
										echo '<li><a href="'.get_page_link($single_page_id).'">'.$page_info->post_title .'</a></li>';
									}
								}
								echo '</ul>';
								?>
							</div>
						</div>
						<div class="col-md-3 col-lg-3 col-sm-3 col-xs-6" style="padding-left:0px;padding-right:0px;">
							<div class="link_content">
								<?php
								/*page select from reduxframe work*/
								global $redux_demo;
								$page_total=$redux_demo["opt_multi_select_page_iteam4"];
								echo '<i class="fa fa-history"></i><ul>';
								//echo '<li>Facilities</li>';
								if(!empty($page_total)){
									foreach($page_total as $single_page_id){
										$page_info = get_post($single_page_id); 
										echo '<li><a href="'.get_page_link($single_page_id).'">'.$page_info->post_title .'</a></li>';
									}
								}
								echo '</ul>';
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="content_footer">
					<div class="row">
						<div class="col-md-8 col-lg-8 col-sm-8">
							<div class="link_2nd_tab_content">
								<?php
									global $redux_demo;
									$cat_total=$redux_demo["opt_multi_select_cat_iteam"];
									echo '<ul class="nav nav-tabs" role="tablist" id="myTab">';
									foreach($cat_total as $cat_single){
										$catname=get_cat_name($cat_single);
										$termname = strtolower($catname);
										$termname = str_replace(' ', '-', $termname);
										 echo '<li role="presentation"><a href="#'.$termname.'" aria-controls="'.$termname.'" role="tab" data-toggle="tab">'.$catname.'</a></li>';
									}
									echo '</ul>';
								?>	
								<?php
									global $redux_demo;
									$cat_total=$redux_demo["opt_multi_select_cat_iteam"];
									echo '<div class="tab-content">';
									foreach($cat_total as $cat_single){
										$catname=get_cat_name($cat_single);
										
										$termname = strtolower($catname);
										$termname = str_replace(' ', '-', $termname);
										$category_link = get_category_link( $cat_single );
										echo '<div role="tabpanel" class="tab-pane" id="'.$termname.'">';
										$blogs = get_last_updated('',0,2);
										foreach ($blogs AS $blog) {
											switch_to_blog($blog["blog_id"]);
											if($blog["blog_id"]==1){
												$other_network=array(
													'post_type' => 'post',
													'posts_per_page'=>2,
													'category_name'=>$catname,
													'orderby' => 'modified',
													'order'   => 'DESC',
													
												);
											}else{
												$other_network=array(
													'post_type' => 'post',
													'posts_per_page'=>1,
													'category_name'=>$catname,
													'orderby' => 'modified',
													'order'   => 'DESC',
													'meta_query' => array(
														array(
															'key' => 'my_meta_box_check',
															'value' => 'on',
														)
													)
												);
											}
											$result_cat=new WP_Query($other_network);
											echo '<table class="table table-condensed archive-table">';
												echo '<tbody>'; 
											while($result_cat->have_posts()): $result_cat->the_post();?>
												<tr>
													<td>
														<div class="main_site_single_blog_post">
															<?php
																$images = get_post_meta(get_the_ID(), 'more_image_in_single_post', true);
																$image_num=count($images);
																if ($images != 0) {
																	$i=0;
																	foreach ($images as $attachment_id) {
																		if($i == 0){
																		echo '<img src='.$attachment_id.' alt="">';
																		echo '<p>'.get_the_date('j F Y').'</p>'; 
																		}
																		$i++;
																	}
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
											<?php 
											endwhile;
											echo '</tbody>';
											echo '</table>';
											restore_current_blog();	
										}	
										echo '<a href="'.esc_url( $category_link ).'">All '.$catname.'</a>';
										echo '</div>';
									
									}
									echo '</div>';
								?>
							</div>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-4">
							<div class="total_pro">
								<?php
									global $redux_demo;
									$message_page_id=$redux_demo["main_vice_or_chairman_page_selection"];
									$message_page_info = get_post($message_page_id); 
									$message_page_link=get_page_link($message_page_id);
									$message_page_title=$message_page_info->post_title;
									$message_page_description=$message_page_info->post_content;
									echo '<p class="vi-message"><b>'.$message_page_title.'</b></p>';
											$entries = get_post_meta( $message_page_id, 'wiki_test_repeat_group', true );
											$member_result="";
											if(!empty($entries)){
												foreach ( (array) $entries as $entry ) {
													$id_of_user=$entry['user_select_for_designation'];
													$auth = get_userdata($id_of_user);
													$blog_details = get_blog_details($auth->primary_blog);
													$user_blogs = get_blogs_of_user($id_of_user);
													foreach ($user_blogs AS $user_blog) {
														switch_to_blog($user_blog->userblog_id);
														$author_switch_url=get_author_posts_url($id_of_user);
													}
													restore_current_blog();
													$link=get_author_posts_url($id_of_user);
													$iii=get_the_author_meta("profile_image", $id_of_user, true);
													if(!empty($iii)){
														$member_result .= '<div class="vice_chair_message">
														<a href="'.$author_switch_url.'"><img src="'.$iii.'" alt=""></a>
														';
													}else{
														$member_result .= '<div class="vice_chair_message">
														<a href="'.$author_switch_url.'"><img src="'.get_template_directory_uri().'/img/profile_image.jpg" alt=""></a>
														';
													}
													$member_result .= '<p>';
													if($entry['group_designation']==''){
														$member_result .= '<b>'.get_the_author_meta('designation', $id_of_user).'</b></br>';
												    }else{
													$member_result .= '<b>'.$group_designation = esc_html($entry['group_designation']).'</b></br>';
												    }
													$member_result .= get_the_author_meta('first_name', $id_of_user).' '.get_the_author_meta('last_name', $id_of_user);
													$member_result .= '</p>';
													
													$member_result .= '</div>';
												}
											}
											echo $member_result;
										$readmore='<a class="readmore" href="'.$message_page_link.'">Read More</a>';
										echo '<p>'.wp_trim_words($message_page_description, 55, $readmore).'</p>';	
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>			