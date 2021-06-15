<?php 

class Shared extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Shared Notes';
		

		$this->load->model('model_shared');
	}
	public function index()
	{

		$shared_notes= $this->model_shared->getAllSharedNotes();

		$this->data = $shared_notes;
		$this->render_template('shared/index', $this->data);
	}

	public function tome()
	{

		$shared_data = $this->model_shared->getSharedNotesToMe();

		$result = array();
		foreach ($shared_data as $k => $v) {

			$result[$k] = $v;
		}
		$this->data['shared_data'] = $result;
		$this->render_template('shared/tome', $this->data);
	}
	
	public function fromme()
	{

		$shared_notes= $this->model_shared->getSharedNotesFromMe();

		$result = array();
		foreach ($shared_notes as $k => $v) {

			$result[$k] = $v;
		}
		$this->data['shared_notes'] = $result;
		$this->render_template('shared/fromme', $this->data);
	}
	public function insert()
	{
		$noteId= $_GET['noteId'];
		$receiverId=$_GET['receiverId'];
		$shared_notes= $this->model_shared->insert($noteId,$this->session->userdata('id'),$receiverId);
		redirect('shared','refresh');
	}
	public function delete($id)
	{

		if($id) {
			if($this->input->post('confirm')) {
					$update_status = $this->model_shared->remove($id);
					if($update_status == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('shared/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('shared/delete/'.$id, 'refresh');
		        	}
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('shared/delete', $this->data);
			}	
		}
	}
	
}