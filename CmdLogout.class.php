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
class CmdLogout {

	/**
	 * @return boolean 
	 */
	
	function execute()
    {   
        //delete session for forms
        WebSession::unsetPropertyForms();
		extract($_REQUEST);
		
		if (isset($_REQUEST)) {
			
			WebSession::close();
			WebRequest::setProperty('cod_message',$message);

		}

	
			if($message == 103)			  
			{
              
   		      return "success";  				
				
			}
			else
              return "fail";			
            
     
		}
		else{
	        $message = ERROR_CAMPO_OBLIGATORIO;
			
			return "fail";
		}		
	
    }


}

?>	