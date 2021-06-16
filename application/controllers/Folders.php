<?php 

class Folders extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Folders';
		

		$this->load->model('model_note');
		$this->load->model("model_folder");
		// $this->load->model('model_groups');
		// $this->load->model('model_stores2');
	}

	public function index()
	{

		$folder_data = $this->model_folder->getAllFolders();

		$result = array();
		foreach ($folder_data as $k => $v) {

			$result[$k] = $v;
		}
		$this->data['folder_data'] = $result;
		$this->render_template('folders/index', $this->data);
	}

	
    public function create()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {

        	$data = array(
        		'name' => $this->input->post('name'),
                'creatorId'=>$this->input->post('creatorId'),
				'status'=>$this->input->post('status'),
        	);    
        	$create = $this->model_folder->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('folders/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('folders/create', 'refresh');
        	}
        }
        else {
                $data["folders"] = $this->model_folder->getAllFolders(1);
				$data["page_title"] = "Add Folder";
                $this->render_template('/folders/create',$data);
        }	
	}

	public function edit($id = null)
	{
		if($id) {
			$this->form_validation->set_rules('name', 'Name', 'trim|required');


			if ($this->form_validation->run() == TRUE) 
			{
		        	$data = array(
		        		'name' => $this->input->post('name'),
		        	);

		        	$update = $this->model_folder->update($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('folders/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('folders/edit/'.$id, 'refresh');
		        	}
		        }
				$this->data = $this->model_folder->getSingleFolder($id);
				$this->render_template('folders/edit',$this->data);
		}	
	}

	public function delete($id)
	{
		if($id) {
			if($this->input->post('confirm')) {
					$update_status = $this->model_folder->remove($id);
					if($update_status == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('folders/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('folders/delete/'.$id, 'refresh');
		        	}
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('folders/delete', $this->data);
			}	
		}
	}
	public function folder($id){
		$notes = $this->model_folder->getNotes($id);
		$data["note_data"] = $notes;
		$data["id"] = $id;
		$this->render_template("folders/notes", $data);
	}

}