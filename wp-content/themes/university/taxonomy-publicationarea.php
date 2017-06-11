<?php get_header();?>
<?php
// get the currently queried taxonomy term, for use later in the template file
$publicationarea = get_queried_object();
?>
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
					<h5 class="custom_breadcrump2">
						<ul>
						<?php
						$home = get_bloginfo('url');
						echo '<li><a href="'.$home.'"><i class="fa fa-home"></i></a></li>';
						$term = get_term_by("slug", get_query_var("term"), get_query_var("taxonomy") );
						$tmpTerm = $term;
						$tmpCrumbs = array();
						while ($tmpTerm->parent > 0){
							$tmpTerm = get_term($tmpTerm->parent, get_query_var("taxonomy"));
							$crumb = '<li>&raquo;<a href="' . get_term_link($tmpTerm, get_query_var('taxonomy')) . '">' . $tmpTerm->name . '</a></li>';
							array_push($tmpCrumbs, $crumb);
						}
						echo implode('', array_reverse($tmpCrumbs));
						echo '<li>&raquo;<a href="' . get_term_link($tmpTerm, get_query_var('taxonomy')) . '">' . $term->name . '</a></li>';
						?>
						</ul>
					</h5>
					<h4 style="margin-top:0px"><?php echo $publicationarea->name; ?></h4>
					<?php
						$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
						$parent = get_term($term->parent, get_query_var('taxonomy') );
						$children = get_term_children($term->term_id, get_query_var('taxonomy'));
						if (!is_single()) {
							if (!$parent->term_id && sizeof($children) > 0) {
								echo'<h5><strong>Research Fields</strong></h5>';
								$args = array(
									'child_of' => $term->term_id,
									'taxonomy' => $term->taxonomy,
									'hide_empty' => 1,
									'hierarchical' => true,
									'depth'  => 1,
									'title_li' => ''
									);
									?>
							<ul class="area_field"> <?php  wp_list_categories( $args ); ?></ul>
							<?php
							}
						}
					?>
					<?php 
						$terms = get_terms( 'publicationcat', array(
						'hide_empty' => 0,
						'orderby'  => 'ID', 
						'order' => 'ASC',
						) );
					?>
					<?php
					foreach( $terms as $term ) {
						$args = array(
							'post_type' => 'publication',
							'publicationcat' => $term->slug,
							'publicationarea' => $publicationarea->slug
						);
						$query = new WP_Query( $args );
						 
						//if( $query->have_posts() ) {
							$category_link = get_category_link( $term );
							echo'<h5><strong>' . $term->name . '</strong></h5>';
							echo '<table class="table table-bordered table-striped bs-events-table researcharea_list">';
							echo '<tbody>';
							
							while ( $query->have_posts() ) : $query->the_post(); ?>
								<tr> 
									<td>
									<?php
									$result="";
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
									echo $result;
									?>
									</td>
								</tr>
							<?php endwhile;
							echo '</tbody>';
							echo '</table>';
						//}
						wp_reset_postdata();
					} 
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			
