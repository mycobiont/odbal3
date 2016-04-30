<?php
// A couple things to be aware of, for security:
// 1. URL arguements are passed to a variable in the App class
//    with sanitation by mysqli real_escape_string, then eliminated
//    from $_GET (replaced with "prohibited".
// 2. The application uses prepared statements for a second protection
//    from sql injection; any custom programming should do the same.

include "./main/AppCore.php";
$App = new AppCore("../odbal3.conf");
 
