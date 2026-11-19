<?php

require_once __DIR__ . '/Config/config.php';

// Ambil URL
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Hilangkan BASE_URL
$relativePath = substr($requestUri, strlen(BASE_URL));

// Bersihkan slash
$route = '/' . strtolower(trim($relativePath, '/'));

// Routing
switch ($route) {

    // USER
    case '/':
        require_once PAGE_PATH . 'home.php';
        break;

    // ADMIN
    //dashboard
    case '/admin':
        require_once CONTROLLER_PATH . 'DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;
    // end dashboard
    //welding   
    case '/admin/welding':
        require_once CONTROLLER_PATH . 'WeldingController.php';
        $controller = new WeldingController();
        $controller->index();
        break;

    case '/admin/welding/getdata':
        require_once CONTROLLER_PATH . 'WeldingController.php';
        $controller = new WeldingController();
        $controller->getData();
        break;

    case '/admin/welding/store':
        require_once CONTROLLER_PATH . 'WeldingController.php';
        $controller = new WeldingController();
        $controller->store();
        break;
    case (preg_match('#^/admin/welding/show/([0-9]+)$#', $route, $matches) ? true : false):
        require_once CONTROLLER_PATH . 'WeldingController.php';
        $id = $matches[1];
        $controller = new WeldingController();
        $controller->show($id);

        break;
    case '/admin/welding/update':
        require_once CONTROLLER_PATH . 'WeldingController.php';
        $controller = new WeldingController();
        $controller->update();
        break;
    case (preg_match('#^/admin/welding/delete/([0-9]+)$#', $route, $matches) ? true : false):
        require_once CONTROLLER_PATH . 'WeldingController.php';
        $id = $matches[1];
        $controller = new WeldingController();
        $controller->delete($id);
        break;
    //end WELDING

    // MATERIAL
    case '/admin/material':
        require_once CONTROLLER_PATH . 'MaterialController.php';
        $controller = new MaterialController();
        $controller->index();
        break;
    case '/admin/material/getdata':
        require_once CONTROLLER_PATH . 'MaterialController.php';
        $controller = new MaterialController();
        $controller->getData();
        break;
    case '/admin/material/store':
        require_once CONTROLLER_PATH . 'MaterialController.php';
        $controller = new MaterialController();
        $controller->store();
        break;
    case (preg_match('#^/admin/material/show/([0-9]+)$#', $route, $matches) ? true : false):
        require_once CONTROLLER_PATH . 'MaterialController.php';
        $id = $matches[1];
        $controller = new MaterialController();
        $controller->show($id);
        break;
    case '/admin/material/update':
        require_once CONTROLLER_PATH . 'MaterialController.php';
        $controller = new MaterialController();
        $controller->update();
        break;
    case (preg_match('#^/admin/material/delete/([0-9]+)$#', $route, $matches) ? true : false):
        require_once CONTROLLER_PATH . 'MaterialController.php';
        $id = $matches[1];
        $controller = new MaterialController();
        $controller->delete($id);
        break;
    //end MATERIAL
    default:
        http_response_code(404);
        echo "404 - Halaman tidak ditemukan";
        break;
}