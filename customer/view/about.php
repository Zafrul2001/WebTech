<?php 
require '../config/constaint.php';
$mydb = new mydb();
$conobj = $mydb->openCon();
$username = $_SESSION['username'];
$sql = "SELECT username, email, address FROM customers WHERE username = ?";
$stmt = $conobj->prepare($sql);
$stmt->bind_param("s", $username); 
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Multipage blog Website</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="container nav__container">
            <a href="index.php" class="nav__logo">HOME SERVICE</a>
            <ul class="nav__items">
                <li><a href="home.php">Home</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="worker-history.php">History</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="mail.php">Mail</a></li>
                <div id="notification-icon">
                    🔔 <span id="notification-count"></span>
                </div>
                <div id="notification-list"></div>
                <script src="script.js"></script>                   
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="./images/flower-logo-vector.png">
                    </div>
                    <ul>
                        <li><a href="dashboard.php">DASHBOARD</a></li>
                        <li><a href="logout.php">LOG OUT</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <section class="about__page">
    <div class="about__content">
        <h1>Information</h1>

        <?php
        
        if ($result->num_rows > 0) {
            
            echo "<table border='1'>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["username"] . "</td>
                        <td>" . $row["email"] . "</td>
                        
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No customers found.</p>";
        }

        
        $mydb->closeCon($conobj);
        ?>

    </div>
    </section>
</body>
</html>