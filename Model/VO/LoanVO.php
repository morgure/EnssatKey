<?php
/**
 * Created by PhpStorm.
 * User: mcrusson
 * Date: 06/06/18
 * Time: 11:23
 */

class LoanVO
{
    protected $state;
    protected $keychain;
    protected $user;
    protected $loan_date;
    protected $return_loan;

    public function __construct($state, $loan_date,$user,$keychain, $return_date)
    {
        $this->state=$state;
        $this->loan_date = $loan_date;
        $this->user=$user;
        $this->return_date=$return_date;
    }

    /**
     * @return mixed
     */
    public function getKeychain()
    {
        return $this->keychain;
    }

    /**
     * @return mixed
     */
    public function getLoanDate()
    {
        return $this->loan_date;
    }

    /**
     * @return mixed
     */
    public function getReturnDate()
    {
        return $this->return_date;
    }

    /**
     * @return mixed
     */
    public function getReturnLoan()
    {
        return $this->return_loan;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $keychain
     */
    public function setKeychain($keychain)
    {
        $this->keychain = $keychain;
    }

    /**
     * @param mixed $loan_date
     */
    public function setLoanDate($loan_date)
    {
        $this->loan_date = $loan_date;
    }

    /**
     * @param mixed $return_date
     */
    public function setReturnDate($return_date)
    {
        $this->return_date = $return_date;
    }

    /**
     * @param mixed $return_loan
     */
    public function setReturnLoan($return_loan)
    {
        $this->return_loan = $return_loan;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }
}


