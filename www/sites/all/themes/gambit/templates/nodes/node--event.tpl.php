<?php

//dpm($variables);

print render($variables['content']['body']);

print "<a href=\"/event/signup/{$variables['nid']}\" class=\"btn\">Register</a>";

if(isset($variables['event_map'])){
  print $variables['event_map'];
}