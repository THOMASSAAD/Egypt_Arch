<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Mu'izz Street- Tourist Information</title>
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
    $location_name = "Al-Mu'izz Street";
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
            <h1>Al-Mu'izz Street</h1>
            <p id="c1">Ancient Wonders of the World</p>
        </div>
    </header>

    <div class="container">
        <!-- Hero Section with Image and Description -->
        <div class="hero-section">
            <div class="pyramid-image-container">
                <img src="Images/Al-Mu'izz Street.jpg"
                    class="pyramid-image" alt="Great Pyramid of Giza">
            </div>
            <div class="description-card">
                <h2>About Al-Mu'izz Street</h2>
                <p>Al-Mu'izz Street, also known as Al-Muizz li-Din Allah al-Fatimi Street, is one of Cairo's oldest and most historically significant thoroughfares. Established in the 10th century by the Fatimid dynasty, it stretches approximately one kilometer from Bab al-Futuh in the north to Bab Zuweila in the south. This street was the main artery of medieval Cairo, serving as the central axis for economic and religious activities. Lined with a dense concentration of historic Islamic architecture, including mosques, madrasas, and palaces, Al-Mu'izz Street is often referred to as an "open-air museum." Notable landmarks along the street include the Qalawun Complex, Al-Aqmar Mosque, and the Sultan Al-Ghuri Complex. In 1997, the Egyptian government initiated extensive renovations to restore the street's historical buildings and infrastructure, enhancing its appeal as a cultural and tourist destination.</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="card">
                <h2>Quick Facts</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <h3>Government Name</h3>
                        <p>Arab Republic of Egypt</p>
                    </div>
                    <div class="info-item">
                        <h3>Location</h3>
                        <p>Cairo Governorate, Egypt</p>
                    </div>
                </div>
            </div>

            <div class="amenities-container">
                <div class="card">
                    <h2>Nearby Hotels</h2>
                    <div class="hotels">
                        <div class="hotel">
                            <h3>Le Riad Hotel de Charme</h3>
                            <p> A boutique hotel offering suites adorned with traditional Egyptian decor, providing an authentic experience in the heart of historic Cairo.​                                ​</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Hotel Grand Royal</h3>
                            <p> A budget-friendly hotel featuring modern amenities and easy access to Cairo's main attractions, including a short distance to Al-Mu'izz Street.</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Steigenberger Hotel El Tahri</h3>
                            <p> A contemporary hotel offering luxurious accommodations, dining options, and proximity to Cairo's historic sites.</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Nearby Restaurants</h2>
                    <div class="restaurants">
                        <div class="restaurant">
                            <h3>Naguib Mahfouz Café</h3>
                            <p>  Traditional Egyptian dishes in a setting inspired by the Nobel laureate Naguib Mahfouz, offering a cultural dining experience.​ </p>
                            <p>🍽️ Egyptian & International</p>
                        </div>
                        <div class="restaurant">
                            <h3>El Fishawy Café</h3>
                            <p> One of Cairo's oldest cafés, serving Egyptian tea, coffee, and light snacks in a historic ambiance.​</p>
                            <p>🍽️ Authentic Local</p>
                        </div>
                        <div class="restaurant">
                            <h3>Zooba</h3>
                            <p> A modern take on Egyptian street food, offering dishes like taameya (Egyptian falafel) and koshari with a contemporary twist​</p>
                            <p>🍽️ Fusion Cuisine</p>
                        </div>
                    </div>

                </div>
                <div class="card map-container">
                    <h2>Location Map</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.5093698662413!2d31.258999875391037!3d30.050930574920375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458409e3b8bb121%3A0x9373489d8a5bf150!2sAl%20Moez%20Ldin%20Allah%20Al%20Fatmi%2C%20El-Gamaleya%2C%20El%20Gamaliya%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1744919810951!5m2!1sen!2seg"   
                        allowfullscreen="" loading="lazy"></iframe>
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
                <!-- ممكن تستخدم أي SVG أو صورة هنا -->
                <img src="icon.png" alt="Ticket Icon">
                
            </div>
           
                <div class="ticket-prices">
                    <p><strong>FOREIGNERS:</strong><br>
                        Adult: 150EGP<br>
                        Student: 75EGP</p>
                    <p><strong>EGYPTIANS/ARABS:</strong><br>
                        Adult: 10EGP<br>
                        Student: 5EGP</p>
                
            </div>
        </div>
    </section>

    </div>

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
    $location_name = "Al-Muizz Street";
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
        // Add functionality for the upload icon
        document.querySelector('.upload-icon').addEventListener('click', function () {
            const fileInput = this.querySelector('.upload-input');
            fileInput.click();

            fileInput.addEventListener('change', function (e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (event) {
                        // You could display the uploaded image somewhere
                        alert('Image uploaded successfully!');
                        // In a real application, you would upload to a server here
                    };

                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });
    </script>
</body>

</html>