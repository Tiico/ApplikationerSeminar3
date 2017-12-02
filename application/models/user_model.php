<?php
class user_model extends CI_Model{
    public function register($password){
        // User data array filter into htmlspecialchars
        $uname = htmlspecialchars($this->input->post('username'));
        $data = array(
            'username' => $uname,
            'password' => $password
        );

        return $this->db->insert('users', $data);
    }
    public function login($username, $password){

        $sql = ("SELECT * FROM users WHERE username = ?");
        $myquery = $this->db->query($sql, array($username));

        if($myquery->num_rows() == 1){
            $pwhash = $myquery->row(0)->password;
            if(password_verify($password, $pwhash)){
                return $myquery->row(0)->username;
            }else{
                return false;
            }
        }else{
            return false;
        }


    }
}

?>
