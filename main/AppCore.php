<?php

include "Logging.php";

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
  $testconn = new mysqli($host, $user_guest, $pass_guest);
  if(!$q = $testconn->prepare("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?")) {
   echo "Error. Contact administrator.";
   exit();
   }
  if(!$q->bind_param("s", $db)) {
   echo "Error. Contact administrator.";
   exit();   
   }
  if(!$q->execute()) {
   echo "Error. Contact administrator.";
   exit();   
   }
   $result = $q->get_result();
   while ($row = $result->fetch_array(MYSQLI_NUM)) {
    foreach ($row as $r) {
     print "$r ";
     }
    print "\n";
    }
  $this->DBconn1 = new mysqli($host, $user_guest, $pass_guest, $db);
  if (mysqli_connect_errno()) {
   // if database doesn't exist, then head into setup
   echo("Connect failed: " . mysqli_connect_errno()); //mysqli_connect_error());
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
