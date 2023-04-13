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
                                    if(isset($_SESSION["user"]) && isset($_POST["login"])) {
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
                                            <td><li><a href="#">Login</a></li></td>
                                        </tr>
                                        <tr>
                                            <td><li><a href="./register.php">Register</a></li></td>
                                        </tr>
                                        ';
                                    }
                                ?>
                            </ul>
                        </table>
                    </nav>
                </td>
                <td>
                    <div>
                        <legend><p>Log In</p></legend>
                        <form>
                            <fieldset>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email"></input>
                                    <label for="password">Password:</label>
                                    <input type="text" name="password" id="password">
                                </div>
                                <div>
                                    <button formmethod="post" name="login">Log In</button>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                        if(isset($_POST["login"])){
                            include_once("connection.php");
                            //get user input
                            $email = mysqli_real_escape_string($conn, $_POST["email"]);
                            $password = mysqli_real_escape_string($conn, $_POST["password"]);
                            //get student_IDs that match associated password
                            $password_query = $conn->prepare("SELECT student_ID FROM users_passwords WHERE password=?;");
                            $password_query->bind_param("s", $password);
                            if($password_query->execute()){
                                $password_query->store_result();
                                $password_query->bind_result($student_ID); //bind results to student_ID
                                if($password_query->num_rows > 0){
                                    while ($password_query->fetch()) { //iterate through all student_IDs where password matches
                                        //get student_email (and other user_info) where student_ID matches
                                        $email_query = $conn->prepare("SELECT student_email, first_name, last_name, dob FROM users_info WHERE student_ID=?;");
                                        $email_query->bind_param("s", $student_ID);
                                        if($email_query->execute()){
                                            $email_query->store_result();
                                            $email_query->bind_result($student_email, $first_name, $last_name, $dob);
                                            if($email_query->num_rows == 1){
                                                while ($email_query->fetch()) {  //iterate through all student_email where student_ID matches (should only be one since student_ID is unique)
                                                    if($email == $student_email){ //if emails match, restore session
                                                        $address_query = $conn->prepare("SELECT street_name, street_number, city, provence, postal_code FROM users_address WHERE student_ID=?;");
                                                        $address_query->bind_param("s", $student_ID);
                                                        $adrs = $address_query->execute();
                                                        $address_query->store_result();
                                                        $program_query = $conn->prepare("SELECT program FROM users_program WHERE student_ID=?;");
                                                        $program_query->bind_param("s", $student_ID);
                                                        $progs = $program_query->execute();
                                                        $program_query->store_result();
                                                        $avatar_query = $conn->prepare("SELECT avatar FROM users_avatar WHERE student_ID=?;");
                                                        $avatar_query->bind_param("s", $student_ID);
                                                        $avs = $avatar_query->execute();
                                                        if($adrs && $progs && $avs){
                                                            $address_query->bind_result($street_name, $street_num, $city, $provence, $postal_code);
                                                            $program_query->bind_result($program);
                                                            $avatar_query->bind_result($avatar);
                                                            $_SESSION["user"] = 
                                                            array(
                                                                "student_ID" => $student_ID,
                                                                "student_email" => $email,
                                                                "first_name" => $first_name,
                                                                "last_name" => $last_name,
                                                                "DOB" => $dob,
                                                                "program" => $program,
                                                                "street_num" => $street_num,
                                                                "street_name" => $street_name,
                                                                "city" => $city,
                                                                "provence" => $provence,
                                                                "postal_code" => $postal_code,
                                                                "avatar" => $avatar,
                                                            );
                                                            header("Location: ./index.php");
                                                            exit();
                                                        }
                                                    }
                                                }
                                            }else{
                                                echo 'Error: Invalid email or password. Click <a href="./register.php">here</a> to register';
                                            }
                                        }
                                    }
                                }else{
                                    echo 'Error: Invalid email or password. Click <a href="./register.php">here</a> to register';
                                }

                            }
                        }
                        ?>
                    </div>
                </td>