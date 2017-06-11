<?php
/*
Template Name:All Department research area
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
					<div class="panel-group" id="accordion">
						<?php
							global $wpdb;
							$blogs = $wpdb->get_results("SELECT blog_id FROM wp_blogs where blog_id > 1 ORDER BY blog_id");
							$result="";
							foreach ($blogs AS $blog) {
								switch_to_blog($blog->blog_id);
								$blog_details = get_blog_details($blog->blog_id);
								$termname = strtolower($blog_details->blogname);
								$termname = str_replace(' ', '-', $termname);
								
								$result .= '<div class="panel panel-default">';
								$result .= '<div class="panel-heading"><h4 class="panel-title">';
								$result .= '<a data-toggle="collapse" data-parent="#accordion" href="#'.$termname.'" >Research areas of '. $blog_details->blogname .'</a>';
								$result .= '</h4></div>';
								$result .= '<div id="'.$termname.'" class="panel-collapse collapse"><div class="panel-body">';
								
								$taxonomyName = "publicationarea";
								$parent_terms = get_terms($taxonomyName, array('parent' => 0, 'orderby' => 'slug', 'hide_empty' => false)); 
								$result .= '<ul class="all_research_area">';
								foreach($parent_terms as $pterm) :
									setup_postdata($post);
									$result .='<li><i class="fa fa-caret-right"></i><a href="' . get_term_link( $pterm->name, $taxonomyName ) . '">'.$pterm->name .'</a><li>';
								endforeach;
								$result .= '</ul>';
								$result .= '</div>';
								$result .= '</div>';
								$result .= '</div>';
							restore_current_blog();
							}
                            echo $result;							
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>			