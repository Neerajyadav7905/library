<?php
class UserModel extends CI_model{

    public function __construct(){
        $this->load->database();
    }

    //get user list 

    public function userlist(){
        $query = $this->db->query('SELECT userid, username, useremail, usermobnumber FROM users');
        $result = $query->result();
        return $result;
    }
    //delete user 
    public function userdelete($email){
        $this->email = $email;
        $query = $this->db->query("DELETE FROM users WHERE useremail='$this->email'");
        if($query){
            return true;
        }
        else{
            return false;
        }
        }
        
    //add user 

    public function adduser($userid,$username,$useremail, $usermobnumber){
            $this->userid = $userid;
            $this->username = $username;
            $this->useremail = $useremail;
            $this->usermobnumber = $usermobnumber;
            $query = $this->db->query("INSERT INTO users (userid,username,useremail,usermobnumber)
             values('$this->userid','$this->username','$this->useremail','$this->usermobnumber')");
            if($query){
                return true;
            }
            else{
                return false;
            }
    }

}

?>