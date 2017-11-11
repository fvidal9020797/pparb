<?php 
set_time_limit(100000); 
include_once('sistema/scripts/error_handler.inc.php');
// set to the user defined error handler
$old_error_handler = set_error_handler("ErrorHandler");
include "sistema/Valid.php";
?>