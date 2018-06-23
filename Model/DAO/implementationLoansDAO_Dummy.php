<?php
require_once 'Model/VO/LoanVO.php';
//require_once 'Model/DAO/interfaceLoanDAO.php';



// Implémentation de l'interface
// Ceci va fonctionner
class implementationLoansDAO_Dummy implements interfaceLoansDAO
{

    private $_loans = array();

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
    private function __construct()
    {
        if (file_exists(dirname(__FILE__) . '/loans.xml')) {
            $loans = simplexml_load_file(dirname(__FILE__) . '/loans.xml');
            foreach ($loans->children() as $xmlUser) {
                $loan = new LoanVO();
                $loan->setKeychain((int)$xmlUser->keychain);
                $loan->setLoanDate((string)$xmlUser->loan_date);
                $loan->setReturnDate((string)$xmlUser->return_date);
                $loan->setState((string)$xmlUser->state);
                $loan->setUser((int)$xmlUser->user);

                array_push($this->_loans, $loan);
            }
        } else {
            throw new RuntimeException('Echec lors de l\'ouverture du fichier users.xml.');
        }

    }

    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @param void
     * @return Singleton
     */
    public static function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new implementationLoansDAO_Dummy();
        }

        return self::$_instance;
    }

    public function getLoans()
    {
        return $this->_loans;
        /*
        foreach($this->_users as $clef=>$user)
        {
          echo $user->getEnssatPrimaryKey()." ".$user->getUsername()." ".$user->getPhone()."\n";
        }
        */
    }
}