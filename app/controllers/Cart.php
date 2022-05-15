<?php

class Cart extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
        }
        $data['css'] = ['components/nav', 'components/cart', 'components/radio', 'components/button', 'components/table'];
        $data['js'] = 'cart';
        $this->view('templates/header', $data);
        $this->view('templates/nav', $data);
        $this->view('user/cart');
        $this->view('templates/footer', $data);
    }
    public function checkout()
    {
        if (isset($_POST['data'])) {
            $this->model('Cart_model')->addToCart(json_decode($_POST['data'], true));
        }
    }
}
