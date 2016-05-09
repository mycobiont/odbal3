<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function logURLrequest() {
  if(isset($LOGFILE_URL_REQUESTS)){
    $filename = $LOGFILE_URL_REQUESTS;
  } else {
    $filename = "./log_url_requests.log";
  }
  $file = fopen($_SERVER['DOCUMENT_ROOT'] . $filename, "a");
  if(!$file) {
    echo 'could not establish log file: ' . $_SERVER['DOCUMENT_ROOT'] . $filename;
    exit();
  }
  $r = fwrite($file,
          date("Y-m-d H:i:s T") . ' '
          . $_SERVER['REMOTE_ADDR']
          . ' (' . $_SERVER['REMOTE_HOST'] . ') '
          . $_SERVER['PHP_SELF']
          . (strlen($_SERVER['QUERY_STRING']) > 0 ? '?' . $_SERVER['QUERY_STRING'] : '')
          . "\n");
  fclose($file);
  return $r;  
}

$LOGARRAY = array();
$DEBUGARRAY = array();
        
function shutdownLog() {
  if(isset($LOGFILE)){
    $filename = $LOGFILE;
  } else {
    $filename = "./log.log";
  }
  $file = fopen($_SERVER['DOCUMENT_ROOT'] . $filename, "a");
  if(!$file) {
    echo 'could not establish log file: ' . $_SERVER['DOCUMENT_ROOT'] . $filename;
    exit();
  }
  foreach($LOGARRAY as $logline) {
    $r = fwrite($file, $logline . "\n");
  }
  $r = fwrite($file, date("Y-m-d H:i:s T") . ' complete.' . "\n");
  fclose($file);

  if($DEBUG) {
    if(isset($LOGFILE_DEBUG)){
      $filename = $LOGFILE_DEBUG;
    } else {
      $filename = "./log_debug.log";
    }
    $file = fopen($_SERVER['DOCUMENT_ROOT'] . $filename, "a");
    if(!$file) {
      echo 'could not establish log file: ' . $_SERVER['DOCUMENT_ROOT'] . $filename;
      exit();
    }
    foreach($DEBUG as $debugline) {
      $r = fwrite($file, $debugline . "\n");
    }
    $r = fwrite($file, date("Y-m-d H:i:s T") . ' complete.' . "\n");
    fclose($file);
    return;    
  }
}
