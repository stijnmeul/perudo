<?php
/**
 * Created by JetBrains PhpStorm.
 * User: stijn
 * Date: 7/23/12
 * Time: 6:23 PM
 * To change this template use File | Settings | File Templates.
 */
class Exact extends Message
{
    public function isHigherThen(Message $message) {
        return true;
    }

    public function __toString() {
        $str = parent::__toString();
        return $str . "It's exact, " . $this->getNbOfTimes() . " times " . $this->getValues() . '"<br>' . "\n";
    }
}
