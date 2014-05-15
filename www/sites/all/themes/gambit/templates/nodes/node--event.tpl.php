<?php 

  $is_map = isset($variables['event_map']) ? TRUE : FALSE;
  $map = ($is_map) ? $variables['event_map'] : '';
  $class = ($is_map) ? " map" : '';
    
?>


<div class="event-body<?php print $class; ?>">
<?php print render($variables['content']['body']); ?>

<?php print "<div class=\"registration\"><a href=\"/event/signup/{$variables['nid']}\" class=\"btn\">Register</a></div>"; ?>
</div>

<?php if($is_map): ?>
<div class="event-map">
  <?php print $map; ?>
</div>
<?php endif; ?>