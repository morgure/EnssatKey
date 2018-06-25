<?php
require_once 'Model/VO/KeyOnKeychainVO.php';
require_once 'Model/DAO/interfaceKeyOnKeychainDAO.php';

class implementationKeyOnKeychainDAO_Dummy implements interfaceKeyOnKeychainDAO
{

  private $_keyOnKeychain = array();

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
     if (file_exists(dirname(__FILE__).'/keyOnKeychains.xml')) {
       $keyOnKeychains = simplexml_load_file(dirname(__FILE__).'/keyOnKeychains.xml');
       foreach($keyOnKeychains->children() as $xmlkeyOnKeychain)
       {
         $keyOnKeychain = new KeyOnKeychainVO;
        $keyOnKeychain->setKey((int) $xmlkeyOnKeychain->key);
        $keyOnKeychain->setKeychain((int) $xmlkeyOnKeychain->keychain);



         array_push($this->_keyOnKeychain,$keyOnKeychain);
       }
     } else {
       exit('Echec lors de l\'ouverture du fichier keyOnkeychains.xml.');
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
       self::$_instance = new implementationKeyOnKeychainDAO_Dummy();
     }

     return self::$_instance;
   }

   public function getKeyOnKeychains()
   {
     return $this->_keyOnKeychain;
   }

   public function getKeyOnKeychainsByKey($key)
   {
     $var = array();
     foreach ($this->_keyOnKeychain as  $keyOnKeychain)
     {
       if($keyOnKeychain->getKey() == $key)
       {
       array_push($var, $keyOnKeychain);
     }
     }
     return $var;
   }
   public function getKeyOnKeychainsByKeychain($keychain)
   {
     $var = array();
     foreach ($this->_keyOnKeychain as  $keyOnKeychain)
     {
       if($keyOnKeychain->getKeychain() == $keychain)
       {
       array_push($var, $keyOnKeychain);
      }
     }
     return $var;
   }

   public function newKeyOnKeychain()
   {
     $keyOnKeychain = new KeyOnKeychainVO();

     array_push($this->_keyOnKeychain, $keyOnKeychain);
     return $keyOnKeychain;
    }


}


?>
