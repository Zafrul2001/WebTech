<?php
include '../config/database.php';

// Check if profession is set and sanitize the input
$profession = isset($_GET["profession"]) ? htmlspecialchars($_GET["profession"]) : '';

// If profession is empty or invalid, show an appropriate message
if (empty($profession)) {
    echo "<p>Profession not specified or invalid.</p>";
    exit();  // Stop the execution if no profession is specified
}

$mydb = new mydb();
$conobj = $mydb->openCon();

// Now safely query the database with the profession
$result = $mydb->showWorkersByProfession("workers", $profession, $conobj);
$mydb->closeCon($conobj);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Details</title>
    <link rel="stylesheet" href="../css/styles.css">
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

    <div class="worker-details-container">
        <h1>Workers in <?php echo ucfirst($profession); ?></h1>

        <?php
        if ($result->num_rows > 0) {
            while ($worker = $result->fetch_assoc()) {
                // Ensure worker keys are set
                $workerImage = "../../worker/uploads/picture/" . (isset($worker['picture']) ? $worker['picture'] : 'default-avatar.png');
                $workerName = isset($worker['name']) ? $worker['name'] : 'Unknown';
                $workerUsername = isset($worker['username']) ? $worker['username'] : 'Unknown';
                $workerEmail = isset($worker['email']) ? $worker['email'] : 'Email not available';
                $workerPhone = isset($worker['phone']) ? $worker['phone'] : 'Phone not available';

                ?>
                <div class="worker-card">
                    <div class="worker-avatar">
                        <img src="<?php echo $workerImage; ?>" alt="<?php echo $workerName; ?>" />
                    </div>
                    <div class="worker-info">
                        <h3><?php echo $workerUsername; ?></h3>
                        <p><strong>Email:</strong> <?php echo $workerEmail; ?></p>
                        <p><strong>Phone Number:</strong> <?php echo $workerPhone; ?></p>
                        <a href="worker_profile.php?id=<?php echo $workerUsername; ?>" class="view-profile">View Profile</a>
                        <form method="POST" action="../controller/hire-control.php">
                            <input type="hidden" name="worker_username" value="<?php echo $workerUsername; ?>">
                            <button type="submit" class="hire-button">Hire</button>
                        </form>                    
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No workers found for this profession.</p>";
        }
        ?>
    </div>
</body>
</html>
