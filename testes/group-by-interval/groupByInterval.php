<?php

class groupByInterval{

    public function orderArray(array $array){

        for($i = count($array) - 1; $i >= 0; $i--){
            for($j = 1; $j <= $i; $j++){
                if($array[$j-1] > $array[$j]){
                    $temp = $array[$j-1];
                    $array[$j-1] = $array[$j];
                    $array[$j] = $temp;
                }

            }
        }

        return $array;
    }

    public function groupByRange(array $array, $range){
        $groupedArray = array();

        for($i=0; $i < count($array); $i++){
            $startVal = intval(($array[$i]-1)/$range)*$range;
            $groupedArray[$startVal][] = $array[$i];
        }

        return $groupedArray;
    }

    public function doGroupByRange(array $array, $range){
        if($array == null || $range == null){
            return array();
        }
        if(!$this->_allAreNumeric($array) || !$this->_allAreNumeric($range)){
            throw new Exception('Invalid Arguments, please revise them and try again');
        }
        $array = $this->orderArray($array);
        return $this->groupByRange($array, $range);

    }

    protected function _allAreNumeric($array){
        if(!is_array($array)){
            if(is_numeric($array)){
                return true;
            }else{
                return false;
            }
        }
        foreach($array as $item){
            if(!is_numeric($item)){
                return false;
            }
        }
        return true;
    }

}
