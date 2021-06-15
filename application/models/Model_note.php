<?php 

class Model_note extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_users');
	}

	/* get the product data */
	public function getNoteData()
	{
            $id = $this->session->userdata('id');
			$sql = "SELECT * FROM notes where ownerId = '$id' ORDER BY date_created desc";
			$query = $this->db->query($sql);
			return $query->result_array();
            print_r($query);
	}
	public function getSingleNoteData($id) 
	{
			$sql = "SELECT * FROM notes where noteId =?";
			$query = $this->db->query($sql,array($id));
			return $query->row_array();
	}
	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('notes', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('noteId', $id);
			$update = $this->db->update('notes', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('noteId', $id);
			$delete = $this->db->delete('notes');
			return ($delete == true) ? true : false;
		}
	}

}