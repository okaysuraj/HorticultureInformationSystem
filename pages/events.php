<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "horticulture";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM newtask";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["task"] . "</td>";
        echo "<td>" . $row["place"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";    
        echo "</tr>";
    }
} else {
    echo "No Event has taken place as of yet.";
}
$conn->close();

?>
