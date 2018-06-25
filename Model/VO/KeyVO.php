<?php
class KeyVO
{
    public static $keyType = array("Simple"=>"Clé","Partiel"=>"Passe Partiel","Total"=>"PasseTotal");
    protected $id;
    protected $type; //Clef ou Passe Partiel ou Passe Total
    protected $nombre_exemplaire;
    protected $provider;
    public function __construct()
    {
        
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
    public function setType($type) {
      /*if(array_key_exists($type,$this->keyType)){
        $this->type = $type;
      }
      else
      {
        throw new RuntimeException('Le type de clef <strong>' . $type . '</strong> n\'existe pas !');
      }*/

       $this->type = $type;
    }
    /**
     * @param mixed $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }
    /**
     * @param array $keyType
     */
    public static function setKeyType($keyType)
    {
        self::$keyType = $keyType;
    }


    /**
     * @return array
     */
    public static function getKeyType()
    {
        return self::$keyType;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    public function getType() {
        return $this->type;
    }

    /**
     * @param mixed $nombre_exemplaire
     */
    public function setNombreExemplaire($nombre_exemplaire)
    {
        $this->nombre_exemplaire = $nombre_exemplaire;
    }

    /**
     * @return mixed
     */
    public function getNombreExemplaire()
    {
        return $this->nombre_exemplaire;
    }
}