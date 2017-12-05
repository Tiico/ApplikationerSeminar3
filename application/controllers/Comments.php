<?php
class Comments extends CI_Controller{
    public function create(){
        $food = $this->input->post('food');
        $this->form_validation->set_rules('body', 'Comment', 'trim|required');
        $data['comments'] = $this->comments_model->get_comments();

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('pages/'.$food, $data);
            $this->load->view('templates/footer');

            $this->session->set_flashdata('comment_created_fail', 'Wrong comment format, try again!');
        }else{
            $this->comments_model->create_comment($food);
            $this->session->set_flashdata('comment_created', 'Your comment has been created!');
        }
        redirect($food);
    }
    public function delete($id){
        $food = $this->input->post('food');
        $this->comments_model->delete_comment($id);

        $this->session->set_flashdata('comment_deleted', 'Your comment has been deleted!');
        redirect($food);
    }
}
