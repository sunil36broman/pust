<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo get_template_directory_uri(); ?>/img/pust-icon2.ico" rel="shortcut icon" type="text/css"/>
		<link href="httpp://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		
		<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/featherlight.min.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/featherlight.gallery.min.css" />
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<?php wp_head(); ?>
	</head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class="logo_area">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-lg-7 col-sm-7">
						<div class="logo">
								
								<?php
								global $redux_demo;
								if(!empty($redux_demo["opt_media_logo"]["url"])){?>
									<a href="<?php echo network_site_url(); ?>"><img class="logo_image" src="<?php echo $redux_demo["opt_media_logo"]["url"]; ?>" alt="" /></a>
								<?php }else{ ?>
									<a href="<?php  echo network_site_url(); ?>"><img class="logo_image" src="<?php echo get_template_directory_uri(); ?>/img/pust.png" alt="" /></a>
								<?php } ?>
								
								
								
								<?php
									
								if(!empty($redux_demo["opt_media_taxt_logo"]["url"])){?>
									<a href="<?php bloginfo('url'); ?>"><img class="logo_text" src="<?php echo $redux_demo["opt_media_taxt_logo"]["url"]; ?>" alt="" /></a>
								<?php }else{ ?>
									<a href="<?php bloginfo('url'); ?>"><img class="logo_text" src="<?php echo get_template_directory_uri(); ?>/img/42.png" alt="" /></a>
								<?php } ?>
								
						</div>
					</div>
					<div class="col-md-5 col-lg-5 col-sm-5">
						<div class="top_menu_update">
							<?php 
							wp_nav_menu(array(
								'theme_location' => 'top_menu',
								'menu_class' => 'any_class_for_top_ul',
								'menu_id' => 'any_id_for_top_ul',
								'container' => ' ',
								'fallback_cb' => 'default_top_menu',
							)); 
							?>
							<?php
							get_search_form()
							?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="menu_area department_menu_area">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-12 col-sm-12">
						<div class="menu_content">
							<div id='cssmenu'>
							<?php
							if (is_main_site()) {
									wp_nav_menu(array(
										'theme_location' => 'main_menu',
										'menu_class' => 'main_side_menu',
										'menu_id' => 'any_id_for_ul',
										'container' => ' ',
										'fallback_cb' => 'default_main_menu',
									)); 
							}
							else {
							   wp_nav_menu(array(
										'theme_location' => 'main_menu',
										'menu_class' => 'network_side_menu',
										'menu_id' => 'any_id_for_ul',
										'container' => ' ',
										'fallback_cb' => 'default_main_menu',
									)); 
							}
							?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>