<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php 
require_once 'Database/conn.php';
$id = $_GET['id'];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $crud->deleteUser($id);
    
    if ($result) {
        header("Location: admin.php");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Failed to delete user.
              </div>';
    }
} else {
    echo "Invalid request.";
}
?>
