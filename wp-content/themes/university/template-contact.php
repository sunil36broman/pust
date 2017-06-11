<?php
/*
Template Name:Contact template
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
					<div class="panel-group" id="accordion">
						<?php
						global $wpdb;
						$blogs = $wpdb->get_results("SELECT blog_id,domain,path,mature FROM wp_blogs ORDER BY blog_id");
						$users = array();
						$result="";
						foreach($blogs as $single_blog_value){
							$blog_details = get_blog_details($single_blog_value->blog_id);
							$blog_name = $blog_details->blogname;
							if($single_blog_value->blog_id == 1){
								$blog_name="Administration info";
							}
							
							$blog_details->siteurl;
							$termname = strtolower($blog_details->blogname);
							$termname = str_replace(' ', '-', $termname);
							
							$result .= '<div class="panel panel-default">';
							$result .= '<div class="panel-heading"><h4 class="panel-title">';
							$result .= '<a data-toggle="collapse" data-parent="#accordion" href="#'.$termname.'" >'. $blog_name .'</a>';
							$result .= '</h4></div>';
							$result .= '<div id="'.$termname.'" class="panel-collapse collapse"><div class="panel-body">';
							$args  = array(
								'blog_id' => $single_blog_value->blog_id,
								'orderby' => 'ID',
								'fields' => 'all',
								'order'   => 'ASC',
							);
							$wp_user_query = new WP_User_Query($args);
							$result .= '<table class="table table-bordered table-striped bs-events-table">'; 
							$result .= '<thead><tr><th>Name</th><th>Designation</th><th>Email</th><th>Contact Number</th></tr></thead><tbody>'; 
								foreach($wp_user_query->results as $indivisual_blog_user){
									$result .= '<tr>';
											$result .= '<td>'.$indivisual_blog_user->display_name .'</td>';
											$result .= '<td>'.get_the_author_meta('designation', $indivisual_blog_user->ID) .'</td>';
											$result .= '<td>'.$indivisual_blog_user->user_email .'</td>';
											$result .= '<td>'.get_the_author_meta('contactnumber', $indivisual_blog_user->ID) .'</td>';
									$result .= '</tr>'; 
								}
								$result .= '</tbody>';
							$result .= '</table>';
							$result .= '</div>';
							$result .= '</div>';
							$result .= '</div>';
						}
						echo $result;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>			