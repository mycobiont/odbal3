<?php

class AppCore {
 // Constructor is to handle security including early 
 // sanitation of URL arguements and user access identification
 // after that, arguements will be eliminated so are only
 // accessible in the sanitized form, and all functions
 // will be made with proper user context.
 // Sets will need to specifically establish user access level
 // or will not be visible at all.
 public $URLargs;
 private $DBconn1;
 private $DBconn2;
 
 function __construct($primaryConf) {
  echo "Loading...<br />";
  include $primaryConf;
  $this->DBconn1 = new mysqli($host, $user_guest, $pass_guest, $db);
  if (mysqli_connect_errno()) {
   echo("Connect failed: " . mysqli_connect_error());
   exit();
   }
  if (!$this->DBconn1->set_charset("utf8")) {
   // see https://www.toptal.com/php/a-utf-8-primer-for-php-and-mysql
   printf("Error loading character set utf8: %s\n", $mysqli->error);
   exit();
   }
  $this->URLargs = $this->SanitizeURL(); 
  echo print_r($this->URLargs, true);
  }
  
 function SanitizeURL() {
  foreach ($_GET as $key => $value) {
   $a[$key] = $this->DBconn1->real_escape_string($value);
   $_GET[$key] = "prohibited";
   // echo $value . '<br />';
   }
  return $a;
  }
 
 
 } // end class AppCore
