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
<section class="form__section">
        <div class="container form__section-container">
            <h2>Report Worker</h2>
            <form id="report-worker-form" enctype="multipart/form-data">
                <input type="text" id="report-title" name="title" placeholder="Title">
                <textarea id="report-description" name="description" rows="4" placeholder="Description"></textarea>
                <button type="submit" class="btn">SUBMIT</button>
            </form>
        </div>
    </section>

    <!-- Link to external JS file -->
    <script src="../js/report-worker.js"></script>
</body>
</html>