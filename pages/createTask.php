<?php 
include 'config.php';
session_start();

$sql = "SELECT * FROM volunteer";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = $_POST['name'];
    $task_date = $_POST['date'];
    $task_place = $_POST['place'];
    $volunteers = $_POST['volunteer'];

    // Insert the new task
    $stmt = $conn->prepare("INSERT INTO newtask (task, date, place) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $task_name, $task_date, $task_place);
    if ($stmt->execute()) {
        $task_id = $stmt->insert_id; // Get the ID of the newly inserted task

        // Assign the task to selected volunteers
        if (!empty($volunteers)) {
            $stmt = $conn->prepare("INSERT INTO task_volunteer (taskId, volunteerId) VALUES (?, ?)");
            foreach ($volunteers as $volunteer_id) {
                $stmt->bind_param("ii", $task_id, $volunteer_id);
                $stmt->execute();
            }
        }
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
        <li><a href="./admindashboard.php" class="menu" id="adminprofile" onclick="toggleMenu('adminprofile')">Admin Profile</a></li>
            <li><a href="./pendingTask.php" class="menu" id="pendingtask" onclick="toggleMenu('pendingtask')">Pending Tasks</a></li>
            <li><a href="./completedTask.php" class="menu" id="completedtask" onclick="toggleMenu('completedtask')">Completed Tasks</a></li>
            <li><a href="./createTask.php" class="menu active" id="createtask" onclick="toggleMenu('createtask')">Create New Task</a></li>
        </ul>
    </div>

    <div class="create-task">
        <h1> Create Task</h1>
        <form action="?" method="post">
            <input placeholder="Name" name="name" type="text"/>
            <input placeholder="Date" name="date" type="date" />
            <input placeholder="Place" name="place" type="text" />

            <div class="customBox">
                <?php
                    while($volunteerData = $result->fetch_assoc()){
                        echo "<div class='individualBox'>";
                        echo "<input type='checkbox' name='volunteer[]' value='".$volunteerData["id"]."' id='vol".$volunteerData["id"]."'/>";
                        echo "<label for='vol".$volunteerData["id"]."'>".$volunteerData["name"]."</label>";
                        echo "</div>";
                    }
                ?>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    </main>
    <footer>
        <p id="footer">Tezpur University &copy; 2024</p>
    </footer>
</body>
</html>