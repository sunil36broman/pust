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
					<h5 class="custom_breadcrump">
						<?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?>
					</h5>
					<?php
					while(have_posts()): the_post(); ?>
						<?php
							$images = get_post_meta(get_the_ID(), 'more_image_in_single_post', true);
							$image_num=count($images);
							
							if(!empty($images)){
							if($image_num == '1'){
									foreach ( $images as $attachment_id) {
										echo '<span class="full_images">';
										echo '<img src='.$attachment_id.' alt="">';
										echo "</span>";
									}
								}
							}
						?>
						<h4><?php the_title(); ?></h4>
						<ul>
							<li>Publish:<?php echo get_the_date('j,F Y'); ?></li>
						</ul>
						<?php
						the_content();
						?>	
						<?php
						if ($image_num > 1) {
							$gallery_images = get_post_meta(get_the_ID(), 'more_image_in_single_post', true);
							foreach ( (array) $gallery_images as $attachment_id => $attachment_url ) {
							echo '<a class="more_link_in_single gallery" href="'.$attachment_url.'">
								<img class="more_image_in_single" src="'.$attachment_url.'" />
								</a>';
							}
						}
						?>
					<?php endwhile;?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			