<?php
$title = "Admin_Panal";
require_once 'include/header.php';
require_once 'include/rulecheck.php';
require_once 'Database/conn.php';

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body {
    background-image: url('background.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;}
</style>
<div class="container mt-4">
    <h2 class="mb-4">User List</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>First_Name</th>
                <th>Last_Name</th>
                <th>Email</th>
                <th>Rule</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $crud->getusers(); // Get the statement object
            if ($stmt) { // Check if the statement is valid
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['ID']) ?></td>
                        <td><?= htmlspecialchars($row['first_name']) ?></td>
                        <td><?= htmlspecialchars($row['last_name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= ($row['rule'] == 0) ? "User" : "Admin"; ?></td>
                        <td><a class="btn btn-info" href="edit.php?id=<?php echo $row['ID'];?>">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row['ID'];?>">Delete</a></td>
                    </tr>
            <?php endwhile;
            } else {
                echo "Error retrieving users.";
            }
            ?>

        </tbody>
    </table>
</div>
</body>

</html>