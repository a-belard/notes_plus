<?php 

class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getSingleUserData($id){
		$sql = "SELECT * FROM users where id = ?";
		$query = $this->db->query($sql, array($this->session->userdata('id')));
		return $query->row_array();
	}
	public function getUserData() 
    {
            $sql = "SELECT id, names, email, date_joined, districtName, provinceName 
                    FROM users u, districts d, provinces p
                    WHERE u.residence=d.districtId AND d.provinceId=p.provinceId";
            $query = $this->db->query($sql);
            return $query->result_array();
    }
    public function register($data)
    {
        $register = $this->db->insert('users', $data);
        return ($register == true) ? true : false;
    }
    public function delete($id)
    {
        $this->db->where('id', $this->session->userdata('id'));
        $delete = $this->db->delete('users');
        return ($delete == true) ? true : false;
    }
    public function getProvinces(){
        $sql = "SELECT * from provinces";
        $query =$this->db->query($sql);
        return $query->result_array();
    }
    public function getDistricts($provinceId){
        $sql = "SELECT d.districtId, d.districtName, p.provinceId 
                FROM districts d, provinces p 
                WHERE d.provinceId=p.provinceId AND p.provinceId=?;";
        $query =$this->db->query($sql, [$provinceId]);
        return $query->result_array();
    }
    public function getSectors($districtId){
        $sql = "SELECT s.sectorId, s.sectorName, d.districtId 
                FROM sectors s, districts d 
                WHERE s.districtId=d.districtId AND d.districtId=?;";
        $query =$this->db->query($sql, [$districtId]);
        return $query->result_array();
    }
    public function getCells($sectorId){
        $sql = "SELECT c.cellId, c.cellName, s.sectorId 
                FROM cells c, sectors s 
                WHERE c.sectorId=s.sectorId AND s.sectorId=?;";
        $query =$this->db->query($sql, [$sectorId]);
        return $query->result_array();
    }
    public function getVillages($cellId){
        $sql = "SELECT v.villageId, v.villageName, c.cellId 
                FROM villages v, cells c 
                WHERE v.cellId=c.cellId AND c.cellId=?;";
        $query =$this->db->query($sql, [$cellId]);
        return $query->result_array();
    }

	public function create($data = '', $group_id = null)
	{

		if($data && $group_id) {
			$create = $this->db->insert('users', $data);

			$user_id = $this->db->insert_id();

			return ($create == true && $group_data) ? true : false;
		}
	}

	public function edit($data = array(), $id = null)
	{
		$this->db->where('id', $id);
		$update = $this->db->update('users', $data);
			
		return ($update == true) ? true : false;	
	}

	public function edit_password($data = array(), $email= null)
	{
		$this->db->where('email', $email);
		$update = $this->db->update('users', $data);
			
		return ($update == true) ? true : false;	
	}

	// public function delete($id)
	
	// {
	// 	$this->db->where('id', $this->session->userdata('id'));
	// 	$delete = $this->db->delete('users');
	// 	return ($delete == true) ? true : false;
	// }
	
}