<?php 
namespace abc;
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Linklist{
    public $data;
    public $next;
    
    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
    function readNode()
    {
        return $this->data;
    }
}

?>