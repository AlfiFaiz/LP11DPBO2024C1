<?php


/******************************************
Asisten Pemrogaman 13
 ******************************************/
class DB
{
    var $db_host = ''; // host
    var $db_user = ''; // user basis data
    var $db_password = ''; // password
    var $db_name = ''; // nama basis data
    var $db_link = ''; // nama basis data
    var $result = 0;

    function __construct($db_host = 'localhost', $db_user = 'root', $db_password = '', $db_name = 'mvp_php')
    {
        // konstruktor
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
        // Initialize connection
        $this->open();
    }

    function open()
    {
        // membuka koneksi
        $this->db_link = mysqli_connect($this->db_host, $this->db_user, $this->db_password);
    
        // memilih database
        mysqli_select_db($this->db_link, $this->db_name);
    
        // Memeriksa apakah ada kesalahan dalam memilih database
        if (mysqli_connect_errno()) {
            throw new Exception("Database selection failed: " . mysqli_connect_error());
        }
    }

    function execute($query = "")
    {
        // mengeksekusi query
        $this->result = mysqli_query($this->db_link, $query);

        return $this->result;
    }

    function getResult()
    {
        // mengambil ekseskusi query
        return mysqli_fetch_array($this->result);
    }

    function close()
    {
        // menutup koneksi
        mysqli_close($this->db_link);
    }
}

