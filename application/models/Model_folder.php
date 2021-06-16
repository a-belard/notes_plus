<?php
    class Model_folder extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function getAllFolders($id=false){
            if($id){
                $query = $this->db->query("SELECT * FROM folders WHERE creatorId=? AND folderId<>?",[$this->session->userdata["id"], $id]);
                // $query = $this->db->query("SELECT f.*,count(*) as nonotes from folders f,notes n where f.creatorId =? and  n.folderId = <>?",[$this->session->userdata["id"], $id]);
            }
            else{
                $query = $this->db->query("SELECT * FROM folders WHERE creatorId=?",[$this->session->userdata["id"]]);
            }
            return $query->result_array();
        }
        public function getSingleFolder($id){
            $sql = "SELECT * FROM folders where folderId=$id AND creatorId=?";
			$query = $this->db->query($sql,array($this->session->userdata('id')));
			return $query->row_array();
        }

        public function create($data)
        {
            if($data) {
                $insert = $this->db->insert('folders', $data);
                return ($insert == true) ? true : false;
            }
        }
        public function update($data, $id)
	    {
            if($data && $id) {
                $this->db->where('folderId', $id);
                $update = $this->db->update('folders', $data);
                return ($update == true) ? true : false;
            }
	    }
        public function remove($id)
        {
            if($id) {
                $status = 0;
                $this->db->where('folderId', $id);
                $update_status = $this->db->update('folders',["status" => $status]);
                return ($update_status == true) ? true : false;
            }
        }
        public function getNotes($id){
            $sql = "SELECT noteId, title, content, n.date_created, n.status, name as folderName 
                    FROM notes n, folders f 
                    WHERE n.folderId=f.folderId  AND ownerId =? AND f.folderId=? ORDER BY n.date_created desc";
            $query = $this->db->query($sql,[$this->session->userdata["id"],$id]);
            return $query->result_array();
        }
    }
?>