<?php
/**
 * @file
 * grid.features.inc
 */

/**
 * Implements hook_node_info().
 */
function grid_node_info() {
  $items = array(
    'grid_item' => array(
      'name' => t('Grid Item'),
      'base' => 'node_content',
      'description' => t('Add a grid item that will be displayed in the right bar'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
