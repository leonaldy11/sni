<?php
require_once __DIR__ . '/../Database/database.php';
class Material {
    private $conn;

    public function __construct() {
        global $conn;
        $this->conn = $conn;
    }

    public function getAllData() {
        $query = "SELECT * FROM materials WHERE deleted_at IS NULL";
        $result = mysqli_query($this->conn, $query);

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function store($data) {
        $query = "INSERT INTO materials (name, description, created_at) 
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
        $query = "SELECT * FROM materials WHERE id = ? AND deleted_at IS NULL";

        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_assoc($result);
    }

    public function update($id, $data) {
        $query = "UPDATE materials SET name = ?, description = ?, updated_at = ? WHERE id = ?";

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
        // Soft delete by setting the deleted_at timestamp
        $deletedAt = date('Y-m-d H:i:s');
        $query = "UPDATE materials SET deleted_at = ? WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, "si", $deletedAt, $id);

        return mysqli_stmt_execute($stmt);
    }
}
