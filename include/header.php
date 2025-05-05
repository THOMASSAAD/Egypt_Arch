<?php require_once 'include/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : "Egyptian Archaeological Sites"; ?></title>
    <style>
        /* Navbar Styling */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            height: 12vh;
            background-color: rgba(19, 21, 80, 0.95);
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            padding: 10px 20px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .navtitle {
            font-size: 20px;
            font-weight: 600;
            color: #ffffff;
            font-family: Arial, sans-serif;
            text-decoration: none;
            margin-right: 15px;
        }

        .nav-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 15px;
            flex: 1;
        }

        .nav-links a,
        .nav-links span {
            font-size: 16px;
            color: #ffffff;
            text-decoration: none;
            font-family: Arial, sans-serif;
            padding: 5px 10px;
            white-space: nowrap;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                justify-content: flex-start;
                gap: 10px;
                margin-top: 10px;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div>
            <a href="home.php" class="navtitle">Egyptian Archaeological Sites</a>
        </div>
        <div class="nav-links">
            <a href="ticket.php" title="Book Tickets" target="_blank" id="ticket">Book Tickets</a>

            <?php if (!isset($_SESSION['email'])) { ?>
                <a href="login.php" title="Login" target="_blank" id="login">Login</a>
            <?php } else { ?>
                <span>Hello! <?php echo ucfirst($_SESSION['fname']); ?></span>
                <a href="logout.php" title="Logout" target="_blank" id="logout">Logout</a>
                <a href="reset_pass.php" title="Reset Password" target="_blank" id="reset_pass">Reset Password</a>
                <a href="booked.php" title="Booked Tickets" target="_blank" id="bookedtickets">Booked Tickets</a>
            <?php } ?>

            <?php if (isset($_SESSION['rule']) && $_SESSION['rule'] == 1) { ?>
                <a href="admin.php" title="Admin Panel" target="_blank" id="admin">Admin Panel</a>
            <?php } ?>

            <?php if (!isset($_SESSION['email'])) { ?>
                <a href="register.php" title="Register" target="_blank" id="register">Register</a>
            <?php } ?>

            <a href="egypt_map.php" title="Egypt Map" target="_blank" id="map">Egypt Map</a>
            <a href="about_us.php" title="About Us" target="_blank" id="about">About Us</a>
            <a href="contact_us.php" title="Contact Us" target="_blank" id="contact">Contact Us</a>
        </div>
    </div>
<!-- </body>

</html> -->
