<?php
require_once 'repositories/ProductRepository.php';
require_once 'requests/ProductRequest.php';

class ProductController {
    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function index() {
        $products = $this->productRepository->getAll();

        require 'views/products/index.php';
    }

    public function create() {
        require 'views/products/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productRequest = new ProductRequest($_POST);
            $productRequest->validate();

            if ($productRequest->passedValidation()) {
                $productData = $_POST;
                $this->productRepository->create($productData);

                header('Location: index.php');
            } else {
                $errors = $productRequest->errors();

                include 'views/products/create.php';
            }
        }
    }

    public function edit($id) {
        $product = $this->productRepository->getById($id);

        require 'views/products/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productRequest = new ProductRequest($_POST);
            $productRequest->validate();

            if ($productRequest->passedValidation()) {
                $productData = $_POST;
                $this->productRepository->update($id, $productData);

                header('Location: index.php');
            } else {
                $errors = $productRequest->errors();

                include 'views/products/edit.php';
            }
        }
    }

    public function delete($id) {
        $this->productRepository->delete($id);
        header('Location: index.php');
    }
}
?>