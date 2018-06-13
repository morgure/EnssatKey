<?php
require_once 'Model/VO/ProviderVO.php';
require_once 'Model/DAO/interfaceProviderDAO.php';


class implementationProviderDAO_Dummy implements interfaceProviderDAO
{

    private $_providers = array();

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
        if (file_exists(dirname(__FILE__).'/providers.xml')) {
            $keys = simplexml_load_file(dirname(__FILE__).'/providers.xml');
            foreach($keys->children() as $xmlkey)
            {
                $key = new ProviderVO();
                $key->setId((int) $xmlkey->id);
                $key->setUsername((String)$xmlkey->username);
                $key->setName((String)$xmlkey->name);
                $key->setSurname((String)$xmlkey->surname);
                $key->setPhone((String)$xmlkey->phone);
                $key->setEmail((String)$xmlkey->email);
                $key->setOffice((String)$xmlkey->office);

                array_push($this->_providers,$key);
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
            self::$_instance = new implementationProviderDAO_Dummy();
        }

        return self::$_instance;
    }

    public function getProvider()
    {
        return $this->_providers;
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
