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
    <section class="search__bar">
    <form class="container search__bar-container" action="eventguide.php" method="GET">
        <div>
            <i class="fas fa-search"></i>
            <input type="search" name="query" placeholder="Search" required>
        </div>
        <button type="submit" class="btn">GO</button>
    </form>
</section>
    <!-- Main Container -->
    <div class="servece__container">
        <!-- Sidebar Menu -->
        <aside class="service__sidebar">
            <ul>
                <li class="active">Maid Service</li>
                <li>PAINTER</li>
                <li>GARDEN CLEANER</li>
                <li>HOME CLEANER</li>
                <li>PLUMBER</li>
                <li>ELECTRICIAN</li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="service__main-content">
            <h1>Our Services</h1>
            <div class="services-grid">
            <a href="worker_details.php?profession=PAINTER" class="service-card">
            <img src="../img/8.png" alt="PAINTER">
                    <p>PAINTER</p>
                </a>
                <a href="worker_details.php?profession=GARDEN_CLEANER" class="service-card">
                <img src="../img/7.png" alt="GARDEN CLEANER">
                    <p>GARDEN CLEANER</p>
                </a>
                <a href="worker_details.php?profession=HOME_CLEANER" class="service-card">
                    <img src="../img/6.png" alt="HOME CLEANER">
                    <p>HOME CLEANER</p>
                </a>
                <a href="worker_details.php?profession=PLUMBER" class="service-card">
                    <img src="../img/9.png" alt="PLUMBER">
                    <p>PLUMBER</p>
                </a>
                <a href="worker_details.php?profession=ELECTRICIAN" class="service-card">
                    <img src="../img/4.png" alt="ELECTRICIAN">
                    <p>ELECTRICIAN</p>
                </a>
            </div>
        </main>
    </div>

    <!-- Footer Section -->
    
</body>
</html>
