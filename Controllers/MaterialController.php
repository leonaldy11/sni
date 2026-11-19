<?php

require_once __DIR__ . '/../Models/Material.php';

class MaterialController {
    private $model;

    public function __construct() {
        $this->model = new Material();
    }

    public function index() {
        $data = $this->model->getAllData();
        // Load the view for welding consumables
        include VIEW_PATH . 'material/index.php';
    }

    public function getData() {
        header('Content-Type: application/json');
        $data = $this->model->getAllData();
        echo json_encode([
            'data' => $data
        ]);
        exit;   
    }

    public function store() {

        header('Content-Type: application/json');

        $data = [
            "name" => $_POST['name'],
            "description" => $_POST['description'],
            "created_at" => date('Y-m-d H:i:s'),
        ];
    
        $result = $this->model->store($data);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Data saved successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error saving data.']);
        }

        exit;
    }

    public function show($id) {
        header('Content-Type: application/json');
        $data = $this->model->getDataById($id);
       if ($data) {
            echo json_encode(['success' => true, 'message' => 'Data saved successfully!', 'data' => $data]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error saving data.', 'data' => null]);
        }
    }

    public function update() {
        header('Content-Type: application/json');

        $id = $_POST['id'];
        $data = [
            "name" => $_POST['name'],
            "description" => $_POST['description'],
        ];
        $result = $this->model->update($id, $data);
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Data updated successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error updating data.']);
        }
    }

    public function delete($id) {
        header('Content-Type: application/json');

        $result = $this->model->delete($id);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Data deleted successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error deleting data.']);
        }
    }
}