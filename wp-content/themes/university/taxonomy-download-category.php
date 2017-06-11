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
							<h4 style="margin-top: 0px;">
								<?php
										$ff=single_cat_title( '', false );
										echo $ff;
								?>
							</h4>
							<div class="downloadcat">
								<?php
								echo '<table class="table table-bordered table-striped bs-events-table">'; 
									echo '<thead>'; 
										echo '<tr>'; 
											echo '<th>Title</th>';
											echo '<th>Show</th>';
											echo '<th>Download</th>';
										echo '</tr>';
										echo '</thead>'; 
										echo '<tbody>';
										while(have_posts()): the_post();
										?>
										<tr> 
											<td><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></td>
											<td>
											<?php
											$publish_files = get_post_meta(get_the_ID(), 'download_files_idd', true);
											foreach ( (array) $publish_files as $attachment_id => $attachment_url ) {
												echo '<code><a href="'.$attachment_url.'">show</a></code>'; 
											}
											?>
											</td>
											<td>
											<?php
											$publish_files = get_post_meta(get_the_ID(), 'download_files_idd', true);
											foreach ( (array) $publish_files as $attachment_id => $attachment_url ) {
												echo '<code><a href="'.$attachment_url.'" class="bb" download>download</a></code>'; 
											}
											?>
											</td>
										</tr>
										<?php endwhile;
										wp_reset_postdata();
										echo '</tbody>';
								echo '</table>';
								?>	
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
</div>
<?php get_footer(); ?>			