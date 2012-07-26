<?php
require_once 'jsonRPCClient.php';
function __autoload($class_name) {
    include "$class_name.php";
}

$brain = new jsonRPCClient('http://localhost/perudo/server/server.php',true);

// performs some basic operation
try {
    $firstMessage = new Acceptance("Stijn", "J-P", 3, 5, true);
    $secondMessage = new Acceptance("J-P", "Stijn", 4, 5);

    $prevPlayerMessages = array();
    $prevPlayerMessages[0] = $firstMessage->makeSendable();
    $prevPlayerMessages[1] = $secondMessage->makeSendable();

    $var = toArrayOfMessages($prevPlayerMessages);

    $nbOfPlayerDices = array();
    $nbOfPlayerDices["Stijn"] = 5;
    $nbOfPlayerDices["J-P"] = 5;

    $msgArray = $brain->sendMessageToClient($prevPlayerMessages, $nbOfPlayerDices);
    $classType = $msgArray["classType"];
    $msg = new $classType($msgArray["sender"],$msgArray["receiver"],$msgArray["nbOfTimes"],$msgArray["values"],$msgArray["isFirstMessage"]);
} catch (Exception $e) {
    echo nl2br($e->getMessage()).'<br />'."\n";
}

function toArrayOfMessages(array $messages) {
    $i=0;
    $result = array();
    foreach($messages as $message) {
        $classType = $message["classType"];
        $result[$i] = new $classType($message["sender"],$message["receiver"],$message["nbOfTimes"],$message["values"],$message["isFirstMessage"]);
        $i++;
    }
    return $result;
}

?>