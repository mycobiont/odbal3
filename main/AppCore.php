<?php

include "Logging.php";
register_shutdown_function('shutdownLog');

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
   //Absolute first thing... log the URL request with IP
   if ($DEBUG) $DEBUG_ARRAY[] = "Constructing AppCore";
   if(!logURLrequest()) {
     echo "Internal logging error.";
     exit();
   }
   echo "Loading...<br />";
   include $primaryConf;
   $this->URLargs = $this->SanitizeURL(); 
   echo print_r($this->URLargs, true);
   $this->DBconn1 = new mysqli($HOST, $GUEST_USER, $GUEST_PASS, $DB);
   if (mysqli_connect_errno()) {
     $LOGARRAY[] = "DB connection failed with guest user. mysqli_connect_errno = " 
             . mysqli_connect_errno() . ', ' 
             . mysqli_connect_error();
     echo "Failed. Contact administrator."; 
     exit();
   }
   if (!$this->DBconn1->set_charset("utf8")) {
     // see https://www.toptal.com/php/a-utf-8-primer-for-php-and-mysql
     $LOGARRAY[] = "Error loading character set utf8: " . $mysqli->error;
     echo "Failed. Contact administrator."; 
     exit();
   }
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
