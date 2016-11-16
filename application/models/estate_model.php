<?php
class Estate_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'id' => $item['id'],
			'estate_type_id' => $item['estate_type_id'],
			'user_id' => $item['user_id'],
			'city_id' => $item['city_id'],
			'neighbourhood' => $item['neighbourhood'],
			'street' => $item['street'],
			'longitude' => $item['longitude'],
			'latitude' => $item['latitude'],
			'create_date' => $item['create_date'],
			'update_date' => $item['update_date'],
			'floor' => $item['floor'],
			'area' => $item['area'],
			'description' => $item['description']
			 ) ;

		$this->db->insert('estate', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('estate');
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
		$this->db->from('estate');
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
			'estate_type_id' => $item['estate_type_id'],
			'user_id' => $item['user_id'],
			'city_id' => $item['city_id'],
			'neighbourhood' => $item['neighbourhood'],
			'street' => $item['street'],
			'longitude' => $item['longitude'],
			'latitude' => $item['latitude'],
			'create_date' => $item['create_date'],
			'update_date' => $item['update_date'],
			'floor' => $item['floor'],
			'area' => $item['area'],
			'description' => $item['description']
			 ) ;

		$this->db->where('id', $id);
		$this->db->update('estate', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('estate');
	}
}