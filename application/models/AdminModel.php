<?php
class AdminModel extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    //get admin list 
    public function adminlist(){
        $query = $this->db->query('SELECT adminid, adminname, adminemail FROM admin');
        $result = $query->result();
        return $result;
    }

    //add admin

    public function addadmin($adminid,$adminname,$adminemail,$adminpassword){
        $this->adminid = $adminid;
        $this->adminname = $adminname;
        $this->adminemail = $adminemail;
        $this->adminpassword = $adminpassword;
        $query = $this->db->query("INSERT INTO admin (adminid,adminname,adminemail,adminpassword,role) values('$this->adminid','$this->adminname','$this->adminemail','$this->adminpassword','admin')");
            if($query){
                return true;
            }
            else{
                return false;
            }
    }

    //delete admin 

    public function admindelete($email){
        $this->email = $email;
        $query = $this->db->query("DELETE FROM admin WHERE adminemail='$this->email'");
            if($query){
                return true;
            }
            else{
                return false;
            }
    }

//fetch admin data for edit popup 

    public function adminfetchdata($email){
        $this->email = $email;
        $query = $this->db->query("SELECT*FROM admin WHERE adminemail='$this->email' limit 1");
            if($query){
                $result = $query->row();
                return $result;
            }
            else{
                return false;
            }
    }

    //update admin data 
    
    public function adminupdatedata($adminid,$adminname,$adminemail){
        $this->adminid = $adminid;
        $this->adminname = $adminname;
        $this->adminemail = $adminemail;
        $query = $this->db->query("UPDATE admin SET adminid ='$this->adminid',adminname ='$this->adminname' WHERE adminemail ='$this->adminemail'");
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
}
?>