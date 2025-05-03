<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Hawawish - Archaeological Site Information</title>
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
    $location_name = "El Hawawish";
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
            <h1>El Hawawish Necropolis</h1>
            <p id="c1">Ancient Rock-Cut Tombs of Akhmim</p>
        </div>
    </header>

    <div class="container">
        <!-- Hero Section with Image and Description -->
        <div class="hero-section">
            <div class="pyramid-image-container">
                <img src="Images/HawawishRockTombs.jpg" class="pyramid-image" alt="El Hawawish Necropolis">
            </div>
            <div class="description-card">
                <h2>About El Hawawish</h2>
                <p>El Hawawish is an extensive necropolis located near Akhmim in Upper Egypt, containing over 800
                    rock-cut tombs dating primarily from the Old Kingdom to the Roman Period. The site served as the
                    burial ground for the ancient city of Akhmim (known as Ipu in ancient times), which was an important
                    regional center. The tombs feature remarkable reliefs and inscriptions that provide valuable
                    insights into the lives of provincial officials and the development of Egyptian art over centuries.
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="card">
                <h2>Quick Facts</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <h3>Period</h3>
                        <p>Primarily Old Kingdom to Roman Period (c. 2300 BCE - 300 CE)</p>
                    </div>
                    <div class="info-item">
                        <h3>Excavations</h3>
                        <p>Extensively documented by Australian archaeologist Naguib Kanawati in the 1970s-80s</p>
                    </div>
                </div>
            </div>

            <div class="amenities-container">
                <div class="card">
                    <h2>Nearby Hotels</h2>
                    <div class="hotels">
                        <div class="hotel">
                            <h3>Akhmim Hotel</h3>
                            <p>Basic accommodations near the site</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Sohag Grand Hotel</h3>
                            <p>4-star hotel in nearby Sohag (40km away)</p>
                            <p>⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>El Balad Hotel</h3>
                            <p>Budget-friendly option in Akhmim</p>
                            <p>⭐️⭐️</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Nearby Restaurants</h2>
                    <div class="restaurants">
                        <div class="restaurant">
                            <h3>Nile View Restaurant</h3>
                            <p>Traditional Egyptian cuisine with river views</p>
                            <p>🍽️ Egyptian</p>
                        </div>
                        <div class="restaurant">
                            <h3>Akhmim Local Eatery</h3>
                            <p>Authentic local dishes</p>
                            <p>🍽️ Traditional</p>
                        </div>
                        <div class="restaurant">
                            <h3>Al Medina Cafe</h3>
                            <p>Casual dining with Egyptian specialties</p>
                            <p>🍽️ Cafe</p>
                        </div>
                    </div>
                </div>
                <div class="card map-container">
                    <h2>Location Map</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114172.31801285583!2d31.698315357095776!3d26.58806732010549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144f434593e9f259%3A0x6b05bd7af42f6cab!2z2YXZgtin2KjYsSDYp9mE2K3ZiNin2YjZiti0INin2YTYo9ir2LHZitip!5e0!3m2!1sen!2seg!4v1745061541936!5m2!1sen!2seg"
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
                    Adult: 5EGP<br>
                    Student: 2EGP</p>
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
    $location_name = "El Hawawish";
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
                        alert('Image uploaded successfully!');
                    };

                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });
    </script>
</body>

</html>