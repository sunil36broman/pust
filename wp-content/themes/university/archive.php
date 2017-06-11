<?php 
/*
Template Name: Archives
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
					<h5 class="custom_breadcrump">
					<?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>
					</h5>
					<h4>
					<?php
						$ff=single_cat_title( '', false );
						echo $ff;
					?>
					</h4>
					<table class="table table-condensed archive-table">
						<tbody> 
							<?php
							while(have_posts()): the_post(); ?>
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
							<?php endwhile;
							?>
						</tbody>
					</table>
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
<?php get_footer(); ?>			