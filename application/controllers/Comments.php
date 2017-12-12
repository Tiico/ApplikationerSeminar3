<?php
class Comments extends CI_Controller{
    public function showComments(){
        $result = $this->comments_model->showComments();
        echo json_encode($result);
    }
    public function addComment(){
        $result = $this->comments_model->addComment();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
    public function deletee(){
        $result = $this->comments_model->deletee_comment();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    //******************** Without Javascript *******************
    /*    public function create(){
        $food = $this->input->post('food');
        $this->form_validation->set_rules('body', 'Comment', 'trim|required');
        $data['comments'] = $this->comments_model->get_comments();

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('pages/'.$food, $data);
            $this->load->view('templates/footer');

            $this->session->set_flashdata('comment_created_fail', 'Wrong comment format, try again!!');
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
    } */
}
