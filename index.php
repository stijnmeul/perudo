<?php

function __autoload($class_name) {
    include "$class_name.php";
}

$myMessage = new Acceptance("Stijn","Eline",3,5,true);
$herMessage = new Acceptance("Eline","Patrick",4,5);
$hisMessage = new Acceptance("Patrick", "Stijn", 5,5);

print $myMessage;
print $herMessage;
isHigher($herMessage, $myMessage);
print $hisMessage;
isHigher($hisMessage,$herMessage);

function isHigher(Message $thisMessage, Message $thatMessage) {
    if($thisMessage->isHigherThen($thatMessage))
        echo "Is it higher? True";
    else echo "Is it higher? False";
}
echo "<br>";
echo "<br>";

$myDice = new Dice();

$myPlayer = new Player("winner", "Stijn", true);
$myPlayer->rollDices();
print_r($myPlayer->getDiceNumbers());

$var = $myMessage->toArray();
$var["classType"] = get_class($myMessage);
echo "test";

