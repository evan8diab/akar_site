<?php
class User_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'id' => $item['id'],
			'first_name' => $item['first_name'],
			'last_name' => $item['last_name'],
			'username' => $item['username'],
			'password' => $item['password'],
			'email' => $item['email'],
			'phone' => $item['phone'],
			'mobile' => $item['mobile'],
			'city_id' => $item['city_id'],
			'gender' => $item['gender']
			 ) ;

		$this->db->insert('user', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $id);
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->row();
		}
	}

	function get_all()
	{
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();

		if($query->num_rows()<1){
			return null;
		}
		else{
			return $query->result_array();
		}
	}

	function update($id, $item)
	{
		$data = array(
			'first_name' => $item['first_name'],
			'last_name' => $item['last_name'],
			'username' => $item['username'],
			'password' => $item['password'],
			'email' => $item['email'],
			'phone' => $item['phone'],
			'mobile' => $item['mobile'],
			'city_id' => $item['city_id'],
			'gender' => $item['gender']
			 ) ;

		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}