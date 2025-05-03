<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
$title = "Cansel_ticket";
require_once 'Database/conn.php';
require_once 'include/header.php';
require_once 'include/auchcheck.php';
$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancel'])) {
    $cancel = $_POST['cancel'];
    $res = $crud->deleteticket($cancel);
    if ($res) {
        echo "<div class='alert alert-success'>Ticket deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Failed to delete the ticket.</div>";
    }
}


?>
<!-- <link rel="stylesheet" href="CSS/ticket.css"> -->
<style>
body {
    background-image: url('background.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;

    margin: 0;
    padding: 0;
    min-height: 100vh;

    /* Adjusting padding only for footer */
    padding-bottom: 60px;
}

/* Section container styles */
.reservation-section,
.cancel-section,
.ticket-display {
    max-width: 600px;
    margin: 50px auto;
    background-color: #ffffff;
    padding: 25px 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2, h3 {
    margin-bottom: 15px;
    color: #222;
}

form label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
}

form input,
form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 15px;
}

form button {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #0056b3;
}

/* Ticket display styles */
.ticket-display p {
    margin: 10px 0;
    font-size: 16px;
}

.ticket-display span {
    font-weight: bold;
}

/* Footer Styling */
.footer {
    background-color: rgba(255, 255, 255, 0.7);
    box-shadow: 0 -1px 4px rgba(0, 0, 0, 0.1);
    padding: 20px 0;
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
<div class="container mt-4">
    <h2 class="mb-4">User List</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Your_name</th>
                <th>Location_name</th>
                <th>Ticket_Id</th>
            </tr>
        </thead>
        <tbody>
            <?php
         $stmt = $crud->getticketbyuserid($id);
            if ($stmt) { 
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['ID']) ?></td>
                        <td><?= htmlspecialchars($row['Date']) ?></td>
                        <td><?= htmlspecialchars($row['first_name']) ?></td>
                        <td><?= htmlspecialchars($row['location_name']) ?></td>
                        <td><?= htmlspecialchars($row['ticketid']) ?></td>
                    </tr>
            <?php endwhile;
            } else {
                echo "Error retrieving users.";
            }
            ?>

        </tbody>
    </table>
<div class="cancel-section" style="margin-top: 40px;">
    <h2>Cancel Your Ticket</h2>
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <label for="cancelId">Enter Ticket ID or User ID:</label>
        <input type="text" id="cancelId" name="cancel" required>
        <input type="submit" value="Cancel Ticket" class="btn btn-danger">
    </form>
    
    </div>
