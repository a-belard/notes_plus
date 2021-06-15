<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_reset extends CI_Model{
public function verify_reset_password($email){
    $sql="SELECT * from users where email='$email'";
    $result=$this->db->query($sql);
    $row=$result->row();
    if(($result->num_rows())>0){
    $this->send_mail();
    }
}
public function send_mail(){
    $from_email = "aderlinecarmella@gmail.com";
    $to_email = $this->input->post('email');
    //SMTP & mail configuration
    $this->load->library('email');
    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_port' => 465,
        'smtp_user' => 'aderlinecarmella@gmail.com',
        'smtp_pass' => 'Knuckle$',
        'mailtype' => 'html',
        'charset' => 'iso-8859-1'
    );
    $this->email->initialize($config);
    $this->email->set_newline("\r\n");
    //Email content
    $htmlContent = '<h1>Reset password</h1>';
    $htmlContent .= '<p>Click on the link below to change your password</p>';
    $htmlContent .="<a href='http://localhost/notes_plus/users/change_password?email=$to_email'>Reset password</a>";
    $this->email->to($to_email);
    $this->email->from("aderlinecarmella@gmail.com", 'Notes_Plus');
    $this->email->subject('Password Reset');
    $this->email->message($htmlContent);
    if($this->email->send())
        // $this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
        $this->session->set_flashdata("email_send", $htmlContent);
    else
        $this->session->set_flashdata("email_send", $to_email);
        // show_error($this->email->print_debugger());
        // $this->load->view('email_sent');
        $this->load->view('received');
}
}
?>