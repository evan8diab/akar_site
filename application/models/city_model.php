<?php
class City_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'id' => $item['id'],
			'name_pl' => $item['name_pl'],
			'name_sl' => $item['name_sl']
			 ) ;

		$this->db->insert('city', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('city');
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
		$this->db->from('city');
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
			'name_pl' => $item['name_pl'],
			'name_sl' => $item['name_sl']
			 ) ;

		$this->db->where('id', $id);
		$this->db->update('city', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('city');
	}
}