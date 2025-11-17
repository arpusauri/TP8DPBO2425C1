<!-- header -->
<?php include 'templates/header.php'; ?>

<!-- body -->
<div class="container my-4">
    <div class="col-1 my-3">
        <a type="button" class="btn btn-primary" href="index.php?module=department&action=create">Add New</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $departments->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td>
                        <a href="index.php?module=department&action=edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-success">Edit</a>
                        <a href="index.php?module=department&action=delete&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure?');">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- footer -->
<?php include 'templates/footer.php'; ?>