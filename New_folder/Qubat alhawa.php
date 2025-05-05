<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qubbat Al-Hawa - Tourist Information</title>
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
    $location_name = "Qubat alhawa";
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
            <h1>QUBBAT AL-HAWA CEMETERY</h1>
            <p id="c1">Ancient Wonders of the World</p>
        </div>
    </header>

    <div class="container">
        <!-- Hero Section with Image and Description -->
        <div class="hero-section">
            <div class="pyramid-image-container">
                <img src="Images/مقابر-النبلاء-قبة-الهوا.jpg"
                    class="pyramid-image" alt="Great Pyramid of Giza">
            </div>
            <div class="description-card">
                <h2>About QUBBAT AL-HAWA CEMETERY</h2>
                <p>Qubbat Al-Hawa Cemetery consists of several tombs on the west bank of the 
                    Nile across the river from the northern tip of Elephantine Island cut into
                     the rocky slopes of the cliffs that offer an enchanting panorama that reveals the beauty of Aswan. 
                    These tombs are those of local governors and high dignitaries from the Old to Middle Kingdoms. This
                     cemetery site, which remained in use from the Old kingdom to the Roman Period, is named after the 
                     domed tomb of Sheikh Aly Abu Al-Hawa (qubba meaning dome in Arabic), which stands at the top of the
                      cliffs above the tombs.</p>
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
                        <p>Aswan Governorate, Egypt</p>
                    </div>
                </div>
            </div>

            <div class="amenities-container">
                <div class="card">
                    <h2>Nearby Hotels</h2>
                    <div class="hotels">
                        <div class="hotel">
                            <h3>Mövenpick Aswan</h3>
                            <p>A luxurious resort located on Elephantine Island, offering panoramic Nile views, multiple dining options, and two outdoor swimming pools. Approximately 0.97 km from Qubbet al-Hawa.</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Citymax Hotel Aswan</h3>
                            <p>Situated in the heart of Aswan, this hotel features both indoor and outdoor pools, a health club, and is about 1.04 km from Qubbet al-Hawa.</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Obelisk Hotel</h3>
                            <p>Located approximately 1.22 km from Qubbet al-Hawa, this hotel offers an outdoor pool, sauna, and complimentary buffet breakfast.</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Nearby Restaurants</h2>
                    <div class="restaurants">
                        <div class="restaurant">
                            <h3>Mezze Restaurant</h3>
                            <p>Located within the Mövenpick Resort on Elephantine Island, this restaurant offers Egyptian, Middle Eastern, and Arabic cuisines with beautiful Nile views.</p>
                            <p>🍽️ Egyptian & International</p>
                        </div>
                        <div class="restaurant">
                            <h3>Panorama Restaurant</h3>
                            <p>Situated in the Mövenpick Resort, it provides European and international dishes along with panoramic views of Aswan.</p>
                            <p>🍽️ Authentic Local</p>
                        </div>
                        <div class="restaurant">
                            <h3>Al Qahwa</h3>
                            <p>A Mediterranean-style café in the Mövenpick Resort, ideal for light meals and coffee breaks.</p>
                            <p>🍽️ Fusion Cuisine</p>
                        </div>
                    </div>

                </div>
                <div class="card map-container">
                    <h2>Location Map</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768224.7853900795!2d38.68168879458169!3d22.731697181129004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14367b4cbf181b19%3A0xf3249877ab51b9c!2z2YLYqNipINin2KjZiCDYp9mE2YfZiNin!5e0!3m2!1sar!2seg!4v1744909432295!5m2!1sar!2seg"
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
    $location_name = "Qubat alhawa";
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