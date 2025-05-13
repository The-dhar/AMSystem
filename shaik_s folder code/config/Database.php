<?php

    class Database {
        private $db_name = "if0_38973110_amsystemdb";
        private $host = "sql207.infinityfree.com";
        private $username = "if0_38973110";
        private $password = "9VXR6EfRIB296z";
        public $conn;

        public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",
                $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection Error: " . $exception->getMessage());
        }

        return $this->conn;
        }
    }