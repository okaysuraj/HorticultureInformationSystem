<?php 
include 'config.php';
session_start();

$sql = "SELECT newtask.id, newtask.task, newtask.place, newtask.date
FROM newtask
JOIN task_volunteer ON newtask.id = task_volunteer.taskId
JOIN volunteer ON task_volunteer.volunteerId = volunteer.id
WHERE volunteer.id = ". $_SESSION['user_id']." AND newtask.status=1";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        <li><a href="./volunteerdashboard.php" class="menu" id="volunteerprofile" onclick="toggleMenu('volunteerprofile')">Volunteer Profile</a></li>
            <li><a href="./volpendingtask.php" class="menu active" id="volpendingtask" onclick="toggleMenu('volpendingtask')">Pending Tasks</a></li>
            <li><a href="./volcompletedtask.php" class="menu" id="volcompletedtask" onclick="toggleMenu('volcompletedtask')">Completed Tasks</a></li>
        </ul>
    </div>

    <div class="profile">
        <h1> Completed Task</h1>
        <table class="userdata-table">
            <thead>
                <th>Task</th>
                <th>Date</th>
                <th>Place</th>
            </thead>
            <tbody>
                <?php
                    while($userdata = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>" . $userdata["task"] . "</td>";
                        echo "<td>" . $userdata["date"] . "</td>";
                        echo "<td>" . $userdata["place"] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    </main>
    <footer>
        <p id="footer">Tezpur University &copy; 2024</p>
    </footer>
</body>
</html>