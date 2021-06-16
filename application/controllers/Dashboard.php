<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();


		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('model_user');
		$this->load->model("model_note");
		$this->load->model("model_shared");
		$this->load->model("model_folder");
	}

	public function index()
	{
		$this->data["no_users"] = count($this->model_user->getUserData());
		$this->data["no_notes"] = count($this->model_note->getNoteData());
		$this->data["no_shared_byme"] = count($this->model_shared->getSharedNotesFromMe()); 
		$this->data["no_shared_tome"] = count($this->model_shared->getSharedNotesToMe()); 
		$this->data["no_folders"] = count($this->model_folder->getAllFolders()); 
		$this->render_template('dashboard',$this->data);
	}
}