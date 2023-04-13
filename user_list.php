<!DOCTYPE html>
<html lang="en">
<head >
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
        <table class="sideBar">
            <tr>
            <td rowspan="2">
                <nav>
                    <ul>
                        <table class="sideBar">

                        <?php
                        session_start();
                        if(isset($_SESSION["user"])) {
                        // Show these links if the user is logged in
                        echo '
                            <tr id="current">
                                <td><li><a href="#">Home</a></li></td>
                            </tr>
                            <tr>
                                <td><li><a href="./profile.php">Profile</a></li></td>
                            </tr>
                            <tr>
                                <td><li><a href="./logOut.php">Log Out</a></li></td>
                            </tr>
                        ';
                        if($_SESSION["user"]["account_type"] == 0){
                            echo '
                            <tr>
                                <td><li><a href="./user_list.php">User List</a></li></td>
                            </tr>
                        ';
                        }
                        } else {
                        // Show these links if the user is not logged in
                        echo '
                            <tr>
                                <td><li><a href="./login.php">Home</a></li></td>
                            </tr>
                            <tr>
                                <td><li><a href="./login.php">Login</a></li></td>
                            </tr>
                            <tr>
                                <td><li><a href="./register.php">Register</a></li></td>
                            </tr>
                            ';
                        }
                        ?>
                        </table>
                    </ul>
                </nav>
            </td>
            <td>
                <table>
                    <?php
                        if(!$_SESSION["user"]["account_type"] == 0){
                            header("Location: ./login.php");
                            exit();
                        }else{
                            include("connection.php");
                            $info_query = $conn->prepare("SELECT * FROM users_info;");
                            $info_query->execute();
                            $info_results = $info_query->get_result();
                            $program_query = $conn->prepare("SELECT * FROM users_program;");
                            $program_query-> execute();
                            $program_results = $program_query->get_result();
                            while($info_row = $info_results->fetch_assoc() and $program_row = $program_results->fetch_assoc()){
                                if(!isset($program_row["program"])){
                                    $program = "No Program Selected";
                                }else{
                                    $program = $program_row["program"];
                                }
                                echo "
                                <tr>
                                    <td><p>". $info_row["student_ID"] ."</p><td>
                                    <td><p>". $info_row["first_name"] ."</p><td>
                                    <td><p>". $info_row["last_name"] ."</p><td>
                                    <td><p>". $info_row["student_email"] ."</p><td>
                                    <td><p>". $program ."</p><td>
                                </tr>
                                ";
                            }
                        }
                    ?>
                </table>
            </td>