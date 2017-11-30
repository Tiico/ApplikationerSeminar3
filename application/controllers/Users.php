<?php

class Users extends CI_Controller{
    //register
    public function register(){
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|is_unique[users.username]|alpha_numeric', array('is_unique' => 'This username already exists. Please pick another one.'));
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        }
        else{
            //Encrypting the password and send to model-layer
            $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);

            $this->user_model->register($password);

            //Set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in.');

            redirect($this->session->userdata('last_page'));
        }
    }
    //login
    public function login(){
        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $lastpage = $this->session->userdata('last_page');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        }
        else{
            //get username
            $username = $this->input->post('username');

            $password = $this->input->post('password');

            $user_id = $this->user_model->login($username, $password);

            if($user_id){
                //create session
                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);
                //set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in.');

                redirect($this->session->userdata('last_page'));
            }else{
                //Set message
                $this->session->set_flashdata('login_failed', 'Invalid login.');

                redirect($this->session->userdata('last_page'));
            }
        }
    }
    public function logout(){
        //unset userdata
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        //Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out.');

        redirect($this->session->userdata('last_page'));
    }
}

?>
