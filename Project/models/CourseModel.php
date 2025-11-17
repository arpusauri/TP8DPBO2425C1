<?php
// koneksi database
require_once 'config/database.php';

class CourseModel
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
        $sql = 'SELECT courses.*, lecturers.name AS lecturer_name 
        FROM courses 
        LEFT JOIN lecturers ON courses.lecturer_id = lecturers.id 
        ORDER BY courses.id ASC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }

    // read data by id
    public function getById($id)
    {
        $sql = "SELECT * FROM courses WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->get_result()->fetch_assoc();
    }

    // create data
    public function create($name, $credit, $lecturer_id)
    {
        $sql = "INSERT INTO courses (name, credit, lecturer_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $credit, $lecturer_id]);
    }

    // update data
    public function update($id, $name, $credit, $lecturer_id)
    {
        $sql = "UPDATE courses SET name=?, credit=?, lecturer_id=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $credit, $lecturer_id, $id]);
    }

    // delete data
    public function delete($id)
    {
        $sql = "DELETE FROM courses WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    // get all lecturers
    public function getLecturers()
    {
        $sql = 'SELECT * FROM lecturers ORDER BY name ASC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }
}
