<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2>Student Records</h2>

        <!-- Search -->
        <form class="d-flex mb-3" method="GET" action="index.php">
            <input class="form-control me-2" type="search" name="search" placeholder="Search by name..." value="<?= $_GET['search'] ?? '' ?>">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>

        <!-- Add Student -->
        <form method="POST" action="add.php" class="row g-2 mb-4">
            <div class="col-md-5">
                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="course" class="form-control" placeholder="Course" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success w-100">Add</button>
            </div>
        </form>

        <!-- Table -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr><th>Name</th><th>Course</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php
            $search = $_GET['search'] ?? '';
            $sql = "SELECT * FROM students WHERE name LIKE '%$search%'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()):
            ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['course'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this student?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
