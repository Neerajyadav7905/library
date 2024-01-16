<?php 
class ManageAdmin Extends CI_controller{
    public function add_admin(){
        $this->load->helper('form');
        $this->load->model('adminmodel');
        $this->load->helper('msgdisplay');
        $this->load->library('form_validation');
        $this->load->library('session');

        // get form data 

        if($this->input->post('submit')){

        // validate form 

        $this->form_validation->set_rules('adminid','ID','required|alpha_dash');
        $this->form_validation->set_rules('Admin_Name','Name','required|min_length[3]|alpha');
        $this->form_validation->set_rules('adminemail','Email','required|valid_email');
        $this->form_validation->set_rules('Create_password','Password','required|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('Conform_password','Password','required|min_length[5]|max_length[15]|matches[Create_password]');
        
        if($this->form_validation->run()===true){
            $admin_id = $this->input->post('adminid');
            $admin_nname = $this->input->post('Admin_Name');
            $admin_email = $this->input->post('adminemail');
            $admin_password = password_hash($this->input->post('Create_password'),PASSWORD_DEFAULT);

       //send data to model 

        $result = $this->adminmodel->addadmin($admin_id,$admin_nname,$admin_email,$admin_password);

        //receive result from model 

        if($result){
            $this->session->set_tempdata('add_msg',"<h4 class='successmsg'> Data is Inserted Successfully </h4>",3);
            redirect(current_url());
        }
        else{
            $this->session->set_tempdata('add_msg',"<h4 class='errormsg'>Some error occour's</h4>",3);
            redirect(current_url());
        }}
        }

        // EDIT ADMIN DATA 

        if($this->input->post('updateadmindata')){
            $admin_id = $this->input->post('adminid_update');
            $admin_nname = $this->input->post('Admin_Name_update');
            $admin_email = $this->input->post('adminemail_update');

       //send data to model 

            $result = $this->adminmodel->adminupdatedata($admin_id,$admin_nname,$admin_email);

        //receive result from model 

            if($result){
                $this->session->set_tempdata('add_msg',"<h4 class='successmsg'> Data is Updated Successfully </h4>",3);
                redirect(current_url());
            }
            else{
                $this->session->set_tempdata('add_msg',"<h4 class='errormsg'>Some error occour's</h4>",3);
                redirect(current_url());
            }}


        //Delete data from admin table 

        if($this->input->post('deladmin')){
            $this->form_validation->set_rules('admin_email','Email','required');
            if($this->form_validation->run()===true){
                $admin_del_email = $this->input->post('admin_email');
                $admin_del_result = $this->adminmodel->admindelete($admin_del_email);
                if($admin_del_result){
                    $this->session->set_tempdata('add_msg',"<h4 class='successmsg'> Account deleted Sucessfully </h4>",3);
                    redirect(current_url());
                }
                else{
                    $this->session->set_tempdata('add_msg',"<h4 class='errormsg'>Some error occour's</h4>",3);
                    redirect(current_url());
                }
            }
        }

        
        // get list of admins
        $adminlist['adminlist'] = $this->adminmodel->adminlist();

        if($this->input->post('fetchadmindata')){
        $admin_fetch_email = $this->input->post('admin_edit_email');
        $admineditdata['admineditdata'] = $this->adminmodel->adminfetchdata($admin_fetch_email);
        }

        // view files 
        $this->load->view('templates/header.php');
        $this->load->view('widgets/sidebar');
        if(isset($admineditdata)){
        $this->load->view('widgets/editadminpopup',$admineditdata);}
        $this->load->view('dashboard/add_admin',$adminlist);
        $this->load->view('templates/footer.php');
    }
}
?>