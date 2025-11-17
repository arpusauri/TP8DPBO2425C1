<!-- header -->
<?php include 'templates/header.php'; ?>

<!-- body -->
<div class="col-lg-6 m-auto">
    <form method="post" action="index.php?module=course&action=store">
        <br><br>
        <div class="card">
            <div class="card-header bg-primary">
                <h1 class="text-white text-center"> Create Course</h1>
            </div><br>

            <label> NAME: </label>
            <input type="text" name="name" class="form-control" required> <br>

            <label> CREDIT: </label>
            <input type="text" name="credit" class="form-control" required> <br>

            <label> LECTURER: </label>
            <select name="lecturer_id" class="form-control" required>
                <option value="">-- Select Lecturer --</option>
                <?php
                    $selectedLecturer = $_POST['lecturer_id'] ?? (isset($data) ? ($data['lecturer_id'] ?? null) : null);
                    while ($row = $lecturers->fetch_assoc()):
                ?>
                    <option value="<?= $row['id'] ?>" <?= ($row['id'] == $selectedLecturer) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($row['name']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
            
            <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
            <a class="btn btn-info" href="index.php?module=course">Cancel</a>
        </div>
    </form>
</div>

<!-- footer -->
<?php include 'templates/footer.php'; ?>