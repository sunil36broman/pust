<?php
/*
Template Name:Department research area
*/
get_header(); the_post();?>
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
					<h5 class="custom_breadcrump"><?php if (function_exists('wordpress_breadcrumbs')) wordpress_breadcrumbs(); ?></h5>
					<h4><?php the_title(); ?></h4>
					<?php the_content(); ?> 
					<?php
						$taxonomyName = "publicationarea";
						$parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false));   
						echo '<ul>';
						foreach ($parent_terms as $pterm) {
						echo '<li><i class="fa fa-caret-right"></i><a href="' . get_term_link( $pterm->name, $taxonomyName ) . '">'.$pterm->name .'</a></li>';
						}
						echo '</ul>';
					?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>			