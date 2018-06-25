<?php

/*;
  // you can define the commando extending the WebCommand
  
  require_once "Web/WebCommand.php";
  class DefaultCommand extends WebCommand {
  }
  // really... is not neccesary extend the WebCommand
*/

require_once "WebRequest.class.php";
define("EXITO_OPERACION_REALIZADA", 107);
define("ERROR_TOKEN_NOT_VALIDO", 108);

class CmdAdminConfirm {
    function execute() {
          
        //delete session for forms
        WebSession::unsetPropertyForms();
		    extract($_REQUEST);
		    //valida que los campos obligatorios no esten vacios
		
			
			   //1ero Instancio el Manager de Autenticacion despues que tengo el id de empresa
			   $usuario_manager = Application::getDomainController('UsuarioManager');
			
			
			   //2do Valido las credenciales del usuario
			   $message = $usuario_manager->confirmacion($value); 
          WebRequest::setProperty('cod_message', $message);
            
            if($message == 107){
                return  "success";
            }else{
                return "fail";
            }
    }
}

?>