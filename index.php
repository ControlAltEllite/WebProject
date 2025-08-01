<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>| Online Quiz System |</title>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="shortcut icon" type="image/png" href="image/logo.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style type="text/css">
            body {
                width: 100%;
                background: url(image/book.png) ;
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            .admin-panel-button {
            position: absolute; /* Position the button absolutely */
            top: 20px; /* Distance from the top */
            right: 20px; /* Distance from the right */
            background-color: transparent;
            color: white; 
            border: 2px solid transparent; /* Transparent border initially */
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px; /* Space between icon and text */
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease; /* Smooth transition for hover effects */
            z-index: 1000; /* Ensure it's above other content */
            }

            .admin-panel-button:hover {
                background-color: rgba(0, 0, 0, 0.1); /* Slightly visible background on hover */
                border-color: #333; /* Border appears on hover */
                color: white; /* Darker text/icon on hover */
            }

            .admin-panel-button i {
                font-size: 18px; /* Adjust icon size */
                color: white;
            }
        </style>
    </head>
    <body>
        <a href="admin.php" class="admin-panel-button">
        <i class="fas fa-cog"></i> Admin Panel
        </a>
        <center>
            <div class="intro">
                <h1> online quiz system </h1>
                <a href="login.php" class="btn"> Let's Attempt  </a> &emsp;
                <h2> Good &nbsp;Luck. </h2>
            </div>
        </center>
    </body>
</html>
