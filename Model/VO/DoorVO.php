<?php
class DoorVO
{
    protected $id;
    protected $lock;
    protected $room;

    public function setId($id) {
        $this->id = $id;
    }
    public function setLock($id) {
        $this->lock=$id;
    }
    public function setRoom($id) {
        $this->room=$id;
    }

    public function getId() {
        return $this->id;
    }
    public function getLock() {
        return $this->lock;
    }
    public function getRoom() {
        return $this->room;
    }


}
