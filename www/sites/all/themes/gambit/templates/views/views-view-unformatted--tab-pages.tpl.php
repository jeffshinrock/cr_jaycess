<?php 

$slides = '';

$tabs = '';

$i = 0;

foreach ($view->result as $id => $row): 

  $class = ($i == 0) ? "first" : "";
  
  $node = node_load($row->nid);
  
  $tabs .= '<li class="' . $class . '">' . $row->node_title . '</li>';
  
  if(!empty($node->field_hero_image_full) && !empty($node->field_hero_image_mobile)){
    if(!empty($node->field_hero_image_full)){
      $img_full['path'] = file_create_url($node->field_hero_image_full['und'][0]['uri']);
      $img_full['attributes'] = array('class' => 'full');
    }
    if(!empty($node->field_hero_image_mobile)){
      $img_mobile['path'] = file_create_url($node->field_hero_image_mobile['und'][0]['uri']);
      $img_mobile['attributes'] = array('class' => 'mobile');
    }
  }
  
  $slides.= '<li>';
    $slides .= '<div class="edit-node"><a href="/node/'.$node->nid.'/edit">Edit Node</a></div>';
    $slides .= '<div class="hero-img">';
      $slides .= (!empty($img_full) ? theme_image($img_full) : '');
      $slides .= (!empty($img_mobile) ? theme_image($img_mobile): '');
    $slides .= '</div>';
    $slides .= '<h1>' . $row->node_title . '</h1>';
    $slides .= $node->body['und'][0]['safe_value'];
  $slides .= '</li>';
  
  $i++;

endforeach; 

?>

<div id="tab-page-container">
  <div id="tab-titles-container">
    <ul id="tab-titles" class="clearfix">
      <?php print $tabs; ?>
    </ul>
  </div>
  
  <div id="tab-page-slides">
    <ul id="tab-slides">
      <?php print $slides; ?>
    </ul>
  </div>
</div>


<?php 
  $flexslider = drupal_get_path('theme','gambit') . '/js/jquery.flexslider-min.js';
  $slideshow_js = drupal_get_path('theme','gambit') . '/js/slideshow.js';
  drupal_add_js($flexslider, 'file');
  drupal_add_js($slideshow_js, 'file');
?>