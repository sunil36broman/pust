<?php get_header();?>
<?php
    $author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
<div class="slider2_area">
	<div class="container">
		<div class="row department_background_content">
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="dep_side">
					<?php get_sidebar(); ?>
					<?php
					$cat_query = null;
					$args = array (
						'post_type' => 'document',
						'author' => $author->ID
					);
					$cat_query = new WP_Query( $args );
					if ( $cat_query->have_posts() ) {
					echo '<span class="teacher_name_for_document"><b>'.get_the_author_meta('first_name', $author->ID).' '.get_the_author_meta('last_name', $author->ID).'</b></span>';
					?>
					<div class="panel-group" id="accordion2">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#document">Documents</a></h4>
							</div>
							<div id="document" class="panel-collapse collapse">
								<div class="panel-body">
								<?php
									$cat_args = array (
									  'taxonomy' => 'documentcat',
									);
									$categories = get_categories ( $cat_args );
									if(!empty($categories)){
										echo '<div class="panel-group" id="accordion2">';
										foreach ( $categories as $category ) {
											$cat_query = null;
											$args = array (
												'post_type' => 'document',
												'documentcat' => $category->slug,
												'author' => $author->ID
											);
											$cat_query = new WP_Query( $args );
											if ( $cat_query->have_posts() ) {
												$catname = strtolower($category->name);
												$catname = str_replace(' ', '-', $catname);
												echo '<div class="panel panel-sub-default">';
													echo '<div class="panel-heading">';	
														echo '<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#'.$catname.'">'.$category->name .'</a></h4>';
													echo '</div>';	
													echo '<div id="'.$catname.'" class="panel-collapse collapse">';
														echo '<div class="panel-body">';
															echo '<ul class="de_list">';
															while ( $cat_query->have_posts() ) {
																$cat_query->the_post();
																?>
																<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
																<?php
															}
															echo '</ul>';
														echo '</div>';
													echo '</div>';
												echo '</div>';
											}
											wp_reset_postdata();
										}
										echo '</div>';
									}else{
										$cat_query = null;
										$args = array (
											'post_type' => 'document',
											'author' => $author->ID
										);
										$cat_query = new WP_Query( $args );
										if ( $cat_query->have_posts() ) {
											echo '<ul class="de_list">';
												while ( $cat_query->have_posts() ) {
												$cat_query->the_post();
												?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												<?php
												}
											echo '</ul>';
										}
										wp_reset_postdata();	
									}
								?>
								</div>
							</div>
						</div>
					</div>
					<?php
					}
					wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="col-md-9 col-lg-9 col-sm-9">
				<div class="department_right_content">
					<div class="author_det">
						<?php
							$user_blogs = get_blogs_of_user( $author->ID );
							foreach ($user_blogs AS $user_blog) {
								$department=$user_blog->blogname;
								$faculty_name =get_blog_option( $user_blog->userblog_id, 'site_category' );
								if($faculty_name!=""){
								$faculty_name_with_text='Faculty of '.$faculty_name.'<br>';	
								}
							}
							$iii=get_the_author_meta("profile_image", $author->ID, true);
							if(!empty($iii)){
								echo '<div class="author_image_area"><img class="profile_details_img" src="'.$iii.'" alt=""></div>';
							}else{
								echo '<div class="author_image_area"><img class="profile_details_img" src="'.get_template_directory_uri().'/img/profile_image.jpg" alt=""></div>';
							}
							echo '<p>';
							echo '<h5><strong>'.get_the_author_meta('first_name', $author->ID).' '.get_the_author_meta('last_name', $author->ID).'</strong></h5>';
							echo get_the_author_meta('designation', $author->ID).'<br>'. $department .'<br>';
							echo $faculty_name_with_text;
							//check start
							$user_url_new=get_the_author_meta('user_url', $author->ID);
							$description_new=get_the_author_meta('description', $author->ID);
							//check end
							$degree=get_the_author_meta('degree', $author->ID);
							$research=get_the_author_meta('research', $author->ID);
							if($degree!='' || $research!=''){
							echo $degree.'<br>';
								if($research!=''){
								echo 'Research area:'.$research.'<br>'; 	
								}
							}
							$user_email=get_the_author_meta('user_email', $author->ID);
							if($user_email!=''){
								echo '<i class="fa fa-envelope-o"></i>'.$user_email.'<br>';
							}
							$contact_number=get_the_author_meta('contactnumber', $author->ID);
							if($contact_number!=''){
								echo '<img class="weblink" src="'.get_template_directory_uri().'/img/phone.png" alt="" />'.$contact_number.'<br>';
							}
							$persoanl_web_site_link=get_the_author_meta('user_url', $author->ID);
							if($persoanl_web_site_link!=''){
								echo '<img class="weblink" src="'.get_template_directory_uri().'/img/world.png" alt="" /><a href="'.$persoanl_web_site_link.'">Personal Website</a><br>';
							}
							echo '</p>';
							$personal_mess=get_the_author_meta('description', $author->ID);
							if($personal_mess!=''){
								echo '<p><b>Bio:</b></br>';
								echo $personal_mess.'</p>';
							}
							$teaching_titles=get_the_author_meta("teaching_title", $author->ID, true);
							if(!empty($teaching_titles)){
								echo '<p><b>Teaching</b></p>';
								echo '<ul class="teaching_title">';
								foreach($teaching_titles as $single_teaching_title){
									echo '<li><i class="fa fa-caret-right"></i>'.$single_teaching_title.'</li>';
								}
								echo '</ul>';
							}
							$research_interests_titles=get_the_author_meta("research_interests_title", $author->ID, true);
							if(!empty($research_interests_titles)){
								echo '<br><p><b>Research Interests</b></p>';
								echo '<ul class="research_interests">';
								foreach($research_interests_titles as $single_interests_title){
									echo '<li><i class="fa fa-caret-right"></i>'.$single_interests_title.'</li>';
								}
								echo '</ul>';
							}
							?>
						</div>	
						<?php
							$args = array( 
								'post_type' => 'publication',
								'posts_per_page' => -1,
								'author' => $author->ID,
								'orderby' => 'ID',
								'order'   => 'DESC'
							);
							$total_publiction=count_user_posts($author->ID, "publication");
							$loop = new WP_Query( $args );
							$count = $total_publiction;
							if($total_publiction!=0){
								echo '<div class="single_athour_publication_list">';
								echo '<br><p style="border-bottom: 1px dashed #ddd;text-align: center;"><b>Journal Publication (Total '.$total_publiction.')</b></p>';
								while ( $loop->have_posts() ) : $loop->the_post();?>
								<p>
									<?php
										$publish_by = get_post_meta(get_the_ID(), 'publish_by', true);
										$where_publish = get_post_meta(get_the_ID(), 'where_publish', true);
										$wiki_test_textdate_timestamp = get_post_meta(get_the_ID(), 'wiki_test_textdate_timestamp', true);
										$publish_date_format=date("d-m-Y", $wiki_test_textdate_timestamp);
										$publication_link_meta_id = get_post_meta(get_the_ID(), 'publication_link_meta_id', true);
										echo '['.$count.']  '.$publish_by.' " '. get_the_title() . ' " in '.$where_publish.' At '.$publish_date_format.'<br>';
										echo '<b>Available on : </b><br>';
										echo $publication_link_meta_id;
									?>
								</p>
								<?php
								$count--; 
								endwhile;
								echo '</div>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>			