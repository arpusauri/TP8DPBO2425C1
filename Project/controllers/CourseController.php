<?php
// include course model
require_once __DIR__ . '/../models/CourseModel.php';

class CourseController
{
    private $model;

    // constructor
    public function __construct()
    {
        $this->model = new CourseModel();
    }

    // display list of courses
    public function index()
    {
        $courses = $this->model->getAll();
        include __DIR__ . '/../views/courses/index.php';
    }

    // show create course form
    public function create()
    {
        $lecturers = $this->model->getLecturers();
        include __DIR__ . '/../views/courses/create.php';
    }

    // store new course
    public function store()
    {
        $name = $_POST['name'];
        $credit = $_POST['credit'];
        $lecturer_id = $_POST['lecturer_id'];

        $this->model->create($name, $credit, $lecturer_id);

        header('Location: index.php?module=course');
        exit;
    }

    // show edit course form
    public function edit($id)
    {
        $data = $this->model->getById($id);
        $lecturers = $this->model->getLecturers();
        include __DIR__ . '/../views/courses/edit.php';
    }

    // update existing course
    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $credit = $_POST['credit'];
        $lecturer_id = $_POST['lecturer_id'];

        $this->model->update($id, $name, $credit, $lecturer_id);

        header('Location: index.php?module=course');
        exit;
    }

    // delete course
    public function delete($id)
    {
        $this->model->delete($id);

        header('Location: index.php?module=course');
        exit;
    }
}
