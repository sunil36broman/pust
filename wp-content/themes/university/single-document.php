<?php get_header();?>

<div class="slider2_area">
	<div class="container">
		<div class="row department_background_content">
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="dep_side">
					<?php get_sidebar(); ?>
					<?php 
					global $wp_query;
					$thePostID = $wp_query->post->ID;
					$postdata = get_post($thePostID, ARRAY_A);
					$authorID = $postdata['post_author'];
					?>
					<?php
					$cat_query = null;
					$args = array (
						'post_type' => 'document',
						'author' => $authorID
					);
					$cat_query = new WP_Query( $args );
					if ( $cat_query->have_posts() ) {
					echo '<span class="teacher_name_for_document"><b>'.get_the_author_meta('first_name', $authorID).' '.get_the_author_meta('last_name', $authorID).'</b></span>';
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
													'author' => $authorID
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
												'author' => $authorID
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
					<h5 class="custom_breadcrump">
					<?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>
					</h5>
					<?php
					while(have_posts()): the_post(); ?>
						<h4><?php the_title(); ?></h4>
						Publish:<?php echo get_the_date('j,F Y');?></a><br>
						Publish By: <?php echo $author = get_the_author(); ?></br>
						<?php
						the_content();
						?>
						<?php
						$publish_files = get_post_meta(get_the_ID(), 'document_files_id', true);
						if(!empty($publish_files)){
							foreach ( (array) $publish_files as $attachment_id => $attachment_url ) {
							echo '<code><a href="'.$attachment_url.'" class="bb" download>download</a></code></br>'; 
							}
						}
						$publish_files = get_post_meta(get_the_ID(), 'other_link_id_for_document', true);
						if(!empty($publish_files)){
							foreach ( (array) $publish_files as $attachment_id => $attachment_url ) {
							echo '<b>Link:</b>'.$attachment_url; 
							}
						}
						?>
					<?php endwhile;
					?>	
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			
