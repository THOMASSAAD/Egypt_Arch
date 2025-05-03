<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saint Catherine's Monastery - Tourist Information</title>
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

    $location_name = "Saint Catherine's Monastery";
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
            <h1>Saint Catherine's Monastery</h1>
            <p id="c1">Ancient Christian Monastery at Mount Sinai</p>
        </div>
    </header>

    <div class="container">
        <div class="hero-section">
            <div class="pyramid-image-container">
                <img src="Images/Saint Catherine's Monastery.jpg" class="pyramid-image"
                    alt="Saint Catherine's Monastery">
            </div>
            <div class="description-card">
                <h2>About the Monastery</h2>
                <p>Founded in the 6th century, this UNESCO site houses an incredible collection of ancient manuscripts
                    and icons. It's located at the foot of Mount Sinai where Moses received the Ten Commandments. The
                    monastery is one of the oldest working Christian monasteries in the world and contains the famous
                    Burning Bush chapel.</p>
            </div>
        </div>

        <div class="main-content">
            <div class="card">
                <h2>Quick Facts</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <h3>Religious Significance</h3>
                        <p>Sacred site for Christianity, Islam, and Judaism</p>
                    </div>
                    <div class="info-item">
                        <h3>Location</h3>
                        <p>South Sinai Governorate, Egypt</p>
                    </div>
                </div>
            </div>

            <div class="amenities-container">
                <div class="card">
                    <h2>Nearby Hotels</h2>
                    <div class="hotels">
                        <div class="hotel">
                            <h3>Saint Catherine's Tourist Village</h3>
                            <p>Closest to the monastery</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Morgenland Hotel</h3>
                            <p>Comfortable mountain retreat</p>
                            <p>⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Desert Fox Camp</h3>
                            <p>Bedouin-style desert camp</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Nearby Restaurants</h2>
                    <div class="restaurants">
                        <div class="restaurant">
                            <h3>Monastery Guest Restaurant</h3>
                            <p>Simple meals for visitors</p>
                            <p>🍽️ Basic Meals</p>
                        </div>
                        <div class="restaurant">
                            <h3>Bedouin Star</h3>
                            <p>Traditional Bedouin cuisine</p>
                            <p>🍽️ Local</p>
                        </div>
                        <div class="restaurant">
                            <h3>Sinai View</h3>
                            <p>Panoramic mountain views</p>
                            <p>🍽️ International</p>
                        </div>
                    </div>
                </div>
                <div class="card map-container">
                    <h2>Location Map</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.459938607976!2d33.973473075286115!3d28.555948375706585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1454901def4fa789%3A0xc91f754605c6dadf!2sSaint%20Catherine&#39;s%20Monastery!5e0!3m2!1sen!2seg!4v1744914193627!5m2!1sen!2seg"
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
                <p><strong>ENTRY IS FREE (Donations Welcome)</strong></p>
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
    $location_name = "Saint Catherine's Monastery";
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