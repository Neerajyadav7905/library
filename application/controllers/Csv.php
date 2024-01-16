<?php 
class Csv extends CI_controller{

    //export csv file 

    public function csvdownload(){
        $this->load->model('csvmodel');
             if($this->input->post('csvfile')){

                    $filename = "admin_list_".date('ydmhis').".csv";

                        header("Content-Description: File Transfer"); 
                        header("Content-Disposition: attachment; filename=$filename"); 
                        header("Content-Type: application/csv; ");

                    $userdata = $this->csvmodel->adminlist();
                    $file = fopen('php://output', 'w');
                    $header = array("Admin Id","admin Name","Admin Email","Password",'role');

                fputcsv($file,$header);
                    foreach ($userdata as $data){
                fputcsv($file,$data);
                            }
                fclose($file);
                    exit();
        }

    }

    //import csv file

    public function csvupload(){
        $this->load->model('csvmodel');
        $this->load->library('session');
        if($this->input->post('uploadfile')){

                $config['upload_path'] ='assets/files/'; 
                $config['allowed_types'] = 'csv'; 
                $config['max_size'] = '1000';

                $this->load->library('upload',$config); 

                // File upload
                if($this->upload->do_upload('admincsvfile')){

                    $uploadData = $this->upload->data(); 
                    $filename = $uploadData['file_name'];

                    // Reading file
                    $file = fopen("assets/files/".$filename,"r");

                    // skip first row
                    $row_count = fgetcsv($file);
                    $row_num = count($row_count);
                    // fetch rows 
                    if($row_num==5){
                    while(($line = fgetcsv($file)) !== FALSE){

                        $admin_id = $line[0];
                        $admin_name = $line[1];
                        $admin_email = $line[2];
                        $admin_password = $line[3];

                        $verify_email = $this->csvmodel->verifyemail($admin_email);
                        if($verify_email){
                            $update_query = $this->csvmodel->updatedata($admin_id,$admin_name,$admin_email,$admin_password);
                        }
                        else{
                            $insert_query = $this->csvmodel->insertdata($admin_id,$admin_name,$admin_email,$admin_password);
                        }

                    }
                }
            //set error msg and return  
                else{
                    $this->session->set_tempdata('add_msg',"<h4 class='errormsg'>Uploaded file data fields not Mached with format</h4>",3);
                    redirect(base_url()."/ManageAdmin/add_admin");
                }

                    fclose($file);
                    $this->session->set_tempdata('add_msg',"<h4 class='successmsg'> Data is Inserted</h4>",3);
                    redirect(base_url()."/ManageAdmin/add_admin");
                    exit();
                 }
                 else{
                    $error = $this->upload->display_errors();
                    $this->session->set_tempdata('add_msg',"<h4 class='errormsg'><?= $error  </h4>",3);
                    redirect(base_url()."/ManageAdmin/add_admin");
                }
            }else{
                $this->session->set_tempdata('add_msg',"<h4 class='errormsg'> Some error occours </h4>",3);
                redirect(base_url()."/ManageAdmin/add_admin");
        }
    }
}
?>