<?php

require_once __DIR__ . '/../Models/Welding.php';

class WeldingController {
    private $model;

        public function __construct() {
           $this->model = new Welding();
    }

    public function index() {
        $data = $this->model->getAllData();
        // Load the view for welding consumables
        include VIEW_PATH . 'welding/index.php';
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
        $data = $this->model->getDataById($id);
        echo json_encode($data);
    }

    public function update() {
        header('Content-Type: application/json');

        $id = $_POST['id'];
        $data = [
            "name" => $_POST['name'],
            "description" => $_POST['description'],
            "updated_at" => date('Y-m-d H:i:s'),
        ];

        $result = $this->model->update($id, $data);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Data updated successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error updating data.']);
        }

        exit;
    }

    public function delete($id) {
        header('Content-Type: application/json');

        $result = $this->model->delete($id);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Data deleted successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error deleting data.']);
        }

        exit;
    }
}

?>