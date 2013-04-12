<?php

//dpm($page);


?>

<div id="top-bar">
  <ul>
    <li><a href="#">Join us</a></li>
    <li><a href="#">Member Login</a></li>   
  </ul>
</div>

<?php if ($page['hero']): ?>
  <div id="hero">
    <div class="section clearfix">
      <?php print render($page['hero']); ?>
    </div>
  </div> <!-- /.section, /#messages -->
<?php endif; ?>

<div id="site-wrapper">
  <div id="container">
  
  <?php if(!drupal_is_front_page()): ?>
    <div id="right-bar">
      <div id="logo">
        <img src="/<?php print drupal_get_path('theme','gambit')?>/images/logo.png" />
      </div>
      <div id="menu-container">
        <?php $menu = menu_tree('main-menu'); ?>
        <?php print drupal_render($menu); ?>
      </div>
      <?php if(isset($grid)):
        print $grid;
      endif; ?>
    </div>   
  <?php endif; ?>
  
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
