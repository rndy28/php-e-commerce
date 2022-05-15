<?php
class Login extends Controller
{
    private $data;
    public function index()
    {

        if (isset($_SESSION['admin'])) {
            header('Location: ' . BASEURL . '/dashboard/barang');
        } else if (isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/');
        } else {
            $this->data['title'] = ' | Sign In';
            $this->data['css'] = ['components/form', 'components/button'];
            $this->data['js'] = 'auth/login';
            $this->view('templates/header', $this->data);
            $this->view('auth/login');
            $this->view('templates/footer', $this->data);
        }
    }
    public function new()
    {
        $this->model('Login_model')->loginUser($_POST);
    }
}
