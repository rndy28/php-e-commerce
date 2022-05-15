<?php
class Home extends Controller
{
    public function index()
    {
        $data['js'] = 'home';
        $data['css'] = ['components/button', 'components/nav', 'layout/home', 'components/card'];
        $data['barang'] = $this->model('Barang_model')->getBarang();
        $this->view('templates/header', $data);
        $this->view('templates/nav', $data);
        $this->view('user/home', $data);
        $this->view('templates/footer', $data);
    }
}
