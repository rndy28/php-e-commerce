<?php

class Transaksi_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getTransaksi()
    {
        $this->db->query('SELECT Transaksi.subtotal, Transaksi.Jumlah, Transaksi.idTransaksi, Transaksi.status ,  Transaksi.UserIdUser2, User.Username, Printer_tb.NamaPrinter, Printer_tb.HargaPrinter FROM Transaksi INNER JOIN User ON Transaksi.UserIdUser2 = User.IdUser INNER JOIN Printer_tb ON Transaksi.Printer_tbIdPrinter = Printer_tb.IdPrinter');
        return $this->db->resultSet();
    }
    public function confirmTransaksi($id)
    {
        if (isset($id)) {
            $status = 2;
            $this->db->query("UPDATE Transaksi SET status = ? WHERE IdTransaksi = ?");
            $this->db->bind('ii', [$status, $id]);
            $this->db->execute();

            if($this->db->affectedRows() > 0){
                header('Location: '.BASEURL.'/dashboard/transaksi');
            }
        }
    }
}
