<?php
class KeyVO
{
    public static $keyType = array("Simple"=>"Clé","Partiel"=>"Passe Partiel","Total"=>"PasseTotal");
    protected $id;
    protected $type; //Clef ou Passe Partiel ou Passe Total
    protected $keychain;
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
      if(array_key_exists($type,$this->keyType)){
        $this->type = $type;
      }
      else
      {
        throw new RuntimeException('Le type de clef <strong>' . $type . '</strong> n\'existe pas !');
      }
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
     * @param mixed $keychain
     */
    public function setKeychain($keychain)
    {
        $this->keychain = $keychain;
    }
    //Jeffrey Bataille
    /**
     * @return mixed
     */
    public function getKeychain()
    {
        return $this->keychain;
    }
}