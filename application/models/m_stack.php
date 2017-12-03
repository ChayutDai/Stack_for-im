<?php
class M_stack extends CI_Model {

    public function __construct()
    {
        parent::__construct();
            // Your own constructor code
    }
    public function get_stack(){
        $this->db->from('stack_value');
        $this->db->order_by("stack_number","desc");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function count_stack(){
        $query = $this->db->count_all('stack_value');
        return $query;
    }
    public function insert_stack($value,$number_stack){
        $data = array(
        'stack_value' => $value,
        'stack_number' => $number_stack
        );

        $query = $this->db->insert('stack_value', $data);
        return $value;
    }
    public function insert_special_stack($index,$value){
        $sql = "SELECT ID,stack_number FROM `stack_value` WHERE stack_number >= ? ";
        $query = $this->db->query($sql, array($index));
        
        foreach($query->result() as $row){
            $sql = "UPDATE `stack_value` SET `stack_number`= ? WHERE ID = ? ";
            $query = $this->db->query($sql, array($row->stack_number+1,$row->ID));
        }
        $sql = "INSERT INTO `stack_value` (`ID`, `stack_value`, `stack_number`) VALUES (NULL, ?, ?)";
        $query = $this->db->query($sql, array($value,$index));
       
        return $query;
    }
    public function delete_stack(){
        $pop = $this->db->query('SELECT stack_value FROM `stack_value` ORDER BY stack_number DESC LIMIT 1');
        $query = $this->db->query('DELETE FROM `stack_value` ORDER BY stack_number DESC LIMIT 1');
        return $pop;
    }

}
?>