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



    <?php wp_head(); ?>   
</head>
<body
<?php if(is_single()) echo ' class="single"'; ?>>

<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">   <div class="topbgg"></div>
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
              <a href="<?php bloginfo( 'url' ); ?>/" class="brand"><?php bloginfo( 'name' ); ?></a>
          <div class="nav-collapse collapse pull-right">
                 
              <ul class="nav">
                 <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages<b class="caret"></b></a>
                              <ul class="dropdown-menu"><?php wp_list_pages('title_li='); ?></ul>
                          </li>
              </ul>

               <ul class="nav">
                       
                          <li class="divider-vertical"></li>
                                <li class="dropdown">
                                   <?php $current_user = wp_get_current_user(); ?>
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Happy <?php echo strtolower(date("l")); ?>  <?php echo $current_user->display_name ?>
                                  <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                      <li><a href="<?php bloginfo( 'url' ); ?>/wp-admin/profile.php">My Profile</a></li>
                                      <li><a href="<?php bloginfo( 'url' ); ?>/wp-admin/post-new.php">Detailed Post</a></li>
                                      <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">My Posts</a></li>
                                      <li class="divider"></li>
                                      <li><a href="<?php bloginfo( 'url' ); ?>/wp-admin/post-new.php?post_type=page">New Page</a></li>
                                      <li><a href="<?php echo wp_logout_url(); ?>">Logout</a></li>
                                    </ul>
                          </li>
                  </ul>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>





<div class="container-fluid">
  <div class="row-fluid">
<div id="wrapper">

  <div class="row-fluid">
      <span class="span12"><?php  if( current_user_can( 'publish_posts' ) ) require_once dirname( __FILE__ ) . '/inc/post-form.php';?></span>
  </div>


	<?php get_sidebar( );?>

  