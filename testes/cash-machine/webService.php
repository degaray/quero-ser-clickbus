<?php

require_once('cashMachine.php');

$amount = (isset($_POST['amount'])?(int) $_POST['amount']:null);

if(is_null($amount)){
    echo json_encode(array());
}else{
    try{
        $cashMachine = new cashMachine();

        $cashMachine->setValidBills(array(100, 50, 20, 10));

        $bills = $cashMachine->withdraw($amount);

        echo json_encode( $bills);
    }catch (Exception $e){
        $error = array('message' => $e->getMessage());

        echo json_encode($error);
    }

}