<?php
require_once __DIR__ . '/../Database/Database.php';

class Employee
{
    private $conn;
  

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getAllEmployees()
    {
        $query = "SELECT * FROM employees WHERE deleted_at IS NULL";
        $result = mysqli_query($this->conn, $query);
        
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function store($data){
        $query = "INSERT INTO employees (name,username,password) VALUES (?,?,?)";
        $stmt = mysqli_prepare($this->conn,$query);
        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $data['name'],
            $data['username'],
            $data['password']
        );

        return mysqli_stmt_execute($stmt);
    }
}