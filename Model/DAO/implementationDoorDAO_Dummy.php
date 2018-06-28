<?php
require_once 'Model/VO/DoorVO.php';
require_once 'Model/DAO/interfaceDoorDAO.php';

class implementationDoorDAO_Dummy implements interfaceDoorDAO
{

    private $_doors = array();

    /**
     * @var Singleton
     * @access private
     * @static
     */
    private static $_instance = null;


    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    private function __construct() {
        if (file_exists(dirname(__FILE__).'/doors.xml')) {
            $doors = simplexml_load_file(dirname(__FILE__).'/doors.xml');
            foreach($doors->children() as $xmlDoor)
            {
                $door = new DoorVO;

                $door->setId((int) $xmlDoor->id);
                $door->setRoom((int) $xmlDoor->room);
                $door->setLock((int) $xmlDoor->lock);

                array_push($this->_doors,$door);
            }
        } else {
            exit('Echec lors de l\'ouverture du fichier doors.xml.');
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
            self::$_instance = new implementationDoorDAO_Dummy();
        }

        return self::$_instance;
    }

    /**
     * @return array
     */
    public function getDoors()
    {
        return $this->_doors;
    }

    /**
     * @param array $doors
     */
    public function setDoors($doors)
    {
        $this->_doors = $doors;
    }

    public function getDoorById($id)
    {
        $var = null;
        foreach ($this->getDoors() as $door)
        {
            if($door->getId() == $id){
                $var = $door;
            }
        }
        return $var;
    }

    public function getDoorByIdRoom($idRoom)
    {
        $var = array();
        foreach ($this->getDoors() as $door)
        {
            if($door->getRoom() == $idRoom){
                array_push($var,$door);
            }
        }
        return $var;
    }
}
