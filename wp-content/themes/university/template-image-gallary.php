<?php 
/*
Template Name: Gallery template
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
					<div id="primary">
						<div id="content" role="main">
							<?php
							$terms = get_terms("gallerycat");
							$count = count($terms);
							echo '<ul id="portfolio-filter">';
							echo '<li><a href="#all" title="">All</a></li>';
							if ( $count > 0 ){
							foreach ( $terms as $term ) {
								$termname = strtolower($term->name);
								$termname = str_replace(' ', '-', $termname);
									echo '<li><a href="#'.$termname.'" title="" rel="'.$termname.'">'.$term->name.'</a></li>';
								}
							}
							echo "</ul>";
							?>
							<?php 
							$loop = new WP_Query(array('post_type' => 'gallery', 'posts_per_page' => 6));
							$count =0;
							?>
							<div id="portfolio-wrapper">
								<ul id="portfolio-list">
									<?php if ( $loop ) : 
										while ( $loop->have_posts() ) : $loop->the_post(); ?>
											<?php
												$terms = get_the_terms( $post->ID, 'gallerycat' );
												
												if ( $terms && ! is_wp_error( $terms ) ) : 
													$links = array();
													foreach ( $terms as $term ){
														$links[] = $term->name;
													}
													$links = str_replace(' ', '-', $links); 
													$tax = join( " ", $links );  
												else :  
													$tax = '';  
												endif;
											?>
											<li class="portfolio-item <?php echo strtolower($tax); ?> all">
												<div class="thumb">
													<!--
													<a class="thumbnail gallery" href="<?php $slide_image=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $slide_image[0]; ?>">
														<img src="<?php $slide_image=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $slide_image[0]; ?>" />
													</a>
													<p><?php the_title(); ?></p>
													-->
													<?php
														$gallery_images = get_post_meta(get_the_ID(), 'gallery_files_idd', true);
														foreach ( (array) $gallery_images as $attachment_id => $attachment_url ) {
														echo '<a class="thumbnail gallery" href="'.$attachment_url.'">
															<img src="'.$attachment_url.'" />
														</a>';
														}
													?>
												</div>
											</li>
										<?php endwhile;
									else: ?>
										<li class="error-not-found">Sorry, no portfolio entries for while.</li>
									<?php endif; ?>
								</ul>
								<div class="clearboth"></div>
							</div> <!-- end #portfolio-wrapper-->
						</div><!-- #content -->
					</div><!-- #primary -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			
