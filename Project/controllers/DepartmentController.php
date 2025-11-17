<?php
// include department model
require_once __DIR__ . '/../models/DepartmentModel.php';

class DepartmentController
{
    private $model;

    // constructor
    public function __construct()
    {
        $this->model = new DepartmentModel();
    }

    // display list of departments
    public function index()
    {
        $departments = $this->model->getAll();
        include __DIR__ . '/../views/departments/index.php';
    }

    // show create department form
    public function create()
    {
        include __DIR__ . '/../views/departments/create.php';
    }

    // store new department
    public function store()
    {
        $name = $_POST['name'];
        $description = $_POST['description'];  // Changed from 'code'

        $this->model->create($name, $description);  // Pass description

        header('Location: index.php?module=department');
        exit;
    }

    // show edit department form
    public function edit($id)
    {
        $data = $this->model->getById($id);
        include __DIR__ . '/../views/departments/edit.php';
    }

    // update existing department
    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];  // Changed from 'code'

        $this->model->update($id, $name, $description);  // Pass description

        header('Location: index.php?module=department');
        exit;
    }

    // delete department
    public function delete($id)
    {
        $this->model->delete($id);

        header('Location: index.php?module=department');
        exit;
    }
}
