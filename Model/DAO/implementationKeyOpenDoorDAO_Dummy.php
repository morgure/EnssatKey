<?php
require_once 'Model/VO/KeyOpenDoorVO.php';
require_once 'Model/DAO/interfaceKeyOpenDoorDAO.php';

class implementationKeyOpenDoorDAO_Dummy implements interfaceKeyOpenDoorDAO
{

    private $_keyopendoors = array();

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
        if (file_exists(dirname(__FILE__).'/keyopendoors.xml')) {
            $keyopendoors = simplexml_load_file(dirname(__FILE__).'/keyopendoors.xml');
            foreach($keyopendoors->children() as $xmlDoor)
            {
                $keyopendoor = new KeyOpenDoorVO;

                $keyopendoor->setKey((int) $xmlDoor->key);
                $keyopendoor->setDoor((int) $xmlDoor->door);

                array_push($this->_keyopendoors,$keyopendoor);
            }
        } else {
            exit('Echec lors de l\'ouverture du fichier keyopendoors.xml.');
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
            self::$_instance = new implementationKeyOpenDoorDAO_Dummy();
        }

        return self::$_instance;
    }

    public function getkeyopendoors()
    {
        return $this->_keyopendoors;
    }

    public function getkeyopendoorsbyidKey($idKey)
    {
        $var = array();
        foreach ($this->getkeyopendoors() as $key)
        {
            if($key->getKey() == $idKey){
                array_push($var,$key);
            }
        }
        return $var;
    }


}
