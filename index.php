<?php

require_once 'controllers/ProductController.php';
require_once 'repositories/ProductRepository.php';
require_once 'config/database.php';

$productRepository = ProductRepository::getInstance($conn);
$controller = new ProductController($productRepository);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $id = $_GET['id'];
        $controller->edit($id);
        break;
    case 'update':
        $id = $_GET['id'];
        $controller->update($id);
        break;
    case 'delete':
        $id = $_GET['id'];
        $controller->delete($id);
        break;
}
?>