<?php 

class Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();


		$this->data['page_title'] = 'Dashboard';
		
		$this->load->model('model_user');
		// $this->load->model('model_notes');
		// $this->load->model('model_shared');
	}

	public function index()
	{

		// $this->data['total_notes'] = $this->model_users->countTotalUsers();
		// $this->data['total_shared'] = $this->model_users->countTotalShared();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->render_template('dashboard');
	}
}