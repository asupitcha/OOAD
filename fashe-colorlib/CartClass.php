<?php
class cartClass{
    private $count;
    private $list;

    public function _construct(){
        $this->count = 0;
        $this->list = array();
    }
    public function addItem($product){
        array_push($this->list, $product);
        $this->count = (int)count($list);
    }
    public function getAmount(){
        return $this->count;
    }
    public function getList(){
        return $this->list;
    }
    public function removeItem($product){
        foreach (array_keys($list, $product) as $key) {
            unset($list[$key]);
        }
        $this->count = (int)count($list);
    }
}
?>