<!DOCTYPE html>
         <html lang="en">

            <head>
               <title>Home Page</title>
               <meta charset="UTF-8">
               <link rel="stylesheet" href="style2.css">
               <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
               
            </head>

            <body>
               <!-- validation backend -->
               <?php 
               $name_error = $email_error = $user_error= $password_error=$passmatch_error=$tel_error=$ssn_error=$date_error= "";
               $fullname  =$username= $email = $ssn = $tel=$password=$confirmPassword = $dob = "";
               
               if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 if (empty($_POST["fullname"])) {
                   $name_error = "* Name is required";
                 } else {
                   $fullname = test_input($_POST["fullname"]);
                   // check if name only contains letters and whitespace
                   if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                     $name_error = "* Only letters and white space allowed";
                   }
                 }
                 
                 if (empty($_POST["email"])) {
                   $email_error = "* Email is required";
                 } else {
                   $email = test_input($_POST["email"]);
                   // check if e-mail address is well-formed
                   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                     $email_error = "* Invalid email format";
                   }
                 }
                   
                 
                 if (empty($_POST["username"])) {
                   $user_error = "* User name is required";
                 } else {
                   $username = test_input($_POST["username"]);
                 }
               
                 if (empty($_POST["ssn"])) {
                   $ssn_error = "* SSN is required";
                 } else {
                   $ssn = test_input($_POST["ssn"]);
                 }

                 if (empty($_POST["dob"])) {
                  $date_error = "* DOB is required";
                } else {
                  $dob = test_input($_POST["dob"]);
                }


                if(empty($_POST['password'])){
                  $password_error=" * password is required";
                   }else{
                     $password = test_input($_POST["password"]);
                     if(strlen($_POST['password'])<8) 
                     $password_error=" * password must be minimum 8 characters";
                     }

                     if(strcmp($_POST['password'],$_POST['confirm-password'])!=0){
                        $passmatch_error="* Password not match";
                    }
                    if(empty($_POST['tel'])){
                     $tel_error=" * telephone number is required";
                      }else {
                     $tel=test_input($_POST['tel']);
                      if (!preg_match('/^[0-9]*$/',$_POST['tel'])){
                       $tel_error="*  tel must be number ";}
                      }
                     

                     }
                     
               
      
               
               function test_input($data) {
                 $data = trim($data);
                 $data = stripslashes($data);
                 $data = htmlspecialchars($data);
                 return $data;
               }
               ?>
              <!-- html code-->
               <h1><em><b>Welcome !</h1></em></b>
               <div class="warp">
         
                  <input class="radio" id="one" name="group" type="radio" checked>
                  <input class="radio" id="two" name="group" type="radio">
                  <div class="tabs">
                     <label class="tab" id="one-tab" for="one">Sign Up!</label>
                     <label class="tab" id="two-tab" for="two">Sign In !</label>
                  </div>

                  <div class="panels">

                         <div class="panel" id="one-panel">
                            <form name="sign/up"  autocomplete="on"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                             <div class="fc">
                              <label for="fullname">Full Name: </label>
                              <input type="text" name="fullname" id="fullname" placeholder="ex. John Doe Bk">
                              <span class="error"><?php echo $name_error; ?></span>
                               </div>
                              <div class="fc">
                              <label for="username">User Name: </label>
                              <input type="text" name="username" id="username" placeholder="ex. JohnDoe">
                              <span class="error"><?php echo $user_error; ?></span>
                             </div>
                              <div class="fc">
                              <label for="password">Password: </label>
                              <input type="password" name="password" id="password" placeholder="8 characters long!">
                              <span class="error"><?php echo $password_error; ?></span>
                              </div>
                             <div class="fc">
                              <label for="confirm-password">Confirm Password: </label>
                              <input type="password" name="confirm-password" id="confirm-password" placeholder="8 characters long!">
                              <span class="error"><?php echo $passmatch_error; ?></span>
                                </div>
                               <div class="fc">
                              <label for="email">Email: </label>
                              <input type="text" name="email" id="email" placeholder="ex. John@gmai.com">
                              <span class="error"><?php echo $email_error; ?></span>
                             </div>
                             <div class="fc">
                              <label for="tel">Telephone: </label>
                              <input type="tel" name="tel" id="tel" placeholder="enter your phone number">
                              <span class="error"><?php echo $tel_error; ?></span>
                           </div>
                           <div class="fc">
                              <label for="dob">Date Of Birth: </label>
                              <input type="text" name="dob" id="dob" placeholder="dd/mm/yyyy">
                              <span class="error"><?php echo $date_error; ?></span>
                           </div>
                           <div class="fc">
                              <label for="SSN">Social Security Number: </label>
                              <input type="text" name="ssn" id="ssn" placeholder="SSN">
                              <span class="error"><?php echo $ssn_error; ?></span>
                           </div>
                           <div class="fc">
                              <button type="submit" class="submit"  > Sign Up! </button>
                              
                             
                              
                              
                           </div>
                        </form>
                     </div>

                     <div class="panel" id="two-panel">
                       
                        <form  name="sign/in"autocomplete="on"  method="post" action="safe.php">
                           <div class="fc2">
                              <div class="fc">
                              <label for="log-username">User Name: </label>
                              <input type="text" name="log-username" id="log-username" placeholder="Enter your user name">
                           </div>
                           <div class="fc">
                              <label for="log-password">Password: </label>
                              <input type="password" name="log-password" id="log-password" placeholder="Enter your password">
                           </div>
                           </div>
                           <div class="fc">
                           
                             <input type="hidden" name="fullname" value=<?php echo $fullname?>>
                              <input type="hidden" name="username" value=<?php echo $username?>>
                              <input type="hidden" name="password" value=<?php echo $password?>>
                              <input type="hidden" name="confirm-password" value=<?php echo $confirmPassword?>>
                              <input type="hidden" name="email" value=<?php echo $email?>>
                              <input type="hidden" name="dob" value=<?php echo $tel?>>
                              <input type="hidden" name="tel" value=<?php echo $tel?>>
                              <input type="hidden" name="ssn" value=<?php echo $ssn?>>
                              <button type="submit" class="submit"> Sign In! </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>


            </body>

            </html>