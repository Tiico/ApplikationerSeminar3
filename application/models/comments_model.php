<?php
class comments_model extends CI_Model{
    public function __construct(){
        $this->load->Database();
    }
    public function get_comments($slug = FALSE){
        if($slug === FALSE){
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('comments');
            return $query->result_array();
        }
        $query = $this->db->get_where('comments', array('slug' => $slug));
        return $query->row_array();
    }
    public function create_comment($food){
            $test = htmlspecialchars($this->input->post('body'));
            $data = array(
                'food' => $food,
                'username' => $this->session->userdata('username'),
                'comment' => $test
                );

            $this->db->insert('comments', $data);
        }
    public function delete_comment($id){
        $comment_query = $this->db->query("SELECT * FROM comments WHERE id = '$id'");
        if($comment_query->row(0)->username == $this->session->userdata('username')){
            $this->db->query("DELETE FROM comments WHERE id = '$id'");
            return true;
        }else{
            die('You cant delete other users comments!');
        }
    }
}
