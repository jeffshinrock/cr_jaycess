<?php
/**
 * @file
 * crj_events.features.inc
 */

/**
 * Implements hook_views_api().
 */
function crj_events_views_api() {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function crj_events_node_info() {
  $items = array(
    'event' => array(
      'name' => t('Event'),
      'base' => 'node_content',
      'description' => t('Create events to add to the calendar'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
