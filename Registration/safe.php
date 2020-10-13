<!DOCTYPE html>
 <html>
   <head>
     <title>  Logged In </title>
     <link rel="stylesheet" href="style3.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
   </head>
   <body>
      <?php     
      $fullname  =$username= $email = $ssn = $tel=$password=$confirmPassword = $dob = $logusername=$logpassword="";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
         $logusername=htmlspecialchars($_POST['log-username']);
        $logpassword=htmlspecialchars($_POST['log-password']);
        $fullname=htmlspecialchars($_POST['fullname']);
        $username=htmlspecialchars($_POST['username']);
        $password=htmlspecialchars($_POST['password']);
        $confirmPassword=htmlspecialchars($_POST['confirm-password']);
        $email=htmlspecialchars($_POST['email']);
        $tel=htmlspecialchars($_POST['tel']);
        $dob=htmlspecialchars($_POST['dob']);
        $ssn=htmlspecialchars($_POST['ssn']);


        if(empty($_POST['log-username']) || empty($_POST['log-password'])){
          header('location:home.php') ;
          }elseif(strcmp($password,$logpassword)==0 && ($username==$logusername)){
              ?>
        
 
          
            <h1> Hello ! <?php echo $logusername ?> </h1>
            <div class="warp">
                         <p>Your Info Are As Follow: </p>
                        <div><label> Full Name:</label><span><?php echo $fullname ?></span></div>
                        <br>
                        <div> <label> UserName : </label> <span><?php echo $username ?></span></div>
                        <br>
                        <div> <label>Date Of Birth: </label><span><?php echo $dob ?></span></div>
                        <br>
                        <div> <label> Email:</label><span><?php echo $email ?></span></div>
                        <br>
                        <div> <label>Telephone </label><span><?php echo $tel ?></span></div>
                        <br>
  
                    
                       
                        <div><label>SSN:</label> <span> <?php echo $ssn ?></span></div>
                        <br>
            </div>
                        
          <?php }else {
           echo"<script>alert('Wrong UserName Or Password');</script>";
           header('location:home.php');}}
          
           ?>   
   </body>
 </html>