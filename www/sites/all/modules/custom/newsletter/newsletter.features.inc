<?php
/**
 * @file
 * newsletter.features.inc
 */

/**
 * Implements hook_node_info().
 */
function newsletter_node_info() {
  $items = array(
    'newsletter' => array(
      'name' => t('Newsletter'),
      'base' => 'node_content',
      'description' => t('Newsletter item'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
