    <?php require_once 'navbar_reg_login_topbtn.php';?>
    <?php  
    $aboutusList=$aboutus->selectAllRecord();
    $aboutusList=$aboutusList[0];
    ?>
  <div class="aboutus_container">
    <h1>About Us</h1>
    <div class="aboutus_image-row">
      <div class="image-container-aboutus">
        <img src="<?php echo BACKEND_FOLDER.DIRECTORY_SEPARATOR.'uploads/aboutusimage/'.$aboutusList->image_one;?>" alt="Image 1">
      </div>
      <div class="image-container-aboutus">
        <img src="<?php echo BACKEND_FOLDER.DIRECTORY_SEPARATOR.'uploads/aboutusimage/'.$aboutusList->image_two;?>" alt="Image 2">
      </div>
    </div>
    <div class="description">
      <h2><?php echo $aboutusList->title?></h2>
      <p><?php  echo $aboutusList->description;?></p>
    </div>
  </div>

  <?php  require_once 'footer.php';?>
