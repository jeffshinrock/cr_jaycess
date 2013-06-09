<?php
/**
 * @file
 * hero.features.inc
 */

/**
 * Implements hook_node_info().
 */
function hero_node_info() {
  $items = array(
    'hero' => array(
      'name' => t('Hero'),
      'base' => 'node_content',
      'description' => t('Home page hero'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
