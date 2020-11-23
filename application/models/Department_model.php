<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

	public function __construct()
	{
		parent::__construct(); 
		$this->load->database();
	}
	
	public function get_departlist($key,$offset,$pagesize)
	{
		if($key != ''){
			$where = 'userservice.status="1" and userservice.service_name="'.$key.'"';
		}else{
			$where = 'userservice.status="1"';
		}
		
		$this->db->where($where);
		$count = $this->db->count_all_results('userservice');

		$this->db->select('*');
		$this->db->from('userservice');
		$this->db->where($where);
		$this->db->limit($pagesize,$offset);
		$query = $this->db->get();
		$tabledata = $query->result_array();
		
		$result = array('tabledata' => $tabledata, 'totalCount' => $count);
		return $result;
	}
	
	public function create_depart($data)
	{
		if($this->db->insert('userservice',$data)){ return 1; }else{ return 0; }
	}
	
	public function update_depart($id,$data)
	{
		$this->db->where('user_service_id', $id);
		if($this->db->update('userservice', $data)){ return 1; }else{ return 0; }
	}
	
	public function delete_depart($id) 
	{		
		$this->db->where('user_service_id', $id);	
		if($this->db->delete('userservice')){ return 1; }else{ return 0; }
	}
}
