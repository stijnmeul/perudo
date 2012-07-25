<?php
/**
 * Created by JetBrains PhpStorm.
 * User: stijn
 * Date: 7/23/12
 * Time: 6:38 PM
 * To change this template use File | Settings | File Templates.
 */
class Dice
{
    private $value;

    public function roll() {
    $this->value = mt_rand(1,6);
    return $this->value;
}

    public function getValue() {
    return $this->value;
}

}
