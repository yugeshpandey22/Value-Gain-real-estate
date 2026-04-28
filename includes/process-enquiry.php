<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO enquiries (name, email, phone, subject, message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    if ($conn->query($sql)) {
        echo "Thank you! Your message has been sent successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header('Location: ../index.php');
}
?>
