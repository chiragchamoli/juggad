<?php
//print_r(get_option('members_only_options'));
wp_get_current_user();
$userinfo = getLoginUserInfo();
if(get_option('feed_access')=='require_login' && !getLoginUserInfo())
{
	wp_redirect(get_option('siteurl')."/wp-login.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?3" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <script src="<?php bloginfo('template_directory');?>/js/advanced.js"></script>
    <script src="<?php bloginfo('template_directory');?>/js/wysihtml5-0.3.0.min.js"></script>
    <?php wp_head(); ?>
</head>
<body<?php if(is_single()) echo ' class="single"'; ?>>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
             <a class="brand" href="<?php bloginfo( 'url' ); ?>/"><?php bloginfo( 'name' ); ?></a>
            <div class="nav-collapse collapse">
            <ul class="nav pull-right">
             <li><a href="<?php echo get_option('siteurl');?>/wp-login.php?action=logout&_wpnonce=">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<div id="wrapper">
<?php  if( current_user_can( 'publish_posts' ) ) require_once dirname( __FILE__ ) . '/post-form.php';?>
	<?php get_sidebar( );?>