<?php 

class Users extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		
		
		$this->data['page_title'] = 'Users';
		

		$this->load->model('model_users');
		$this->load->model('model_note');
		$this->load->model('model_shared');
		$this->load->model('model_reset');
	}
	public function register()
    {
        $this->form_validation->set_rules('names', 'Names', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]',['is_unique' => 'The %s already exists']);
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[users.email]', ['is_unique' => 'The %s already exists']);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        if ($this->form_validation->run() == TRUE) {
            $password = $this->password_hash($this->input->post('password'));
            $data = array(
                'names' => $this->input->post('names'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $password,
                'residence' => $this->input->post('residence')
            );
            $register = $this->model_users->register($data);
            if($register) {
                $logged_in_sess = array(
                 'id' => $register['id'],
                 'username'  => $register['username'],
                 'email'     => $register['email'],
                 'logged_in' => TRUE
             );
             $this->session->set_flashdata('success', 'Successfully registered');
             $this->session->set_userdata($logged_in_sess);
                redirect('dashboard', 'refresh');
            }
            else {
                $this->session->set_flashdata('errors', 'Registration failed!!');
                redirect('users/register', 'refresh');
            }
        }
        else {
            $this->load->view('sign_up');
        }   
    }
    public function getProvinces(){
        echo "<span>Province</span>";
        echo '<select name="province" id="province" class="form-select" onchange="displayDistricts(this.value)" required>';
        echo '<option> -- Select Province --</option>';
        foreach($this->model_users->getProvinces() as $row){
            $provinceName = $row["provinceName"];
            $provinceId = $row["provinceId"];
            echo "<option value='$provinceId'>$provinceName</option>";
        }
        echo '</select>';
    }
    public function getDistricts(){
        echo "<span>District</span>";
        echo '<select name="residence" id="district" class="form-select" onchange="displaySectors(this.value)" required>';
        foreach($this->model_users->getDistricts($_POST["provinceId"]) as $row){
            $districtName = $row["districtName"];
            $districtId = $row["districtId"];
            echo "<option value='$districtId'>$districtName</option>";
        }
        echo '</select>';   
    }
	public function index()
	{
		$this->not_logged_in();
		$user_data = $this->model_users->getUserData();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k] = $v;
		}
		$this->data['user_data'] = $result;
		$this->render_template('users/index', $this->data);
	}
	
	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
	public function update_password(){
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {
						$email = $_GET['email'];
						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'password' => $this->password_hash($this->input->post('password')),
			        	);
			        	$update = $this->model_users->edit_password($data, $email);
			        	if($update == true) {	
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('auth/login', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/change_password/', 'refresh');
			        	}
					}
					else{
						$this->load->view('reset_password', 'refresh');
					}
	        }
	public function reset_password(){
        $this->load->view('email_send');
    }
	public function change_password(){
		$this->load->view('reset_password');
	}
	public function send_mail(){
		$email=$this->input->post('email');
	  $this->model_reset->verify_reset_password($email);
	}
	public function edit($id = null)
	{
		$this->not_logged_in();
		$id = $this->session->userdata('id');
		if($id) {
			$this->form_validation->set_rules('names', 'Names', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('residence', 'Residence', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'names' => $this->input->post('names'),
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
		        		'residence' => $this->input->post('residence'),
		        	);

		        	$update = $this->model_users->edit($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/edit/'.$id, 'refresh');
		        	}
		        }
		        else {
		        	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
		        			'email' => $this->input->post('email'),
		        			'names' => $this->input->post('names'),
		        			'residence' => $this->input->post('residence'),
			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/edit/'.$id, 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getSingleUserData($id);
			        	$this->data['user_data'] = $user_data;
						$this->render_template('users/edit', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getSingleUserData($id);
	        	$this->data['user_data'] = $user_data;
				$this->render_template('users/edit', $this->data);	
	        }	
		}	
	}

	public function delete($id)
	{
		$this->not_logged_in();

		if($id) {
			if($this->input->post('confirm')) {

				
					$delete = $this->model_users->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('users/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('users/delete', $this->data);
			}	
		}
	}

	

}