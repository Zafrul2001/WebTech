
<?php 
include '../controller/hire-table-control.php';
?>


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
                <a href="index.html" class="nav__logo">HOME SERVICE</a>
                <ul class="nav__items">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="history.php">History</a></li>
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
<section class="dashboard">
    <div class="container dashboard__container">
        <aside>
            <ul>
                <li>
                    <a href="dashboard.php" ><i class="fa fa-bell"></i>
                        <h5>Notification</h5>
                    </a>
                </li>
                <li>
                    <a href="edit-profile.php"><i class="fas fa-edit"></i>
                        <h5>Edit Profile</h5>
                    </a>
                </li>
                <li>
                    <a href="hire-worker.php" class="active"><i class="fas fa-users"></i>
                        <h5>Hire Worker</h5>
                    </a>
                </li>
                <li>
                    <a href="work-history.php"><i class="fas fa-user-plus"></i>
                        <h5>Work History</h5>
                    </a>
                </li>
                <li>
                    <a href="worker-report.php" ><i class="fas fa-users"></i>
                        <h5>Report Worker</h5>
                    </a>
                </li>
                <li>
                    <a href="report-history"><i class="fas fa-folder-plus"></i>
                        <h5>Show Report History</h5>
                    </a>
                </li>
                
            </ul>
        </aside>
        <main>
            <h2>Hire Worker</h2>
            <table>
            <tbody>
    <?php foreach ($hire_records as $record): ?>
        <tr>
            <td><?php echo htmlspecialchars($record['profession']); ?></td>
            <td><?php echo htmlspecialchars($record['worker_username']); ?></td>
            <td><?php echo $ratings[$record['worker_username']] ?? 'No Ratings'; ?></td>
            <td><?php echo htmlspecialchars($record['hire_date']); ?></td>
            <td>$<?php echo htmlspecialchars($record['amount']); ?> (<?php echo htmlspecialchars($record['payment_status']); ?>)</td>
            <td>
                <form method="POST" action="../controller/delete-hire.php">
                    <input type="hidden" name="hire_id" value="<?php echo $record['hire_id']; ?>">
                    <button type="submit" onclick="return confirm('Are you sure?')">❌</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

                
            </table>
        </main>
    </div>
</section>

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