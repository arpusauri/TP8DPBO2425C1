<?php

class LecturerModel
{
    private $conn;

    public function __construct()
    {
        include __DIR__ . "/../config/database.php";
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM lecturers ORDER BY id ASC";
        return $this->conn->query($sql);
    }

    public function getById($id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM lecturers WHERE id = $id LIMIT 1";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function create($name, $nidn, $phone, $join_date)
    {
        $sql = "INSERT INTO lecturers (name, nidn, phone, join_date)
                VALUES ('$name', '$nidn', '$phone', '$join_date')";
        return $this->conn->query($sql);
    }

    public function update($id, $name, $nidn, $phone, $join_date)
    {
        $id = intval($id);

        $sql = "UPDATE lecturers 
                SET name='$name', nidn='$nidn', phone='$phone', join_date='$join_date'
                WHERE id = $id";

        return $this->conn->query($sql);
    }

    public function delete($id)
    {
        $id = intval($id);
        $sql = "DELETE FROM lecturers WHERE id = $id";
        return $this->conn->query($sql);
    }
}
