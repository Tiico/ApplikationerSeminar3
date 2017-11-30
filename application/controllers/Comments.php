<?php
class Comments extends CI_Controller{
    public function create(){
        $food = $this->input->post('food');

        $this->comments_model->create_comment($food);

        $this->session->set_flashdata('comment_created', 'Your comment has been created!');
        redirect($food);
    }
    public function delete($id){
        $food = $this->input->post('food');
        $this->comments_model->delete_comment($id);

        $this->session->set_flashdata('comment_deleted', 'Your comment has been deleted!');
        redirect($food);
    }
}

?>
