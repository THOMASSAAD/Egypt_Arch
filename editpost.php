<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php
require_once 'Database/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id = $_POST['id'];
    $rule = $_POST['rule'];


    $res = $crud->edituser($id, $fname, $lname,$rule);
    if ($res) {
        header("Location: admin.php");
        exit(); 
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Something went wrong! Please try again.
              </div>';
    }
}
?>
