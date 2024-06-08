<?php

include 'config.php';

$sql = "SELECT * FROM volunteer";
$result = $conn->query($sql);

// Check if any volunteers were found
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["department"] . "</td>";    
        echo "</tr>";
    }
} else {
    echo "No Volunteers has registered as of yet.";
}
$conn->close();
?>
