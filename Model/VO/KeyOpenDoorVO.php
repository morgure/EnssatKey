<?php

class KeyOpenDoorVO
{
    protected $id;
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

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}