<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al Kab - Tourist Information</title>
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

    $location_name = "Al Kab";
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
            <h1>Al Kab</h1>
            <p id="c1">Ancient Wonders of the World</p>
        </div>
    </header>

    <div class="container">
        <!-- Hero Section with Image and Description -->
        <div class="hero-section">
            <div class="pyramid-image-container">
                <img src="Images/الكاب.jpg"
                    class="pyramid-image" alt="Great Pyramid of Giza">
            </div>
            <div class="description-card">
                <h2>About Al Kab</h2>
                <p>​Elkab (also spelled El-Kab or Al Kab) is a significant archaeological site located on the east bank of the Nile River in Upper Egypt, approximately 80 km south of Luxor and near Edfu. Known in ancient times as Nekheb, it served as the cult center for the vulture goddess Nekhbet, the protector of Upper Egypt​.</p>
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
                            <h3>Edfu </h3>
                            <p>modest hotel offering basic amenities and proximity to the Temple of Horus.</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3> Hotel Amoun</h3>
                            <p>  Provides comfortable accommodations with easy access to local attractions.</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Sofitel Winter Palace Luxor</h3>
                            <p>A historic luxury hotel offering elegant rooms and Nile views.</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Nearby Restaurants</h2>
                    <div class="restaurants">
                        <div class="restaurant">
                            <h3>Fish House</h3>
                            <p> Fresh seafood with Nile views.</p>
                            <p>🍽️ Egyptian & International</p>
                        </div>
                        <div class="restaurant">
                            <h3>El-Kababgy Restaurant</h3>
                            <p> Authentic Egyptian dishes such as kebabs, kofta, and tagines.</p>
                            <p>🍽️ Authentic Local</p>
                        </div>
                        <div class="restaurant">
                            <h3>Edfu Local Eateries</h3>
                            <p> Various local restaurants offering traditional Egyptian meals.</p>
                            <p>🍽️ Fusion Cuisine</p>
                        </div>
                    </div>

                </div>
                <div class="card map-container">
                    <h2>Location Map</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57799.72971096866!2d32.72165754863282!3d25.119352900000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144996b01b555e65%3A0xd068188b5abc04e1!2sTemple%20of%20El%20Kab!5e0!3m2!1sen!2seg!4v1744912481745!5m2!1sen!2seg"  
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
    $location_name = "Al Kab";
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