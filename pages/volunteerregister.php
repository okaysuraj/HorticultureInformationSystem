<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $department = $_POST['department'];

    $stmt = $conn->prepare("INSERT INTO volunteer (name, email, phone, password, department) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $password, $department);

    if ($stmt->execute()) {
        // Redirect to volunteer.html after successful registration
        header("Location: volunteer.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
