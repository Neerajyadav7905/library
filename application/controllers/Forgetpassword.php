<?php 
class Forgetpassword extends CI_controller{

//forget password page 

    public function forgetpassword(){
        $this->load->view('templates/header.php');
        $this->load->view('dashboard/getotp.php');
        $this->load->view('templates/footer.php');
    }

//reset password page 

    public function resetpassword(){
        $this->load->model('passwordmodel');
        $this->load->library('session');
        $this->load->library('form_validation');

    //validiate 

        if($this->input->post('new_password_submit')){
            $this->form_validation->set_rules('User_otp','OTP','required|numeric|exact_length[6]');
            $this->form_validation->set_rules('User_email','Email','required|valid_email');
            $this->form_validation->set_rules('New_password','Password','required|min_length[5]|max_length[15]');
            $this->form_validation->set_rules('Confirm_New_password','Password','required|min_length[5]|max_length[15]|matches[New_password]');
            
            if($this->form_validation->run()===true){  
                $User_email = $this->input->post('User_email');  
                $otp = $this->input->post('User_otp');
                $New_password = $this->input->post('New_password');
                $this->input->post('Confirm_New_password');
                $admin_password = password_hash($New_password,PASSWORD_DEFAULT);
            $result = $this->passwordmodel->reset($User_email,$otp,$admin_password);
            if($result){
                $this->session->set_tempdata('add_msg',$result,3);
                redirect(current_url());
            }
            else{
                $this->session->set_tempdata('add_msg','Unexpected Error occurs',3);
                redirect(current_url());
            }
        }
    }
    
        // view 

        $this->load->view('templates/header.php');
        $this->load->view('dashboard/forgetpassword.php');
        $this->load->view('templates/footer.php');

    }
}
?>