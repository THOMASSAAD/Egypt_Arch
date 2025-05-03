<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
$title = "Book Tickets";
require_once 'include/header.php';
require_once 'Database/conn.php';
require_once 'include/auchcheck.php';
$places = $crud->getplaces();
$id = $_SESSION['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $_POST['location'];
    $location_id = $crud->getlocationid($location);
    $date = $_POST['date'];
    $ticketQuantity = $_POST['ticketQuantity'];
    for ($i = 0; $i < $ticketQuantity; $i++) {
        $ticketid = 'TID' . rand(10000, 99999);
        $res = $crud->insertticket($date, $id, $location_id, $ticketid);
    }
    if ($res) {
        header("Location: booked.php");
    } else {
        echo '<div class="alert alert-danger">Something Wrong happen</div>';
    }
}
?>
<link rel="stylesheet" href="CSS/ticket.css">

<!-- Reservation Section -->
<div class="reservation-section">
    <h2>Reserve Your Ticket</h2>
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date" required><br><br>

        <label for="location">Select Location:</label>
        <select id="location" name="location" required>
            <!-- <option value="">--Select--</option> -->
            <?php
            foreach ($places as $row) {
                echo "<option value=\"{$row['location_name']}\">{$row['location_name']}</option>";
            }
            ?>
        </select><br><br>

        <label for="userId">User ID:</label>
        <input type="text" id="userId" name="userId" value="<?php echo $id; ?>" required><br><br>

        <label for="ticketQuantity">How many tickets?</label>
        <input type="number" id="ticketQuantity" name="ticketQuantity" value="1" min="1" required><br><br>
        <input type="submit" value="submit" class="btn btn-info">
    </form>
</div>

<!-- Ticket Template Display -->
<div class="ticket-display" id="ticketDisplay" style="display:none; margin-top: 30px;">
    <h3>Your Tickets</h3>
    <div id="ticketList"></div>
</div>
<!-- Footer -->
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

    // Generate random ticket ID
    function generateTicketId() {
        return 'TID' + Math.floor(Math.random() * 100000);
    }

    // Initialize an array to store tickets
    let allTickets = [];

    // Handle reservation form
    document.getElementById('reservationForm').addEventListener('submit', function(e) {
        // e.preventDefault();

        const userId = document.getElementById('userId').value;
        const date = document.getElementById('date').value;
        const location = document.getElementById('location').value;
        const ticketQuantity = parseInt(document.getElementById('ticketQuantity').value);

        // Generate tickets
        let ticketListHTML = '';
        for (let i = 0; i < ticketQuantity; i++) {
            const ticketId = generateTicketId();
            const ticketData = {
                userId: userId,
                ticketId: ticketId,
                date: date,
                location: location
            };
            allTickets.push(ticketData); // Store the ticket data

            ticketListHTML += `
                     <div class="ticket-item">
                         <h4>Ticket ${i + 1}</h4>
                         <p><strong>User ID:</strong> ${userId}</p>
                         <p><strong>Ticket ID:</strong> ${ticketId}</p>
                         <p><strong>Date:</strong> ${date}</p>
                         <p><strong>Location:</strong> ${location}</p>
                     </div>
                     <hr>
                 `;
        }

        // Append the new tickets to the ticket list
        document.getElementById('ticketList').innerHTML = ticketListHTML;
        document.getElementById('ticketDisplay').style.display = 'block';
    });

    // Handle cancel form
    document.getElementById('cancelForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const cancelId = document.getElementById('cancelId').value;

        // Find and remove ticket from the array
        const ticketIndex = allTickets.findIndex(ticket => ticket.ticketId === cancelId || ticket.userId === cancelId);
        if (ticketIndex > -1) {
            allTickets.splice(ticketIndex, 1);
            alert(`Ticket with ID "${cancelId}" has been canceled.`);
        } else {
            alert(`No ticket or user found with ID "${cancelId}".`);
        }

        // Optionally, you could update the ticket list to reflect cancellations
    });
</script>

</body>

</html>