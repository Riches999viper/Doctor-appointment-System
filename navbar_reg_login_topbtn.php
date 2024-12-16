<?php
session_start();   
require_once 'object.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $settingRecord->name;?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo BACKEND_FOLDER.DIRECTORY_SEPARATOR.'uploads/logo'.DIRECTORY_SEPARATOR.$settingRecord->logo;?>" rel="icon">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- external css link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- navbar starts from here  -->
 <header class="header">
                <a href="index.php" id="logo"><img src="<?php echo BACKEND_FOLDER.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'logo/'.$settingRecord->logo;?>" alt="" style="width:80px;height:50px;border-radius:80%;"></a>
                  <nav class="navbar">
                    <a href="index.php">Home</a>
                    <a href="finddoctor.php">Find Doctor</a>
                    <a href="aboutus.php">About Us</a>
                    <?php  if(isset($_SESSION['is_login'])){?>
                      <a href="appointdoctor.php">Appointment</a>
                    <a href="view_profile.php">View Profile</a>
                    <a href="logout.php">Log Out</a>
                    <?php }else{ ?>
                    <a href="#" id="register">Register</a>
                    <a href="#" id="login">Login</a>
                    <?php  }?>
                  </nav>
            <div class="icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <p style="font-size:14px;margin-left:5px;">Contact:<?php echo $settingRecord->phone?></p>
            </div>
            <a href="#" id="menu_bars" class="fas fa-bars"></a>
          </header>
    <!-- navbar ends from here  -->
    <!--registration modal starts from here  -->
 <div class="register_container">
    <h1>Registration Form</h1>
    <form id="registrationForm" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="register_name">Name:</label>
        <input type="text" id="register_name" name="register_name" autocomplete="off">
        <span id="nameError" class="error"></span>
      </div>
      <div class="form-group">
        <label for="register_email">Email:</label>
        <input type="email" id="register_email" name="register_email" autocomplete="off">
        <span id="emailError" class="error"></span>
      </div>
      <div class="form-group">
        <label for="register_password">Password:</label>
        <input type="password" id="register_password" name="register_password">
        <span id="passwordError" class="error"></span>
      </div>
      <div class="form-group">
        <label for="register_phone">Phone:</label>
        <input type="text" id="register_phone" name="register_phone" autocomplete="off">
        <span id="phoneError" class="error"></span>
      </div>
      <div class="form-group gender-group">
        <label>Gender:</label>
        <label for="male"><input type="radio" id="male" name="gender" value="0" required checked>Male</label>
        <label for="female"><input type="radio" id="female" name="gender" value="1" required>Female</label>
        <label for="other"><input type="radio" id="other" name="gender" value="2" required>Other</label>
      </div>
      <div class="form-group">
        <input type="submit" value="Submit" id="regSubmit">
      </div>
      <div class="" id="successmsg">
       
      </div>
      <div class="remove_modal_register" style="color:black">
        <i class="fa-sharp fa-regular fa-circle-xmark"></i>
      </div>
    </form>
  </div>
    <!-- registration modal ends here  -->
    <!-- loginmodal starts from here  -->

    <div class="login_container">
      <h1>Login</h1>
      <form action="" id="loginform"  method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="login_email">Email:</label>
          <input type="email" id="login_email" name="login_email"  autocomplete="off"> 
          <span id="loginEmailError" class="error"></span>
        </div>
        <div class="form-group">
          <label for="login_password">Password:</label>
          <input type="password" id="login_password" name="login_password">
          <span id="loginPasswordError" class="error"></span>
        </div>
        <div class="form-group">
          <input type="submit" value="Login" name="btnLogin" id="btnLogin">
        </div>
        <div class="" id="unsuccessmsg">
       
       </div>
        <div class="remove_modal_login" style="color:black">
          <i class="fa-sharp fa-regular fa-circle-xmark"></i>
      </div>
      </form>
    </div>
      <!-- scrollup button  -->
      <div class="scroll_top">
        <button id="scroll_top_section"><i class="fa-solid fa-arrow-up"></i></button>
      </div>