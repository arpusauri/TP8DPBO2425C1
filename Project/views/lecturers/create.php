<!-- header -->
<?php include 'templates/header.php'; ?>

<!-- body -->
<div class="col-lg-6 m-auto">
  <form method="post" action="index.php?module=lecturer&action=store">
    <br><br>
    <div class="card">
      <div class="card-header bg-primary">
        <h1 class="text-white text-center"> Create Lecturer</h1>
      </div><br>

      <label> NAME: </label>
      <input type="text" name="name" class="form-control" required> <br>

      <label> NIDN: </label>
      <input type="text" name="nidn" class="form-control" required> <br>

      <label> PHONE: </label>
      <input type="text" name="phone" class="form-control" required> <br>
      
      <label> JOIN DATE: </label>
      <input type="date" name="join_date" class="form-control" required> <br>

      <label> DEPARTMENT: </label>
      <select name="department_id" class="form-control" required>
          <option value="">-- Select Department --</option>
          <?php
          $selectedDept = $_POST['department_id'] ?? ($data['department_id'] ?? null);
          while ($row = $departments->fetch_assoc()):
            ?>
          <option value="<?= $row['id'] ?>" <?= ($row['id'] == $selectedDept) ? 'selected' : '' ?>>
            <?= htmlspecialchars($row['name']) ?>
          </option>
          <?php endwhile; ?>
      </select>

      <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
      <a class="btn btn-info" href="index.php?module=lecturer">Cancel</a><br>

    </div>
  </form>
</div>

<!-- footer -->
<?php include 'templates/footer.php'; ?>