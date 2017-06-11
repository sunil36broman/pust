<?php
/* BREADCOUMB FILE ADD
----------------------------------------------- */
include_once( 'in/breadcoumb.php' );  

/* STYLE FILE ADD
----------------------------------------------- */
function style_function(){
	 wp_register_style('menu', get_template_directory_uri().'/css/menu.css');
	 wp_register_style('normalize', get_template_directory_uri().'/css/normalize.css');
	 wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
	 wp_register_style('responsive', get_template_directory_uri().'/responsive.css');
	 wp_register_style('awesome', get_template_directory_uri().'/css/font-awesome.min.css');
	 wp_enqueue_style('style', get_bloginfo('stylesheet_url'), array( 'menu','normalize','bootstrap' ), '1.0', 'all');
	 wp_enqueue_style('menu');
	 wp_enqueue_style('normalize');
	 wp_enqueue_style('bootstrap');
	 wp_enqueue_style('responsive');
	 wp_enqueue_style('awesome');
}
add_action('wp_enqueue_scripts', 'style_function');

/*JQUERY FILE ADD
----------------------------------------------- */
/*
function my_init()   
{  
   if (!is_admin())   
   {  
     wp_deregister_script('jquery');  
     wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', FALSE, '1.11.0', TRUE);  
	 wp_enqueue_script('jquery');  
   }  
}  
add_action('init', 'my_init'); 
*/
function javascript_jquery_function(){
	 wp_register_script( 'filterable', get_template_directory_uri().'/js/filterable.js', array( 'jquery' ) );
	 wp_register_script('modernizr', get_template_directory_uri().'/js/vendor/modernizr-2.6.2.min.js', false, '', true);
	 wp_register_script('jssor', get_template_directory_uri().'/js/jssor.js', false, '', true);
	 wp_register_script('jssor2', get_template_directory_uri().'/js/jssor.slider.js', false, '', true);
	 wp_register_script('bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', false, '', true);
	 wp_register_script('plugins', get_template_directory_uri().'/js/plugins.js', false, '', true);
	 wp_register_script('main', get_template_directory_uri().'/js/main.js', false, '', true);
	 wp_register_script( 'scrollup', get_template_directory_uri().'/js/jquery.scrollUp.min.js', array( 'jquery' ));
	 wp_enqueue_script( 'jquery' );
     wp_enqueue_script('scrollup');
	 wp_enqueue_script('filterable');
	 wp_enqueue_script('modernizr');
	 wp_enqueue_script('jssor');
	 wp_enqueue_script('jssor2');
	 wp_enqueue_script('bootstrapjs');
	 wp_enqueue_script('plugins');
	 wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'javascript_jquery_function');


/*NORMAL CONFIGURATION
----------------------------------------------- */
function z_functionname(){
	 add_theme_support('title-tag'); 
	 load_theme_textdomain('language_change', get_template_directory().'/lang'); 
	 //manu top
	 register_nav_menus(array(
		'top_menu' => __('Top Menu', 'language_change'),
	 ));
	function default_top_menu(){
		echo '<ul class="classname_top">';
			echo '<li><a href="'.esc_url(home_url()).'"><i class="fa fa-user"></i>Contacts</a></li>';
			echo '<li><a href="'.esc_url(home_url()).'"><i class="fa fa-envelope"></i>Webmail</a></li>';
		echo '</ul>';
	 }
	 //main menu
	 register_nav_menus(array(
		'main_menu' => __('Main Menu', 'language_change'),
	 ));
	function default_main_menu(){
		echo '<ul class="classname">';
		if ('page' != get_option('show_on_front')) {
		echo '<li class="de_active"><a href="'.esc_url(home_url()).'">Home</a></li>';
		}
		wp_list_pages('sort_column=menu_order&title_li=');
		echo '</ul>';
	 }
	 //sidebar menu one
	 register_nav_menus(array(
		'sidebar_menu_one' => __('Side Menu One', 'language_change'),
	 ));
	function default_side_menu_one(){
		echo '<ul class="sidebar_menu_class">';
		echo '<li><a href="'.esc_url(home_url()).'"><h4 class="list-group-item-heading">About Us</h4></a></li>';
		echo '</ul>';
	}
	//sidebar menu two
	register_nav_menus(array(
		'sidebar_menu_two' => __('Side Menu Two', 'language_change'),
	));
	function default_side_menu_two(){
		echo '<ul class="sidebar_menu_class">';
		echo '<li><a href="'.esc_url(home_url()).'"><h4 class="list-group-item-heading">Other Link</h4></a></li>';
		echo '</ul>';
	}
	//sidebar menu three
	register_nav_menus(array(
		'sidebar_menu_three' => __('Side Menu Three', 'language_change'),
	));
	function default_side_menu_three(){
		echo '<ul class="sidebar_menu_class">';
		echo '<li><a href="'.esc_url(home_url()).'"><h4 class="list-group-item-heading">Related Link</h4></a></li>';
		echo '</ul>';
	}
	 //theme support post-thumbnails 
	 add_theme_support( 'post-thumbnails', array('page','publish','activity','slider','gallery'));
	 add_image_size( 'archive-thumb', 123, 70, true );

	 //new download post type and texonomy create
	 register_post_type('download', array(
		'labels' => array(
			'name' => 'Download'
		),
		'public' => true,
		'supports' =>array('title', 'editor', 'thumbnail','author')
	 ));
	
	register_taxonomy('download-category', 'download', array(
		'labels' => array(
			'name' => 'Download Category',
			'add_new_item' => 'New download category',
			'parent_item' => 'parent download'
		),
		'public' => true,
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'download-cat')
	));
	
/*SYLLABUS POST TYPE AND TEXONOMY
----------------------------------------------- */
	register_post_type('syllabus', array(
		'labels' => array(
			'name' => 'Syllabus'
		),
		'public' => true,
		'supports' =>array('title')
	));
	register_taxonomy('syllabus-category', 'syllabus', array(
		'labels' => array(
			'name' => 'Syllabus Category',
			'add_new_item' => 'New syllabus category',
			'parent_item' => 'parent syllabus'
		),
		'public' => true,
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'syllabus-cat' )
	));
/*ROUTINE POST TYPE AND TEXONOMY
----------------------------------------------- */
	register_post_type('routine', array(
		'labels' => array(
			'name' => 'Routine'
		),
		'public' => true,
		'supports' =>array('title')
	));
	register_taxonomy('routine-category', 'routine', array(
		'labels' => array(
			'name' => 'Routine Category',
			'add_new_item' => 'New routine category',
			'parent_item' => 'parent routine'
		),
		'public' => true,
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'routine-cat' )
	));
/*ADMISSIONINFO POST TYPE AND TEXONOMY
----------------------------------------------- */
	register_post_type('admission-info', array(
		'labels' => array(
			'name' => 'Admission Info'
		),
		'public' => true,
		'supports' =>array('title', 'editor')
	));
	register_taxonomy('admission-category', 'admission-info', array(
		'labels' => array(
			'name' => 'Admission Category',
			'add_new_item' => 'New admission category',
			'parent_item' => 'parent admission'
		),
		'public' => true,
		'hierarchical' => true,
		'rewrite' => array( 'slug' => 'admission-cat' )
	));
}
add_action('after_setup_theme','z_functionname');

/*CATEGORY SHORTCODE
----------------------------------------------- */
function category_shortcode($atts, $content){
	 ob_start(); 
     $variableattr =extract(shortcode_atts(array(
	 'cat_id' => '1'
     ), $atts));
     ?>	
     <?php
     $catarg=array(
	 'post_type' => 'post',
	 'cat' => $cat_id
	 );
	 $catarg['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	 $custom_query = new WP_Query( $catarg );
	 $temp_query = $wp_query;
	 $wp_query   = NULL;
	 $wp_query   = $custom_query;
	?>
	<table class="table table-condensed archive-table">
		<tbody> 
			<?php
			while($custom_query->have_posts()): $custom_query->the_post(); ?>
			<tr>
				<td>
					<div class="main_site_single_blog_post">
						<?php
							$images = get_post_meta(get_the_ID(), 'more_image_in_single_post', true);
							$image_num=count($images);
							if ($images != 0) {
								$i=0;
								foreach ($images as $attachment_id) {
									if($i == 0){
									echo '<img src='.$attachment_id.' alt="">';
									echo '<p>'.get_the_date('j F Y').'</p>'; 
									}
									$i++;
								}
							}else{
								echo '<img src="'.get_template_directory_uri().'/img/defult.jpg" alt="" />';
								echo '<p>'.get_the_date('j F Y').'</p>'; 
							}
						?>
					</div>
				</td> 
				<td> 
					<b><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></b>
					<?php
					$readmore='<a class="readmore" href="'.get_permalink().'">(Read more)</a>';
					echo '<p>'.wp_trim_words(get_the_content(), 30, $readmore).'</p>';
					?>
				</td> 	
			</tr>
			<?php endwhile;
			wp_reset_postdata();
			?>
		</tbody>
	</table>
	<div class="pagi">
		<?php
			$big = 999999999; 
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $custom_query->max_num_pages 
			) );
			$wp_query = NULL;
			$wp_query = $temp_query;
		?>						
	</div>							
<?php $category =ob_get_clean();
	return $category;	
}
add_shortcode('category', 'category_shortcode');

/*DOSHORTCODE
----------------------------------------------- */
add_filter('widget_text', 'do_shortcode');

/*EXTRA FIELD ADD FOR USER PROFILE IN DASHBORD
----------------------------------------------- */
function wetuts_user_contact_methods($methods){
	$methods['contactnumber']=__('Contact Number','wetuts');
	return $methods;
}
add_filter('user_contactmethods', 'wetuts_user_contact_methods');



/*METABOX
----------------------------------------------- */
require_once('metabox/init.php');
require_once('metabox/functions.php');

/*REDUX FRAMEWORK
----------------------------------------------- */
require_once('lib/ReduxCore/framework.php');
require_once('lib/sample/config.php');


/*DISABLE OTHER USER POST IN OWN PROFILE
----------------------------------------------- */
function mypo_parse_query_useronly( $wp_query ) {
    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
        if ( !current_user_can( 'level_10' ) ) {
            global $current_user;
            $wp_query->set( 'author', $current_user->ID );
        }
    }
}
add_filter('parse_query', 'mypo_parse_query_useronly' );


/*DISABLE PERSONAL OPTION IN PROFILE
----------------------------------------------- */
function hide_personal_options(){
	if ( ! current_user_can('manage_options') ) {
		echo "\n"
 . '<script type="text/javascript">jQuery(document).ready(function($) {
$(\'form#your-profile > h3:first\').hide();
$(\'form#your-profile > table:first\').hide();
$(\'table.form-table:eq(1) tr:eq(3)\').hide();
$(\'table.form-table:eq(1) tr:eq(4)\').hide();
$(\'table.form-table:eq(2) tr:eq(1)\').hide();
$(\'form#your-profile\').show(); }); </script>' . "\n";
	}
}
add_action('admin_head','hide_personal_options');

/*REMOVE BIO FILED IN PROFILE
----------------------------------------------- */
function remove_plain_bio($buffer) {
		$titles = array('#<h3>About Yourself</h3>#','#<h3>About the user</h3>#');
		$buffer=preg_replace($titles,'<h3></h3>',$buffer,1);
		$biotable='#<h3></h3>.+?<table.+?/tr>#s';
		$buffer=preg_replace($biotable,'<h3></h3> <table class="form-table">',$buffer,1);
		return $buffer;
}
	function profile_admin_buffer_start() { ob_start("remove_plain_bio"); }
	function profile_admin_buffer_end() { ob_end_flush(); }
	add_action('admin_head', 'profile_admin_buffer_start');
	add_action('admin_footer', 'profile_admin_buffer_end');

	
/*LOGIN PAGE CUSTOMISE
----------------------------------------------- */	
function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/pust.png);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url_title() {
    return 'Pabna University of Science and Technology';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/*SLIDER POST TYPE AND CAPABILITIES ADD
----------------------------------------------- */
add_action( 'init', 'slider_manage');
function slider_manage() {
     		$labels = array(
				'name'               => _x( 'Slider', 'post type general name', 'your-plugin-textdomain' ),
				'singular_name'      => _x( 'Slider', 'post type singular name', 'your-plugin-textdomain' ),
				'menu_name'          => _x( 'Slider', 'admin menu', 'your-plugin-textdomain' ),
				'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'your-plugin-textdomain' ),
				'add_new'            => _x( 'Add New', 'Slider', 'your-plugin-textdomain' ),
				'add_new_item'       => __( 'Add New Slider', 'your-plugin-textdomain' ),
				'new_item'           => __( 'New Slider', 'your-plugin-textdomain' ),
				'edit_item'          => __( 'Edit Slider', 'your-plugin-textdomain' ),
				'view_item'          => __( 'View Slider', 'your-plugin-textdomain' ),
				'all_items'          => __( 'All Slider', 'your-plugin-textdomain' ),
				'search_items'       => __( 'Search Slider', 'your-plugin-textdomain' ),
				'parent_item_colon'  => __( 'Parent Slider:', 'your-plugin-textdomain' ),
				'not_found'          => __( 'No Slider found.', 'your-plugin-textdomain' ),
				'not_found_in_trash' => __( 'No Slider found in Trash.', 'your-plugin-textdomain' )
			);
			$args = array(
			'description'         => __( 'slider', 'sliders' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'taxonomies' => array('slidercat'),
			'rewrite' => $rewrite,
            'capability_type'     => array('slider','sliders'),
            'map_meta_cap'        => true,
		);
		register_post_type( 'slider', $args );
}
add_action( 'init', 'slider_category' );
function slider_category() {
	register_taxonomy(
		'slidercat',
		'slider',
		array(
			'label' => __( 'slider category' ),
			'rewrite' => array( 'slug' => 'slidercat' ),
			'hierarchical' => true,
			'capability_type'=> array('slidercat','slidercats'),
			'capabilites'       => array(
				'manage_terms'  => 'manage_sites',
				'edit_terms'    => 'manage_sites',
				'delete_terms'  => 'manage_sites',
				'assign_terms'  => 'edit_posts'
			)
		)
	);
}


/*CREATE NEW ROLE AND ASSIGN CAPABILITIES FOR POST TYPE
----------------------------------------------- */
add_role('professor', 'Professor');
$coupon_managerr =& get_role('professor');
//publication post type assign to the professor role
$coupon_managerr->add_cap( 'edit_publications' );
$coupon_managerr->add_cap( 'edit_publication' );
$coupon_managerr->add_cap( 'delete_publication' );
$coupon_managerr->add_cap( 'delete_publications' );
$coupon_managerr->add_cap( 'read_publications' );
$coupon_managerr->add_cap( 'read' );
$coupon_managerr->add_cap( 'manage_publicationcats' );
$coupon_managerr->add_cap( 'manage_publicationareas' );
$coupon_managerr->add_cap( 'upload_files' );
$coupon_managerr->add_cap( 'publish_publications' );

//document post type assign to the professor role
$coupon_managerr->add_cap( 'edit_documents' );
$coupon_managerr->add_cap( 'edit_document' );
$coupon_managerr->add_cap( 'delete_document' );
$coupon_managerr->add_cap( 'delete_documents' );
$coupon_managerr->add_cap( 'read_documents' );
$coupon_managerr->add_cap( 'read' );
$coupon_managerr->add_cap( 'manage_documentcats' );
$coupon_managerr->add_cap( 'upload_files' );
$coupon_managerr->add_cap( 'publish_documents' );

//Get the admin role
$admin_role = get_role( 'administrator' );

//publication post type assign to the admin role
$admin_role->add_cap( 'edit_publications' );
$admin_role->add_cap( 'edit_publication' );
$admin_role->add_cap( 'edit_private_publications' );
$admin_role->add_cap( 'delete_publication' );
$admin_role->add_cap( 'delete_publications' );
$admin_role->add_cap( 'edit_others_publications' );
$admin_role->add_cap( 'read_publications' );
$admin_role->add_cap( 'read_private_publications' );
$admin_role->add_cap( 'publish_publications' );
$admin_role->add_cap( 'delete_others_publications' );
$admin_role->add_cap( 'delete_published_publications' );
$admin_role->add_cap( 'delete_private_publications' );

//document post type assign to the admin role
$admin_role->add_cap( 'edit_documents' );
$admin_role->add_cap( 'edit_document' );
$admin_role->add_cap( 'edit_private_documents' );
$admin_role->add_cap( 'delete_document' );
$admin_role->add_cap( 'delete_documents' );
$admin_role->add_cap( 'edit_others_documents' );
$admin_role->add_cap( 'read_documents' );
$admin_role->add_cap( 'read_private_documents' );
$admin_role->add_cap( 'publish_documents' );
$admin_role->add_cap( 'delete_others_documents' );
$admin_role->add_cap( 'delete_published_documents' );
$admin_role->add_cap( 'delete_private_documents' );

/*PUBLICATION POST TYPE 
----------------------------------------------- */
add_action( 'init', 'publication_custom_post_type_create' );
function publication_custom_post_type_create() {
	$labels = array(
		'name' => _x('Publication', 'post type general name'),
		'singular_name' => _x('Publication', 'post type singular name'),
		'add_new' => _x('Add Publication', 'publication'),
		'add_new_item' => __('Add New Publication'),
		'edit_item' => __('Edit Publication'),
		'new_item' => __('New Publication'),
		'view_item' => __('View Publication'),
		'search_items' => __('Search Publications'),
		'not_found' =>  __('No publications found'),
		'not_found_in_trash' => __('No publications found in Trash'), 
		'parent_item_colon' => '',
		'parent' => 'Parent Publication'
	);
	$settings= array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'_builtin' => false,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => array('slug'=>'publication'),
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-media-text',
		'taxonomies' => array('publicationcat','publicationarea'),
		'supports' => array('title','author','thumbnail','page-attributes','revisions'),
		'capability_type' => 'publication'
	); 
	register_post_type('publication',$settings);	
	flush_rewrite_rules();
}

//publication area
add_action( 'init', 'publication_area_taxonomy_create' );
function publication_area_taxonomy_create() {
	$labels = array(
		'name' => _x( 'Publication area', 'taxonomy general name' ),
		'singular_name' => _x( 'Publication area', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search publication area' ),
		'all_items' => __( 'All Publication area' ),
		'parent_item' => __( 'Parent publication area' ),
		'parent_item_colon' => __( 'Parent publication area:' ),
		'edit_item' => __( 'Edit publication area' ),
		'update_item' => __( 'Update publication area' ),
		'add_new_item' => __( 'Add New publication area' ),
		'new_item_name' => __( 'New publication area Name' )
	);
	$settings = array(
		'hierarchical' => true,
		'capability_type' => 'publicationarea',
		'labels' => $labels,
		'capabilities' => array(
			'assign_terms'=>'edit_publications',
			//'manage_terms' => 'manage_publicationcats',
			'edit_terms' => 'manage_publicationareas',
			'delete_terms' => 'manage_publicationareas'
		),
		'show_ui' => true,
		'public'                     => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug'                       => 'publicationarea',
			'with_front'                 => true,
			'hierarchical'               => true
		)
	);
	register_taxonomy('publicationarea', array('publication'), $settings);
}
add_action( 'init', 'publication_taxonomy_create' );
function publication_taxonomy_create() {
	$labels = array(
		'name' => _x( 'Publication category', 'taxonomy general name' ),
		'singular_name' => _x( 'Publication category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search publication category' ),
		'all_items' => __( 'All Publication category' ),
		'parent_item' => __( 'Parent publication category' ),
		'parent_item_colon' => __( 'Parent publication category:' ),
		'edit_item' => __( 'Edit publication category' ),
		'update_item' => __( 'Update publication category' ),
		'add_new_item' => __( 'Add New publication category' ),
		'new_item_name' => __( 'New publication category Name' )
	);
	$settings = array(
		'hierarchical' => true,
		'capability_type' => 'publicationcat',
		'labels' => $labels,
		'capabilities' => array(
			'assign_terms'=>'edit_publications',
			//'manage_terms' => 'manage_publicationcats',
			'edit_terms' => 'manage_publicationcats',
			'delete_terms' => 'manage_publicationcats'
		),
		'show_ui' => true,
		'public'                     => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug'                       => 'publicationcat',
			'with_front'                 => true,
			'hierarchical'               => true
		)
	);
	register_taxonomy('publicationcat', array('publication'), $settings);
}

/*DROPDOWN CUSTOM TAXONOMY DISPLAY IN ADMIN
----------------------------------------------- */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
function tsm_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'publication'; 
	$taxonomy  = 'publicationcat'; 
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

/*FILTER POSTS BY TAXONOMY IN ADMIN
----------------------------------------------- */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'publication'; 
	$taxonomy  = 'publicationcat'; 
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/*DOCUMENT POST TYPE 
----------------------------------------------- */
add_action( 'init', 'document_custom_post_type_create' );
function document_custom_post_type_create() {
	$labels = array(
		'name' => _x('Document', 'post type general name'),
		'singular_name' => _x('Document', 'post type singular name'),
		'add_new' => _x('Add document', 'document'),
		'add_new_item' => __('Add New document'),
		'edit_item' => __('Edit document'),
		'new_item' => __('New document'),
		'view_item' => __('View document'),
		'search_items' => __('Search document'),
		'not_found' =>  __('No documents found'),
		'not_found_in_trash' => __('No documents found in Trash'), 
		'parent_item_colon' => '',
		'parent' => 'Parent document'
	);
	$settings= array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'_builtin' => false,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => array('slug'=>'document'),
		'hierarchical' => false,
		'menu_position' => null,
		 'menu_icon'   => 'dashicons-media-default',
		'taxonomies' => array('documentcat'),
		'supports' => array('title','editor','author','thumbnail','page-attributes','revisions'),
		'capability_type' => 'document'
	); 
	register_post_type('document',$settings);	
	flush_rewrite_rules();
}
add_action( 'init', 'document_taxonomy_create' );
function document_taxonomy_create() {
	$labels = array(
		'name' => _x( 'Document category', 'taxonomy general name' ),
		'singular_name' => _x( 'Document category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search document category' ),
		'all_items' => __( 'All document category' ),
		'parent_item' => __( 'Parent document category' ),
		'parent_item_colon' => __( 'Parent document category:' ),
		'edit_item' => __( 'Edit document category' ),
		'update_item' => __( 'Update document category' ),
		'add_new_item' => __( 'Add New document category' ),
		'new_item_name' => __( 'New document category Name' )
	);
	$settings = array(
		'hierarchical' => true,
		'capability_type' => 'documentcat',
		'labels' => $labels,
		'capabilities' => array(
			'assign_terms'=>'edit_documents',
			//'manage_terms' => 'manage_publicationcats',
			'edit_terms' => 'manage_documentcats',
			'delete_terms' => 'manage_documentcats'
		),
		'show_ui' => true,
		'public'                     => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
		'rewrite' => array( 
			'slug'                       => 'documentcat',
			'with_front'                 => true,
			'hierarchical'               => true
		)
	);
	register_taxonomy('documentcat', array('document'), $settings);
}

/*DROPDOWN CUSTOM TAXONOMY DISPLAY IN ADMIN
----------------------------------------------- */
add_action('restrict_manage_posts', 'document_filter_post_type_by_taxonomy');
function document_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'document'; 
	$taxonomy  = 'documentcat'; 
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
/*FILTER POSTS BY TAXONOMY IN ADMIN
----------------------------------------------- */
add_filter('parse_query', 'document_convert_id_to_term_in_query');
function document_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'document'; 
	$taxonomy  = 'documentcat'; 
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}


/*CREATE NEW ROLE Librarian AND ASSIGN CAPABILITIES FOR POST TYPE book
----------------------------------------------- */
add_role('librarian', 'Librarian');
$coupon_managerrr =& get_role('librarian');
$coupon_managerrr->add_cap( 'edit_books' );
$coupon_managerrr->add_cap( 'edit_book' );
$coupon_managerrr->add_cap( 'delete_book' );
$coupon_managerrr->add_cap( 'delete_books' );
$coupon_managerrr->add_cap( 'read_books' );
$coupon_managerrr->add_cap( 'read' );
$coupon_managerrr->add_cap( 'manage_bookcats' );
$coupon_managerrr->add_cap( 'upload_files' );

//Get the admin role
$admin_rolee = get_role( 'administrator' );
//Add more capabilities to the admin role only for this plugin.
$admin_rolee->add_cap( 'edit_books' );
$admin_rolee->add_cap( 'edit_book' );
$admin_rolee->add_cap( 'edit_private_books' );
$admin_rolee->add_cap( 'delete_book' );
$admin_rolee->add_cap( 'delete_books' );
$admin_rolee->add_cap( 'edit_others_books' );
$admin_rolee->add_cap( 'read_books' );
$admin_rolee->add_cap( 'read_private_books' );
$admin_rolee->add_cap( 'publish_books' );
$admin_rolee->add_cap( 'delete_others_books' );
$admin_rolee->add_cap( 'delete_published_books' );
$admin_rolee->add_cap( 'delete_private_books' );

add_action( 'init', 'book_custom_post_type_create' );
function book_custom_post_type_create() {
	$labels = array(
		'name' => __('Book', 'post type general name'),
		'singular_name' => __('Book', 'post type singular name'),
		'add_new' => __('Add Book', 'book'),
		'add_new_item' => __('ADD NEW BOOK NAME'),
		'edit_item' => __('Edit Book'),
		'new_item' => __('New Book'),
		'view_item' => __('View Book'),
		'search_items' => __('Search Books'),
		'not_found' =>  __('No Books found'),
		'not_found_in_trash' => __('No Books found in Trash'), 
		//'parent_item_colon' => '',
		//'parent' => 'Parent Book'
	);
	$settings= array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => array('slug'=>'book'),
		'hierarchical' => true,
		'menu_position' => null,
		'taxonomies' => array('bookcat'),
		'supports' => array('title','thumbnail'),
		'capability_type' => 'book',
		'has_archive' => true
	); 
	register_post_type('book',$settings);
	flush_rewrite_rules();
}

/*REGISTER CUSTOM TAXONOMY
----------------------------------------------- */
add_action( 'init', 'book_taxonomy_create' );
function book_taxonomy_create() {
	//Custom taxonomy labels
	$labels = array(
		'name' => _x( 'Book category', 'taxonomy general name' ),
		'singular_name' => _x( 'Book category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Book category' ),
		'all_items' => __( 'All Book category' ),
		'parent_item' => __( 'Parent book category' ),
		'parent_item_colon' => __( 'Parent book category:' ),
		'edit_item' => __( 'Edit book category' ),
		'update_item' => __( 'Update book category' ),
		'add_new_item' => __( 'Add New book category' ),
		'new_item_name' => __( 'New book category Name' )
	);
	$settings = array(
		'hierarchical' => true,
		'capability_type' => 'bookcat',
		'labels' => $labels,
		'capabilities' => array(
			'assign_terms'=>'edit_books',
			'manage_terms' => 'manage_bookcats',
			'edit_terms' => 'manage_bookcats',
			'delete_terms' => 'manage_bookcats'
		),
		'show_ui' => true,
		'public'                     => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
		'has_archive'=>true,
        'show_tagcloud'              => true,
		'rewrite' =>array( 
			'slug'                       => 'bookcat'
			
		)
	);
	register_taxonomy('bookcat', array('book'), $settings);
}

/*DROPDOWN CUSTOM TAXONOMY DISPLAY IN ADMIN
----------------------------------------------- */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy3');
function tsm_filter_post_type_by_taxonomy3() {
	global $typenow;
	$post_type = 'book'; // change to your post type
	$taxonomy  = 'bookcat'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}

/*FILTER POSTS BY TAXONOMY IN ADMIN
----------------------------------------------- */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query4');
function tsm_convert_id_to_term_in_query4($query) {
	global $pagenow;
	$post_type = 'book'; // change to your post type
	$taxonomy  = 'bookcat'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/*GALLERY POSTS BY TAXONOMY IN ADMIN
----------------------------------------------- */
add_action('init', 'project_custom_init');  
function project_custom_init()
{
  $labels = array(
    'name' => _x('Gallery', 'post type general name'),
    'singular_name' => _x('Gallery', 'post type singular name'),
    'add_new' => _x('Add New', 'gallery'),
    'add_new_item' => __('Add New Gallery'),
    'edit_item' => __('Edit Gallery'),
    'new_item' => __('New Gallery'),
    'view_item' => __('View Gallery'),
    'search_items' => __('Search Gallery'),
    'not_found' =>  __('No Gallery found'),
    'not_found_in_trash' => __('No Gallery found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'gallery'
 
  );
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author','thumbnail')
  );
  register_post_type('gallery',$args);
  flush_rewrite_rules();
  $labels = array(
    'name' => _x( 'Gallery cat', 'taxonomy general name' ),
    'singular_name' => _x( 'Gallerycat', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Gallery' ),
    'parent_item' => __( 'Parent Gallery' ),
    'parent_item_colon' => __( 'Parent Gallery:' ),
    'edit_item' => __( 'Edit Gallerys' ),
    'update_item' => __( 'Update Gallery' ),
    'add_new_item' => __( 'Add New Gallery' ),
    'new_item_name' => __( 'New Gallery Name' ),
  );
  register_taxonomy('gallerycat',array('gallery'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gallerycat' ),
  ));
}

/*UPDATE MESSAGE SHOW USING CUSTOM TEXT
----------------------------------------------- */
add_filter('post_updated_messages', 'project_updated_messages');
function project_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['gallery'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('gallery updated. <a href="%s">View gallery</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('gallery updated.'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('gallery restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('gallery published. <a href="%s">View gallery</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('gallery saved.'),
    8 => sprintf( __('gallery submitted. <a target="_blank" href="%s">Preview gallery</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('gallery scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview gallery</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('gallery draft updated. <a target="_blank" href="%s">Preview gallery</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}

/*PROGRAMMATICALLY CREATE CATEGORY IN WORDPRESS
----------------------------------------------- */
function news_insert_category() {
	if(!term_exists('news')) {
		wp_insert_term(
			'News',
			'category',
			array(
			  'description'	=> 'This is news category.',
			  'slug' 		=> 'news'
			)
		);
	}
}
add_action( 'after_setup_theme', 'news_insert_category' );
function recent_event_insert_category() {
	if(!term_exists('recent-event')) {
		wp_insert_term(
			'Recent event',
			'category',
			array(
			  'description'	=> 'This is recent event category.',
			  'slug' 		=> 'recent-event'
			)
		);
	}
}
add_action( 'after_setup_theme', 'recent_event_insert_category' );
function upcoming_events_insert_category() {
	if(!term_exists('upcoming-events')) {
		wp_insert_term(
			'Upcoming events',
			'category',
			array(
			  'description'	=> 'This is upcoming events category.',
			  'slug' 		=> 'upcoming-events'
			)
		);
	}
}
add_action( 'after_setup_theme', 'upcoming_events_insert_category' );









				