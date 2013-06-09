<?php
/**
 * @file
 * events.features.inc
 */

/**
 * Implements hook_node_info().
 */
function events_node_info() {
  $items = array(
    'event' => array(
      'name' => t('Event'),
      'base' => 'node_content',
      'description' => t('Create events to add to the calendar'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'event_registration' => array(
      'name' => t('Event Registration'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'volunteer_hours' => array(
      'name' => t('Volunteer Hours'),
      'base' => 'node_content',
      'description' => t('Create volunteer hours to associate with a particular event to allow members to register and automatically track hours'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
