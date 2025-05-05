<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karnak Temple - Tourist Information</title>
    <link rel="stylesheet" href="Giza.css">
    <?php
require_once '../include/session.php';
require_once '../Database/conn.php';
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_FILES["picture"]) || $_FILES["picture"]["error"] !== UPLOAD_ERR_OK) {
        error_log("File upload failed with error code: " . ($_FILES["picture"]["error"] ?? "unknown"));
        die("File upload failed.");
    }

    $max_file_size = 10 * 1024 * 1024; 
    if ($_FILES["picture"]["size"] > $max_file_size) {
        error_log("File size exceeds limit: " . $_FILES["picture"]["size"] . " bytes");
        die("File size exceeds the maximum limit of 10MB.");
    }

    // Validate file extension
    $ext = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    if (empty($ext) || !in_array($ext, $allowed_ext)) {
        error_log("Invalid file extension: $ext");
        die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
    }

    // Validate file MIME type to ensure it's an image
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
    finfo_close($finfo);
    $allowed_mimes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mime, $allowed_mimes)) {
        error_log("Invalid MIME type: $mime");
        die("Invalid file content. Only image files are allowed.");
    }

    $orig_file = $_FILES["picture"]["tmp_name"];
    $new_filename = uniqid('img_', true) . '.' . $ext;
    $target_dir = 'uploads/';
    
    $destination = $target_dir . $new_filename;

    // Move the uploaded file
    if (!move_uploaded_file($orig_file, $destination)) {
        error_log("Failed to move uploaded file to: $destination");
        die("Failed to move uploaded file.");
    }

    // Get location ID
    $location_name = "Karnak";
    $location = $crud->getlocationid($location_name);
    if (!$location) {
        error_log("Invalid location: $location_name");
        die("Invalid location: $location_name");
    }

    // Insert picture into database
    if (!$crud->insertpic($id, $destination, $location)) {
        error_log("Failed to insert picture into database for user ID: $id");
        die("Failed to save picture information.");
    }

    // Redirect on success
    if (headers_sent()) {
        error_log("Headers already sent, cannot redirect.");
        die("Headers already sent, cannot redirect.");
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

</head>

<body>
    <header>
        <div class="container">
            <h1>Karnak Temple Complex</h1>
            <p id="c1">The Largest Religious Building Ever Constructed</p>
        </div>
    </header>

    <div class="container">
        <!-- Hero Section with Image and Description -->
        <div class="hero-section">
            <div class="pyramid-image-container">
                <img src="Images/Karnak.jpg" class="pyramid-image" alt="Karnak Temple">
            </div>
            <div class="description-card">
                <h2>About Karnak</h2>
                <p>The Karnak Temple Complex comprises a vast mix of decayed temples, chapels, pylons, and other
                    buildings near Luxor, Egypt. Construction at the complex began during the reign of Senusret I in the
                    Middle Kingdom and continued into the Ptolemaic period. The area around Karnak was the ancient
                    Egyptian Ipet-isut ("The Most Selected of Places") and the main place of worship of the Theban Triad
                    with Amun as its head. It is part of the monumental city of Thebes and was designated a UNESCO World
                    Heritage Site in 1979.</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="card">
                <h2>Quick Facts</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <h3>Location</h3>
                        <p>El-Karnak, Luxor Governorate, Egypt</p>
                    </div>
                    <div class="info-item">
                        <h3>Built</h3>
                        <p>Middle Kingdom to Ptolemaic period (2055 BC–100 AD)</p>
                    </div>
                </div>
            </div>

            <div class="amenities-container">
                <div class="card">
                    <h2>Nearby Hotels</h2>
                    <div class="hotels">
                        <div class="hotel">
                            <h3>Steigenberger Nile Palace</h3>
                            <p>Luxury hotel with Nile views</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Sofitel Winter Palace</h3>
                            <p>Historic 5-star hotel</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Nefertiti Hotel Luxor</h3>
                            <p>Budget-friendly with rooftop views</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Nearby Restaurants</h2>
                    <div class="restaurants">
                        <div class="restaurant">
                            <h3>1886 Restaurant</h3>
                            <p>Fine dining at Winter Palace</p>
                            <p>🍽️ International & Egyptian</p>
                        </div>
                        <div class="restaurant">
                            <h3>Sofra Restaurant</h3>
                            <p>Authentic Egyptian cuisine</p>
                            <p>🍽️ Traditional</p>
                        </div>
                        <div class="restaurant">
                            <h3>Kebabgy Luxor</h3>
                            <p>Nile-side dining</p>
                            <p>🍽️ Middle Eastern</p>
                        </div>
                    </div>
                </div>
                <div class="card map-container">
                    <h2>Location Map</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14378.258721056985!2d32.63883767519894!3d25.71883344079597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1449159228fec0cd%3A0xc71ae8c008c259d8!2sKarnak!5e0!3m2!1sen!2seg!4v1744937009805!5m2!1sen!2seg"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <section class="ticket-section">
        <div class="ticket-container">
            <div class="ticket-icon">
                <div class="ticket-info">
                    <h2>Tickets</h2>
                </div>
                <img src="icon.png" alt="Ticket Icon">
            </div>

            <div class="ticket-prices">
                <p><strong>FOREIGNERS:</strong><br>
                    Adult: 150 EGP<br>
                    Student: 75 EGP</p>
                <p><strong>EGYPTIANS/ARABS:</strong><br>
                    Adult: 20 EGP<br>
                    Student: 10 EGP</p>
                <p><strong>Sound & Light Show:</strong><br>
                    200 EGP (additional)</p>
            </div>
        </div>
    </section>

    <p class="ticket-note">.</p>

 <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data" style="text-align: center; margin-top: 20px;">
        <div class="gallery-header">
            <h2>Image Gallery</h2>

            <!-- Single Button for Upload and Submit -->
            <label for="picture" class="upload-button" style="
            cursor: pointer; 
            display: inline-block; 
            padding: 10px 20px; 
            background-color: #007bff; 
            color: white; 
            border-radius: 5px;
            margin-bottom: 10px;
        ">
                Choose and Upload Image
            </label>
            <?php if(isset($_SESSION['id'])){?>
            <input type="file" id="picture" name="picture" accept="image/*" style="display: none;" onchange="this.form.submit();">
<?php }else {
    echo '<h3>To Upload Pictures please login first</h3>';
} ?>

        </div>
    </form>

    <script>
        // Optional: Show the filename after selecting
        document.querySelector('#picture').addEventListener('change', function() {
            var fileName = this.files[0] ? this.files[0].name : "No file selected";
            alert("Selected file: " + fileName);
        });
    </script>



    <?php
    $location_name = "Karnak";
    $location = $crud->getlocationid($location_name);
    $rows = $crud->getimg($location);
    if(!$rows){
        echo "No image to show.";
}else{
foreach ($rows as $row) {
    echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Location Image" style="max-width: 300px; margin: 10px;">';
}
}
    ?>

    <footer>
        <p>Copyright © 2025, All Rights Reserved</p>
        <button class="back-to-top" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">&#9650;</button>
    </footer>
</body>

</html>