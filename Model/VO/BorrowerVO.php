<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Bataille
 * Date: 06/06/18
 * Time: 11:59
 */

class BorrowerVO
{
    protected $user;
    protected $keychain;


    public function __construct($user, $keychain)
    {
        $this->user = $user;
        $this->keychain = $keychain;
    }

    /**
     * @param mixed $keychain
     */
    public function setKeychain($keychain)
    {
        $this->keychain = $keychain;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getKeychain()
    {
        return $this->keychain;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

}