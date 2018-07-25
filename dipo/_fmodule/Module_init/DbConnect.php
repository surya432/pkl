<?php 
class DbConnect{
    public $conn;
    function __construct() {
        $koneksi = new PDO("mysql:dbname=pkl", "root", "");
        $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $koneksi->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->conn = new FluentPDO($koneksi);
    }
}