	<div style="clear: both;"></div>
</div> <!-- // wrapper -->

<div id="footer">
	<p>
		Hand made theme, by <a href="https://chiragchamoli.com">chirag chamoli</a>, code is avilable here <a href="">jugad(TBD)</a>
	</p>
</div>
<div id="notify"></div>
<div id="help">
	<dl class="directions">
		<dt>c</dt><dd><?php _e('compose new post', 'p2'); ?></dd>
		<dt>j</dt><dd><?php _e('next post/next comment', 'p2'); ?></dd>
		<dt>k</dt> <dd><?php _e('previous post/previous comment', 'p2'); ?></dd>
		<dt>r</dt> <dd><?php _e('reply', 'p2'); ?></dd>
		<dt>e</dt> <dd><?php _e('edit', 'p2'); ?></dd>
		<dt>o</dt> <dd><?php _e('show/hide comments', 'p2'); ?></dd>
		<dt>t</dt> <dd><?php _e('go to top', 'p2'); ?></dd>
		<dt>esc</dt> <dd><?php _e('cancel', 'p2'); ?></dd>
	</dl>
</div>
<?php wp_footer(); ?>



<script>
var editor = new wysihtml5.Editor("posttext", { // id of textarea element
  toolbar:      "wysihtml5-toolbar", // id of toolbar element
  parserRules:  wysihtml5ParserRules // defined in parser rules set 
});

editor.observe("load", function() {
  editor.composer.element.addEventListener("keyup", function() {
    editor.composer.iframe.style.height = editor.composer.element.scrollHeight + "px";
  });
});

</script>

</body>
</html>