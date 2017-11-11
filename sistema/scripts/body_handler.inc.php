<?php
if (isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != "")  {
	echo "<SCRIPT LANGUAGE=\"JavaScript\"><!--\n"; 
	echo "function llamar(){\n";
	echo  "alert(\"{$_SESSION['ErrorThrown']}\");\ndocument.location =\"".$_SERVER['PHP_SELF']."\";\nreturn true;\n";
	echo  '}';
	echo  "//--></SCRIPT>\n";
	echo "<body onLoad=\"llamar()\";";
	if (isset($autocomplete)) {
		echo "\"createAutoComplete()\";";
	}
	echo ">";
	unset($_SESSION['ErrorThrown']);
}
else{
  echo "<body onLoad=";
  if (isset($autocomplete)) {
		echo "\"createAutoComplete()\";";
	}
	//echo "\"muestraReloj()\";\"MM_preloadImages('imagenes/browser/atrasover.jpg','imagenes/browser/adelanteover.jpg','imagenes/browser/cerrarsesionover.jpg','imagenes/browser/homeover.jpg','imagenes/browser/imprimirover.jpg')\";>";
}		
?>