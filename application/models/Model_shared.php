<?php 

class Model_shared extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllSharedNotes() 
	{
			$sql = "SELECT sh.id,sh.ownerId,sh.receiverId,sh.status, n.title, n.content,u.names
			FROM shared sh, notes n, users u  WHERE sh.noteid=n.noteid AND (u.id=sh.receiverId OR u.id=sh.ownerId) AND u.id = ?;";
			$query = $this->db->query($sql,array($this->session->userdata('id')));
			return $query->result_array();
	}
	public function getSharedNotesFromMe() 
	{
			$sql = 'SELECT sh.id,sh.ownerId,sh.receiverId,sh.status, n.title, n.content, u.names as names
			FROM shared sh, notes n, users u  WHERE sh.noteid=n.noteid AND sh.ownerId = ?;';
			$query = $this->db->query($sql, array($this->session->userdata("id")));
			return $query->result_array();
	}

    public function getSharedNotesToMe() 
	{
			$sql = "SELECT sh.id,sh.status, n.title, n.content, u.names FROM shared sh, notes n, users u  
            WHERE sh.noteid=n.noteId AND sh.ownerId=n.ownerId AND sh.receiverId=?";
			$query = $this->db->query($sql, array($this->session->userdata("id")));
			return $query->result_array();
	}
	public function insert($noteId,$ownerId,$receiverId)
	{
		$ownerId  = $this->session->userdata('id');

		if($noteId && $receiverId) {
			$data = ['noteId'=>$noteId,'ownerId'=>$ownerId,'receiverId'=>$receiverId];
			$create = $this->db->insert('shared', $data);	
			return ($create == true) ? true : false;
		}
	}
	public function remove($id)
	{
		if($id) {
			$status = 0;
			$this->db->where('id', $id);
			$update_status = $this->db->update('shared', ["status" => $status]);
			return ($update_status == true) ? true : false;
		}
	}
}