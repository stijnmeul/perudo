<?php
/**
 * Created by JetBrains PhpStorm.
 * User: stijn
 * Date: 7/23/12
 * Time: 6:31 PM
 * To change this template use File | Settings | File Templates.
 */
class Player
{
    private $dices = array();
    private $name = "";
    private $creator = "";
    private $isInGame;
    private $brain;

    function __construct($name, $creator, Brain $brain, $isInGame) {
        $this->dices[0] = new Dice();
        $this->dices[1] = new Dice();
        $this->dices[2] = new Dice();
        $this->dices[3] = new Dice();
        $this->dices[4] = new Dice();

        $this->name = $name;
        $this->creator = $creator;
        $this->isInGame = $isInGame;
        $this->brain = $brain;
    }

    public function winDice() {
        $i = count($this->dices);
        if($i == 5)
            return;
        else {
            $this->dices[$i] = new Dice();
        }
    }

    public function loseDice() {
        $i = count($this->dices);
        if($i!=0)
            unset($this->dices[--$i]);
    }

    public function getDices() {
        return $this->dices;
    }

    public function getDiceNumbers() {
        $diceNumbers = array();
        $i=0;
        while($i < count($this->getDices())) {
            $diceNumbers[$i] = $this->getDices()[$i]->getValue();
            $i++;
        }
        return $diceNumbers;
    }

    public function rollDices() {
        foreach($this->dices as &$dice) {
            /**
             * @var Dice $dice
             */
            $dice->roll();
        }
    }

    public function hasLeftGame() {
        $this->isInGame = false;
    }

    private function getBrain() {
        return $this->brain;
    }

    public function generateMessage($prevPlayerMessages) {
        $this->getBrain()->generateMessage($this->getDiceNumbers(),$prevPlayerMessages);
    }
}
