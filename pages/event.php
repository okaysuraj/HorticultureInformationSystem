<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="./events.css">
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

        <div id="event" class="menu">
            <h2>Our Events</h2>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Task</th>
                        <th>Place</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'events.php'; ?>
                </tbody>
            </table>
        </div>

    </main>
    <footer>
        <p id="footer">Tezpur University &copy; 2024</p>
    </footer>
</body>
</html>