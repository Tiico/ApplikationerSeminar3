<?php
class comments_model extends CI_Model{
    public function __construct(){
        $this->load->Database();
    }
    public function showComments(){
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('comments');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    public function addComment(){
        $this->form_validation->set_rules('body', 'Comment', 'trim|required');

        if($this->form_validation->run() === TRUE){

            $comment = htmlspecialchars($this->input->post('body'));
            $data = array(
                'username' => $this->session->userdata('username'),
                'comment' => $comment,
                'food'=>$this->input->post('food'),
            );
            $this->db->insert('comments', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
    }
    public function delete_comment(){
        $id = $this->input->get('id');
        $comment_query = $this->db->query("SELECT * FROM comments WHERE id = '$id'");
        if($comment_query->row(0)->username == $this->session->userdata('username')){
            $this->db->query("DELETE FROM comments WHERE id = '$id'");
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
    }
    public function longPolling($rows){
        while(true){
            $query = $this->db->get('comments');
            if($rows != $query->num_rows()){
                $rows = $query->num_rows();
                return $rows;
            }
            session_write_close();
            sleep(1);
        }
    }


}
/********************** Without Javascript *********************/

/*    public function get_comments($slug = FALSE){
        if($slug === FALSE){
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('comments');
            return $query->result_array();
        }
        $query = $this->db->get_where('comments', array('slug' => $slug));
        return $query->row_array();
    }
    public function create_comment($food){
        $comment = htmlspecialchars($this->input->post('body'));
        $data = array(
            'food' => $food,
            'username' => $this->session->userdata('username'),
            'comment' => $comment
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
    }*/
