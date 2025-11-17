<?php
// koneksi database
require_once 'config/database.php';

class DepartmentModel
{
    private $conn;

    // constructor
    public function __construct()
    {
        global $db;
        $this->conn = $db;
    }

    // read all data
    public function getAll()
    {
        $sql = 'SELECT * FROM departments ORDER BY id ASC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }

    // read data by id
    public function getById($id)
    {
        $id = intval($id);
        $sql = 'SELECT * FROM departments WHERE id = ? LIMIT 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // create data
    public function create($name, $description)
    {
        $sql = 'INSERT INTO departments (name, description) VALUES (?, ?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $name, $description);
        return $stmt->execute();
    }

    // update data
    public function update($id, $name, $description)
    {
        $id = intval($id);
        $sql = 'UPDATE departments SET name = ?, description = ? WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssi', $name, $description, $id);
        return $stmt->execute();
    }

    // delete data
    public function delete($id)
    {
        $id = intval($id);
        $sql = 'DELETE FROM departments WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
