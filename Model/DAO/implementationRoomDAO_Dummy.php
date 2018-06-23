<?php
require 'Model/VO/RoomVO.php';
require 'Model/DAO/interfaceRoomDAO.php';

class implementationRoomDAO_Dummy implements intefaceRoomDAO
{
    private $_rooms = array();

    private static $_instance = null;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    private function __construct() {
        if (file_exists(dirname(__FILE__).'/rooms.xml')) {
            $rooms = simplexml_load_file(dirname(__FILE__).'/rooms.xml');
            foreach($rooms->children() as $xmlroom)
            {
                $key = new RoomVO();
                $key->setId((int) $xmlroom->id);
                $key->setNom((String)$xmlroom->name_room);


                array_push($this->_rooms,$key);
            }
        } else {
            throw new RuntimeException('Echec lors de l\'ouverture du fichier keys.xml.');
        }

    }

    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @param void
     * @return Singleton
     */
    public static function getInstance() {

        if(is_null(self::$_instance)) {
            self::$_instance = new implementationRoomDAO_Dummy();
        }

        return self::$_instance;
    }

    public function getRooms()
    {
        return $this->_rooms;
        /*
        foreach($this->_keys as $clef=>$key)
        {
          echo $key->getEnssatPrimaryKey()." ".$key->getkeyname()." ".$key->getPhone()."\n";
        }
        */
    }

    public function getkeyByEnssatPrimaryKey($enssatPrimaryKey)
    {

    }
}