<?php
// Making this a standard php file makes it more difficult
// for hackers to obtain the passwords

// The first secion is for the app to communicate with the database
$DB = "";
$HOST = "localhost";
$GUEST_USER = "";
$GUEST_PASS = "";
$EDITOR_USER = "";
$EDITOR_PASS = "";

// These should be commended out and the values removed 
// after database setup.
// These provide the administrative user and password for 
// establishing the App.
$SETUP = "true";
$ADMIN_USER = "";
$ADMIN_PASS = "";

// General global variables:
$DEBUG = true;
$LOGFILE_URL_REQUESTS = "log_url_requests.log";
$LOGFILE = "log.log";
$LOGFILE_DEBUG = "log_debug.log";