<?php

function jaycees_users_cron(){

  if(variable_get('jaycees_users_dues_dates')){
    //get all records where users are current
    $members = db_query('SELECT uid FROM jaycees_users_records WHERE current = 1');
    //check each member to see if they are no longer current
    foreach($members as $member){
      $last_collected = db_query("SELECT dues_date FROM jaycees_users_dues WHERE uid = :uid ORDER BY dues_date DESC",array(':uid' => $member->uid))->fetchObject();  
      
      $int = strtotime(date("m/j/Y", $last_collected->dues_date) . ' +' . variable_get('jaycees_users_dues_timeframe') . ' days');      
      if($int < strtotime('now')){
        $record = array(
          'uid' => $member->uid,
          'current' => 0,
        );
        drupal_write_record('jaycees_users_records',$record, 'uid');
      }
    }
  }

  
}