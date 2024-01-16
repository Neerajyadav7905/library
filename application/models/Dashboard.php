<?php
class Dashboard extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function alldata(){
        $query1 = $this->db->query('SELECT status FROM books');
        $total_books = $query1->num_rows();
        $query2 = $this->db->query('SELECT status FROM books WHERE status = 1');
        $Available_books = $query2->num_rows();
        $result = array(
            'total_books' =>$total_books,
            'Available_books' =>$Available_books
        );
        return $result;

    }

}