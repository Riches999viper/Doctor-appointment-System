<?php  
require_once 'navbar_reg_login_topbtn.php';
$doctorLimitRecord=$doctor->selectDoctorByLimit();
?>
    <!-- image-slider starts from here  -->
    <div class="image-slider-container">
      <div class="container">
        <div class="image_content">
            <img src="images/doctortwo.jpg" alt="image" id="img_src">
            <div class="btn">
                <button id="prev"><i class="fa-thin fa-period"></i></i></button>
                <button id="next"><i class="fa-thin fa-period"></i></i></button>
            </div>
        </div>
      </div>
      <div class="main-slogan">
        <h2><?php echo $settingRecord->slogan;?></h2>
        <?php  if(!isset($_SESSION['is_login'])){?>
        <button id="booknowlogin">Book Now</button>
        <?php }else{ ?>
          <a href="finddoctor.php"><button>Get Appointment</button></a>
          <?php  }?>
      </div>
    </div>  
    
  <!-- image slider ends from here  -->
  
<!-- services we provide -->
<div class="service-section">
  <h2 id="ourservices">Our Services</h2>
  <div class="inner-service-section">
      <div class="service-box">
            <i class="fas fa-user-friends"></i>
        <h2>Best Treatment</h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
      </div>
        <div class="service-box">
            <i class="fas fa-clinic-medical"></i>
        <h2>Best Treatment</h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
      </div>
      <div class="service-box">
            <i class="fas fa-user-plus"></i>
        <h2>Best Treatment</h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
      </div>
      <div class="service-box">
            <i class="fas fa-ambulance"></i>
        <h2>Best Treatment</h2>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
      </div>
  </div>
</div>
<!-- services we provide ended -->

<!-- our team seaction -->
<div class="ourteam-section">
  <h2><span> Book Appointment With</span> Your Doctor</h2>
  <section class="doctor-section_home" id="doctor-section">
        <div class="container_doctorlist">
          <div class="team-row ">
            <?php  foreach($doctorLimitRecord as $fdl){?>
            <div class="team-box">
              <div class="team-media">
                <a href="doctordetail.php?id=<?php echo $fdl->id;?>"><img src="<?php echo BACKEND_FOLDER.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$fdl->doctor_image;?>" alt=""></a>
              </div>
              <div class="team-info">
                <h3>Dr.<?php  echo ucfirst($fdl->name);?></h3>
                <p><?php  echo ucfirst($fdl->specialization);?></p>
                <p>Experience:<?php  echo $fdl->years_of_experience;?> /<span>Contact:<?php  echo $fdl->phone;?></span></p>
                <a href="doctordetail.php?id=<?php echo $fdl->id;?>" class="btnDoctorList">Set Appointment</a>
              </div>
            </div>
            <?php  }?>
          </div>
        </div>
      </section>
    <div class="view-doctors">
      <a href="finddoctor.php" class="btnView">View Doctors</a>
    </div>
</div>
<!-- our team seaction -->

<!-- testimonials area starts from here  -->
<div class="container_testimonials">
  <h2><span>Testimonials</span></h2>
  <div class="container_testimonials_section">
      <div class="testimonial_section">
          <img src="images/two.jpg" alt="image1">
          <p id="text">Thank You! I have gotten at least 50 times the value from brand. Thank you so much for your help. Brand is awesome!</p>
          <p id="username">- Dylan Q</p>
      </div>
      <div class="testimonial_section">
          <img src="images/two.jpg" alt="image1">
          <p id="text">Thank You! I have gotten at least 50 times the value from brand. Thank you so much for your help. Brand is awesome!</p>
          <p id="username">- Dylan Q</p>
      </div>
      <div class="testimonial_section">
          <img src="images/two.jpg" alt="image1">
          <p id="text">Thank You! I have gotten at least 50 times the value from brand. Thank you so much for your help. Brand is awesome!</p>
          <p id="username">- Dylan Q</p>
      </div>
  </div>
</div>
<?php  if(isset($_GET['loginfirst']) && $_GET['loginfirst']==1){?>
<div  class="toastContainer">
<h3><i class="fa-solid fa-triangle-exclamation" style="margin-right:5px;"></i>You need to login first!!!</h3>
</div>
<?php  }?>
<?php  require_once 'footer.php';
?>