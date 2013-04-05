<?php

//dpm($page);


?>


<?php if ($messages): ?>
  <div id="messages"><div class="section clearfix">
    <?php print $messages; ?>
  </div></div> <!-- /.section, /#messages -->
<?php endif; ?>

<?php if ($page['content']): ?>
  <div id="messages"><div class="section clearfix">
    <?php print render($page['content']); ?>
  </div></div> <!-- /.section, /#messages -->
<?php endif; ?>

<?php if ($page['footer']): ?>
  <div id="messages"><div class="section clearfix">
    <?php print render($page['footer']); ?>
  </div></div> <!-- /.section, /#messages -->
<?php endif; ?>

