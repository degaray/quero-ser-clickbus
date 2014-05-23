<?php

require_once('groupByInterval.php');

$list = (isset($_POST['list'])? $_POST['list']:null);
$range = (isset($_POST['range'])? $_POST['range']:null);

$array = explode(',', $list);

if(is_null($array)||is_null($range)){
    echo json_encode(array());
}else{
    try{
        $groupByInterval = new groupByInterval();

        $groupedArray = $groupByInterval->doGroupByRange( $array , $range);

        echo json_encode( $groupedArray);
    }catch (Exception $e){
        $error = array('message' => $e->getMessage());

        echo json_encode($error);
    }

}