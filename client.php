<?php
require_once 'jsonRPCClient.php';
function __autoload($class_name) {
    include "$class_name.php";
}

$brain = new jsonRPCClient('http://localhost/perudo/server/server.php',true);

// performs some basic operation
try {
    $msgArray = $brain->sendMessage();
    $classType = $msgArray["classType"];
    $msg = new $classType($msgArray["sender"],$msgArray["receiver"],$msgArray["nbOfTimes"],$msgArray["values"],$msgArray["isFirstMessage"]);
} catch (Exception $e) {
    echo nl2br($e->getMessage()).'<br />'."\n";
}

?>