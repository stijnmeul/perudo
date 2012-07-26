<?php

function __autoload($class_name) {
    include "$class_name.php";
}

/**
 * An immaginative class. You can immagine a DB interface instead or what you want
 *
 * @author sergio <jsonrpcphp@inservibile.org>
 */
class brain {

    private function generateMessage() {
        /**
         * hier komt het stukje dat messages gaat genereren
         */
        return new Acceptance("host", "client", 2, 5, true);
    }

    public function sendMessage() {
        $msg = $this->generateMessage();
        $msgArray = $msg->toArray();
        $msgArray["classType"] = get_class($msg);
        return $msgArray;
    }
}
?>