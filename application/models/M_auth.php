<?php

class M_auth extends CI_Model
{
    public function auth_user($username, $password)
    {
        $query = $this->db->query("SELECT * FROM user WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }

    function get_data_user($id_user)
    {
        $query = $this->db->query("SELECT * FROM user WHERE id_user='$id_user' LIMIT 1");
        return $query;
    }

    public function register($data)
    {
        $query = $this->db->insert('user', $data);
        return $query; 
    }
}
