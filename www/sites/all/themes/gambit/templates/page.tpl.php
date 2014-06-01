<?php

//dpm($page);

?>

<div id="top-bar">
  <ul>
    <li><a href="/user/register">Join us</a></li>
    <li><a href="/user">Member Login</a></li>   
  </ul>
</div>

<?php if ($page['hero']): ?>
  <div id="hero">
    <div class="section clearfix">
      <?php print render($page['hero']); ?>
    </div>
  </div> <!-- /.section, /#messages -->
<?php endif; ?>

<div id="site-wrapper" class="clearfix">
  <div id="container" class="clearfix">
  
  <?php if(!drupal_is_front_page()): ?>
    <div id="right-bar">
      <div id="logo">
        <a href="/"><img src="/<?php print drupal_get_path('theme','gambit')?>/images/logo.png" /></a>
      </div>
      <div id="main-menu-container">
        <?php $menu = menu_tree('main-menu'); ?>
        <?php print drupal_render($menu); ?>
      </div>
      <?php if(isset($grid)):
        print $grid;
      endif; ?>
    </div>   
  <?php endif; ?>
  
    <?php if ($tabs): ?>
      <div class="tabs clearfix">
        <?php print render($tabs); ?>
      </div>
    <?php endif; ?>
  
    <div id="main-content">
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
            <h1><?php print $title; ?></h1>
               <?php if(!drupal_is_front_page() && $page['isPrimary'] && !empty($page['above_content'])): ?>
                 <div class="above-content">
                     <?php print render($page['above_content']); ?>
                 </div>
               <?php endif; ?>
            <?php print render($page['content']); ?>
          </div>
        </div> <!-- /.section, /#messages -->
      <?php endif; ?>
      
      <?php if ($page['tab_pages']): ?>
        <div id="tab-pages" class="clearfix">
          <div class="section clearfix">
            <?php print render($page['tab_pages']); ?>
          </div>
        </div> <!-- /.section, /#messages -->
      <?php endif; ?>
      
      <!-- tryptics for front page. these will be handled differently on tab pages -->
      <?php if(drupal_is_front_page() || $page['isPrimary']): ?>
         <?php if(!empty($page['tryptic_left']) || !empty($page['tryptic_center']) || !empty($page['tryptic_right'])): ?>
              <div class="tryptic">
                <div class="tryptic-left container">
                    <?php if(!empty($page['tryptic_left'])): ?>
                        <?php print render($page['tryptic_left']); ?>                
                    <?php endif; ?>
                </div>
                <div class="tryptic-center container">
                    <?php if(!empty($page['tryptic_center'])): ?>
                        <?php print render($page['tryptic_center']); ?>                
                    <?php endif; ?>
                </div>
                <div class="tryptic-right container">
                    <?php if(!empty($page['tryptic_right'])): ?>
                        <?php print render($page['tryptic_right']); ?>                
                    <?php endif; ?>
                </div>
              </div>
          <?php endif; ?>
      <?php endif; ?>
      
    </div>
      
  </div>
</div>

<?php if ($page['footer']): ?>
  <div id="footer">
    <div class="section clearfix footer-inner">
      <?php print render($page['footer']); ?>
    </div>
  </div> <!-- /.section, /#messages -->
<?php endif; ?>
