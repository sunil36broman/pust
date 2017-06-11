
	<?php
	if (is_main_site()) {?>
		<div class="sidebar_all_page_menu">
			<?php
			/*
			$outputt="";
			$titlenamer="";
			//$output = wp_list_pages('echo=0&depth=1&title_li=<h4><a href="'.home_url().'">Home</a></h4>' );
			if (is_page( )) {
				$page = $post->ID;
				
				if ($post->post_parent) {
				$page = $post->post_parent;
				}
				
				$titlenamer = get_the_title($post->post_parent);
				$children=wp_list_pages( 'echo=0&child_of=' . $page . '&title_li=' );
				
				if ($children) {
					$outputt = wp_list_pages ('echo=0&child_of=' . $page . '&title_li='.'<h4>'.$titlenamer.'</h4>'.'');
				}
				if(!empty($outputt)){
					echo '<ul class="sidebar_all_chield_page_list">'.$outputt.'</ul>';
				}
			}
			*/
			/*
			$term = get_term_by("slug", get_query_var("term"), get_query_var("taxonomy") );
			$post_categories = get_the_category( $post->ID );
			print_r($term);
			*/
			/*
			$post = &get_post($post->ID);
			$post_type = $post->post_type;
			$taxonomies = get_object_taxonomies($post_type);
			$out = '<ul>';
			foreach ($taxonomies as $taxonomy) {  
				$cat_args = array (
					'taxonomy' => $taxonomy,
				);
				$categories = get_terms($cat_args);
				foreach($categories as $category){
				$out .= "<li>";
				$out .= '<a href="' .get_term_link( $category ) .'">'.$category->name.'</a> ';
				$out .= "</li>";
				}
			}
			$out .= "</ul>";
			echo $out;
			
			if (is_page( )) {
				$page = $post->ID;
				if ($post->post_parent) {
					$page = $post->post_parent;
				}
				
				echo $titlenamer = get_the_title($post->post_parent)."<br>";
				$template_name=get_post_meta( $post->ID, '_wp_page_template', true );
				
				if($template_name=="template-download.php"){
					$cat_args = array (
					'taxonomy' => 'download-category',
					);
					$categories = get_terms($cat_args);
					foreach($categories as $category){
						echo '<a href="'.get_term_link( $category ).'">'.$category->name .'</a>';
					}
				}
				
				$children = get_pages(array( 'child_of' => $page, 'sort_column' => 'menu_order'));
				if( count( $children ) != 0 ){
					$args   = array( 'child_of' => $page, 'sort_column' => 'menu_order','parent'=>$page);
					$pages  = get_pages($args);
					if ( $pages ) {
						$pageids = array();
						$pagetem = array();
						foreach ( $pages as $page2 ) {
							$pageids[] = $page2->ID;
							echo '<a href="'.get_page_link($page2->ID).'">'.$page2->post_title .'</a><br>';
							$pagetem[$page2->ID] = get_post_meta( $page2->ID, '_wp_page_template', true );
						}
					}
					foreach($pagetem as $key=>$single_pageid){
						if($single_pageid=="template-admission.php"){
							$cat_args = array (
							'taxonomy' => 'admission-category',
							);
							$categories = get_terms($cat_args);
							foreach($categories as $category){
								echo '<a href="'.get_term_link( $category ).'">'.$category->name .'</a>';
							}
						}elseif($single_pageid=="template-download.php"){
							$cat_args = array (
							'taxonomy' => 'download-category',
							);
							$categories = get_terms($cat_args);
							foreach($categories as $category){
								echo '<a href="'.get_term_link( $category ).'">'.$category->name .'</a>';
							}
						}else{
							
						}
					}
				}
			}
			*/
			
			$post = &get_post($post->ID);
			$post_type = $post->post_type;
			$taxonomies = get_object_taxonomies($post_type);
			if(!empty($taxonomies)){
				echo '<ul class="sidebar_item_list">';
				foreach ($taxonomies as $taxonomy) {  
					$cat_args = array (
						'taxonomy' => $taxonomy,
					);
					$categories = get_terms($cat_args);
					foreach($categories as $category){
						$each_cat 	= $category->term_id;
						$current_cat=$wp_query->get_queried_object_id();
						if($each_cat==$current_cat){
							echo '<li class="current_page_item"><a href="' .get_term_link( $category ) .'">'.$category->name .'</a></li>';	
						}else{
							echo '<li><a href="' .get_term_link( $category ) .'">'.$category->name .'</a></li>';
						}
						
					}
				}
				echo '</ul>';
			}
			
			
			if (is_page()) {
				echo '<ul class="sidebar_item_list">';
				$page = $post->ID;
				if ($post->post_parent) {
					$page = $post->post_parent;
				}
				$postid  = $page;
				$current = get_the_ID();
				if($postid==$current){
				echo '<li class="current_page_item"><a href="'.get_page_link($post->post_parent).'">'.get_the_title($post->post_parent).'</a></li>';
				}else{
				echo '<li><a href="'.get_page_link($post->post_parent).'">'.get_the_title($post->post_parent).'</a></li>';	
				}
				$template_name=get_post_meta( $post->ID, '_wp_page_template', true );
				
				if($template_name=="template-download.php"){
					$cat_args = array (
					'taxonomy' => 'download-category',
					);
					$categories = get_terms($cat_args);
					foreach($categories as $category){
						echo '<li><a href="'.get_term_link( $category ).'">'.$category->name .'</a></li>';
					}
				}
				
				
				$children = get_pages(array( 'child_of' => $page, 'sort_column' => 'menu_order'));
				if( count( $children ) != 0 ){
					$args   = array( 'child_of' => $page, 'sort_column' => 'menu_order','parent'=>$page);
					$pages  = get_pages($args);
					if ( $pages ) {
						$pagetem = array();
						foreach ( $pages as $page2 ) {
							$postid  = $page2->ID;
							$current = get_the_ID();
							if($postid==$current){
								echo '<li class="current_page_item"><a href="'.get_page_link($page2->ID).'">'.$page2->post_title .'</a>';
							}else{
								echo '<li ><a href="'.get_page_link($page2->ID).'">'.$page2->post_title .'</a>';
							}
							
							
							$args2  = array( 'child_of' => $page2->ID, 'sort_column' => 'menu_order');
							$gra_children  = get_pages($args2);
							
							
							$page_template = get_post_meta( $page2->ID, '_wp_page_template', true );
							if($page_template == "template-admission.php"){
								$cat_args = array (
								'taxonomy' => 'admission-category',
								);
								$categories = get_terms($cat_args);
								echo '<ul class="sub_category_item">';
								foreach($categories as $category){
									
									echo '<li><a href="'.get_term_link( $category ).'">'.$category->name .'</a></li>';
								}
								echo '</ul></li>';
							}elseif($page_template=="template-download.php"){
								$cat_args = array (
								'taxonomy' => 'download-category',
								);
								echo '<ul class="sub_category_item">';
								$categories = get_terms($cat_args);
								foreach($categories as $category){
									echo '<li><a href="'.get_term_link( $category ).'">'.$category->name .'</a></li>';
								}
								echo '</ul></li>';
							}elseif($gra_children){
								echo '<ul class="sub_category_item">';
								foreach ( $gra_children as $single_gra_children ){
									echo '<li ><a href="'.get_page_link($single_gra_children->ID).'">'.$single_gra_children->post_title .'</a>';
								}
								echo '</ul></li>';
							}else{
								echo '</li>';
							}
						}
					}
				}
				echo '</ul>';
			}
			?>	
		</div>
		<div class="list-group">
			<?php 
			wp_nav_menu(array(
				'theme_location' => 'sidebar_menu_two',
				'menu_class' => 'sidebar_menu_class',
				'menu_id' => 'any_id_for_ul',
				'container' => ' ',
				'fallback_cb' => 'default_side_menu_two',
				)); 
			?>
		</div>
	<?php	 
	}else{?>
		<div class="only-sidebar-border panel-group" id="accordion1">
			<div class="panel panel-default">
				<div class="sidebar_all_page_menu">
				<?php
					$outputt="";
					$titlenamer="";
					$output = wp_list_pages('echo=0&depth=1&title_li=<h4><a href="'.home_url().'">Home</a></h4>' );
					if (is_page( )) {
						$page = $post->ID;
						if ($post->post_parent) {
						$page = $post->post_parent;
						}
						$titlenamer = get_the_title($post->post_parent);
						$children=wp_list_pages( 'echo=0&child_of=' . $page . '&title_li=' );
						if ($children) {
							$outputt = wp_list_pages ('echo=0&child_of=' . $page . '&title_li='.'<h4>'.$titlenamer.'</h4>'.'');
						}
						if(!empty($outputt)){
							echo '<ul class="sidebar_all_chield_page_list">'.$outputt.'</ul>';
						}
					}
				?>	
				</div>
				<?php
					/*page select from reduxframe work*/
					global $redux_demo;
					$page_total=$redux_demo["opt_multi_select_page_iteam"];
					if(!empty($page_total)){
						$total=count($page_total);
						$total_vari=$total;
						foreach($page_total as $single_page_id){
							$page_info = get_post($single_page_id); 
							$pagename = strtolower($page_info->post_title);
							$pagename = str_replace(' ', '-', $pagename);
							if($total_vari==$total){
							echo '<div class="panel-heading">';
								echo '<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#'.$pagename.'">'.$page_info->post_title .'</a></h4>';
							echo '</div>';
							echo '<div id="'.$pagename.'" class="panel-collapse collapse">';
								echo '<div class="panel-body">';
								echo '<ul class="de_list">';
							}else{
								echo '<li><a href="'.get_page_link($single_page_id).'">'.$page_info->post_title .'</a></li>';
							}
							$total_vari--;
						}
							echo '</ul>';	
							echo '</div>';
						echo '</div>';
					}
				?>
			</div>
		
			<div class="panel panel-default">
				<?php
				/*page select from reduxframe work*/
				global $redux_demo;
				$page_total=$redux_demo["opt_multi_select_page_iteam2"];
				if(!empty($page_total)){
					$total=count($page_total);
					$total_vari=$total;
					foreach($page_total as $single_page_id){
						$page_info = get_post($single_page_id); 
						$pagename = strtolower($page_info->post_title);
						$pagename = str_replace(' ', '-', $pagename);
						if($total_vari==$total){
						echo '<div class="panel-heading">';
							echo '<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#'.$pagename.'">'.$page_info->post_title .'</a></h4>';
						echo '</div>';
						echo '<div id="'.$pagename.'" class="panel-collapse collapse">';
							echo '<div class="panel-body">';
							echo '<ul class="de_list">';
						}else{
							echo '<li><a href="'.get_page_link($single_page_id).'">'.$page_info->post_title .'</a></li>';
						}
						$total_vari--;
					}
						echo '</ul>';	
						echo '</div>';
					echo '</div>';
				}
				?>
			</div>
		
			<div class="panel panel-default">
				<?php
				/*page select from reduxframe work*/
				global $redux_demo;
				$page_total=$redux_demo["opt_multi_select_page_iteam3"];
				if(!empty($page_total)){
					$total=count($page_total);
					$total_vari=$total;
					foreach($page_total as $single_page_id){
						$page_info = get_post($single_page_id); 
						$pagename = strtolower($page_info->post_title);
						$pagename = str_replace(' ', '-', $pagename);
						if($total_vari==$total){
						echo '<div class="panel-heading">';
							echo '<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#'.$pagename.'">'.$page_info->post_title .'</a></h4>';
						echo '</div>';
						echo '<div id="'.$pagename.'" class="panel-collapse collapse">';
							echo '<div class="panel-body">';
							echo '<ul class="de_list">';
						}else{
							echo '<li><a href="'.get_page_link($single_page_id).'">'.$page_info->post_title .'</a></li>';
						}
						$total_vari--;
					}
						echo '</ul>';	
						echo '</div>';
					echo '</div>';
				}
				?>
			</div>
		
			<div class="panel panel-default">
				<?php
				/*page select from reduxframe work*/
				global $redux_demo;
				$page_total=$redux_demo["opt_multi_select_page_iteam4"];
				if(!empty($page_total)){
					$total=count($page_total);
					$total_vari=$total;
					foreach($page_total as $single_page_id){
						$page_info = get_post($single_page_id); 
						$pagename = strtolower($page_info->post_title);
						$pagename = str_replace(' ', '-', $pagename);
						if($total_vari==$total){
						echo '<div class="panel-heading">';
							echo '<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#'.$pagename.'">'.$page_info->post_title .'</a></h4>';
						echo '</div>';
						echo '<div id="'.$pagename.'" class="panel-collapse collapse">';
							echo '<div class="panel-body">';
							echo '<ul class="de_list">';
						}else{
							echo '<li><a href="'.get_page_link($single_page_id).'">'.$page_info->post_title .'</a></li>';
						}
						$total_vari--;
					}
						echo '</ul>';	
						echo '</div>';
					echo '</div>';
				}
				?>
			</div>
		</div>
	<?php	 
	}
	?>
	
		
	