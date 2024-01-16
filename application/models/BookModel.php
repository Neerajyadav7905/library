<?php
class BookModel extends CI_model{

    public function __construct(){
        $this->load->Database();
    }

    public function addbook($bookid,$booktitle,$bookauthor,$bookcategory,$bookimage){
        $this->bookid = $bookid;
        $this->booktitle = $booktitle;
        $this->bookauthor = $bookauthor;
        $this->bookcategory = $bookcategory;
        $this->bookimage = $bookimage;

    //insert into database

        $query = $this->db->query("INSERT INTO books(bookid, booktitle, bookauthor, bookcategory,bookimage)
                VALUES ('$this->bookid','$this->booktitle','$this->bookauthor','$this->bookcategory','$this->bookimage')");
        if($this->db->affected_rows()>0){
        return true;
         }
         else{
            return false;
         }
    }

    //Select last 10 added book

    public function lastaddedbook(){

        $query = $this->db->query('SELECT bookid, booktitle, bookauthor, bookcategory,bookadddate
                FROM books order by bookadddate desc Limit 10');
        $result = $query->result();
        if($result){
            return $result;
        }
        else{
            return false;
        }
    }

    public function issuebook($bookid,$userid){

        $this->bookid = $bookid;
        $this->userid = $userid;

        // search user accound exist 

            $query = $this->db->query("SELECT userid From users where userid = '$this->userid'");
                if($query->num_rows()>0){
        
        // search book id is valid

                $query2 = $this->db->query("SELECT bookid,status From books where bookid = '$this->bookid' limit 1");
                if($query2->num_rows()>0){
                $book_result = $query2->row();
                if($book_result->status==0){
                    return "<h4 class='errormsg'> book already issued </h4>";
                }
                else{
        
        //update book status and issue 

                    $query4 = $this->db->query("UPDATE books set status = 'issued' where bookid ='$this->bookid'");
                    if($this->db->affected_rows()>0){
                        date_default_timezone_set("Asia/Calcutta"); 
                        $current_time = Date('Y-m-d H:i:s');
                        $query3 = $this->db->query("INSERT INTO bookstatus(userid,bookid,status,issuedate)
                        VALUES ('$this->userid','$this->bookid',0,'$current_time')");
                           if($this->db->affected_rows()>0){
                           return "<h4 class='successmsg'> book is issued </h4>";
                                }
                            else{
                            return "<h4 class='errormsg'> Some error occurs </h4>";
                           }
                     }
                     else{
                        return "<h4 class='errormsg'> book already Issued </h4>";
                    }
                }
                  
            }
            else{
                return "<h4 class='errormsg'> book not Found </h4>";
            }
        }
        else{
            return "<h4 class='errormsg'> userid not found </h4>";
        }

    }

    public function issuebooklist(){
       $query =  $this->db->query("SELECT books.bookid, books.booktitle,books.bookimage,bookstatus.userid, bookstatus.issuedate from books inner join bookstatus
        where bookstatus.status = 0 and bookstatus.bookid = books.bookid order by bookstatus.issuedate desc limit 8");
       $result = $query->result();
       if($result){
        return $result;
       }
    }

// get book data for return 

    public function fetchreturnbook($bookid){
        $this->bookid = $bookid;
        $query = $this->db->query("SELECT * FROM bookstatus WHERE bookid = '$this->bookid' and status = 0 limit 1");
        if($query->num_rows()>0){
            $result = $query->row_array();
            return $result;
        }
        return false;
    }

    public function returnbook($book_id){
        $this->bookid = $book_id;
        date_default_timezone_set("Asia/Calcutta");
        $current_time = Date('Y-m-d H:i:s');
        $query = $this->db->query("UPDATE bookstatus SET status = 1,returndate = '$current_time' WHERE bookid = '$this->bookid' and status = 0");
        if($this->db->affected_rows()>0){
            $query2 = $this->db->query("UPDATE books SET status = 1 WHERE bookid = '$this->bookid'");
            if($this->db->affected_rows()>0){
                return true;
            }
            else{
                return false;
            }
        }  
        else{
            return false;
        }
    }

    public function returendbooklist(){
        $query =  $this->db->query("SELECT books.bookid, books.bookimage, books.booktitle ,bookstatus.userid, bookstatus.issuedate,bookstatus.returndate from books inner join bookstatus where bookstatus.status = 1
         and bookstatus.bookid = books.bookid order by bookstatus.returndate desc limit 8");
        $result = $query->result();
        if($result){
         return $result;
        }
     }

}

?>