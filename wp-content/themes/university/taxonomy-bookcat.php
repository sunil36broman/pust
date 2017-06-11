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
					<h5 class="custom_breadcrump2">
						<ul>
							<?php
							$home = get_bloginfo('url');
							echo '<li><a href="'.$home.'"><i class="fa fa-home"></i></a></li>';
							$term = get_term_by("slug", get_query_var("term"), get_query_var("taxonomy") );
							//print "<pre>";
							//print_r($term);
							//print "</pre>";
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
					<h4>
					<?php
							$ff=single_cat_title( '', false );
							echo $ff;
					?>
					</h4>
					<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12">
							<div class="depart_blog">
								<?php
									$term2= get_term_by("slug", get_query_var("term"), get_query_var("taxonomy") );
									$children2 = get_term_children( $term2->term_id, "bookcat" );
									if(empty($children2)){
										$total_book=$term2->count;
										$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
										$argss = array(
											'post_type'       => 'book',
											'orderby'=> 'menu_order',
											'paged'=>$paged,
												'tax_query' => array(
													array(
														'taxonomy' => 'bookcat',
														'field' => 'id',
														'terms' => $term2->term_id
													)
												)
										);
										$queryy=new WP_Query( $argss );
										//echo '<div class="media">';
										//echo '<div class="media-body department_blog_heading">';	
										echo '<table class="table table-bordered table-striped">';
											echo '<thead>'; 
												echo '<tr>'; 
													echo '<th>SL.No</th>';
													echo '<th>Book Title</th>'; 
													echo '<th>Author/Editor</th>';
													echo '<th>Edition</th>';
													echo '<th>AVAILABLE LINK</th>';
													echo '<th>BOOK PDF</th>';
												echo '</tr>';
											echo '</thead>'; 
											echo '<tbody>';
											while($queryy->have_posts()):  $queryy->the_post(); ?>
												<tr> 
													<th scope="row"><?php echo $total_book; ?></th>
													<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td> 
													<td><?php echo get_post_meta(get_the_ID(), 'author_editor_name', true); ?></td>
													<td><?php echo get_post_meta(get_the_ID(), 'edition_id', true); ?></td>
													<td>
													<?php
													$abailable= get_post_meta(get_the_ID(), 'abailable_download_link_id', true);
													echo '<a href="'.$abailable.'">Available</a>';
													?>
													</td>
													<td>
													<?php
													$pdf_book= get_post_meta(get_the_ID(), 'pdf_book_id', true);
													echo '<a href="'.$pdf_book.'" download a>Download</a>';
													?>
													</td>
												</tr> 
												<?php $total_book--; ?>
											<?php endwhile;
												wp_reset_query(); 
											echo '</tbody>'; 
										echo '</table>';
										//echo '</div>';
										//echo '</div>';
										echo '<div class="pagi">';
										the_posts_pagination(array(
											'prev_text' => __('Previous', ''),
											'next_text' => __('Next', ''),
											'screen_reader_text' => ' ',
											'before_page_number' => '<b>',
											'after_page_number' => '</b>',
											));
										echo '</div>';
									} else {
										echo '<div data-example-id="simple-ol" class="bs-example">'; 
										echo '<ol>'; 
											$args23 = array(
											'post_type'  =>'book',
											'taxonomy'=> 'bookcat',
											'parent'  => $term2->term_id,
											);
											$child_in_category = get_categories($args23);
											foreach($child_in_category as $child_singlecat) {
												echo '<li><a href="' . get_category_link( $child_singlecat->term_id ) . '">' . $child_singlecat->name . '</a></li>';
											}
										echo '</ol>';
										echo '</div>';
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			
