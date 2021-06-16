<?php 

class Notes extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Notes';
		

		$this->load->model('model_note');
		$this->load->model("model_folder");
		// $this->load->model('model_groups');
		// $this->load->model('model_stores2');
	}

	public function index()
	{

		$note_data = $this->model_note->getNoteData();

		$result = array();
		foreach ($note_data as $k => $v) {

			$result[$k] = $v;
		}
		$this->data['note_data'] = $result;
		$this->render_template('notes/index', $this->data);
	}

	
    public function create()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('content', 'Content', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {

        	$data = array(
        		'title' => $this->input->post('title'),
        		'content' => $this->input->post('content'),
                'ownerId'=>$this->input->post('ownerId'),
				'status'=>$this->input->post('status'),
				'folderId'=>$this->input->post("folderId")
        	);    
        	$create = $this->model_note->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('notes/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('notes/create', 'refresh');
        	}
        }
        else {
                $data["folders"] = $this->model_folder->getAllFolders(1);
                $this->render_template('/notes/create',$data);
        }	
	}

	public function edit($id = null)
	{
		if($id) {
			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('content', 'Content', 'trim|required');


			if ($this->form_validation->run() == TRUE) 
			{
		        	$data = array(
		        		'title' => $this->input->post('title'),
		        		'content' => $this->input->post('content'),
		        	);

		        	$update = $this->model_note->update($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('notes/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('notes/edit/'.$id, 'refresh');
		        	}
		        }
				$this->data = $this->model_note->getSingleNoteData($id);
				$this->render_template('notes/edit',$this->data);
		}	
	}

	public function delete($id)
	{
		if($id) {
			if($this->input->post('confirm')) {
					$update_status = $this->model_note->remove($id);
					if($update_status == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('notes/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('notes/delete/'.$id, 'refresh');
		        	}
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('notes/delete', $this->data);
			}	
		}
	}

	public function printnote(){
		$id = $_GET["id"];
		redirect("printnote?id=$id");
	}
}