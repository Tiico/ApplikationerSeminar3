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

        $myquery = $this->db->query("SELECT * FROM users WHERE username = '$username'");

        if($myquery->num_rows() == 1){
            $pwhash = $myquery->row(0)->password;
            if(password_verify($password, $pwhash)){
                return $myquery->row(0)->username;
            }
        }else{
            return false;
        }


    }
}

?>
