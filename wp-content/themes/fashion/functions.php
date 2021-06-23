<?php
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
require_once get_template_directory() . '/widgets/mini_blog_widget_latest_post.php';

// Thêm widget Bài viết mới nhất
function mini_blog_load_widget_latest_post()
{
	register_widget('mini_blog_latest_post'); // gọi ID widget
}
add_action('widgets_init', 'mini_blog_load_widget_latest_post');


// Thêm ảnh đại diện
add_theme_support('post-thumbnails');
// Ảnh này sẽ hiện ở ngoài blog
add_image_size('blog-thumbnail', 700, 350, true);

// Ảnh này sẽ hiện ở trong post
add_image_size('post-large', 900, 600, true);

add_image_size('post-small', 250, 200, true);

add_theme_support('menus');

// Khai báo menu
function register_my_menu()
{
	register_nav_menus(
		array(
			'header-menu' => 'Header Menu',
			'footer-nav' => 'Footer Menu',
			'fashion-business' => 'Fashion Business Menu',
			'fashion-marketing' => 'Fashion Marketing Menu',
			'fashion-stylist' => 'Fashion Business Menu',
			'copyright-menu' => 'Copyright Menu',
		)
	);
}
add_action('init', 'register_my_menu');


// Khai báo sidebar
function mini_blog_widgets_init()
{
	register_sidebar(array(
		'name'			=> __('Sidebar', 'sidebar-mini'),
		'id' 			=> 'sidebar-mini',
		'description' 	=> __('Ở đây sẽ chứa những widget của Mini Blog', 'sidebar-mini'),
		'before_widget' => '<div id="%1$s" class="card my-4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="card-header">',
		'after_title'   => '</h5>',
	));
}
add_action('widgets_init', 'mini_blog_widgets_init');

// Tạo Paginate (code phân trang)
function mini_blog_pagination()
{
	global $wp_query;

	$pages = paginate_links(array(
		'format' 		=> '?paged=%#%',
		'current' 		=> max(1, get_query_var('paged')),
		'total' 		=> $wp_query->max_num_pages,
		'type'  		=> 'array',
		'prev_next'   	=> true,
		'prev_text'    	=> __('« '),
		'next_text'    	=> __(' »'),
	));

	if (is_array($pages)) {
		$paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
		$pagination = '<ul class="pagination justify-content-center mb-4">';
		foreach ($pages as $page) {
			$pagination .= "<li class='page-item'>$page</li>";
		}
		$pagination .= '</ul>';

		echo $pagination;
	}
}

add_action('after_setup_theme', 'wpsites_child_theme_posts_formats', 11);
function wpsites_child_theme_posts_formats()
{
	add_theme_support('post-formats', array(
		'aside',
		'audio',
		'chat',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video',
	));
}

// Tạo custom Breadcrumbs 
require get_template_directory() . '/function/breadcrumb.php';

/* Taxonomy Breadcrumb */
function be_taxonomy_breadcrumb()
{
	// Get the current term
	$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));

	// Create a list of all the term's parents
	$parent = $term->parent;
	while ($parent) :
		$parents[] = $parent;
		$new_parent = get_term_by('id', $parent, get_query_var('taxonomy'));
		$parent = $new_parent->parent;
	endwhile;
	if (!empty($parents)) :
		$parents = array_reverse($parents);

		// For each parent, create a breadcrumb item
		foreach ($parents as $parent) :
			$item = get_term_by('id', $parent, get_query_var('taxonomy'));
			$url = get_bloginfo('url') . '/' . $item->taxonomy . '/' . $item->slug;
			echo '<li><a href="' . $url . '">' . $item->name . '</a></li>';
		endforeach;
	endif;

	// Display the current term in the breadcrumb
	echo '<li>' . $term->name . '</li>';
}
function mini_blog_related_post($title = 'Bài viết liên quan', $count = 5)
{

	global $post;
	$tag_ids = array();
	$current_cat = get_the_category($post->ID);
	$current_cat = $current_cat[0]->cat_ID;
	$this_cat = '';
	$tags = get_the_tags($post->ID);
	if ($tags) {
		foreach ($tags as $tag) {
			$tag_ids[] = $tag->term_id;
		}
	} else {
		$this_cat = $current_cat;
	}

	$args = array(
		'post_type'   => get_post_type(),
		'numberposts' => $count,
		'orderby'     => 'rand',
		'tag__in'     => $tag_ids,
		'cat'         => $this_cat,
		'exclude'     => $post->ID
	);
	$related_posts = get_posts($args);

	if (empty($related_posts)) {
		$args['tag__in'] = '';
		$args['cat'] = $current_cat;
		$related_posts = get_posts($args);
	}
	if (empty($related_posts)) {
		return;
	}
	$post_list = '';
	foreach ($related_posts as $related) {

		$post_list .= '<div class="media mb-4 ">';
		$post_list .= '<img class="mr-3 img-thumbnail" style="width: 150px" src="' . get_the_post_thumbnail_url($related->ID, 'post-small') . '" alt="Generic placeholder image">';
		$post_list .= '<div class="media-body align-self-center">';
		$post_list .= '<h5 class="mt-0"><a href="' . get_permalink($related->ID) . '">' . $related->post_title . '</a></h5>';
		$post_list .= get_the_category($related->ID)[0]->cat_name;

		$post_list .= '</div>';
		$post_list .= '</div>';
	}

	return sprintf('
			<div class="card my-4">
				<h4 class="card-header">%s</h4>
				<div class="card-body">%s</div>
			</div>
		', $title, $post_list);
}

// Trả nội dung bình luận
function mini_blog_comment($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
?>
	<?php if ($comment->comment_approved == '1') : ?>
		<li class="media mb-4">
			<?php echo '<img class="d-flex mr-3 rounded-circle" src="' . get_avatar_url($comment) . '" style="width: 60px;">' ?>
			<div class="media-body">
				<?php echo  '<h5 class="mt-0 mb-0"><a rel="nofllow" href="' . get_comment_author_url() . '">' . get_comment_author() . '</a> - <small>' . get_comment_date() . ' - ' . get_comment_time() . '</small></h5>' ?>
				<p class="mt-1">
					<?php comment_text() ?>
				</p>

				<div class="reply">
					<?php comment_reply_link(array_merge($args, array('reply_text' => 'Trả lời', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
		</li>
<?php endif;
}
// function wibget footer // add code vao html <?php dynamic_sidebar('footer_logo');
function footer()
{
	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer',
		'description' => 'Khu vực sidebar hiển thị dưới mỗi bài viết',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>'
	));
}
add_action('widgets_init', 'footer');


// logo
function logo_same($wp_customize)
{

	$wp_customize->add_section(
		'logo_a',
		array(
			'title' => 'Logo-menu',
			'description' => 'logo',
			'priority' => 25
		)
	);

	$wp_customize->add_setting('Logo_menu', array('default' => ''));
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize, 'Logo_menu', array(
			'label' => 'Logo menu',
			'section' => 'logo_a',
			'settings' => 'Logo_menu'
		))
	);
}
add_action('customize_register', 'logo_same');

// social
function link_social($wp_customize)
{
	$wp_customize->add_section(
		'social',
		array(
			'title' => 'Social',
			'description' => 'Social',
			'priority' => 25
		)
	);

	$wp_customize->add_setting('Label_social', array('default' => ''));
	$wp_customize->add_control('control_Label_social', array(
		'label' => 'Label Social',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Label_social'
	));
	// 1
	$wp_customize->add_setting('Icon_fb', array('default' => ''));
	$wp_customize->add_control('control_Icon_fb', array(
		'label' => 'Icon Facebook',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Icon_fb'
	));
	$wp_customize->add_setting('Link_fb', array('default' => ''));
	$wp_customize->add_control('control_Link_fb', array(
		'label' => 'Link Facebook',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Link_fb'
	));
	// 2
	$wp_customize->add_setting('Icon_tw', array('default' => ''));
	$wp_customize->add_control('control_Icon_tw', array(
		'label' => 'Icon Twitter',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Icon_tw'
	));
	$wp_customize->add_setting('Link_tw', array('default' => ''));
	$wp_customize->add_control('control_Link_tw', array(
		'label' => 'Link Twitter',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Link_tw'
	));
	// 3
	$wp_customize->add_setting('Icon_yt', array('default' => ''));
	$wp_customize->add_control('control_Icon_yt', array(
		'label' => 'Icon Youtube',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Icon_yt'
	));
	$wp_customize->add_setting('Link_yt', array('default' => ''));
	$wp_customize->add_control('control_Link_yt', array(
		'label' => 'Link Youtube',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Link_yt'
	));
	// 4
	$wp_customize->add_setting('Icon_in', array('default' => ''));
	$wp_customize->add_control('control_Icon_in', array(
		'label' => 'Icon LinkedIn',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Icon_in'
	));
	$wp_customize->add_setting('Link_in', array('default' => ''));
	$wp_customize->add_control('control_Link_in', array(
		'label' => 'Link LinkedIn',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Link_in'
	));
	// 5
	$wp_customize->add_setting('Icon_insta', array('default' => ''));
	$wp_customize->add_control('control_Icon_insta', array(
		'label' => 'Icon Instagram',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Icon_insta'
	));
	$wp_customize->add_setting('Link_insta', array('default' => ''));
	$wp_customize->add_control('control_Link_insta', array(
		'label' => 'Link Instagram',
		'section' => 'social',
		'type' => 'text',
		'settings' => 'Link_insta'
	));
}
add_action('customize_register', 'link_social');


// footer

function edit_footer($wp_customize)
{
	$wp_customize->add_section(
		'footer',
		array(
			'title' => 'Footer',
			'description' => 'Custom Footer',
			'priority' => 25
		)
	);
	// 1
	$wp_customize->add_setting('Copyright_content', array('default' => ''));
	$wp_customize->add_control('control_Copyright_content', array(
		'label' => 'Copyright content',
		'section' => 'footer',
		'type' => 'textarea',
		'settings' => 'Copyright_content'
	));
}
add_action('customize_register', 'edit_footer');




// phân trang
if (!function_exists('the_paginate')) :
	function the_paginate($args = null)
	{
		$defaults = array(
			'title'		=> 'Pages',
			'query'		=> null
		);
		$args = wp_parse_args($args, $defaults);
		extract($args, EXTR_SKIP);
		if (is_404()) {
			return;
		}
		$currentPage = null;
		$totalPage = null;
		if (empty($query)) {
			global $wp_query;
			$query = $wp_query;
		}

		$currentPage = stheme_get_paged();
		$title .= ':';
		$ppp = intval($query->query['posts_per_page']);
		if ($ppp < 1) {
			return;
		}
		$totalPage = intval(ceil($query->found_posts / $ppp));
		if ($totalPage <= 1) {
			return;
		}
		$paginateResult = '<div id="sPaginate" class="spaginate paginate"><div class="spaginate-inner paginate-inner"><span class="spaginate-title paginate-title"></span>';

		if ($currentPage > 1) {
			$paginateResult .= '<a class="spaginate-prev prev page-item" href="' . get_pagenum_link($currentPage - 1) . '">&laquo;</a>';
		}
		$paginateResult .= the_paginate_list(1, $totalPage, $currentPage);
		if ($currentPage < $totalPage) {
			$paginateResult .= "<a href='" . get_pagenum_link($currentPage + 1) . "' class='spaginate-next next page-item'>&raquo;</a>";
		}
		$paginateResult .= "</div></div>";
		echo $paginateResult;
	}
endif;

if (!function_exists('stheme_paginate')) :
	function stheme_paginate($args = null)
	{
		the_paginate($args);
	}
endif;

if (!function_exists('the_paginate_list')) :
	function the_paginate_list($intStart, $totalPage, $currentPage)
	{
		$pageHidden = '<span class="spaginate-hidden hidden">...</span>';
		$linkResult = "";
		$hiddenBefore = false;
		$hiddenAfter = false;
		for ($i = $intStart; $i <= $totalPage; $i++) {
			if ($currentPage === intval($i)) {
				$linkResult .= '<span class="spaginate-current page-item current">' . $i . '</span>';
			} else if (($i <= 6 && $currentPage < 10) || $i == $totalPage || $i == 1 || $i < 4 || ($i <= 6 && $totalPage <= 6) || ($i > $currentPage && ($i <= ($currentPage + 2))) || ($i < $currentPage && ($i >= ($currentPage - 2))) || ($i >= ($totalPage - 2) && $i < $totalPage)) {
				$linkResult .= '<a class="spaginate-link page-item" href="' . get_pagenum_link($i) . '">' . $i . '</a>';
				if ($i <= 6 && $currentPage < 10) {
					$hiddenBefore = true;
				}
			} else {
				if (!$hiddenBefore) {
					$linkResult .= $pageHidden;
					$hiddenBefore = true;
				} else if (!$hiddenAfter && $i > $currentPage) {
					$linkResult .= $pageHidden;
					$hiddenAfter = true;
				}
			}
		}
		return $linkResult;
	}
endif;

function stheme_get_paged()
{
	$paged = intval(get_query_var('paged')) ? intval(get_query_var('paged')) : 1;
	return $paged;
};


