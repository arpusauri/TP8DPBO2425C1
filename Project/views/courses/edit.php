<!-- header -->
<?php include "templates/header.php"; ?>

<!-- body -->
<div class="col-lg-6 m-auto">
    <form method="post" action="index.php?module=course&action=update">
        <div class="card my-4">
            <div class="card-header bg-warning">
                <h2 class="text-white">Edit Course</h2>
            </div>

            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <label>NAME:</label>
            <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" required><br>

            <label>CREDIT:</label>
            <input type="number" name="credit" value="<?= $data['credit'] ?>" class="form-control" required><br>

            <label>LECTURER:</label>
            <select name="lecturer_id" class="form-control" required>
                <option value="">-- Select Lecturer --</option>
                <?php while ($row = $lecturers->fetch_assoc()): ?>
                    <option value="<?= $row['id'] ?>" <?= $row['id'] == $data['lecturer_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['name']) ?>
                    </option>
                <?php endwhile; ?>
            </select><br>

            <button class="btn btn-success">Update</button>
            <a class="btn btn-info" href="index.php?module=course">Cancel</a>
        </div>
    </form>
</div>

<!-- footer -->
<?php include "templates/footer.php"; ?>