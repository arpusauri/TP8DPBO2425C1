<!-- header -->
<?php include "templates/header.php"; ?>

<!-- body -->
<div class="col-lg-6 m-auto">
    <form method="post" action="index.php?module=department&action=store">
        <br><br>
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center"> Create Department</h1>
            </div><br>

            <label> NAME: </label>
            <input type="text" name="name" class="form-control" required> <br>

            <label> DESCRIPTION: </label>
            <input type="text" name="description" class="form-control" required> <br>

            <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
            <a class="btn btn-info" href="index.php?module=department">Cancel</a>
        </div>
    </form>
</div>

<!-- footer -->
<?php include "templates/footer.php"; ?>