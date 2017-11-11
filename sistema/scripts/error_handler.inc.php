<?php
// redefine the user error constants - PHP4 only
define ('FATAL','E_USER_ERROR');
define ('ERROR','E_USER_WARNING');
define ('WARNING','E_USER_NOTICE');



// set the error reporting level for this script
//error_reporting  (FATAL + ERROR);
error_reporting  (FATAL + ERROR + WARNING);

// error handler function
function ErrorHandler ($errno, $errstr) 
	{
	$error = explode (':', addcslashes ($errstr, "\0..\37!@\177..\377")); //a�ade  '\' a los saltos de linea y divide el mensaje de error entre ':'
	$err = explode ('\\n',$error[3]); //divide el nuevo mensaje de error al encontrar un '\n'
	$num = count($error);
	//print_r($error);
	if (!(isset($_SESSION['ErrorThrown']) && $_SESSION['ErrorThrown'] != ""))  
		{
		$msg = 'Error desconocido';
	
		switch ($errno) 
			{
			case 2:		
				if (substr_count($error[3],'usuario') == 1) 
					{$msg = "Nombre de Usuario o Contrase&ntilde;a  no v&aacute;lidos.";}
                                        
				elseif ( substr_count($error[3],'supplied') == 1)  
					{   $msg = "Debe introducir su Contrasena"; }
				else 
					{// GENERALMENTE ERRORES QUE SON LANZADOS POR LOS TRIGGERS
					 $msg = addcslashes ($error[3], "\0..\37!@\177..\377\363");	
					 }
					
				//$msg = addcslashes ($error[3], "\0..\37!@\177..\377");break;
		     // echo  $error[3];
			  break;
			case FATAL:
				$msg = addcslashes ($errstr, "\0..\37!@\177..\377");break;
			case ERROR:
				$msg = addcslashes ($errstr, "\0..\37!@\177..\377");break;
			case WARNING:
				$msg = $err[0];break;
			default:
				$msg = addcslashes ($errstr, "\0..\37!@\177..\377");break;
			}
			
		//$GLOBALS['ErrorThrown'] = " ".addslashes(html_entity_decode($msg));
		$GLOBALS['ErrorThrown'] = "Verifique: ".addslashes(html_entity_decode($msg));
                $_SESSION['ErrorThrown'] =  $msg;
		}
	}
	?>