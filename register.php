<!DOCTYPE html>
<html lang="en">
<head >
   <meta charset="utf-8">
   <title>Register on SYSCBOOK</title>
   <link rel="stylesheet" href="assets/css/reset.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   <header>
      <h1>SYSCBOOK</h1>
      <p>Social media for SYSC students in Carleton University</p>
   </header>
   <nav>
   </nav>
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
                        <tr>
                           <td><li><a href="./profile.php">Profile</a></li></td>
                        </tr>
                        <tr id="current">
                           <td><li><a href="#">Register</a></li></td>
                        </tr>
                        <tr>
                           <td><li><a href="logOut.php">Log Out</a></li></td>
                        </tr>
                     
                     </ul>
               </table>
               </nav>
            </td>
            <td>
               <section>
                  <h2>Register a new profile</h2>
                  <form method="post" action="profile.php">
                     <fieldset>
                        <legend><p>Personal information</p></legend>
                        <table>
                           <tr>
                              <td>
                                 <label>First Name: </label>
                                 <input type="text" name="first_name"></input>
                              </td>
                              <td>
                                 <label>Last Name: </label>
                                 <input type="text" name="last_name"></input>
                              </td>
                              <td>
                                 <label>DOB: </label>
                                 <input type="date" name="DOB"></input>
                              </td>
                           </tr>
                        </table>
                     </fieldset>
                     <fieldset>
                        <legend><p>Profile Information</p></legend>
                        <table>
                           <tr>
                              <td>
                                 <label>Email Address: </label>
                                 <input type="email" name="student_email">
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <label>Program </label>
                                 <select name='program'>
                                    <option selected>Choose Program</option>
                                    <option value="Computer Systems Engineering">Computer Systems Engineering</option>
                                    <option value="Software Engineering">Software Engineering</option>
                                    <option value="Communications Engineering">Communications Engineering</option>
                                    <option value="Biomedical and Electrical Engineering">Biomedical and Electrical Engineering</option>
                                    <option value="Electrical Engineering">Electrical Engineering</option>
                                    <option value="Other">Special</option>
                                 </select>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <td class="buttons"><button type='submit' name='register_submit' value='register_submit' formmethod='post'>Submit</button></td>
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