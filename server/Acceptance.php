<?php
/**
 * Created by JetBrains PhpStorm.
 * User: stijn
 * Date: 7/23/12
 * Time: 6:21 PM
 * To change this template use File | Settings | File Templates.
 */
class Acceptance extends Message
{
    public function isHigherThen(Message $message) {
        if($this->getValues() != 1 && $message->getValues() !=1) {
            if($this->getValues() > $message->getValues() || $this->getNbOfTimes() > $message->getNbOfTimes())
                return true;
            else
                return false;
        } elseif($this->getValues() == 1) {
            if($this->getNbOfTimes()*2 >= $message->getNbOfTimes())
                return true;
            else
                return false;
        } else {
            if($message->getNbOfTimes()*2 < $message->getNbOfTimes())
                return true;
            else
                return false;
        }
    }

    public function __toString() {
        $str = parent::__toString();
        if(!$this->isFirstMessage())
            $str = $str . "I go higher, ";
        $str = $str . $this->getNbOfTimes() . " times " . $this->getValues() . '"<br>' . "\n";
        return $str;
    }
}
