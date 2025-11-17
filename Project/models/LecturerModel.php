<?php
// koneksi database
require_once 'config/database.php';

class LecturerModel
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
        $sql = 'SELECT lecturers.*, departments.name AS department_name 
            FROM lecturers 
            LEFT JOIN departments ON lecturers.department_id = departments.id 
            ORDER BY lecturers.id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }

    // read data by id
    public function getById($id)
    {
        $id = intval($id);
        $sql = 'SELECT * FROM lecturers WHERE id = ? LIMIT 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // create data
    public function create($name, $nidn, $phone, $join_date, $department_id)
    {
        if (is_null($department_id) || $department_id === '') {
            $sql = 'INSERT INTO lecturers (name, nidn, phone, join_date) VALUES (?, ?, ?, ?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('ssss', $name, $nidn, $phone, $join_date);
        } else {
            $dept = intval($department_id);
            $sql = 'INSERT INTO lecturers (name, nidn, phone, join_date, department_id) VALUES (?, ?, ?, ?, ?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('ssssi', $name, $nidn, $phone, $join_date, $dept);
        }

        return $stmt->execute();
    }

    // update data
    public function update($id, $name, $nidn, $phone, $join_date, $department_id)
    {
        $id = intval($id);

        if (is_null($department_id) || $department_id === '') {
            $sql = 'UPDATE lecturers SET name = ?, nidn = ?, phone = ?, join_date = ?, department_id = NULL WHERE id = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('ssssi', $name, $nidn, $phone, $join_date, $id);
        } else {
            $dept = intval($department_id);
            $sql = 'UPDATE lecturers SET name = ?, nidn = ?, phone = ?, join_date = ?, department_id = ? WHERE id = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('ssssii', $name, $nidn, $phone, $join_date, $dept, $id);
        }

        return $stmt->execute();
    }

    // delete data
    public function delete($id)
    {
        $id = intval($id);
        $sql = 'DELETE FROM lecturers WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    // get all departments
    public function getDepartments()
    {
        $sql = 'SELECT * FROM departments ORDER BY name ASC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }
}
