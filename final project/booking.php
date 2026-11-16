<?php
include 'db_connect.php';
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['client_name'];
    $email = $_POST['client_email'];
    $service = $_POST['service'];
    $date = $_POST['booking_date'];
    $time = $_POST['booking_time'];

    $sql = "INSERT INTO bookings (client_name, client_email, service, booking_date, booking_time) 
            VALUES ('$name', '$email', '$service', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        $success = "Appointment booked successfully!";
    } else {
        $success = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Sharp Cuts Barbershop - Book Appointment</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script>
</head>

<body>
    <header>
        <div class="logo">Sharp Cuts</div>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="about us.html">About Us</a></li>
                <li><a href="booking.php">Book Now</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Book an Appointment</h1>
        <?php if($success): ?>
        <p class="success-msg">
            <?php echo $success; ?>
        </p>
        <?php endif; ?>
        <form action="booking.php" method="POST">
            <label for="client_name">Full Name:</label>
            <input type="text" id="client_name" name="client_name" required>

            <label for="client_email">Email:</label>
            <input type="email" id="client_email" name="client_email" required>

            <label for="service">Select Service:</label>
            <select id="service" name="service">
                <option value="Classic Haircut">Classic Haircut ($25)</option>
                <option value="Fade & Line Up">Fade & Line Up ($30)</option>
                <option value="Beard Trim">Beard Trim & Shave ($20)</option>
                <option value="Full Combo">Full Combo ($45)</option>
            </select>

            <label for="booking_date">Date:</label>
            <input type="date" id="booking_date" name="booking_date" required>

            <label for="booking_time">Time:</label>
            <input type="time" id="booking_time" name="booking_time" required>

            <button type="submit">Confirm Booking</button>
        </form>
    </div>
    
    <footer>
        <p>&copy; 2026 Sharp Cuts Barbershop.</p>
    </footer>
</body>

</html>