<?php
class LoginModel extends CI_model{
public function login($email,$password){
    $this->load->Database();
    $this->email =$email;
    $this->password = $password;
    $query = $this->db->query("SELECT adminemail,adminpassword,role FROM admin Where adminemail ='$this->email' and role = 'Admin'");
    if($query->num_rows()>0){
        $result = $query->row();
        if(password_verify($this->password,$result->adminpassword)){
            return $result;
        }
        else{
            return false;
        }
    }
    else {
        return false;
    }
}
}
?>