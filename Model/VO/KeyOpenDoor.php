<?php
/**
 * Created by PhpStorm.
 * User: Jeffrey Bataille
 * Date: 06/06/18
 * Time: 11:34
 */

class KeyOpenDoor
{
    protected $key;
    protected $door;

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @param mixed $door
     */
    public function setDoor($door)
    {
        $this->door = $door;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getDoor()
    {
        return $this->door;
    }
}