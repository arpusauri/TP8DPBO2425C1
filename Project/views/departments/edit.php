<!-- header -->
<?php include 'templates/header.php'; ?>

<!-- body -->
<div class="col-lg-6 m-auto">
    <form method="post" action="index.php?action=update&module=department">
        <div class="card my-4">
            <div class="card-header bg-warning">
                <h1 class="text-white text-center"> Update Department </h1>
            </div><br>

            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <label>NAME:</label>
            <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" required><br>

            <label>DESCRIPTION:</label>
            <input type="text" name="description" value="<?= $data['description'] ?>" class="form-control" required><br>

            <button class="btn btn-success">Update</button>
            <a class="btn btn-info" href="index.php?module=department">Cancel</a>
        </div>
    </form>
</div>

<!-- footer -->
<?php include 'templates/footer.php'; ?>