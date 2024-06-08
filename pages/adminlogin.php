<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, name, phone, password FROM adminlogin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $username, $name, $phone, $stored_password);
    $stmt->fetch();

    if ($password === $stored_password) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_username'] = $username;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_phone'] = $phone;
        header("Location:admindashboard.php"); // Redirect to admin dashboard page
        exit();
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
