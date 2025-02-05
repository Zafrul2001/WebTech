<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale01.0">
        <title>Responsive Multipage blog Website</title>
        <!---   CUSTOM STYLESHEET  -->
        <link rel="stylesheet" href="../css/styles.css">
        <!---   CUSTOM STYLESHEET OF ICON  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <!---   Google Montserrat  -->
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

        <!----========= END OF NAV ========-->
        <section class="search__bar">
    <form class="container search__bar-container" action="eventguide.php" method="GET">
        <div>
            <i class="fas fa-search"></i>
            <input type="search" name="query" placeholder="Search" required>
        </div>
        <button type="submit" class="btn">GO</button>
    </form>
</section>
<!----========= END OF FEATURE ========-->
        
        <!----========= END OF CATEGORY ========-->
        <footer>
    <div class="footer__socials">
        <h3>Follow Us</h3>
            <li><a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a></li>
            <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="https://github.com" target="_blank"><i class="fab fa-github"></i></a></li>
    </div>
    <div class="container footer__container">
        <article>
            <h4>Catagoris</h4>
            <ul>
                <li><a href="">Food Maker</a></li>
                <li><a href="">Electricity</a></li>
                <li><a href="">Garden Cleaner</a></li>
                <li><a href="">Plamber</a></li>
                <li><a href="">Cleaner</a></li>
                
            </ul>
        </article>

        <article>
            <h4>Support</h4>
            <ul>
                <li><a href="">Online Support</a></li>
                <li><a href="">Call Services</a></li>
                <li><a href="">Social Support</a></li>
                <li><a href="">Emails</a></li>
                <li><a href="">Location</a></li>
                
            </ul>
        </article>

        <article>
            <h4>Blog</h4>
            <ul>
                <li><a href="">SAfety</a></li>
                <li><a href="">Repair</a></li>
                <li><a href="">Recent</a></li>
                <li><a href="">Popular</a></li>
                <li><a href="">Catagories</a></li>
                
                
                
            </ul>
        </article>

        <article>
            <h4>Permalinks</h4>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">About</a></li>
                <li><a href="">History</a></li>
                <li><a href="">Mail</a></li>
                
                
            </ul>
        </article>
    </div>
</footer>
</body>

</html>