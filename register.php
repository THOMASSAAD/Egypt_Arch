<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<?php
$title = "Register";
require_once 'include/header.php';
require_once 'Database/conn.php';
?>

<style>
    html,
    body {
        height: 100%;
        margin: 100px 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('background.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .forms {
        margin: 60px auto 40px;
        /* Reduced top margin since navbar is removed */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    form {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px 25px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 380px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    form label {
        font-size: 15px;
        color: #131550;
        font-weight: 500;
    }

    form input {
        padding: 10px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
    }

    form input:focus {
        border-color: #131550;
        outline: none;
    }

    form button {
        padding: 10px;
        font-size: 15px;
        font-weight: bold;
        background-color: #131550;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form button:hover {
        background-color: #2e358c;
    }

    .footer {
        background-color: rgba(255, 255, 255, 0.7);
        box-shadow: 0 -1px 4px rgba(0, 0, 0, 0.1);
        padding: 20px 0 40px;
        width: 100%;
        position: fixed;
        bottom: 0;
        z-index: 1000;
        font-family: Arial, sans-serif;
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
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .back-to-top:hover {
        background-color: #00539f;
        transform: translateY(-2px);
    }
</style>


<div class="forms">
    <form id="registerForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" placeholder="First Name" required>

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" placeholder="Last Name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" required>

        <label for="id">ID</label>
        <input type="text" id="id" name="id" placeholder="Your ID" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required>

        <button type="submit">Submit</button>
        <button type="button" onclick="window.location.href='login.php'">Back to Login</button>
    </form>
</div>

<?php
function clean_input($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = trim($_POST['fname']);
    $lastname = trim($_POST['lname']);
    $id = clean_input($_POST['id']);
    if (!preg_match("/^[A-Za-z]{2,}$/", $firstname) || !preg_match("/^[A-Za-z]{2,}$/", $lastname)) {
        echo '<div class="alert alert-danger">Invalid first name or last name. Only letters are allowed and must be at least 2 characters.</div>';
        exit();
    } else {
        if (!preg_match("/^[0-9]+$/", $id)) {
            echo '<div class="alert alert-danger">ID must contain only numbers.</div>';
        } else {
            $email = filter_var(clean_input($_POST['email']), FILTER_VALIDATE_EMAIL);

            $pass = clean_input($_POST['password']);

            if (!$email) {
                echo '<div class="alert alert-danger">Invalid email format.</div>';
            } elseif (strlen($pass) < 8) {
                echo '<div class="alert alert-danger">Password must be at least 6 characters long.</div>';
            } else {
                $newpass = password_hash($pass, PASSWORD_DEFAULT);
                $result = $crud->insertuser($firstname, $lastname, $email, $newpass, $id);

                if (!$result) {
                    echo '<div class="alert alert-danger">Email or ID already exists!</div>';
                } else {
                    echo '<div class="alert alert-danger">Regist Successfully</div>';
                }
            }
        }
    }
}
?>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const email = document.getElementById('email').value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            e.preventDefault();
        } else if (password.length < 8) {
            alert("Password must be at least 6 characters long.");
            e.preventDefault();
        }
    });
</script>

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
</script>
</body>

</html>