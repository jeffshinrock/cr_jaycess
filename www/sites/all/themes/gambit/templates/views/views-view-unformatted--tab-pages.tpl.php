

<?php 

$slides = '';

foreach ($view->result as $id => $row): 
  
  $node = node_load($row->nid);
  
  //dpm($node);
  
  $slides.= '<li>';
    $slides .= $node->body['und'][0]['safe_value'];
  $slides .= '</li>';

endforeach; 

?>

<div id="tab-pages">
  <ul id="tab-slides">
    <?php print $slides; ?>
  </ul>
</div>


<?php 
  $flexslider = drupal_get_path('theme','gambit') . '/js/jquery.flexslider-min.js';
  $slideshow_js = drupal_get_path('theme','gambit') . '/js/slideshow.js';
  drupal_add_js($flexslider, 'file');
  drupal_add_js($slideshow_js, 'file');
?>