<?php

class cashMachine{
    protected $_valid_bills;
    protected $_withdrawal_amount;

    protected $_withdrawed_bills;
    protected $_was_withdrawed;

    public function __construct( $valid_bills = array(100, 50, 20, 10)){
        $this->setValidBills($valid_bills);
    }

    public function withdraw($amount){


        $this->setWithdrawalAmount($amount);

        $leastBillsDispensable = $this->_getListOfLeastBillsDispensable($amount);

        $withdrawedBills = $this->setWithdrawedBills($leastBillsDispensable);

        $this->setWasWithdrawed(!!$withdrawedBills);

        return $withdrawedBills;
    }

    public function setWithdrawalAmount($amount){
        if(!is_int($amount) || $amount < 0){
            throw new Exception('Invalid Argument, the amount must be a positive integer');
        }
        if(!$this->_canProcessWithdrawal($amount)){
            throw new Exception('The amount you would like to withdraw cannot be accomplished, please use multiples of ' . min($this->getValidBills()));
        }
        return $this->_withdrawal_amount = $amount;
    }

    public function setWithdrawedBills(array $bills){
        return $this->_withdrawed_bills = $bills;
    }
    public function getWithdrawedBills(){
        return $this->_withdrawed_bills;
    }
    public function getValidBills(){
        return $this->_valid_bills;
    }
    public function setValidBills(array $bills){
        rsort($bills);
        return $this->_valid_bills = $bills;
    }

    public function getWithdrawalAmount(){
        return $this->_withdrawal_amount;
    }

    public function setWasWithdrawed($bool){
        return $this->_was_withdrawed = $bool;
    }

    protected function _canProcessWithdrawal($amount){
        if(!($amount % min($this->getValidBills()))){
            return true;
        }else{
            return false;
        }

    }
    protected function _getListOfLeastBillsDispensable($amount){
        $billsToDispense = array();

        $validBills = $this->getValidBills();
        $withdrawalAmount = $amount;

        foreach($validBills as $validBill){
            $n = intval($withdrawalAmount / $validBill);
            if($n){
                $withdrawalAmount -= $n * $validBill;
                $billsToDispense[$validBill] = $n;

            }
        }

        if($withdrawalAmount == 0){
            return $billsToDispense;
        }else{
            return false;
        }
    }
}

