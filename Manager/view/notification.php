<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale01.0">
        <title>Responsive Multipage blog Website</title>
        <!---   CUSTOM STYLESHEET  -->
        <link rel="stylesheet" href="../css/style.css">
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
                    <li><a href="profession.php">Profession</a></li>
                    <li><a href="applicant.php">Applicant</a></li>
                    <li><a href="account.php">Account</a></li>
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
 
 
 
 
 
 
<section class="dashboard">
    <div class="container dashboard__container">
        <aside>
            <ul>
            li>
                    <a href="dashboard.php" ><i class="fas fa-users"></i>
                        <h5>Manage Customer</h5>
                    </a>
                </li>
                
                <li>
                    <a href="manage-worker.php" ><i class="fas fa-users"></i>
                        <h5>Manage Worker</h5>
                    </a>
                </li>
                <li>
                    <a href="blocked.php"><i class="fas fa-folder-plus"></i>
                        <h5>Blocked Customers</h5>
                    </a>
                </li>
                <li>
                    <a href="blocked-workers.php"><i class="fas fa-folder-plus"></i>
                        <h5>Blocked  Workers</h5>
                    </a>
                </li>
                <li>
                    <a href="notification.php" class="active"><i class="fa fa-bell"></i>
                        <h5>Notification</h5>
                    </a>
                </li>
            </ul>
        </aside>
        <main>
            <h2>Notification</h2>
            <table>
                <thead>
                    <tr>
                        <th><h5>Name</h5></th>
                        <th><h5>Profession</h5></th>
                        <th><h5>Show Details</h5></th>
                        <th><h5>Block</h5></th>
                        <th><h5>Delete</h5></th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><h5>Himel</h5></td>
                        <th><h5>Profession</h5></th>
                        <td><a href="details.php" class="btn sm">Details</a></td>
                        <td><a href="block.php" class="btn sm">Block</a></td>
                        <td><a href="delete.php" class="btn sm danger">Delete</a></td>
                       
                    </tr>
                    <tr>
                    <td><h5>Himel</h5></td>
                    <th><h5>Profession</h5></th>

                        <td><a href="details.php" class="btn sm">Details</a></td>
                        <td><a href="block.php" class="btn sm">Block</a></td>
                        <td><a href="delete.php" class="btn sm danger">Delete</a></td>
                       
                    </tr>
                    <tr>
                    <td><h5>Himel</h5></td>
                    <th><h5>Profession</h5></th>

                        <td><a href="details.php" class="btn sm">Details</a></td>
                        <td><a href="block.php" class="btn sm">Block</a></td>
                        <td><a href="delete.php" class="btn sm danger">Delete</a></td>
                       
                    </tr>
                   
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
        <article>
            <h4>Catagoris</h4>
            <ul>
                <li><a href="">Art</a></li>
                <li><a href="">Wild Life</a></li>
                <li><a href="">Travel</a></li>
                <li><a href="">Food</a></li>
                <li><a href="">Electricity</a></li>
                <li><a href="">Computer Vission</a></li>
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
                <li><a href="">Electricity</a></li>
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
                <li><a href="">Computer Vission</a></li>
               
               
            </ul>
        </article>
 
        <article>
            <h4>Permalinks</h4>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Contacts</a></li>
               
               
            </ul>
        </article>
    </div>
</footer>
</body>
 
</html>