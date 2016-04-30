<?php

class AppCore {
// Constructor is to handle security including early 
// sanitation of URL arguements and user access identification
// after that, arguements will be eliminated so are only
// accessible in the sanitized form, and all functions
// will be made with proper user context.
// Sets will need to specifically establish user access level
// or will not be visible at all.

 function __construct($primaryConf) {
  echo $primaryConf;
  }
 
 
 } // end class AppCore
