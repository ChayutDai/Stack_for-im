<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Linklist.php';
use abc as node;
class Stack extends CI_Controller {

    private $firstNode;
  
    private $lastNode;
   
    private $count;
    
    private $top;
 
    public static $testvalue = 0;
	public function index()
	{
        $this->load->model('m_stack');
        $data['query'] = $this->m_stack->get_stack();  
        $this->load->helper('url');
        $this->load->view('v_stack',$data);
    
	}
    
    
    public function push(){
        /* 
        if($this->top == NULL){
            $link = new abc\Linklist($value);
            $this->top = &$link;
        }else{
            $temp = new abc\Linklist($value);
            $temp->next = $this->top;
            $this->top = &$temp;
        }         
        */
        $value = $this->input->post('value');       
        $this->count++;
        $this->load->model('m_stack');
        $num_stack = $this->m_stack->count_stack();
        $num_stack++;
        $result = $this->m_stack->insert_stack($value,$num_stack++);
        echo $result;
        
    }
    
    public function read(){
        
        $listData = array();
        $current = $this->top;
        while($current != NULL)
        {
            array_push($listData, $current->readNode());
            $current = $current->next;
        }
        foreach($listData as $v){
            echo "</br>".$v." ";
        }
    }
    
    public function pop(){
        $value = $this->input->post('value');   
        $this->load->model('m_stack');
        $result = $this->m_stack->delete_stack();
        
        foreach ($result->result() as $row)
        { 
            echo "pop is ".$row->stack_value;
        }
        
       
      //  if($this->top->next != NULL){
      //      $temp = $this->top;
      //      $this->top = $temp->next;
      //      $temp->next = NULL;  
      //  }
    }
    
    public function speacial(){
        $index = $this->input->post('index');
        $value = $this->input->post('value');
        $this->load->model('m_stack');
  
        $result = $this->m_stack->insert_speacial_stack($index,$value);
        $result = $this->m_stack->get_stack();
       
    }
    
}