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
					<div class="page_des_new">
						
							<?php 
							$slide_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
							$slide_image_url=$slide_image[0];
							if(!empty($slide_image_url)){
								echo '<img src="'.$slide_image_url.'">';
							}
							?>
							<h4><?php the_title(); ?></h4>
							<?php
							the_content();
							?>
						
					</div>
					<?php endwhile;
					wp_reset_query();
					?>	
					<?php
					$extra_page_content_for_row_grouping = get_post_meta( get_the_ID(), 'page_content_row_grouping', true );
					if(!empty($extra_page_content_for_row_grouping)){
						foreach ( (array) $extra_page_content_for_row_grouping as $single_grouping ) {
							echo '<div class="extra_single_page_content">';
								$grouping_tile=$single_grouping['page_content_row_grouping_title'];
								$grouping_description=$single_grouping['page_content_row_grouping_description'];
								$grouping_images=$single_grouping['page_content_row_grouping_image'];
								if($grouping_tile != ''){
									echo '<h5>'.$grouping_tile.'</h5>';
								}
								if($grouping_images != NULL){
									foreach ( (array) $grouping_images as $grouping_images_id => $grouping_image_url ) {
									echo '<img class="extra_page_images" src="'.$grouping_image_url.'" />';
									}
								}
								if($grouping_description != ''){
									echo '<p>'.$grouping_description.'</p>';
								}	
								
							echo '</div>';	
						}
					}	
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			