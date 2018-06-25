<?php
/**
 * @package PHPLite
 * @subpackage Commands
 */

require_once "WebRequest.class.php";

/**
 * Constantes para el manejo de errores
 */
define("ERROR_CAMPO_OBLIGATORIO", 100);
define("ERROR_ENTRADA_NO_VALIDA", 104);

/**
 * Comando para Autenticar un usuario
 * @author JFMI 2018
 * @copyright PhpLite
 */
class CmdLoginAdmin {

	/**
	 * @return boolean 
	 */
	
	function execute()
    {   
        //delete session for forms
        WebSession::unsetPropertyForms();
		extract($_REQUEST);
		//valida que los campos obligatorios no esten vacios
		if(($login__EMAIL != "") && ($login__EMAIL != NULL) && 
		   ($login__PASSWORD != "") && ($login__PASSWORD != NULL)
		   ){

			
			//1ero Instancio el Manager de Autenticacion despues que tengo el id de empresa
			$usuario_manager = Application::getDomainController('UsuarioManager');
			
			//2do Valido las credenciales del usuario
			$message = $usuario_manager->getExisteUSUARIO($login__EMAIL,$login__PASSWORD); 
			WebRequest::setProperty('cod_message', $message);

	
			if($message == 103)			  
			{
              
   		      return "success";  				
				
			}
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
