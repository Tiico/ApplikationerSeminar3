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
        $sql = ("SELECT * FROM comments WHERE id = ?");
        $comment_query = $this->db->query($sql, array($id));
        if($comment_query->row(0)->username == $this->session->userdata('username')){
            $sql2 = ("DELETE FROM comments WHERE id = ?");
            $this->db->query($sql2, array($id));
            return true;
        }else{
            die('You cant delete other users comments!');
        }
    }
}
