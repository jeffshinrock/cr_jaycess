<?php

function jaycees_users_dues($form, &$form_state){
  $form = array();
      
  if(arg(1) > 0){    
  
    //is user current
    $user = db_query("SELECT uid, current FROM jaycees_users_records WHERE uid=:uid",array(":uid" => arg(1)))->fetchObject();
  
    //check to see if dues were ever collected
    $last_collected = db_query("SELECT dues_date FROM jaycees_users_dues WHERE uid = :uid ORDER BY dues_date_year DESC",array(':uid' => arg(1)))->fetchObject();    
    
    //if so, due date will be last dues collected date + dues time variable
    if(!empty($last_collected)){
      $due_date =  strtotime(date("m/j/Y", $last_collected->dues_date) . ' +' . variable_get('jaycees_users_dues_timeframe') .' days');
      //$due_date = date('j/d/Y', $due_date);
    } else {
    //if not, due date will be join date
     $due_date = db_query("SELECT field_join_date_value FROM field_data_field_join_date WHERE entity_id = :uid",array(":uid" => arg(1)))->fetchObject();   
     $due_date = $due_date->field_join_date_value;
     $due_date = strtotime($due_date);
    }
    
  }

  $form['jaycees_users']['due_date'] = array(
    '#title' => t('Due date'),
    '#type' => 'textfield',
    '#description' => t('Date (for current year) dues are expected'),
    '#default_value' => date("m/j/Y",$due_date),
    '#disabled' => (user_access('administer jaycees users')) ? FALSE : TRUE,
  );
  
  $form['jaycees_users']['dues_date'] = array(
    '#title' => t('Dues Collected Date'),
    '#type' => 'textfield',
    '#description' => t('Date that dues were last collected (mm/dd/YYYY)'),
    '#default_value' => (empty($last_collected)) ? 'Never Collected' : date("m/j/Y", $last_collected->dues_date),
    '#disabled' => (user_access('administer jaycees users')) ? FALSE : TRUE,
  );
  
  $vals = variable_get('jaycees_users_collection_values');
  $vals = explode(",",$vals);
  $opts = array();
  foreach($vals as $val){
    $opts[$val] = $val;
  }
  
  $form['jaycees_users']['dues_value'] = array(
    '#title' => t('Dues Amount Collected'),
    '#type' => 'select',
    '#options' => $opts,
    '#disabled' => (user_access('administer jaycees users')) ? FALSE : TRUE,
  );
  
  $form['jaycees_users']['current'] = array(
    '#title' => t('Current'),
    '#type' => 'checkbox',
    '#description' => t('(determined by system)'),
    '#default_value' => (empty($user->current)) ? 0 : 1,
    '#disabled' => TRUE,
  );
  
  $form['jaycees_users']['past_due'] = array(
    '#type' => 'hidden',
    '#default_value' => (empty($current)) ? 0 : 1,
  );
  
  $methods = variable_get('jaycees_users_collection_methods');
  $methods = explode(",",$methods);
  $opts = array();
  foreach($methods as $method){
    $opts[$method] = $method;
  }
  
  $form['jaycees_users']['payment_method'] = array(
    '#title' => t('Payment Method'),
    '#type' => 'select',
    '#descriptions' => t('Method of payment'),
    '#options' => $opts,
    '#disabled' => (user_access('administer jaycees users')) ? FALSE : TRUE,
  );
  
  if(user_access('administer jaycees users')){
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => 'Update Member',
    );
  }
  
  return $form;
}

function jaycees_users_dues_submit($form, &$form_state){
  
  if(strtotime($form_state['values']['due_date']) < strtotime($form_state['values']['dues_date'])){
    $past_due = 1;
  } else {
    $past_due = NULL;
  }
  
  $record = array(
    'uid' => arg(1),
    'dues_date' => strtotime($form_state['values']['dues_date']),
    'dues_date_year' => date("Y",strtotime($form_state['values']['dues_date'])),
    'payment_method' => $form_state['values']['payment_method'],
    'past_due' => $past_due,
    'payment_value' => $form_state['values']['dues_value'],
  );
  
  drupal_write_record('jaycees_users_dues',$record);
  
  $user = db_query("SELECT uid FROM jaycees_users_records WHERE uid=:uid",array(":uid" => arg(1)))->fetchObject();
  
  if(strtotime($form_state['values']['due_date']) > strtotime($form_state['values']['dues_date'])){
    $current = 1;
  } else {
    $current = 0;
  }
  
  $record = array(
    'uid' => arg(1),
    'current' => $current,
  );
  
  if(!empty($user)){
    drupal_write_record('jaycees_users_records',$record, 'uid');
  } else {
    drupal_write_record('jaycees_users_records',$record);
  }
  
}