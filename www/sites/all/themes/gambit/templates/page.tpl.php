<?php

//dpm($page);


?>

<?php if ($page['hero']): ?>
  <div id="hero">
    <div class="section clearfix">
      <?php print render($page['hero']); ?>
    </div>
  </div> <!-- /.section, /#messages -->
<?php endif; ?>

<div id="site-wrapper">
  <div id="container">
  
    <?php if ($messages): ?>
      <div id="messages">
        <div class="section clearfix">
          <?php print $messages; ?>
        </div>
      </div> <!-- /.section, /#messages -->
    <?php endif; ?>
    
    <?php if ($page['content']): ?>
      <div id="content-wrapper">
        <div class="section clearfix">
          <?php print render($page['content']); ?>
        </div>
      </div> <!-- /.section, /#messages -->
    <?php endif; ?>
    
    <?php if ($page['tab_pages']): ?>
      <div id="tab-pages">
        <div class="section clearfix">
          <?php print render($page['tab_pages']); ?>
        </div>
      </div> <!-- /.section, /#messages -->
    <?php endif; ?>
      
  </div>
</div>

<?php if ($page['footer']): ?>
  <div id="messages">
    <div class="section clearfix">
      <?php print render($page['footer']); ?>
    </div>
  </div> <!-- /.section, /#messages -->
<?php endif; ?>
