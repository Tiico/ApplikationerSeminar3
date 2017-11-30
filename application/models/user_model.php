<?php
class user_model extends CI_Model{
    public function register($password){
        // User data array
        $uname = htmlspecialchars($this->input->post('username'));
        $data = array(
            'username' => $uname,
            'password' => $password
        );

        return $this->db->insert('users', $data);
    }
    public function login($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return $result->row(0)->id;
        }else{
            return false;
        }


    }
}

?>
