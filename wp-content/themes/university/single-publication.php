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
								<?php
								while(have_posts()): the_post(); ?>
								<div class="media">
									<div class="media-body department_blog_heading">
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<ul>
											<li><a href=""><i class="fa fa-calendar-check-o"></i></a></li>
											<li><a href="<?php the_permalink(); ?>">Publish:<?php echo get_the_date('j,F Y'); ?></a> <?php the_category(', ') ?></li>
										</ul>
										<?php
											the_content();
										?>
									</div>
								</div>
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