<?php 
$title = "Edit_Record";
require_once 'include/header.php';
require_once 'Database/conn.php';
require_once 'include/rulecheck.php';

// Assume you have the user ID from the URL or any other method
$id = $_GET['id']; // For example, ID = 1

// Call the function to get the user by ID
$user = $crud->getuserById($id);

?>
<!-- <link rel="stylesheet" href="CSS/register.css"> -->
 <style>
    html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: url('background.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.forms {
    margin: 60px auto 40px; /* Reduced top margin since navbar is removed */
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
    <form action="editpost.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="fname" placeholder="First Name" value="<?php echo $user['first_name'] ;?>" required>

        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?php echo $user['last_name'] ;?>" required>
        <label for="rule">Role</label>
        <select name="rule" id="rule">
            <option value="0" <?= $user['rule'] == 0 ? 'selected' : '' ?>>User</option>
            <option value="1" <?= $user['rule'] == 1 ? 'selected' : '' ?>>Admin</option>
        </select>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $user['email'] ;?>" readonly>

        <label for="id">ID</label>
        <input type="text" id="id" name="id" placeholder="Your ID" value="<?php echo $user['ID'] ;?>" readonly>
        <input type="submit" name="submit" style="background-color: #131550;
    color: white;" >
    </form>
</div>