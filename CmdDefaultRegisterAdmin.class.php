<?php

/*
  // you can define the commando extending the WebCommand
  
  require_once "Web/WebCommand.php";
  class DefaultCommand extends WebCommand {
  }
  // really... is not neccesary extend the WebCommand
*/

require_once "WebRequest.class.php";

class CmdDefaultRegisterAdmin {
    function execute() {


	WebSession::unsetSessionIAuth();
        return "success";
    }
}

?>