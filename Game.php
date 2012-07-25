<?php
/**
 * Created by JetBrains PhpStorm.
 * User: stijn
 * Date: 7/23/12
 * Time: 6:26 PM
 * To change this template use File | Settings | File Templates.
 */
class Game
{
    private $players = array();
    private $messages = array();
    private $turnNb;

    public function __constructor() {
        $this->turnNb = 0;
    }

    public function getPlayers() {
        return $this->players;
    }

    public function getPlayer($playerNb) {
        return $this->getPlayers()[$playerNb];
    }

    public function getMessages() {
        return clone $this->messages;
    }

    public function getNbOfPlayers() {
        return count($this->getPlayers());
    }

    public function getTurnNb() {
        return $this->turnNb;
    }

    private function setTurnNb($turnNb) {
        $this->turnNb = $turnNb;
    }

    public function addPlayer(Player $player) {
        $i=count($this->players);
        $this->players[++$i] = $player;
    }

    public function addMessage(Message $message) {
        $i=count($this->messages);
        $this->messages[++$i] = $message;
    }

    public function nextTurn() {
        if(count($this->getPlayers())<2)
            throw new Exception("Not enough players to continue/start playing.");
        $this->increaseTurnNb();
        // Generate and add next message to $messages
        $this->addMessage($this->getPlayer($this->getTurnNb())->generateMessage($this->getMessages()));
    }

    private function increaseTurnNb() {
        if($this->getTurnNb() != $this->getNbOfPlayers())
            $this->setTurnNb($this->getTurnNb()+1);
        else $this->setTurnNb(0);
    }
}
