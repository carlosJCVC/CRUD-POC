<?php 

ob_start();
if (isset($errors)) {
    $errorMessages = [];
    foreach ($errors as $fieldErrors) {
        $errorMessages = array_merge($errorMessages, $fieldErrors);
    }
}

?>

<div class="card">
    <div class="card-header text-center d-flex justify-content-between">
        <h1>CRUD - POC</h1>
    </div>

    <div class="card-body">
        <form method="post" action="index.php?action=store" class="needs-validation" novalidate>
            <?php if (isset($errorMessages)) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errorMessages as $error) : ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>

                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" class="form-control" name="price" id="price" required>
                <div class="invalid-feedback">
                    Price must be greater than 0.
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Product Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-outline-success">Submit</button>
                <a href="index.php" class="btn btn-outline-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
    })()
</script>

<?php $content = ob_get_clean(); include 'views/layout/layout.php'; ?>


