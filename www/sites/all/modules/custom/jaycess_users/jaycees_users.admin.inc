<?php

function jaycees_users_admin_form($form, &$form_state){
  $form = array();
  
  $form['jaycees_users_dues_dates'] = array(
    '#type' => 'checkbox',
    '#title' => 'Display due date collection on the user form', 
    '#default_value' => variable_get('jaycees_users_dues_dates',0),
  );
  
  $roles = user_roles();
  
  $form['jaycees_users_dues_dates_roles'] = array(
    '#type' => 'checkboxes',
    '#prefix' => '<div id="jaycees_users_group_opts">',
    '#title' => 'Display due date collection', 
    '#options' => $roles,
    '#description' => t('Roles dues dates will apply to.'),
    '#default_value' => variable_get('jaycees_users_dues_dates_roles',array()),
  );
  
  $form['jaycees_users_collection_methods'] = array(
    '#type' => 'textarea',
    '#title' => 'Collection methods available for member dues', 
    '#description' => t('Enter a comma separated list of payment methods accepted for user dues.'),
    '#default_value' => variable_get('jaycees_users_collection_methods',''),
  );
  
  $form['jaycees_users_collection_values'] = array(
    '#type' => 'textarea',
    '#title' => 'Collection methods available for member dues', 
    '#description' => t('Enter a comma separated list of dues values.'),
    '#default_value' => variable_get('jaycees_users_collection_values',''),
  );
  
  $form['jaycees_users_dues_timeframe'] = array(
    '#type' => 'textfield',
    '#title' => 'Timeframe to check if dues are present',
    '#description' => t('Time (in days) that the system will check if dues are current'),
    '#default_value' => variable_get('jaycees_users_dues_timeframe','365'),
  );
  
  $form['mail']['jaycees_users_send_mail'] = array(
    '#type' => 'checkbox',
    '#title' => 'Send users an email when their dues are about to expire',
    '#default_value' => variable_get('jaycees_users_send_mail',0),
  );
  
  $values = array('1' => t('1 day'), '2' => t('2 days'), '3' => t('3 days'), '7' => t('1 week'), '14' => t('2 weeks'), '21' => t('3 weeks'), '30' => t('1 months'), '60' => t('2 months'), '90' => t('3 months'));
  
  $form['mail']['jaycees_users_send_mail_interval'] = array(
    '#type' => 'checkboxes',
    '#title' => 'Mail interval',
    '#options' => $values,
    '#default_value' => variable_get('jaycees_users_send_mail_interval',array()),
  );
  
  $form['alert']['jaycees_users_alert'] = array(
    '#type' => 'checkbox',
    '#title' => 'Alert user (when signed in) if they are past due',
    '#suffix' => '</div>',
    '#default_value' => variable_get('jaycees_users_alert',array()),
  );
  
  return system_settings_form($form);
}