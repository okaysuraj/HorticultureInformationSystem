<?php 
include 'config.php';
session_start();

$sql = "SELECT * FROM adminlogin where id=". $_SESSION['user_id']."";
$result = $conn->query($sql);
$userdata = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Prepare and execute the update query
    $stmt = $conn->prepare("UPDATE adminlogin SET username = ?, name = ?, email = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("ssssi",$username, $name, $email, $phone, $_SESSION['user_id']);

    if ($stmt->execute()) {
        // Update successful, refresh the page to show updated data
        header("Location: admindashboard.php");
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
    <title>Admin Dashboard</title>
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
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="./admindashboard.php" class="menu active" id="adminprofile" onclick="toggleMenu('adminprofile')">Admin Profile</a></li>
                <li><a href="./pendingTask.php" class="menu" id="pendingtask" onclick="toggleMenu('pendingtask')">Pending Tasks</a></li>
                <li><a href="./completedTask.php" class="menu" id="completedtask" onclick="toggleMenu('completedtask')">Completed Tasks</a></li>
                <li><a href="./createTask.php" class="menu" id="createtask" onclick="toggleMenu('createtask')">Create New Task</a></li>
            </ul>
        </div>

        <div class="content profile">
                <table class="userdata-table" >
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                    <tr>
                        <td><?php echo $userdata["username"]; ?></td>
                        <td><?php echo $userdata["name"]; ?></td>
                        <td><?php echo $userdata["email"]; ?></td>
                        <td><?php echo $userdata["phone"]; ?></td>
                    </tr>
                </table>
            <form action="?" method="post">
                <input name="username" placeholder="New Username"/><br>
                <input name="name" placeholder="New Name"/><br>
                <input name="email" placeholder="New Email"/><br>
                <input name="phone" placeholder="New Phone"/><br>
                <button type="submit"> Update Profile </button>
            </form>
        </div>
    </main>
    <footer>
        <p id="footer">Tezpur University &copy; 2024</p>
    </footer>
</body>
</html>