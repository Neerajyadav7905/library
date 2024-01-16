<?php
class Managedashboard Extends CI_controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('dashboard');
    }

    public function dashboard(){

        // get data 
        $result = $this->dashboard->alldata();
        $this->load->view('templates/header.php');
        $this->load->view('widgets/sidebar');
        $this->load->view('dashboard/dashboard',$result);
        $this->load->view('templates/footer.php');
    }

}