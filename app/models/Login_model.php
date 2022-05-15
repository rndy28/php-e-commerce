<?php

class Login_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function loginUser($data)
    {
        $query = 'SELECT * FROM User WHERE Username = ? AND Password = ?';
        $username = $data['username'];
        $password = $data['password'];
        $this->db->query($query);
        $this->db->bind('ss', [$username, $password]);
        $this->db->execute();
        if (is_null($this->db->single())) {
            header('Location: ' . BASEURL . '/login');
            $_SESSION['is_error'] = true;
            //TODO Show message in login page
        } else if ($this->db->single()['Username'] == 'admin') {
            $_SESSION['admin'] = $this->db->single();
            header('Location: ' . BASEURL . '/dashboard/barang');
        } else {
            $_SESSION['user'] = $this->db->single();
            header('Location: ' . BASEURL . '/home');
        }
    }
}
