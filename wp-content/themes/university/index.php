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
					<h4 class="custom_breadcrump">
						<?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>
					</h4>
					<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12">
							<div class="depart_blog">
								<?php
								while(have_posts()): the_post(); ?>
								<div class="media">
									<div class="media-left">
										<a href="#">
										<img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 155px; height: 75px;" src="<?php $slide_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $slide_image[0]; ?>" data-holder-rendered="true">
										</a>
									</div>
									<div class="media-body department_blog_heading">
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<ul>
											<li><a href=""><i class="fa fa-calendar-check-o"></i></a></li>
											<li><a href="<?php the_permalink(); ?>">Publish:<?php echo get_the_date('j,F Y'); ?></a></li>
										</ul>
										<?php
										$readmore='<a class="readmore" href="'.get_permalink().'">Read More</a>';
										echo '<p>'.wp_trim_words(get_the_content(), 30, $readmore).'</p>';
										?>
									</div>
								</div>
								<?php endwhile;
								?>	
								<div class="pagi">
									<?php
									the_posts_pagination(array(
										'prev_text' => __('Previous', ''),
										'next_text' => __('Next', ''),
										'screen_reader_text' => ' ',
										'before_page_number' => '<b>',
										'after_page_number' => '</b>',
									));
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			
