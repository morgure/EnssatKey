<?php
require_once 'Model/VO/LockVO.php';
require_once 'Model/DAO/interfaceLockDAO.php';


class implementationLockDAO_Dummy implements interfaceLockDAO
{

    private $_locks = array();

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
        if (file_exists(dirname(__FILE__).'/locks.xml')) {
            $keys = simplexml_load_file(dirname(__FILE__).'/locks.xml');
            foreach($keys->children() as $xmlkey)
            {
                $key = new lockVO();
                $key->setId((int) $xmlkey->id);
                $key->setLength((String)$xmlkey->length);


                array_push($this->_locks,$key);
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
            self::$_instance = new implementationLockDAO_Dummy();
        }

        return self::$_instance;
    }

    public function getLocks()
    {
        return $this->_locks;
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
