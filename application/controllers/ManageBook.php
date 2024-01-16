<?php
class ManageBook Extends CI_controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('bookmodel');
    }

    public function addbook(){
        // add book form 

        if($this->input->post('addbook')){

                $this->form_validation->set_rules('bookid','book id','required');
                $this->form_validation->set_rules('booktitle','booktitle','required|min_length[3]');
                $this->form_validation->set_rules('bookauthor','bookauthor','required|min_length[3]');
                $this->form_validation->set_rules('bookcategory','bookcategory','required');
                if($this->form_validation->run()===true){

        // get inputs 

                        $bookid = $this->input->post('bookid');
                        $booktitle = $this->input->post('booktitle');
                        $bookauthor = $this->input->post('bookauthor');
                        $bookcategory = $this->input->post('bookcategory');

        // config file 

            $config['upload_path'] ='assets/files/img/';
            $config['allowed_types']='jpeg|png|jpg';
            $config['max-size']= '5000';
        
        //upload file

            $this->load->library('upload',$config);
            if($this->upload->do_upload('bookimage')){
                $file_data = $this->upload->data();
                $file_name= $file_data['file_name'];
        
        // insert into database 

                $insert_query = $this->bookmodel->addbook($bookid,$booktitle,$bookauthor,$bookcategory,$file_name);
                     if($insert_query){

                        $this->session->set_tempdata('add_msg',"<h4 class='successmsg'> Book added Successfully </h4>",3);
                        redirect(current_url());

                         }
                     else{

                        $this->session->set_tempdata('add_msg',"<h4 class='errorsmsg'> Some error occur's </h4>",3);
                        redirect(current_url());

                    }
            }

        // if file failed to upload 

            else{
                
                $error = $this->upload->display_errors();
                $this->session->set_tempdata('add_msg',"<h4 class='errormsg'> <?= $error </h4>",3);
                redirect(current_url());
            }
    }
}


        // get last added books 

            $result['lastaddedbooks'] = $this->bookmodel->lastaddedbook();

        //view 

            $this->load->view('templates/header');
            $this->load->view('widgets/sidebar');
            $this->load->view('dashboard/addbook',$result);
            $this->load->view('templates/footer');
        
}

    public function issuebook(){

        if($this->input->post('issuebook')){
                $issue_book_id = $this->input->post('issue_book_id');
                $issue_user_id = $this->input->post('issue_user_id');   
            $result = $this->bookmodel->issuebook($issue_book_id,$issue_user_id);
            if($result){
                $this->session->set_tempdata('add_msg',$result,3);
                redirect(current_url());
            }
            else{
                $this->session->set_tempdata('add_msg','unexpected error occurs',3);
                redirect(current_url());
            }
        }

        // get booklist 
        $result['issuebooklist'] = $this->bookmodel->issuebooklist();

        
         // load view       
        $this->load->view('templates/header.php');
        $this->load->view('widgets/sidebar');
        $this->load->view('dashboard/issuebook',$result);
        $this->load->view('templates/footer.php');
    }

    public function returnbook(){

        $this->load->helper('url');

        $result['returendbooklist'] = $this->bookmodel->returendbooklist();

        if($this->input->post('Search_return_bookid')){
            $bookid = $this->input->post('bookid');
            $returnbookdata = $this->bookmodel->fetchreturnbook($bookid);
            if($returnbookdata){
                $this->load->view('templates/header.php');
                $this->load->view('widgets/sidebar');
                $this->load->view('widgets/returnbookpopup',$returnbookdata);
                $this->load->view('dashboard/returnbook',$result);
                $this->load->view('templates/footer.php');
            }
            else{
                $this->session->set_tempdata('add_msg',"<h4 class='errormsg'>Book ID Not Matched</h4>",3);
                redirect(current_url());
               
            }
        }
        else{
        $this->load->view('templates/header.php');
        $this->load->view('widgets/sidebar');
        $this->load->view('dashboard/returnbook',$result);
        $this->load->view('templates/footer.php');
    }

    if($this->input->post('retunbook')){
        if(!empty($this->input->post('book_id'))){
        $book_id = $this->input->post('book_id');
        $result = $this->bookmodel->returnbook($book_id);
            if($result){
                $this->session->set_tempdata('add_msg',"<h4 class='successmsg'>Book Returned</h4>",3);
                redirect(current_url());

            }
            else{
                $this->session->set_tempdata('add_msg',"<h4 class='errormsg'>Unable to return Book</h4>",3);
                redirect(current_url());
            }
        }
        else{
            $this->session->set_tempdata('add_msg',"<h4 class='errormsg'>Book ID is Required</h4>",3);
            redirect(current_url());
        }

    }


}

}
?>