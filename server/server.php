<?php
require_once 'jsonRPCServer.php';
require 'brain.php';

$myExample = new brain();
jsonRPCServer::handle($myExample)
    or print 'no request';
?>