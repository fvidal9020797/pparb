<?php
session_start();

/**
 * Logs a user out of the app
 *
 * $Id: logout.php,v 1.3 2003/09/10 01:55:52 chriskl Exp $
 */
/*	session_unregister('MM_Username');	
	session_unregister('MM_UserGroup');	
	session_unregister('MM_UserId');	
	session_unregister('MM_Password');	
	session_unregister('PrevUrl');
	   if ((isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  {
	 session_unregister("ErrorThrown");
}

if (!ini_get('session.auto_start')) {
	session_name('PPA_ID'); 
	session_start();
}*/
unset($_SESSION);
session_destroy();
echo "<head><script>parent.location.href='../acceso.php';</script></head>";
//header('Location: acceso.php');
exit;
?>
