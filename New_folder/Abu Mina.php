<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abu Mina- Tourist Information</title>
    <link rel="stylesheet" href="Giza.css">
</head>

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

    $location_name = "Abu Mina";
    $location = $crud->getlocationid($location_name);
    $crud->insertpic($id, $destination, $location);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<body>
    <header>
        <div class="container">
            <h1>Abu Mina</h1>
            <p id="c1">Ancient Wonders of the World</p>
        </div>
    </header>
    <div class="container">
        <!-- Hero Section with Image and Description -->
        <div class="hero-section">
            <div class="pyramid-image-container">
                <img src="Images/Abu Mina.jpg"
                    class="pyramid-image" alt="Great Pyramid of Giza">
            </div>
            <div class="description-card">
                <h2>About Abu Mina</h2>
                <p>​ Abu Mena (also spelled Abu Mina) is an ancient Christian pilgrimage site located approximately 50 km southwest of Alexandria, near New Borg El Arab in Egypt's Alexandria Governorate. Established in the late 4th century, it developed around the tomb of Saint Menas of Alexandria, a revered Christian martyr. The site evolved into a significant religious center during Late Antiquity, featuring a large basilica, churches, Roman baths, a baptistery, and accommodations for pilgrims.</p>
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
                        <p>Alexandria Governorate, Egypt</p>
                    </div>
                </div>
            </div>

            <div class="amenities-container">
                <div class="card">
                    <h2>Nearby Hotels</h2>
                    <div class="hotels">
                        <div class="hotel">
                            <h3>Africana Hotel & Spa</h3>
                            <p>A 4-star hotel featuring comfortable rooms, a spa, swimming pool, and multiple dining options.</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Tolip Family Club Borg El Arab</h3>
                            <p> Offers modern amenities, including a fitness center, outdoor pool, and family-friendly services.</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Panorama Plaza Hotel</h3>
                            <p> provides budget-friendly accommodations with essential facilities for travelers.</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Nearby Restaurants</h2>
                    <div class="restaurants">
                        <div class="restaurant">
                            <h3>El Borg Restaurant</h3>
                            <p> Offers a variety of Egyptian and Mediterranean dishes in a casual setting.</p>
                            <p>🍽️ Egyptian & International</p>
                        </div>
                        <div class="restaurant">
                            <h3>Al Fanar Restaurant</h3>
                            <p> Specializes in seafood and traditional Egyptian cuisine, known for its fresh ingredients.</p>
                            <p>🍽️ Authentic Local</p>
                        </div>
                        <div class="restaurant">
                            <h3>Pizza King</h3>
                            <p> Serves a range of pizzas, pastas, and fast-food items, catering to various tastes.​</p>
                            <p>🍽️ Fusion Cuisine</p>
                        </div>
                    </div>

                </div>
                <div class="card map-container">
                    <h2>Location Map</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3425.629361758822!2d29.660913975423004!3d30.841049974532226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145f6357ac4e7f61%3A0x4aa93b4ecd3bab59!2sAbu%20Mena%20Heritage%20Site!5e0!3m2!1sen!2seg!4v1744917152285!5m2!1sen!2seg"
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
    $location_name = "Abu Mina";
    $location = $crud->getlocationid($location_name);
    $rows = $crud->getimg($location);
    if(!$rows){
        echo "some thing wrong";
}else{
foreach ($rows as $row) {
    echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Location Image" style="max-width: 300px; margin: 10px;">';
}
}
    ?>



    <!-- <script>
        document.querySelector('.upload-input').addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                alert('Image uploaded successfully!');
                // You can add logic here to preview or insert the image into the gallery
            }
        });
    </script> -->

    <footer>
        <p>Copyright © 2025, All Rights Reserved</p>
        <button class="back-to-top" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">&#9650;</button>
    </footer>

    <!-- <script>
        // Add functionality for the upload icon
        document.querySelector('.upload-icon').addEventListener('click', function() {
            const fileInput = this.querySelector('.upload-input');
            fileInput.click();

            fileInput.addEventListener('change', function(e) {
                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(event) {
                        // You could display the uploaded image somewhere
                        alert('Image uploaded successfully!');
                        // In a real application, you would upload to a server here
                    };

                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });
    </script> -->
</body>

</html>