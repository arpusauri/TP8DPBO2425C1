<?php
// start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// load controllers
require_once __DIR__ . "/controllers/LecturerController.php";
require_once __DIR__ . "/controllers/DepartmentController.php";
require_once __DIR__ . "/controllers/CourseController.php";

// inisialisasi controller
$lecturer = new LecturerController();
$department = new DepartmentController();
$course = new CourseController();

// ambil parameter module dan action dari URL
$module = $_GET['module'] ?? 'lecturer';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

// routing berbasis module dan action
try {
    // lecturer module
    switch ($module) {
        case 'lecturer':
            switch ($action) {
                case 'create':
                    $lecturer->create();
                    break;
                case 'store':
                    $lecturer->store();
                    break;
                case 'edit':
                    if ($id) {
                        $lecturer->edit($id);
                    } else {
                        $_SESSION['error'] = "ID is required!";
                        header("Location: index.php?module=lecturer");
                    }
                    break;
                case 'update':
                    $lecturer->update();
                    break;
                case 'delete':
                    if ($id) {
                        $lecturer->delete($id);
                    } else {
                        $_SESSION['error'] = "ID is required!";
                        header("Location: index.php?module=lecturer");
                    }
                    break;
                default:
                    $lecturer->index();
                    break;
            }
            break;

        // department module
        case 'department':
            switch ($action) {
                case 'create':
                    $department->create();
                    break;
                case 'store':
                    $department->store();
                    break;
                case 'edit':
                    if ($id) {
                        $department->edit($id);
                    } else {
                        $_SESSION['error'] = "ID is required!";
                        header("Location: index.php?module=department");
                    }
                    break;
                case 'update':
                    $department->update();
                    break;
                case 'delete':
                    if ($id) {
                        $department->delete($id);
                    } else {
                        $_SESSION['error'] = "ID is required!";
                        header("Location: index.php?module=department");
                    }
                    break;
                default:
                    $department->index();
                    break;
            }
            break;

        // course module
        case 'course':
            switch ($action) {
                case 'create':
                    $course->create();
                    break;
                case 'store':
                    $course->store();
                    break;
                case 'edit':
                    if ($id) {
                        $course->edit($id);
                    } else {
                        $_SESSION['error'] = "ID is required!";
                        header("Location: index.php?module=course");
                    }
                    break;
                case 'update':
                    $course->update();
                    break;
                case 'delete':
                    if ($id) {
                        $course->delete($id);
                    } else {
                        $_SESSION['error'] = "ID is required!";
                        header("Location: index.php?module=course");
                    }
                    break;
                default:
                    $course->index();
                    break;
            }
            break;

        default:
            $lecturer->index();
            break;
    }
} catch (Exception $e) {
    $_SESSION['error'] = "An error occurred: " . $e->getMessage();
    header("Location: index.php");
    exit;
}