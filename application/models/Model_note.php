<?php 

class Model_note extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_user');
	}

	/* get the product data */
	public function getNoteData()
	{
            $id = $this->session->userdata('id');
			$sql = "SELECT noteId, title, content, date_created, n.status, name as folderName FROM notes n, folders f WHERE n.folderId=f.folderId  AND ownerId = '$id' ORDER BY date_created desc";
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

	// public function remove($id)
	// {
	// 	if($id) {
	// 		$this->db->where('noteId', $id);
	// 		$delete = $this->db->delete('notes');
	// 		return ($delete == true) ? true : false;
	// 	}
	// }
	public function remove($id)
	{
		if($id) {
			$status = 0;
			$this->db->where('noteId', $id);
			$update_status = $this->db->update('notes',["status" => $status]);
			return ($update_status == true) ? true : false;
		}
	}

}