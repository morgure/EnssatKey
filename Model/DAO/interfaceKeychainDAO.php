<?php

interface interfaceKeychainDAO
{

    // Singleton
    public static function getInstance();

    public function getKeychains();

    public function getRandomKeychain();

}

?>
