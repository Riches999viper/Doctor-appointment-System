<?php
  require_once 'navbar_reg_login_topbtn.php';
  require_once 'object.php';
  $findDoctorLists=$doctor->selectAllRecordByStatus();
?>
<style>
  .btn_findDoctor{
    display: flex;
    justify-content: center;
    gap:5px;
  }
    .btnFindDoctor {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .btndoctoractive{
          background-color:red;
        }
        .btndoctorlistdisabled{
          opacity:0.5;
          pointer-events: none;
        }
</style>
<?php   
    $count=$doctor->countTotalNoOfDoctorList();
    $total_lists=$count[0]->total_doctors;
    $no_of_page=ceil($total_lists/DOCTOR_LIST_PER_PAGE);
    if(isset($_GET['page'])){
      $current_page=$_GET['page'];
    }else{
      $current_page=1;
    }
    $offset=($current_page-1)*DOCTOR_LIST_PER_PAGE;
    $findDoctorLists=$doctor->selectDoctorListWithPaginationWithStatus(DOCTOR_LIST_PER_PAGE,'years_of_experience',$offset); 
    ?>
	<section class="doctor-section" id="doctor-section">
        <div class="container_doctorlist">
          <h2 class="section-title_doctor">Our Doctors</h2>
          <div class="team-row">
            <?php  foreach($findDoctorLists as $fdl){?>
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
        <div class="btn_findDoctor">
          <a href="<?php echo $_SERVER['PHP_SELF'];?>?page=<?php echo $current_page-1?>" class="btnFindDoctor <?php echo ($current_page==1)?'btndoctorlistdisabled':'';?>"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
          <?php  for($i=1;$i<=$no_of_page;$i++){?>
          <a href="<?php echo $_SERVER['PHP_SELF'];?>?page=<?php echo $i?>" class="btnFindDoctor <?php echo ($current_page==$i)?'btndoctoractive':'';?>"><?php  echo $i;?></a>
            <?php  }?>
          
            <a href="<?php echo $_SERVER['PHP_SELF'];?>?page=<?php echo $current_page+1?>" class="btnFindDoctor <?php echo ($current_page==$no_of_page)?'btndoctorlistdisabled':'';?>"><i class="fa-sharp fa-solid fa-arrow-right"></i></a>

        </div>
      </section>
      <!-- creating footer -->
<?php 
require_once 'footer.php';
?>