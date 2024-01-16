<?php
class PasswordModel extends CI_model{

    public function __construct(){
        $this->load->Database();
        $this->load->helper('string');
    }

public function getotp($email){
    $this->email = $email;
    $query1 = $this->db->query("SELECT*FROM users WHERE useremail = '$this->email'");
    if($query1->num_rows()>0){
        $otp = random_string('numeric',6);
        $query2 = $this->db->query("UPDATE users SET otp = '$otp' WHERE useremail = '$this->email'");
        if($this->db->affected_rows()>0){
            return $otp;
        }
        else{
            return false;
        }

    }
    else{
        $query3 = $this->db->query("SELECT*FROM Admin WHERE Adminemail = '$this->email'");
        if($query3->num_rows()>0){
            $otp = random_string('numeric',6);
            $query4 = $this->db->query("UPDATE Admin SET otp = '$otp' WHERE Adminemail = '$this->email'");
            if($this->db->affected_rows()>0){
                return $otp;
            }
            else{
                return false;
            }
    
        }
        else{
           return false;
    
        }

    }

}

// reset after getting otp


public function reset($email,$otp,$password){
    $this->email =$email;
    $this->otp = $otp;
    $this->password = $password;
    if(strlen($this->otp)==6){
        $query5 = $this->db->query("SELECT otp FROM users WHERE useremail = '$this->email' limit 1");
        if($query5->num_rows()>0){
            $result = $query5->row();
            if($result->otp == $this->otp){
                $update_query = $this->db->query("UPDATE users SET userpassword = '$this->password', otp = 0 WHERE useremail = '$this->email'");
                if($this->db->affected_rows()>0){
                    return "<h4 class='successmsg'> Password Updated Sucessfully </h4>";
                }
                else{
                    return "<h4 class='errormsg'> Server side Error Occurs contact the Admins </h4>";
                }
            }
            else{
                return "<h4 class='errormsg'> OTP not Matched </h4>";
            }

        }
        else{
            $query6 = $this->db->query("SELECT otp FROM Admin WHERE Adminemail = '$this->email' limit 1");
            if($query6->num_rows()>0){
                $result = $query6->row();
                if($result->otp == $this->otp){
                    $update_query = $this->db->query("UPDATE Admin SET Adminpassword = '$this->password', otp = 0 WHERE adminemail = '$this->email'");
                    if($this->db->affected_rows()>0){
                        return "<h4 class='successmsg'> Password Updated Sucessfully </h4>";
                    }
                    else{
                        return "<h4 class='errormsg'> Server side Error Occurs contact the Admins </h4>";
                    }
                }
                else{
                    return "<h4 class='errormsg'> OTP not Matched </h4>";
                }
    
            }
            else{
                return "<h4 class='errormsg'> User Not Registored </h4>";
            }
        }

    }
    else{
        return "OTP is not valid";
    }

}


}


?>