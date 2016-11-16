<?php
class Attachment_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function create($item)
	{
		$data = array(
			'id' => $item['id'],
			'estate_id' => $item['estate_id'],
			'attach_link' => $item['attach_link']
			 ); 

		$this->db->insert('attachment', $data);
	}

	function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('attachment');
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
		$this->db->from('attachment');
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
			'estate_id' => $item['estate_id'],
			'attach_link' => $item['attach_link']
			 ) ;

		$this->db->where('id', $id);
		$this->db->update('attachment', $data);
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('attachment');
	}
}