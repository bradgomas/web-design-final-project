<?php
include 'db_connect.php';
$msg_status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $msg_status = "Message sent successfully!";
    } else {
        $msg_status = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Sharp Cuts Barbershop - Contact Us</title>
    <link rel="stylesheet" href="css/style.css">
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
        <h1>Contact Us</h1>
        <?php if($msg_status): ?>
        <p class="success-msg">
            <?php echo $msg_status; ?>
        </p>
        <?php endif; ?>
        <form action="contact.php" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2026 Sharp Cuts Barbershop.</p>
    </footer>
</body>

</html>