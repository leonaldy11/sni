<?php
require_once __DIR__ . '/../Database/database.php';
class Welding {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getAllData() {
        $query = "SELECT * FROM weldings WHERE deleted_at IS NULL";
        $result = mysqli_query($this->conn, $query);

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function store($data) {
        $query = "INSERT INTO weldings (name, description, created_at) 
          VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($this->conn, $query);

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $data['name'],
            $data['description'],
            $data['created_at']
        );

        return mysqli_stmt_execute($stmt);
    }

    public function getDataById($id) {
        $query = "SELECT * FROM weldings WHERE id = ? AND deleted_at IS NULL";

        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_assoc($result);
    }

    public function update($id, $data) {
        $query = "UPDATE weldings SET name = ?, description = ?, updated_at = ? WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        mysqli_stmt_bind_param(
            $stmt,
            "sssi",
            $data['name'],
            $data['description'],
            $data['updated_at'],
            $id
        );

        return mysqli_stmt_execute($stmt);
    }

    public function delete($id) {
        $query = "UPDATE weldings SET deleted_at = ? WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);
        $deleted_at = date('Y-m-d H:i:s');
        mysqli_stmt_bind_param($stmt, "si", $deleted_at, $id);

        return mysqli_stmt_execute($stmt);
    }
}
?>