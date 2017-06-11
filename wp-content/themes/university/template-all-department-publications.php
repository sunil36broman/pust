<?php
/*
Template Name:All department publications
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
								$result .= '<a data-toggle="collapse" data-parent="#accordion" href="#'.$termname.'" >Publication of '. $blog_details->blogname .'</a>';
								$result .= '</h4></div>';
								$result .= '<div id="'.$termname.'" class="panel-collapse collapse"><div class="panel-body">';
								$args = array( 
									'post_type' => 'publication',
									'posts_per_page' => -1,
								);
								$lastposts = get_posts($args);
								$result .= '<table class="table table-bordered table-striped bs-events-table researcharea_list">';
								$result .= '<tbody>';
								foreach($lastposts as $post) :
									setup_postdata($post);
									$result .='<tr>'; 
									$result .='<td>';
									$result .= '<p>';
									$au=get_the_author();
									$author_switch_url=get_author_posts_url($post->post_author);
									$result .= '<b><a class="publish_own" href="'.$author_switch_url.'">'.$au.'</a></b></br>';
									$publish_by = get_post_meta(get_the_ID(), 'publish_by', true);
									$where_publish = get_post_meta(get_the_ID(), 'where_publish', true);
									$wiki_test_textdate_timestamp = get_post_meta(get_the_ID(), 'wiki_test_textdate_timestamp', true);
									$publish_date_format=date("d-m-Y", $wiki_test_textdate_timestamp);
									$publication_link_meta_id = get_post_meta(get_the_ID(), 'publication_link_meta_id', true);
									$result .= $publish_by.' " '. get_the_title() . ' " in '.$where_publish.' At '.$publish_date_format.'<br>';
									$result .= '<b>Available on : </b><br>';
									$result .= $publication_link_meta_id;
									$result .= '</p>';
									$result .='</td>';
									$result .='</tr>';
								endforeach;
								$result .= '</tbody>';
								$result .= '</table>';
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