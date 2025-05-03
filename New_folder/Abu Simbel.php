<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abu Simbel- Tourist Information</title>
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

    $location_name = "Abu Simbel";
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
            <h1>Abu Simbel</h1>
            <p id="c1">Ancient Wonders of the World</p>
        </div>
    </header>

    <div class="container">
        <!-- Hero Section with Image and Description -->
        <div class="hero-section">
            <div class="pyramid-image-container">
                <img src="Images/Abu Simbel.jpg"
                    class="pyramid-image" alt="Great Pyramid of Giza">
            </div>
            <div class="description-card">
                <h2>About Abu Simbel</h2>
                <p>​​Abu Simbel is a renowned archaeological site in southern Egypt, famed for its two massive rock-cut temples built by Pharaoh Ramses II in the 13th century BCE. Situated near the Sudanese border and approximately 240 kilometers southwest of Aswan, these temples were relocated in the 1960s to prevent submersion due to the creation of Lake Nasser. The larger temple is dedicated to Ramses II himself, while the smaller honors his queen, Nefertari. Both structures are celebrated for their colossal statues and intricate carvings. Notably, twice a year, a solar alignment illuminates the inner sanctum of the Great Temple, drawing visitors worldwide.  </p>
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
                            <h3>Seti Abu Simbel Lake Resort</h3>
                            <p> Offers comfortable accommodations with modern amenities, a swimming pool, and a restaurant serving local and international cuisine.</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Nefertari Hotel Abu Simbel</h3>
                            <p> Features Nubian-style architecture, air-conditioned rooms, and a restaurant offering traditional Egyptian dishes.</p>
                            <p>⭐️⭐️⭐️⭐️⭐️</p>
                        </div>
                        <div class="hotel">
                            <h3>Eskaleh Nubian Ecolodge</h3>
                            <p> A family-run ecolodge providing an authentic Nubian experience with locally sourced meals and cultural activities.</p>
                            <p>⭐️⭐️⭐️</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2>Nearby Restaurants</h2>
                    <div class="restaurants">
                        <div class="restaurant">
                            <h3>Seti Abu Simbel Restaurant</h3>
                            <p> Offers a variety of Egyptian and international dishes in a scenic setting overlooking Lake Nasser.</p>
                            <p>🍽️ Egyptian & International</p>
                        </div>
                        <div class="restaurant">
                            <h3>Eskaleh Restaurant</h3>
                            <p> Serves traditional Nubian meals prepared with fresh, local ingredients.</p>
                            <p>🍽️ Authentic Local</p>
                        </div>
                        <div class="restaurant">
                            <h3>Local Eateries in Abu Simbel Village</h3>
                            <p>Various small restaurants and cafes offering Egyptian staples like ful medames, taameya, and grilled meats.</p>
                            <p>🍽️ Fusion Cuisine</p>
                        </div>
                    </div>

                </div>
                <div class="card map-container">
                    <h2>Location Map</h2>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3690.4341047259913!2d31.62322407511934!3d22.33723187966009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x143aa988b126055b%3A0xa7d3cc6618f898d2!2sAbu%20Simbel%20Temples!5e0!3m2!1sen!2seg!4v1744915521284!5m2!1sen!2seg"  
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
    
    
       <!-- Header with upload button -->
  <div class="gallery-header">
    <h2>Image Gallery</h2>
    <label class="upload-button">
      Upload Image
      <input type="file" class="upload-input">
    </label>
  </div>

  <!-- Gallery Images -->
  <div class="responsive">
    <div class="gallery">
      <a target="_blank" href="img_5terre.jpg">
        <img src="أسوان.jpeg" alt="Cinque Terre">
      </a>
      <div class="desc">Beautiful Coastal View</div>
    </div>
  </div>

  <div class="responsive">
    <div class="gallery">
      <a target="_blank" href="img_forest.jpg">
        <img src="أسوان.jpeg" alt="Forest">
      </a>
      <div class="desc">Peaceful Forest</div>
    </div>
  </div>

  <div class="responsive">
    <div class="gallery">
      <a target="_blank" href="img_lights.jpg">
        <img src="أسوان.jpeg" alt="Northern Lights">
      </a>
      <div class="desc">Stunning Northern Lights</div>
    </div>
  </div>

  <div class="responsive">
    <div class="gallery">
      <a target="_blank" href="img_mountains.jpg">
        <img src="أسوان.jpeg" alt="Mountains">
      </a>
      <div class="desc">Majestic Mountains</div>
    </div>
  </div>

  <div class="clearfix"></div>

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
    $location_name = "Abu Simbel";
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