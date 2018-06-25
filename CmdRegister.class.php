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
class CmdRegister {

	/**
	 * @return boolean 
	 */
	
	function execute()
    {   
        //delete session for forms
        WebSession::unsetPropertyForms();
		extract($_REQUEST);
		//valida que los campos obligatorios no esten vacios
		if(($nombre != "") && ($nombre != NULL) && 
		   ($correo != "") && ($correo != NULL)
           && ($contrasena != "") && ($contrasena != NULL)
           && ($apellido != "") && ($apellido != NULL)
           && ($cedula != "") && ($cedula != NULL)
           && ($telefono != "") && ($telefono != NULL)
		   ){

			
			//1ero Instancio el Manager de Autenticacion despues que tengo el id de empresa
			$usuario_manager = Application::getDomainController('UsuarioManager');
			$token =substr(str_shuffle("0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM"),0,20);
			$id_empresa = 1;
			$estado = 0;
			
			//2do Valido las credenciales del usuario
			$message = $usuario_manager->addUSUARIO($id_empresa,$nombre,$apellido,$correo ,$contrasena,$cedula,$telefono,$estado,$token); 
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
