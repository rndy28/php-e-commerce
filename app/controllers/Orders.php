<?php 
class Orders extends Controller {
    public function index()
    {
        $data['css'] = ['components/nav', 'components/table', 'layout/orders', 'components/button'];
        $data['js'] = 'orders';
        $data['orders'] = $this->model('Transaksi_model')->getTransaksi();
        $this->view('templates/header', $data);
        $this->view('templates/nav', $data);
        $this->view('user/orders', $data);
        $this->view('templates/footer', $data);
    }
}
