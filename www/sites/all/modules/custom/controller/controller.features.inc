<?php
/**
 * @file
 * controller.features.inc
 */

/**
 * Implements hook_node_info().
 */
function controller_node_info() {
  $items = array(
    'page' => array(
      'name' => t('Primary Page'),
      'base' => 'node_content',
      'description' => t('Use this page for a top-level page of your site. Each Primary Page will have a category replicated in taxonomy. Tab pages (tagged with the same taxonomy category as Primary Page) will be automatically pulled into the Primary Page as tabbed content.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'tab_page' => array(
      'name' => t('Tab Page'),
      'base' => 'node_content',
      'description' => t('These pages will be pulled into the Primary Pages of the category in which they\'re tagged.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
