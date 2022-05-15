<?php

class Cart_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function addToCart($orders)
    {
        $query = 'INSERT INTO Transaksi (Jumlah, subtotal, status, UserIdUser, Printer_tbIdPrinter, UserIdUser2) VALUES(?, ?, ?, ?, ?, ?)';
        foreach ($orders['orders'] as $key => $order) {
            $this->db->query($query);
            $this->db->bind('iiiiii', [
                $orders['quantities'][$key]['quantity'],
                $orders['quantities'][$key]['price'],
                1,
                $_SESSION['user']['IdUser'],
                $order['productId'],
                $_SESSION['user']['IdUser']
            ]);
            $this->db->execute();
            if ($this->db->affectedRows() > 0) {
                $_SESSION['checkout_success'] = true;
                header('Location: ' . BASEURL . '/cart');
            }
        }
    }
}
