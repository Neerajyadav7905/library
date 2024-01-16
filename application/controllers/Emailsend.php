<?php
Class Emailsend extends CI_controller{
    
public function __construct(){
    parent::__construct();
        $this->load->library('email');
        $this->load->library('session');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host'=>'ssl://smtp.gmail.com',
            'smtp_timeout' => 7,
            'smtp_port' =>465,
            'smtp_user' =>'testemailphpdev@gmail.com',
            'smtp_pass' => 'izqoqwdpxpphrdrs',
            'charset' => 'UTF-8',
            'mailtype' => 'html',
            'newline' => "\r\n"

        );
        $this->email->initialize($config);
    }
    
public function resetpasswordsemail(){
    $this->load->model('passwordmodel');
    if($this->input->post('forget_get_email')){
        $email = $this->input->post('User_email');
        $otp = $this->passwordmodel->getotp($email);
        if($otp){
            $this->email->to($email);
            $this->email->from('testemailphpdev@gmail.com','test email');
            $this->email->subject('Reset Password');
            $this->email->message("<p>Your OTP is ".$otp." for Reseting Password<p>");
            if($this->email->send()){

        //set messages 

                $this->session->set_tempdata('add_msg',"<h4 class='successmsg'> OTP is send to your Email Address </h4>",3);
                redirect(base_url().'forgetpassword/resetpassword');
            }
            else{
                $this->session->set_tempdata('add_msg',"<h4 class='errormsg'> OTP cannot be sent </h4>",3);
                redirect(base_url().'forgetpassword/forgetpassword');
            } 
        }
        else{
            $this->session->set_tempdata('add_msg',"<h4 class='errormsg'> User Not Registored </h4>",3);
            redirect(base_url().'forgetpassword/forgetpassword');
        }
}
}

}
?>