<!doctype html>
<html lan="en-IN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width:device-width; initial-scale:1.0;">
    <meta name="keywords" content="test,html">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/index.css'); ?>"/>
    <title>Home</title>
</head>

<body>

<!-- top baar with logo and login button  -->
    <nav class='nav'>
        <ul>
            <li>
                <div class="brand">
                    <p>Library Management System</p>
                </div>
            </li>
            <li>
                <div class="user-section">
                    <?php
                    if (!empty($_SESSION['admin_access_email'])) {
                        echo "<p>" . $_SESSION['admin_access_email'] . " | <a href='/login/logout'>Logout</a></P>";
                    } else {
                        echo '<p><a href="/login/login">login</a></p>';
                    }
                    ?>
                </div>
            </li>
        </ul>
    </nav>