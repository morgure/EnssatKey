<?php
class KeyOnKeychainVO
{
    protected $key;
    protected $keychain;

    public function setKey($key) {
        $this->key = $key;
    }

    public function getKey() {
        return $this->key;
    }

    public function setKeychain($keychain) {
        $this->keychain = $keychain;
    }

    public function getKeychain() {
        return $this->keychain;
    }

}
