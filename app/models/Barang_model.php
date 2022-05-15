<?php

class Barang_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getBarang()
    {
        $this->db->query('SELECT * FROM Printer_tb');
        
        return $this->db->resultSet();
    }
    public function createBarang($action)
    {
        if ($action == 'create' && count($_POST) > 0) {
            $targetFile = $_FILES['thumbnail_printer'];
            $imageFileName = $targetFile['name'];
        
            $namaPrinter = $_POST['nama_printer'];
            $spesifikasiPrinter = $_POST['spesifikasi_printer'];
            $hargaPrinter = $_POST['harga_printer'];
            $adminId = $_SESSION['admin']['IdUser'];

            $query = 'INSERT INTO Printer_tb (ThumbnailPrinter, NamaPrinter, SpesifikasiPrinter, HargaPrinter, UserIdUser) VALUES(?, ?, ?, ?, ?)';
            $this->db->query($query);
            $this->db->bind('sssii', [ $imageFileName, $namaPrinter, $spesifikasiPrinter, (int)$hargaPrinter, $adminId]);
            $this->db->execute();


            if ($this->db->affectedRows() > 0) {
                $_SESSION['insert_success'] = true;
                header('Location: ' . BASEURL . '/dashboard/barang');
            }
        }
    }
    public function deleteBarang($id)
    {
        if (isset($id)) {
            $this->db->query("DELETE FROM Printer_tb WHERE IdPrinter = ?");
            $this->db->bind('i', [$id]);
            $this->db->execute();
            if ($this->db->affectedRows() > 0) {
                header('Location:' . BASEURL . '/dashboard/barang');
            }
        }
    }
    public function updateBarang($action)
    {

        if ($action == 'update' && count($_POST) > 0) {

            $idPrinter = $_POST['id_printer'];
            $namaPrinter = $_POST['nama_printer'];
            $spesifikasiPrinter = $_POST['spesifikasi_printer'];
            $hargaPrinter = $_POST['harga_printer'];
            $adminId = $_SESSION['admin']['IdUser'];

            $query = 'UPDATE Printer_tb SET  
            NamaPrinter = ?, 
            SpesifikasiPrinter = ?, 
            HargaPrinter = ?, 
            UserIdUser = ?
            WHERE IdPrinter = ?';
            $this->db->query($query);
            $this->db->bind('ssiii', [$namaPrinter, $spesifikasiPrinter, (int)$hargaPrinter, (int)$adminId, (int)$idPrinter]);
            $this->db->execute();
            

            if ($this->db->affectedRows() > 0) {
                $_SESSION['insert_success'] = true;
                header('Location: ' . BASEURL . '/dashboard/barang');
            }
        }
    }
}
