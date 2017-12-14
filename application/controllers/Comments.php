<?php
class comments extends CI_Controller{
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
    public function delete(){
        $result = $this->comments_model->delete_comment();
        $msg['success'] = false;
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}
