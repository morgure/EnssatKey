<?php
class DoorVO
{
    protected $id;
    protected $lock;
    protected $room;
    public function setId($id) {
        $this->id = $id;
    }
    //Jeffrey Bataille
    public function setLock($id) {
        $this->lock=$id;
    }
    //Jeffrey Bataille
    public function setRoom($id) {
        $this->room=$id;
    }
    public function getId() {
        return $this->id;
    }
    //Jeffrey Bataille
    public function getLock() {
        return $this->lock;
    }
    //Jeffrey Bataille
    public function getRoom() {
        return $this->room;
    }
}