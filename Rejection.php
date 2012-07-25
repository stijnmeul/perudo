<?php
/**
 * Created by JetBrains PhpStorm.
 * User: stijn
 * Date: 7/23/12
 * Time: 6:22 PM
 * To change this template use File | Settings | File Templates.
 */
class Rejection extends Message
{
    public function isHigherThen(Message $message) {
        return true;
    }

    public function __toString() {
        $str = parent::__toString();
        return $str . "You're lying, " . $this->getNbOfTimes() . " times " . $this->getValues() . ' is too high!"<br>' . "\n";
    }

}
