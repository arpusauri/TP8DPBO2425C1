<?php

require_once __DIR__ . "/../models/LecturerModel.php";

class LecturerController
{
    private $model;

    public function __construct()
    {
        $this->model = new LecturerModel();
    }

    public function index()
    {
        $lecturers = $this->model->getAll();
        include __DIR__ . "/../views/lecturers/index.php";
    }

    public function create()
    {
        include __DIR__ . "/../views/lecturers/create.php";
    }

    public function store()
    {
        $name = $_POST['name'];
        $nidn = $_POST['nidn'];
        $phone = $_POST['phone'];
        $join_date = $_POST['join_date'];

        $this->model->create($name, $nidn, $phone, $join_date);

        header("Location: index.php");
        exit;
    }

    public function edit($id)
    {
        $data = $this->model->getById($id);
        include __DIR__ . "/../views/lecturers/edit.php";
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $nidn = $_POST['nidn'];
        $phone = $_POST['phone'];
        $join_date = $_POST['join_date'];

        $this->model->update($id, $name, $nidn, $phone, $join_date);

        header("Location: index.php");
        exit;
    }

    public function delete($id)
    {
        $this->model->delete($id);

        header("Location: index.php");
        exit;
    }
}
