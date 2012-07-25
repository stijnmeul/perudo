<?php
/**
 * Created by JetBrains PhpStorm.
 * User: stijn
 * Date: 7/23/12
 * Time: 6:20 PM
 * To change this template use File | Settings | File Templates.
 */
abstract class Message
{
    private $sender;
    private $receiver;
    private $nbOfTimes;
    private $values;
    private $isFirstMessage;

    function __construct($sender, $receiver, $nbOfTimes, $values,$isFirstMessage=false) {
        $this->sender=$sender;
        $this->receiver=$receiver;
        $this->nbOfTimes=$nbOfTimes;
        $this->values=$values;
        $this->isFirstMessage=$isFirstMessage;
    }

    public function getSender() {
        return $this->sender;
    }

    public function getReceiver() {
        return $this->receiver;
    }

    public function getNbOfTimes() {
        return $this->nbOfTimes;
    }

    public function getValues() {
        return $this->values;
    }

    public function isFirstMessage() {
        return $this->isFirstMessage;
    }

    public abstract function isHigherThen(Message $message);

    public function __toString() {
        return "<b>" . $this->getSender() . "</b> says to <b>" . $this->getReceiver() . '</b>:"';
    }
}
