<?php
/*
Template Name:book template
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
					<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12">
							<?php
							$args = array(
								'post_type'  		=> 'book',
								'taxonomy'		=> 'bookcat',
								'orderby' 		=> 'ID',
								'hide_empty'    => 0,
								'parent'        =>0,
								'hierarchical'  => 1,
								'order'         => 'ASC',
							);
							$parent_categories = get_categories($args);
							echo '<ul class="par_chi">';
							foreach ( $parent_categories as $parent_category ) {
								echo '<li><a href="' . get_category_link( $parent_category->term_id ) . '">' . $parent_category->name . '</a></li>';
								$argss = array(
									'parent' => $parent_category->term_id,
									'post_type'  => 'book',
									'taxonomy'		=> 'bookcat',
									'hide_empty'=> 0,
									'orderby' => 'ID',
									'order'=> 'ASC',
								);
								$categories = get_categories( $argss );
								echo '<ul class="sub_chi">';
								foreach ( $categories as $category ) {
									echo '<li><a href="'.get_category_link( $category->term_id ) . '">' . $category->name . '</a></li>';
								}
								echo '</ul>';
							}
							echo '</ul>';
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			
