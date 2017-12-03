<?php
    class Pages extends CI_Controller{
        public function view($page = 'home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
        $this->output->cache(10);
        $data['title'] = ucfirst($page);
        $data['comments'] = $this->comments_model->get_comments();

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
        }
    }
?>
