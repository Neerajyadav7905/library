<?php 
class Login extends CI_controller{
public function login(){

    $this->load->model('loginmodel');

    if($this->input->post('login')){
        $login_email = $this->input->post('login_email');
        $login_password = $this->input->post('login_password');
        if(isset($login_email)){
            $login_result= $this->loginmodel->login($login_email,$login_password);
            if($login_result){           
                $data = array(
                    'admin_access_email' => $login_result->adminemail,
                    'admin_access_role' => $login_result->role,
                );
                $this->session->set_userdata($data);
                redirect(base_url().'managedashboard/dashboard');
            }
            else{
                $this->session->set_tempdata('login_msg_email','Email/password is Wrong',3);
            }
        }
    }

    //load view 

        $this->load->view('templates/header.php');
        $this->load->view('dashboard/login');
        $this->load->view('templates/footer.php');

}
public function logout(){
    $this->session->sess_destroy();
    redirect(base_url().'login/login');
}

}
?>