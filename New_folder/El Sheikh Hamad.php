<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Sheikh Hamad (Athribis) - Tourist Information</title>
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
    $location_name = "El Sheikh Hamad";
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
            <h1>El Sheikh Hamad (Ancient Athribis)</h1>
            <p id="c1">Greco-Roman Archaeological Site</p>
        </div>
    </header>

    <div class="container">
        <div class="hero-section">
            <div class="pyramid-image-container">
                <img src="Images/Athribis_Tempel_(L2).jpg" class="pyramid-image" alt="Athribis Ruins">
            </div>
            <div class="description-card">
                <h2>About Athribis</h2>
                <p>The site of ancient Athribis contains remains from Pharaonic, Ptolemaic, and Roman periods, including
                    a temple dedicated to the lion-god Repit. Recent excavations have uncovered a Roman bath complex, a
                    temple of Ptolemy XII, and numerous artifacts showing the site's importance as a regional capital
                    during the Greco-Roman period.</p>
            </div>
        </div>

        <div class="main-content">
            <div class="card">
                <h2>Quick Facts</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <h3>Ancient Name</h3>
                        <p>Hut-hery-ib (Athribis)</p>
                    </div>
                    <div class="info-item">
                        <h3>Location</h3>
                        <p>Near Sohag, Sohag Governorate, Egypt</p>
                    </div>
                </div>
            </div>

            <div class="amenities-container">
                <div class="card">
                    <h2>Nearby Hotels</h2>
                    <div class="hotels">
                        <div class="hotel">
                            <h3>Sohag Grand Hotel</h3>
                            <p>4-star hotel in central Sohag</p>
                            <p>⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Nile Valley Hotel</h3>
                            <p>Budget-friendly accommodations</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>White Palace Hotel</h3>
                            <p>Business hotel with conference facilities</p>
                            <p>⭐️⭐️⭐️⭐️</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Nearby Restaurants</h2>
                    <div class="restaurants">
                        <div class="restaurant">
                            <h3>Al Prince Restaurant</h3>
                            <p>Local and international cuisine</p>
                            <p>🍽️ Mixed Menu</p>
                        </div>
                        <div class="restaurant">
                            <h3>El Tahrir Cafe</h3>
                            <p>Traditional Egyptian dishes</p>
                            <p>🍽️ Authentic Local</p>
                        </div>
                        <div class="restaurant">
                            <h3>Repit Seafood</h3>
                            <p>Fresh fish from the Nile</p>
                            <p>🍽️ Seafood</p>
                        </div>
                    </div>
                </div>
                <div class="card map-container">
                    <h2>Location Map</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3570.2594359592586!2d31.665768!3d26.511779399999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144f59faaa521f4b%3A0xb4d94ffb1c7547e4!2sAthribis%20Temple!5e0!3m2!1sen!2seg!4v1744913096499!5m2!1sen!2seg"
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
                    Adult: 80EGP<br>
                    Student: 40EGP</p>
                <p><strong>EGYPTIANS/ARABS:</strong><br>
                    Adult: 10EGP<br>
                    Student: 5EGP</p>
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
    $location_name = "El Sheikh Hamad";
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

    <script>
        document.querySelector('.upload-icon').addEventListener('click', function () {
            const fileInput = this.querySelector('.upload-input');
            fileInput.click();

            fileInput.addEventListener('change', function (e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        alert('Image uploaded successfully!');
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });
    </script>
</body>

</html>