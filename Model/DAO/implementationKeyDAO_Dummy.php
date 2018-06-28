<?php
require_once 'Model/VO/KeyVO.php';
require_once 'Model/DAO/interfaceKeyDAO.php';


class implementationKeyDAO_Dummy implements interfaceKeyDAO
{

  private $_keys = array();

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
     if (file_exists(dirname(__FILE__).'/keys.xml')) {
       $keys = simplexml_load_file(dirname(__FILE__).'/keys.xml');
       foreach($keys->children() as $xmlkey)
       {
         $key = new keyVO;
         $key->setId((int) $xmlkey->id);
         $key->setType((String)$xmlkey->type);
         $key->setNombreExemplaire((int)$xmlkey->nombre_exemplaire);
         $key->setProvider((String)$xmlkey->provider);


         array_push($this->_keys,$key);
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
       self::$_instance = new implementationKeyDAO_Dummy();
     }

     return self::$_instance;
   }

   public function getkeys()
   {
     return $this->_keys;
     /*
     foreach($this->_keys as $clef=>$key)
     {
       echo $key->getEnssatPrimaryKey()." ".$key->getkeyname()." ".$key->getPhone()."\n";
     }
     */
   }

    public function getkeyByEnssatPrimaryKey($id)
    {
        $var = array();
        foreach ($this->getkeys() as $key)
        {
            if($key->getId() == $id){
                array_push($var,$key);
            }
        }
        return $var;
    }
}