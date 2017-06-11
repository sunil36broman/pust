<?php 
/*
Template Name: page Catagory Template
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
					<?php
					if ( have_posts() ) :
						while(have_posts()): the_post(); ?>
							<h4><?php the_title(); ?></h4>
							<?php
							$slide_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
							$slide_image_url=$slide_image[0];
							if(!empty($slide_image_url)){
								echo '<img class="parent_page_thum" src="'.$slide_image_url.'">';
							}
							?>
							
							<?php the_content(); ?>
						<?php endwhile;
					endif;
					?>	
					<?php
					$postid = get_the_ID(); 
					?>
					<?php
					query_posts("order=ASC&posts_per_page=-1&post_type=page&post_parent=$postid");
					while(have_posts()): the_post(); ?>
						<h5><a href="<?php the_permalink(); ?>"><i class="fa fa-caret-right"></i><?php the_title(); ?></a></h5>
					<?php endwhile;
					?>	
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			
