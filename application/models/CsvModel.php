<?php
class CsvModel extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
public function adminlist(){
    $query = $this->db->query('SELECT *FROM admin');
    $result = $query->result_array();
    return $result;
}
public function verifyemail($email){
    $this->email = $email;
    $query = $this->db->query("SELECT adminemail FROM admin WHERE  adminemail = '$this->email'");
    if($query->num_rows()>0){
        return true;
    }
    else{
        return false;
    }
}
public function updatedata($id,$name,$email,$password){
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $query = $this->db->query("UPDATE admin SET adminid='$this->id', adminname ='$this->name',
     adminpassword ='$this->password' WHERE adminemail='$this->email'");
    $result = $this->db->affected_rows();
    if($result>0){
        return true;
    }
    else{
        return false;
    }
}
public function insertdata($id,$name,$email,$password){
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $query = $this->db->query("INSERT INTO admin(adminid,adminname,adminemail,adminpassword)
     values('$this->id','$this->name','$this->email','$this->password')");
    if($this->db->affected_rows()>0){
        return true;
    }
    else{
        return false;
    }
}

}
?>