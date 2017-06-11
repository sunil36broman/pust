<?php
/*
Template Name:syllabus template
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
					<div class="panel-group" id="accordion">
						<?php
						$cat_args = array (
							'taxonomy' => 'syllabus-category',
						);
						$categories = get_terms($cat_args);
						
						foreach($categories as $category){
							$cat_query = null;
							$args = array (
							'post_type' => 'syllabus',
							'syllabus-category' => $category->name,
							'posts_per_page' => 5
							);
							$termname = strtolower($category->slug);
							$termname = str_replace(' ', '-', $termname);
							$cat_query = new WP_Query($args);
							if($cat_query->have_posts()){
								echo '<div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">';
								echo '<a data-toggle="collapse" data-parent="#accordion" href="#'.$termname.'" >'. $category->name .'</a>';
								echo '</h4></div>';
								echo '<div id="'.$termname.'" class="panel-collapse collapse"><div class="panel-body">';	
								echo '<table class="table table-bordered table-striped bs-events-table">'; 
									echo '<thead><tr><th>Session</th><th>Show</th><th>Download</th></tr></thead><tbody>'; 
									while ( $cat_query->have_posts() ) : $cat_query->the_post(); 
									?>
										<tr> 
											<td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
											<td>
											<?php
											$publish_files = get_post_meta(get_the_ID(), 'syllabus_files_idd', true);
											foreach ( (array) $publish_files as $attachment_id => $attachment_url ) {
											echo '<code><a href="'.$attachment_url.'">show</a></code>'; 
											}
											?>
											</td>
											<td>
											<?php
											$publish_files = get_post_meta(get_the_ID(), 'syllabus_files_idd', true);
											foreach ( (array) $publish_files as $attachment_id => $attachment_url ) {
											echo '<code><a href="'.$attachment_url.'" class="bb" download>download</a></code>'; 
											}
											?>
											</td>
										</tr>		
									<?php endwhile;
									echo '</tbody>';
									echo '</table>';
									echo "<a class=\"single_category_show\" href=\"".get_term_link( $category )."\">All syllabus</a>";
									echo '</div></div>';
								echo '</div>';
							}
						wp_reset_postdata();
						
						}
						?>
							</div>	
						</div>
				    </div>
			    </div>
		    </div>
		</div>
<?php get_footer(); ?>			
