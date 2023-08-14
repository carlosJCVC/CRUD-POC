<?php ob_start(); ?>

<div class="card">
    <div class="card-header text-center d-flex justify-content-between">
        <h1>CRUD - POC</h1>

        <div class="mt-2">
            <a href="index.php?action=create" class="btn btn-outline-primary">Create Product</a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-dark table-striped-columns">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td scope="col"><?= $product->id ?></td>
                    <td scope="col"><?= $product->name ?></td>
                    <td scope="col"><?= $product->description ?></td>
                    <td scope="col"><?= $product->price ?></td>
                    <td scope="col">
                        <a href="index.php?action=edit&id=<?= $product->id ?>" class="btn btn-outline-info">Edit</a>
                        <a href="index.php?action=delete&id=<?= $product->id ?>" class="btn btn-outline-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $content = ob_get_clean(); include 'views/layout/layout.php'; ?>








<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - POC</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center d-flex justify-content-between">
                    <h1>CRUD - POC</h1>
        
                    <div class="mt-2">
                        <a href="create.html" class="btn btn-outline-primary">Create Product</a>
                    </div>
                </div>
        
                <div class="card-body">

                    <table class="table table-dark table-striped-columns">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Product Name</th>
                              <th scope="col">Product Price</th>
                              <th scope="col">Description</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product # 1</th>
                                <th scope="col">$10</th>
                                <th scope="col">My product Description</th>
                                <th scope="col">
                                    <a href="javascript:void(0)" class="btn btn-outline-info text-white">Edit</a>
                                    <a href="javascript:void(0)" class="btn btn-outline-danger text-white">Delete</a>
                                </th>
                              </tr>
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <script>
        
    </script>
</body>
</html> -->