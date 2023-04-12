<!DOCTYPE html>
<html lang="en">
<head >
   <meta charset="utf-8">
   <title>Update SYSCBOOK profile</title>
   <link rel="stylesheet" href="assets/css/reset.css" />
   <link rel="stylesheet" href="assets/css/style.css" />
   <?php
      session_start();
      if((isset($_POST["profile_submit"]) || isset($_POST["register_submit"])) && isset($_SESSION["user"])){
         include_once("connection.php");
         //common user data
         $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
         $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
         $dob = mysqli_real_escape_string($conn, $_POST["DOB"]);
         $email = mysqli_real_escape_string($conn, $_POST["student_email"]);
         $program = mysqli_real_escape_string($conn, $_POST["program"]);
         //profile user data
         if(isset($_POST["profile_submit"])){
            $street_num = mysqli_real_escape_string($conn, $_POST["street_number"]);
            $street_name = mysqli_real_escape_string($conn, $_POST["street_name"]);
            $city = mysqli_real_escape_string($conn, $_POST["city"]);
            $provence = mysqli_real_escape_string($conn, $_POST["provence"]);
            $postal_code = mysqli_real_escape_string($conn, $_POST["postal_code"]);
            $avatar = mysqli_real_escape_string($conn, $_POST["avatar"]);
         }else{
            $street_num = 0;
            $street_name = NULL;
            $city = NULL;
            $provence = NULL;
            $postal_code = NULL;
            $avatar = NULL;
         }
         //form first query
         $infoQuery = "INSERT INTO users_info(student_email, first_name, last_name, DOB) VALUES ('$email', '$first_name', '$last_name', '$dob');";
         //submit first query
         if (mysqli_query($conn, $infoQuery) === TRUE) {
               //get generated ID
               $student_ID = mysqli_insert_id($conn);
               //generate remaining queries
               $programQuery = "INSERT INTO users_program(student_ID, Program) VALUES ('$student_ID', '$program');";
               $addressQuery = "INSERT INTO users_address(student_ID, street_number, street_name, city, provence, postal_code) VALUES ('$student_ID', '$street_num', '$street_name', '$city', '$provence', '$postal_code');";
               $avatarQuery = "INSERT INTO users_avatar(student_ID, avatar) VALUES('$student_ID', '$avatar');";
               //submit remaining queries
               if(mysqli_query($conn, $programQuery) === TRUE and mysqli_query($conn, $addressQuery) === TRUE and mysqli_query($conn, $avatarQuery) === TRUE){
                  //print results
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
               }else{
                  echo "Error persisting user data, Error Code 1" . $conn->connect_error;
               }
         }else{
               echo "Error persisting user data, Error Code 2" . $conn->connect_error;
         }
         $conn->close();
      }elseif(!isset($_SESSION["user"])){
         echo "No user logged in";
      }else{
         echo "logged in as ". $_SESSION["user"]["student_ID"] .", ". $_SESSION["user"]["first_name"];
      }
   ?>
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
                  <ul>
                     <table class="sideBar">
                        <tr>
                           <td><li><a href="./index.php">Home</a></li></td>
                        </tr>
                        <tr id="current">
                           <td><li><a href="#">Profile</a></li></td>
                        </tr>
                        <tr>
                           <td><li><a href="./register.php">Register</a></li></td>
                        </tr>
                        <tr>
                           <td><li><a href="logOut.php">Log Out</a></li></td>
                        </tr>
                     </table>
                  </ul>
               </nav>
            </td>
            <td>
               <section>
                  <h2>Update Profile information</h2>
                  <form>
                     <fieldset>
                        <legend><p>Personal information</p></legend>
                        <table>
                           <tr>
                              <td>
                                 <label>First Name: </label>
                                 <input type="text" name="first_name" value="<?php echo $_SESSION["user"]["first_name"]; ?>"></input>
                              </td>
                              <td>
                                 <label>Last Name: </label>
                                 <input type="text" name="last_name" value="<?php echo $_SESSION["user"]["last_name"]; ?>"></input>
                              </td>
                              <td>
                                 <label>DOB: </label>
                                 <input type="date" name="DOB" value="<?php echo $_SESSION["user"]["DOB"]; ?>"></input>
                              </td>
                           </tr>
                        </table>
                     </fieldset>
                     <fieldset>
                        <legend><p>Address</p></legend>
                        <table>
                           <tr>
                              <td>
                                 <label>Street Number: </label>
                                 <input type="number" name="street_number" value="<?php echo $_SESSION["user"]["street_num"]; ?>">
                              </td>
                              <td>
                                 <label>Street Name: </label>
                                 <input type="text" name="street_name" value="<?php echo $_SESSION["user"]["street_name"]; ?>">
                              </td>
                              <td>
                                 <label>City: </label>
                                 <input type="text" name="city" value="<?php echo $_SESSION["user"]["city"]; ?>">
                              </td>
                           </tr>
                           <label>Province: </label>
                           <input type="text" name="provence" value="<?php echo $_SESSION["user"]["provence"]; ?>">
                           <label>Postal Code: </label>
                           <input type="text" name="postal_code" value="<?php echo $_SESSION["user"]["postal_code"]; ?>">
                        </table>
                     </fieldset>
                     <fieldset>
                        <legend><p>Profile Information</p></legend>
                        <table>
                           <tr>
                              <td>
                                 <label>Email Address: </label>
                                 <input type="email" name="student_email" value="<?php echo $_SESSION["user"]["student_email"]; ?>">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <label>Program </label>
                                 <select name="program">
                                    <option <?php if(!isset($_SESSION["user"]["program"])) echo "selected"; ?>>Choose Program</option>
                                    <option value="Computer Systems Engineering" <?php if($_SESSION["user"]["program"] == "Computer Systems Engineering") echo "selected"?>>Computer Systems Engineering</option>
                                    <option value="Software Engineering" <?php if($_SESSION["user"]["program"] == "Software Engineering") echo "selected"?>>Software Engineering</option>
                                    <option value="Communications Engineering" <?php if($_SESSION["user"]["program"] == "Communications Engineering") echo "selected"?>>Communications Engineering</option>
                                    <option value="Biomedical and Electrical Engineering" <?php if($_SESSION["user"]["program"] == "Biomedical and Electrical Engineering") echo "selected"?>>Biomedical and Electrical Engineering</option>
                                    <option value="Electrical Engineering" <?php if($_SESSION["user"]["program"] == "Electrical Engineering") echo "selected"?>>Electrical Engineering</option>
                                    <option value="Other" <?php if($_SESSION["user"]["program"] == "Other") echo "selected"?>>Special</option>
                                 </select>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <label>Choose Avatar</label>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <input type="radio" name="avatar" class="avatarSelect" value="A" <?php if($_SESSION["user"]["avatar"] == "A") echo "checked"?>>
                                 <img class="pfp" src="./images/img_avatar1.png" alt="Avatar 1">
                                 <input type="radio" name="avatar" class="avatarSelect" value="B" <?php if($_SESSION["user"]["avatar"] == "B") echo "checked"?>>
                                 <img class="pfp" src="./images/img_avatar2.png" alt="Avatar 2">
                                 <input type="radio" name="avatar" class="avatarSelect" value="C" <?php if($_SESSION["user"]["avatar"] == "C") echo "checked"?>>
                                 <img class="pfp" src="./images/img_avatar3.png" alt="Avatar 3">
                                 <input type="radio" name="avatar" class="avatarSelect" value="D" <?php if($_SESSION["user"]["avatar"] == "D") echo "checked"?>>
                                 <img class="pfp" src="./images/img_avatar4.png" alt="Avatar 4">
                                 <input type="radio" name="avatar" class="avatarSelect" value="E" <?php if($_SESSION["user"]["avatar"] == "E") echo "checked"?>>
                                 <img class="pfp" src="./images/img_avatar5.png" alt="Avatar 5">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <td class="buttons"><button type="submit" name="profile_submit" value="submit" formmethod="post">Submit</button></td>
                                 <td class="buttons"><button type="reset" formaction="reset.css">Reset</button></td>
                              </td>
                           </tr>
                        </table>
                     </fieldset>
                  </form>
               </section>
            </td>
         </tr>
      </table>
   </main>
</body>
</html>