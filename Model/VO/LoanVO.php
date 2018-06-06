<?php
/**
 * Created by PhpStorm.
 * User: mcrusson
 * Date: 06/06/18
 * Time: 11:23
 */

class LoanVO
{
    protected $id_borrower;
    protected $loan_date;
    protected $return_date;
    protected $id_keychain_borrow;

    public function __construct($borrow, $loan,$return,$keychain)
    {
        $this->id_borrower=$borrow;
        $this->loan_date=$loan;
        $this->return_date=$return;
        $this->id_keychain_borrow=$keychain;
    }

    public function setIdBorrower($id_borrower) {
        $this->id_borrower = $id_borrower;
    }

    public function getIdBorrower() {
        return $this->id_borrower;
    }

    public function setLoanDate($loan_date)
    {
        $this->loan_date=$loan_date;
    }

    public function getLoanDate()
    {
        return $this->loan_date;
    }

    public function setReturnDate($return_date)
    {
        $this->return_date=$return_date;
    }
    public function getReturnDate()
    {
        return $this->return_date;
    }

    public function setKeychainID($id_keychain_borrow) {
        $this->id_keychain_borrow = $id_keychain_borrow;
    }

    public function getKeyChainID() {
        return $this->id_keychain_borrow;
    }
}


