<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SYSCBOOK - Main</title>
    <link rel="stylesheet" href="assets/css/reset.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
    <header>
        <h1>SYSCBOOK</h1>
        <p>Social media for SYSC students in Carleton University</p>
    </header>
    <main>
        <table>
            <tr>
                <td>
                    <nav>
                        <table class="sideBar">
                            <ul>
                                <tr>
                                    <td><li><a href="./index.php">Home</a></li></td>
                                </tr>
                                <?php
                                    session_start();
                                    if(isset($_SESSION["user"])) {
                                    // Show these links if the user is logged in
                                    echo '
                                        <tr>
                                            <td><li><a href="./profile.php">Profile</a></li></td>
                                        </tr>
                                        <tr>
                                            <td><li><a href="./logOut.php">Log Out</a></li></td>
                                        </tr>
                                    ';
                                    } else {
                                    // Show these links if the user is not logged in
                                    echo '
                                        <tr id="current">
                                            <td><li><a href="./login.php">Login</a></li></td>
                                        </tr>
                                        <tr>
                                            <td><li><a href="#">Register</a></li></td>
                                        </tr>
                                        ';
                                    }
                                ?>
                            </ul>
                        </table>
                    </nav>
                </td>

