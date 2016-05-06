<?php

class Push{

    private $title;
    private $data;
    
    function __construct() {
    }
    
    public function setTitle($title){
        $this->title = $title;
    }
    
    public function setData($data){
        $this->data = $data;
    }
    
    public function getPush(){
        $res = array();
        $res['title'] = $this->title;
        $res['data'] = $this->data;
        
        return $res;
    }
}