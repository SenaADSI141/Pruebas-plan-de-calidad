<?php

define("ERROR_CAMPO_OBLIGATORIO", 100);
define("ERROR_ENTRADA_NO_VALIDA", 104);
/*
  // you can define the commando extending the WebCommand
  
  require_once "Web/WebCommand.php";
  class DefaultCommand extends WebCommand {
  }
  // really... is not neccesary extend the WebCommand
*/

require_once "WebRequest.class.php";

class CmdLoadEventImage {
    function execute() {
        //delete session for forms
        WebSession::unsetPropertyForms();
		extract($_REQUEST);
        
		//valida que los campos obligatorios no esten vacios

		if(($EVENID != "") && ($EVENID != NULL) && 
		   ($archivo_descripcion != "") && ($archivo_descripcion != NULL) 
		   ){

			//1ero Instancio el Manager de ArchivoManager despues 
			$archivo_manager = Application::getDomainController('EvenimagManager');
			
			$message = $archivo_manager->addArchivo($EVENID,$archivo_nombre,$archivo_descripcion); 
			WebRequest::setProperty('cod_message', $message);
            
			if ($message == 103)
			  return "success";
			else
			  return "fail";
	    	
		}
		else{
			
	        $message = ERROR_CAMPO_OBLIGATORIO;
			WebRequest::setProperty('cod_message',$message);
			return "fail";
		}			   	
		
       
    }
}

?>

