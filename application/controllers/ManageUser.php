<?php 
class ManageUser extends CI_controller{
    public function add_user(){
        $this->load->model('usermodel');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        // add users 
            if($this->input->post('adduser')){
                $this->form_validation->set_rules('user_id','User ID','required');
                $this->form_validation->set_rules('user_Name','User name','required|min_length[3]|alpha');
                $this->form_validation->set_rules('user_email','Email','required|valid_email');
                $this->form_validation->set_rules('user_mob_number','Mob Number','required|exact_length[10]');
                    if($this->form_validation->run()===true){
                        $userid = $this->input->post('user_id');
                        $username = $this->input->post('user_Name');
                        $useremail = $this->input->post('user_email');
                        $usermobnumber = $this->input->post('user_mob_number');
                        $result = $this->usermodel->adduser($userid,$username,$useremail,$usermobnumber);
                            if($result){
                                $this->session->set_tempdata('add_msg',"<h4 class='successmsg'> User Is added SuccessFully </h4>",3);
                                redirect(current_url());
                            }
                            else{
                                $this->session->set_tempdata('add_msg',"<h4 class='errormsg'>Some error occour's</h4>",3);
                                redirect(current_url());
                            }

                    }
            }



            //Delete data from user table 
     if($this->input->post('deluser')){
        $this->form_validation->set_rules('user_email_del','Email','required');
        if($this->form_validation->run()===true){
            $user_del_email = $this->input->post('user_email_del');
            $user_del_result = $this->usermodel->userdelete($user_del_email);
            if($user_del_result){
                $this->session->set_tempdata('add_msg',"<h4 class='successmsg'> User Account deleted Sucessfully </h4>",3);
                redirect(current_url());
            }
            else{
                $this->session->set_tempdata('add_msg',"<h4 class='errormsg'>Some error occour's</h4>",3);
                redirect(current_url());
            }
        }
        }

        // fetch user data 
        $userlist['userslist'] = $this->usermodel->userlist();

        $this->load->view('templates/header.php');
        $this->load->view('widgets/sidebar');
        $this->load->view('dashboard/add_user',$userlist);
        $this->load->view('templates/footer.php');
    }
}
?>