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
                                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                                $password = mysqli_real_escape_string($conn, $_POST["password"]);
                                $query = $conn->prepare("
                                SELECT *
                                FROM users_info
                                JOIN users_program ON users_info.student_ID = users_program.student_ID
                                JOIN users_avatar ON users_info.student_ID = users_avatar.student_ID
                                JOIN users_address ON users_info.student_ID = users_address.student_ID
                                JOIN users_posts ON users_info.student_ID = users_posts.student_ID
                                JOIN users_passwords ON users_info.student_ID = users_passwords.student_ID
                                WHERE users_info.student_email=?
                                AND users_passwords.password=?;
                                ");
                                $query->bind_param("ss", $password, $email);
                                if($query->execute()){
                                    if($query->num_rows == 1){
                                        $row = $query->get_results()->fetch_assoc();
                                        session_start();
                                        $_SESSION["user"] = 
                                        array(
                                            "student_ID" => $row["student_ID"],
                                            "student_email" => $row["email"],
                                            "first_name" => $row["first_name"],
                                            "last_name" => $row["last_name"],
                                            "DOB" => $row["DOB"],
                                            "program" => $row["program"],
                                            "street_num" => $row["street_number"],
                                            "street_name" => $row["street_name"],
                                            "city" => $row["city"],
                                            "provence" => $row["provence"],
                                            "postal_code" => $row["postal_code"],
                                            "avatar" => $row["avatar"],
                                        );
                                        echo "Logged in";
                                    }else{
                                        echo "Invalid email or password";
                                    }
                                }
                            }
                        ?>
                    </div>
                </td>
