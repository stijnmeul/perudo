<?php

function __autoload($class_name) {
    include "$class_name.php";
}

/**
 * This brain class does the artificial intelligence hocus pocus in our Perudo game.
 *
 * @author Stijn Meul <stijn.meul@gmail.com>
 */
class brain {

    /**
     * @param   $prevPlayerMessages
     *          | A numbered array of all the playermessages during this game.
     * @param   $nbOfPlayerDices
     *          | A key-value array which gives an overview of the ingame players and their dices.
     * @return  Message
     *          | The generated message
     */
    private function generateMessage($prevPlayerMessages, $nbOfPlayerDices) {
        /**
         * hier komt het stukje dat messages gaat genereren
         */
        return new Acceptance("host", "client", 2, 5, true);
    }

    /**
     * This function will make it possible to communicate with this black box brain class.
     * DO NOT ALTER THIS FUNCTION!
     *
     * @param   $prevPlayerMessages
     *          | A numbered array of all the playermessages during this game.
     * @param   $nbOfPlayerDices
     *          | A key-value array which gives an overview of the ingame players and their dices.
     * @return  array
     *          | An array of the generated message object
     */
    public function sendMessageToClient($prevPlayerMessages, $nbOfPlayerDices) {
        // Pass all the thinking about generating messages to the generateMessage function
        $message = $this->generateMessage($prevPlayerMessages, $nbOfPlayerDices);

        // Convert the message object to an array which is convertable into a JSON string.
        return $message->makeSendable();
    }


}
?>