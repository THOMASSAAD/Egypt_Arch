<?php 
$title = "Contact_Us";
require_once 'include/header.php'; 
?>
    <style>
      body {
  font-family: 'Segoe UI', sans-serif;
  background-image: url('background.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  min-height: 100vh;
  margin: 0;
  padding: 0 15px 60px; /* Add horizontal padding for better look */
  display: flex;
  justify-content: center;
  align-items: center;
}

.contact-container {
  width: 100%;
  max-width: 600px;
  padding: 30px;
  background: rgba(255, 255, 255, 0.95); /* semi-transparent for background harmony */
  border-radius: 16px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
  backdrop-filter: blur(3px);
}

.contact-container h1 {
  text-align: center;
  margin-bottom: 25px;
  color: #222;
  font-size: 2rem;
  letter-spacing: 1px;
}

.contact-form input,
.contact-form textarea {
  width: 100%;
  padding: 14px;
  margin-bottom: 18px;
  border: 1px solid #ccc;
  border-radius: 10px;
  font-size: 1rem;
  box-sizing: border-box;
  background-color: #f9f9f9;
  transition: border-color 0.3s ease;
}

.contact-form input:focus,
.contact-form textarea:focus {
  border-color: #007bff;
  outline: none;
}

.contact-form button {
  width: 100%;
  padding: 15px;
  background-color: #007bff;
  border: none;
  border-radius: 10px;
  color: white;
  font-size: 1.1rem;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.contact-form button:hover {
  background-color: #0056b3;
  transform: translateY(-2px);
}

#successMessage {
  text-align: center;
  margin-top: 20px;
  color: green;
  font-weight: bold;
  font-size: 1.1rem;
}

.hidden {
  display: none;
}

    </style>
  <div class="contact-container">
    <h1>Contact Us</h1>
    <form class="contact-form" id="contactForm">
      <input type="text" name="name" placeholder="Your Name" required />
      <input type="email" name="email" placeholder="Your Email" required />
      <input type="text" name="subject" placeholder="Subject" required />
      <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
      <button type="submit">Send Message</button>
    </form>
    <div id="successMessage" class="hidden">✅ Your message has been sent!</div>
  </div>

  <script>
    const form = document.getElementById('contactForm');
    const successMessage = document.getElementById('successMessage');

    form.addEventListener('submit', function(e) {
      e.preventDefault(); 
      form.reset(); 
      successMessage.classList.remove('hidden');
    });
  </script>
</body>
</html>

    
</body>   