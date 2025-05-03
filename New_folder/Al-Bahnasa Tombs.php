<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Bahnasa Tombs - Tourist Information</title>
    <link rel="stylesheet" href="Giza.css">
    <?php
require_once '../include/session.php';
require_once '../Database/conn.php';
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orig_file = $_FILES["picture"]["tmp_name"];
    $target_dir = 'uploads/';
    $filename = basename($_FILES["picture"]["name"]);
    $destination = $target_dir . $filename;
    move_uploaded_file($orig_file, $destination); 

    $location_name = "Al-Bahnasa Tombs";
    $location = $crud->getlocationid($location_name);
    $crud->insertpic($id, $destination, $location);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
</head>

<body>
    <header>
        <div class="container">
            <h1>Al-Bahnasa Tombs</h1>
            <p id="c1">Early Christian and Islamic Burial Site</p>
        </div>
    </header>

    <div class="container">
        <div class="hero-section">
            <div class="pyramid-image-container">
                <img src="Images/Al-Bahnasa Tombs.jpg" class="pyramid-image" alt="Al-Bahnasa Tombs">
            </div>
            <div class="description-card">
                <h2>About Al-Bahnasa Tombs</h2>
                <p>This archaeological site contains rock-cut tombs dating from Pharaonic to Islamic periods, with
                    notable Christian frescoes and early Islamic inscriptions. The area was known as Oxyrhynchus in
                    antiquity and was an important center during the Greco-Roman period. The tombs feature unique
                    artwork blending Egyptian, Greek, and Christian artistic traditions.</p>
            </div>
        </div>

        <div class="main-content">
            <div class="card">
                <h2>Quick Facts</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <h3>Ancient Name</h3>
                        <p>Per-Medjed (Oxyrhynchus)</p>
                    </div>
                    <div class="info-item">
                        <h3>Location</h3>
                        <p>Al-Bahnasa, Minya Governorate, Egypt</p>
                    </div>
                </div>
            </div>

            <div class="amenities-container">
                <div class="card">
                    <h2>Nearby Hotels</h2>
                    <div class="hotels">
                        <div class="hotel">
                            <h3>Minya Pyramids Hotel</h3>
                            <p>3-star hotel in central Minya</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Nile Valley Hotel</h3>
                            <p>Basic accommodations near the Nile</p>
                            <p>⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Akhenaton Hotel</h3>
                            <p>Modern hotel with pool</p>
                            <p>⭐️⭐️⭐️⭐️</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Nearby Restaurants</h2>
                    <div class="restaurants">
                        <div class="restaurant">
                            <h3>Al Andalus Restaurant</h3>
                            <p>Local Egyptian cuisine</p>
                            <p>🍽️ Traditional</p>
                        </div>
                        <div class="restaurant">
                            <h3>El Karnak Cafe</h3>
                            <p>Casual dining with Nile views</p>
                            <p>🍽️ Cafe Style</p>
                        </div>
                        <div class="restaurant">
                            <h3>Oxyrhynchus Grill</h3>
                            <p>Specializing in grilled meats</p>
                            <p>🍽️ Barbecue</p>
                        </div>
                    </div>
                </div>
                <div class="card map-container">
                    <h2>Location Map</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14020.64876708443!2d30.637170293841102!3d28.534844259702034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145b091d1622eaa9%3A0x250a1f4e0bfbbd5c!2sAl%20Bahnasa%2C%20Sandafa%2C%20Beni%20Mazar%2C%20Minya%20Governorate!5e0!3m2!1sen!2seg!4v1744912457083!5m2!1sen!2seg"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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
    $location_name = "Al-Bahnasa Tombs";
    $location = $crud->getlocationid($location_name);
    $rows = $crud->getimg($location);
    if(!$rows){
        echo "No image to show";
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