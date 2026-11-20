<?php 
require_once __DIR__ . '/../Models/Employee.php';

class EmployeeController {
    private $model;
    public function __construct() {
        $this->model = new Employee();
    }

    public function index() {
        // Load the view and pass the employee data
        require_once VIEW_PATH . 'employee/index.php';
    }

    public function getData(){
        header('Content-Type: application/json');
        $data = $this->model->getAllEmployees();
        echo json_encode([
            'data' => $data
        ]);
        exit;
    }

    public function store(){
        header('Content-Type: application/json');
        $password = "password123";
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);


        $data = [
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'password' => $passwordHash
        ];
        $result = $this->model->store($data);

        if($result){
            echo json_encode([
                'success' => true,
                'message' => "Data saved successfully"
            ]);
        }else{
             echo json_encode([
                'success' => false,
                'message' => "Error saving data"
            ]);
        }
    }
}