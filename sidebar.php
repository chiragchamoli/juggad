<div id="sidebar">


<ul>
<strong title="You team members, you can click on a member to see all posts.">The Team</strong>


<ul>
<?php wp_list_authors('show_fullname=1&optioncount=1&exclude_admin=0'); ?>
</ul>

<div style="margin-top:10px;" class="alert alert alert-block">

  <h4>Quick Help</h4>
  <p>
  	<li>You can <strong>auto embed</strong> youtube, vimeo, github gist just by adding the link in your update</li>
  	<li>If your attachment are images just hover the links to see preview.</li>
  </p>
  
</div>

<!-- 
<div style="margin-top:10px">
<?php 

if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) {

	echo prologue_widget_recent_comments_avatar(array('before_widget' => ' <li id="recent-comments" class="widget widget_recent_comments"> ', 'after_widget' => '</li>', 'before_title' =>'<h2>', 'after_title' => '</h2>'  ));

	$before = '<li><h2>'.__('Recent Tags', 'p2')."</h2>\n";
	$after = "</li>\n";
	$num_to_show = 35;
	echo prologue_recent_projects( $num_to_show, $before, $after );
} // if dynamic_sidebar

?>
	
</div> -->


<div style="clear: both;"></div>
</div> <!-- // sidebar -->