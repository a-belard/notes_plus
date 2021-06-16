<?php
    class Model_folder extends CI_Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function getAllFolders($id=false){
            if($id){
                $query = $this->db->query("SELECT * FROM folders WHERE creatorId=? AND folderId<>?",[$this->session->userdata["id"], $id]);
            }
            else{
                $query = $this->db->query("SELECT * FROM folders WHERE creatorId=?",[$this->session->userdata["id"]]);
            }
            return $query->result_array();
        }
        public function getSingleFolder(){

        }
    }
?>