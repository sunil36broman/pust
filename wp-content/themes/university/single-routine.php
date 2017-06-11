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
					<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12">
							<div class="depart_blog">
								<h5 class="custom_breadcrump">
								<?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>
								</h5>
								<?php
								while(have_posts()): the_post(); ?>
								
										<h4><?php the_title(); ?></h4>
										Publish:<?php echo get_the_date('j,F Y'); ?></a> <?php the_category(', ') ?><br>
										<?php
										the_content();
										?>
										<?php
										$publish_files = get_post_meta(get_the_ID(), 'routine_files_idd', true);
										foreach ( (array) $publish_files as $attachment_id => $attachment_url ) {
										echo '<code><a href="'.$attachment_url.'" class="bb" download>download</a></code>'; 
										}
										?>
									
								<?php endwhile;
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
