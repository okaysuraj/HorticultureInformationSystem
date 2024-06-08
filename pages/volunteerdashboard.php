<?php 
include 'config.php';
session_start();

$sql = "SELECT * FROM volunteer WHERE id=" . $_SESSION['user_id'];
$result = $conn->query($sql);
$userdata = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];

    $stmt = $conn->prepare("UPDATE volunteer SET name = ?, email = ?, phone = ?, department = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $name, $email, $phone, $department, $_SESSION['user_id']);

    if ($stmt->execute()) {
        header("Location: volunteerdashboard.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Dashboard</title>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="./admindashboard.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
</head>
<body>
    <header>
        <span class="heading">
            <img src="../images/tulogo.png" alt="logo" class="tulogo">
            <h1>Campus Horticulture Information System</h1>
        </span>
    </header>
    <nav>
        <a href="../index.html">Home</a>
        <a href="./about.html">About Us</a>
        <a href="./event.php">Events</a>
        <a href="./volunteer.php">Volunteers</a>
        <a href="./adminlogin.html">Admin</a>
        <a href="./contact.html">Contact Us</a>
    </nav>
    <main>
        <div class="sidebar">
            <h2>Volunteer Dashboard</h2>
            <ul>
                <li><a href="./volunteerdashboard.php" class="menu active" id="volunteerprofile">Volunteer Profile</a></li>
                <li><a href="./volpendingtask.php" class="menu" id="volpendingtask">Pending Tasks</a></li>
                <li><a href="./volcompletedtask.php" class="menu" id="volcompletedtask">Completed Tasks</a></li>
            </ul>
        </div>

        <div class="content">
            <h2>Your Profile</h2>
            <table class="profile-table">
                <tr>
                    <th>Name</th>
                    <td><?php echo htmlspecialchars($userdata["name"]); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($userdata["email"]); ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo htmlspecialchars($userdata["phone"]); ?></td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td><?php echo htmlspecialchars($userdata["department"]); ?></td>
                </tr>
            </table>

            <form action="?" method="post">
                <input name="name" placeholder="Name" value="<?php echo htmlspecialchars($userdata["name"]); ?>" required/>
                <input name="email" placeholder="Email" value="<?php echo htmlspecialchars($userdata["email"]); ?>" required/>
                <input name="phone" placeholder="Phone" value="<?php echo htmlspecialchars($userdata["phone"]); ?>" required/>
                <input name="department" placeholder="Department" value="<?php echo htmlspecialchars($userdata["department"]); ?>" required/>
                <button type="submit">Update Profile</button>
            </form>
        </div>
    </main>
    <footer>
        <p id="footer">Tezpur University &copy; 2024</p>
    </footer>
</body>
</html>
