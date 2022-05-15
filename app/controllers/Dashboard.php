<?php

class Dashboard extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data['css']  = ['layout/dashboard', 'components/button', 'components/table', 'components/modal', 'components/form'];
        $this->data['js'] = 'dashboard';
    }
    public function index()
    {
        if(isset($_SESSION['admin']) && $_SESSION['admin']) {
            header('Location: ' . BASEURL . '/dashboard/barang');
        } else {
            header('Location: ' . BASEURL . '/login');
        }
    }
    public function barang($action = null, $id = null)
    {
        $this->data['barang'] = $this->model('Barang_model')->getBarang();
        $this->model('Barang_model')->deleteBarang($id);
        $this->model('Barang_model')->createBarang($action);
        $this->model('Barang_model')->updateBarang($action);
        $this->view('templates/header', $this->data);
        $this->view('admin/dashboard', $this->data);
        $this->view('templates/footer', $this->data);
    }
    public function transaksi($_ = null, $id = null)
    {
        $this->data['transaksi'] = $this->model('Transaksi_model')->getTransaksi();
        $this->model('Transaksi_model')->confirmTransaksi($id);
        $this->view('templates/header', $this->data);
        $this->view('admin/dashboard', $this->data);
        $this->view('templates/footer', $this->data);
    }
}
