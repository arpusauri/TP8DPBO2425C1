<?php
// include lecturer model
require_once __DIR__ . "/../models/LecturerModel.php";

class LecturerController
{
    private $model;

    // constructor
    public function __construct()
    {
        $this->model = new LecturerModel();
    }

    // display list of lecturers
    public function index()
    {
        $lecturers = $this->model->getAll();
        include __DIR__ . "/../views/lecturers/index.php";
    }

    // show create lecturer form
    public function create()
    {
        $departments = $this->model->getDepartments();
        include __DIR__ . "/../views/lecturers/create.php";
    }

    // store new lecturer
    public function store()
    {
        $name = $_POST['name'];
        $nidn = $_POST['nidn'];
        $phone = $_POST['phone'];
        $join_date = $_POST['join_date'];
        $departmen_id = $_POST['department_id'];
        
        $this->model->create($name, $nidn, $phone, $join_date, $departmen_id);
        
        header("Location: index.php");
        exit;
    }
    
    // show edit lecturer form
    public function edit($id)
    {
        $data = $this->model->getById($id);
        $departments = $this->model->getDepartments();
        include __DIR__ . "/../views/lecturers/edit.php";
    }
    
    // update existing lecturer
    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $nidn = $_POST['nidn'];
        $phone = $_POST['phone'];
        $join_date = $_POST['join_date'];
        $departmen_id = $_POST['departmen_id'];

        $this->model->update($id, $name, $nidn, $phone, $join_date, $departmen_id);

        header("Location: index.php");
        exit;
    }

    // delete lecturer
    public function delete($id)
    {
        $this->model->delete($id);

        header("Location: index.php");
        exit;
    }
}
