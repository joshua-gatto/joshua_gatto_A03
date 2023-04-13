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
                                <?php
                                    session_start();
                                    if(isset($_SESSION["user"]) && isset($_POST["login"])) {
                                    // Show these links if the user is logged in
                                    echo '
                                        <tr>
                                            <td><li><a href="./index.php">Home</a></li></td>
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
                            $password_query = $conn->prepare("SELECT student_ID, password FROM users_passwords;");
                            if($password_query->execute()){
                                $password_query->bind_result($student_ID, $hashword); //bind results to student_ID
                                $result = $password_query->get_result();
                                while($row =  $result->fetch_assoc()){
                                    if(password_verify($password, $row["password"])){ //check passwords are the same
                                        //get student_email (and other user_info) where student_ID matches
                                        $email_query = $conn->prepare("SELECT student_email, first_name, last_name, dob FROM users_info WHERE student_ID=?;");
                                        $email_query->bind_param("s", $row["student_ID"]);
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
                                                        $avatar_query->store_result();
                                                        if($adrs && $progs && $avs){
                                                            $address_query->bind_result($street_name, $street_num, $city, $provence, $postal_code);
                                                            $program_query->bind_result($program);
                                                            $avatar_query->bind_result($avatar);
                                                            $adminQuery = $conn->prepare("SELECT account_type FROM users_permissions WHERE student_ID=?;");
                                                            $adminQuery->bind_param("s", $student_ID);
                                                            $adminQuery->execute();
                                                            $adminQuery->store_result();
                                                            $adminQuery->bind_result($account_type);
                                                            echo $account_type;
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
                                                                "account_type" =>  $row["account_type"]
                                                            );
                                                            header("Location: ./index.php");
                                                            exit();
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                echo 'Error: Invalid email or password. Click <a href="./register.php">here</a> to register';
                            }
                        }
                        ?>
                    </div>
                </td>
