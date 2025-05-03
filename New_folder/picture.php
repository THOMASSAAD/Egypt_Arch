<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orig_file = $_FILES["picture"]["tmp_name"];
    $target_dir = 'uploads/';

    $filename = basename($_FILES["picture"]["name"]);
    $destination = $target_dir . $filename;

    if (move_uploaded_file($orig_file, $destination)) {
        header("Location: ../home.php");
        exit(); // Important to stop further script
    } else {
        echo "Error moving the uploaded file.";
    }
    exit();
}
?>
