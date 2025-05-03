<?php 
$title = "Reset Password";
require_once 'Database/conn.php';
require_once 'include/header.php'; 
require_once 'include/auchcheck.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $oldpass = $_POST['old_password'];
    $row = $crud->getuserById($id);
    #echo $row['password'];
    if ($row && password_verify($oldpass, $row['password'])) {
        $pass = $_POST['new_password'];
        $newpass = password_hash($pass, PASSWORD_DEFAULT);
        $res = $crud->updatepass($id, $newpass);
        if ($res) {
            echo '<div class="alert alert-info">Password Updated Successfully</div>';
            echo '<script>
            setTimeout(function(){
                window.location.href = "home.php"; // your homepage
            }, 1000); // 1 seconds delay
          </script>';
        } else {
            echo '<div class="alert alert-danger">Something went wrong while updating the password.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Old password is incorrect! Please try again.</div>';
    }
}
?>
<!-- <link rel="stylesheet" href="CSS/login.css"> -->
<style>
    html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
}

body {
    flex: 1;
    background-image: url('background.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: Arial, sans-serif;
}

.forms {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; /* No need to offset for navbar */
}

form {
    background-color: rgba(255, 255, 255, 0.9);
    padding: 40px 30px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 100%;
    max-width: 400px;
    font-family: Arial, sans-serif;
}

form label {
    font-size: 16px;
    color: #131550;
    font-weight: 500;
}

form input {
    padding: 12px 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: 0.3s border-color ease;
}

form input:focus {
    border-color: #131550;
}

form button {
    padding: 12px 0;
    font-size: 16px;
    font-weight: bold;
    background-color: #131550;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #2e358c;
}

/* Footer Styling */
.footer {
    background-color: rgba(255, 255, 255, 0.7);
    box-shadow: 0 -1px 4px rgba(0, 0, 0, 0.1);
    padding: 20px 0;
    width: 100%;
    position: relative;
    z-index: 1000;
    font-family: Arial, sans-serif;
    margin-top: auto;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-content p {
    margin: 0;
    font-size: 14px;
    color: #131550;
    font-weight: 400;
}

.back-to-top {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.back-to-top:hover {
    background-color: #00539f;
    transform: translateY(-3px);
}

.back-to-top:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.3);
}

/* Responsive Design for Footer */
@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }

    .back-to-top {
        width: 36px;
        height: 36px;
        font-size: 18px;
    }
}

@media (max-width: 480px) {
    .footer {
        padding: 15px 0;
    }

    .footer-content p {
        font-size: 12px;
    }

    .back-to-top {
        width: 32px;
        height: 32px;
        font-size: 16px;
    }
}

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <div class="forms">
        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <label for="oldPass">Old Password</label>
            <input type="password" required placeholder="Enter old password" id="oldPass" name="old_password">

            <label for="newPass">New Password</label>
            <input type="password" required placeholder="Enter new password" id="newPass" name="new_password">

            <label for="confirmPass">Confirm New Password</label>
            <input type="password" required placeholder="Confirm new password" id="confirmPass" name="confirm_password">
           <input type="submit" value="submit" class="btn btn-info">
        </form>
    </div>

    <div class="footer">
        <div class="footer-content">
            <p>Copyright © 2025, All Rights Reserved</p>
            <button class="back-to-top" onclick="scrollToTop()">↑</button>
        </div>
    </div>

    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function submitReset(event) {
            event.preventDefault(); // Prevent form submission for now
            const oldPass = document.getElementById('oldPass').value;
            const newPass = document.getElementById('newPass').value;
            const confirmPass = document.getElementById('confirmPass').value;

            if (newPass !== confirmPass) {
                alert("New passwords do not match!");
                return;
            }
        }
    </script>

</body>
</html>
