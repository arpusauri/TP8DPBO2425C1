<?php include "templates/header.php"; ?>

<div class="col-lg-6 m-auto">

  <form method="post" action="index.php?action=update">
    <br><br>
    <div class="card">

      <div class="card-header bg-warning">
        <h1 class="text-white text-center"> Update Lecturer </h1>
      </div><br>

      <input type="hidden" name="id" value="<?= $data['id'] ?>" class="form-control">

      <label> NAME: </label>
      <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" required> <br>

      <label> NIDN: </label>
      <input type="text" name="nidn" value="<?= $data['nidn'] ?>" class="form-control" required> <br>

      <label> PHONE: </label>
      <input type="text" name="phone" value="<?= $data['phone'] ?>" class="form-control" required> <br>

      <label> JOIN DATE: </label>
      <input type="date" name="join_date" value="<?= $data['join_date'] ?>" class="form-control" required> <br>

      <button class="btn btn-success" type="submit" name="submit">Submit</button><br>
      <a class="btn btn-info" href="index.php">Cancel</a><br>

    </div>
  </form>

</div>

<?php include "templates/footer.php"; ?>