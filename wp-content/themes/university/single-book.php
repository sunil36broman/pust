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
							while(have_posts()):  the_post(); ?>
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
					?>							
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>			