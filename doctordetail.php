<?php  
if(isset($_GET['id'])){
  $id=$_GET['id'];
}else{
  header('location:finddoctor.php?noid=1');
}
require_once 'navbar_reg_login_topbtn.php';
$doctor->setData('id',$id);
$schedule->setData('doctor_id',$id);
$doctordetailsList=$doctor->selectAllRecordById();

// time slots manage 
$data=$schedule->retrieveScheduleOrderByDay();
if($data==true){
  usort($data, function($a, $b) {
    $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    $aIndex = array_search($a->day, $daysOfWeek);
    $bIndex = array_search($b->day, $daysOfWeek);
    return $aIndex - $bIndex;
  });
}

$groupedData = [];
if($data==true){
foreach ($data as $item) {
  $day = $item->day;
  if (!isset($groupedData[$day])) {
      $groupedData[$day] = [];
  }
  $slots = substr($item->slots, 0, 5); 
  $formattedSlot = date('g:i A', strtotime($slots));
  $groupedData[$day][] = [
      'id' => $item->id,
      'slot' => $formattedSlot,
      'status'=>$item->status
  ];
}
}
?>

<?php  
$comment->setData('doctor_id',$id);
$commentList=$comment->selectAllCommentsByDoctorId();
?>


<!-- navbar ends from here  -->
  <div class="doctor_appointment_container">
    <div class="doctor_appointment_slots">
    <div class="doctor-info">
      <img src="<?php echo BACKEND_FOLDER.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$doctordetailsList->doctor_image?>" alt="Doctor Image">
      <div class="doctor-details">
        <h2>Dr.<?php  echo ucfirst($doctordetailsList->name);?></h2>
        <p>Specialties: <?php  echo ucfirst($doctordetailsList->specialization);?></p>
        <p>Contact: <?php  echo $doctordetailsList->phone;?></p>
        <p>Experience: <?php  echo $doctordetailsList->years_of_experience;?>years</p>
        <a href="#" class="btnDoctorProfile">View Profile<i class="fa-solid fa-chevron-right"></i></a>
      </div>
    </div>
    </div>
    <div class="appointment-slots">
      <?php  if($groupedData==true){?>
      <h3>Available Slots</h3> 
          <table>
          <tr>
            <th style="border-right:1px solid black;">Day</th>
            <th colspan="20">Slots</th>
          </tr>
          <?php 
          foreach ($groupedData as $day => $slots) {?>
              <tr>
                <td><?php  echo $day;?></td>
               <?php  foreach($slots as $k=> $slot){?>
                
                <?php if(isset($_SESSION['is_login'])){?>
                <td>
                    <a href="appointment.php?doctor_id=<?php echo $doctordetailsList->id;?>&slot=<?php echo $slot['id']?>" class="slot-button
                      <?php 
                          if($slot['status']==1){
                            echo 'slot_reserved';
                          }else if($slot['status']==2){
                            echo 'slot_disabled';
                          }else{
                            echo '';
                          }
                      ?>">
                      <?php echo $slot['slot'];?>
                    </a>
                  </td>
                <?php  }else{?>
                  <td>
                    <a href="index.php?loginfirst=1" class="slot-button
                    <?php 
                          if($slot['status']==1){
                            echo 'slot_reserved';
                          }else if($slot['status']==2){
                            echo 'slot_disabled';
                          }else{
                            echo '';
                          }
                      ?>">
                   <?php echo $slot['slot']; ?></a>
                  </td>
                  <?php  }?>
                <?php  }?>
              </tr>
              <?php  }?>
        </table>
        <?php  }else{?>
          <h3 style="color:red;">No Available Slots</h3> 
          <?php  }?>
    </div>
</div>


    <div class="comment-section">
    <?php  if(is_array($commentList) ||is_object($commentList)){?>
      <h3><?php  echo count($commentList);?> Comments</h3>
      <ul class="comment-list">
        <?php  foreach($commentList as $cL){?>
        <li class="comment-item">
          <img class="author-photo" src="images/user.jpg" alt="User Photo">
          <div class="comment-content">
            <div class="comment-header">
              <p class="author"><?php echo  ucfirst($cL->name);?><span class="comment-time" style="margin-left:5px;font-size: 13px;"><?php  echo substr($cL->commented_at,0,10)?></span></p>
              
            </div>
            <p class="comment-text"><?php echo  $cL->comment?></p>
          </div>
        </li>
       <?php  }?>
      </ul>
      <?php  }else{?>
        <h3>0 Comment</h3>
        <?php  }?>
    </div>

    <div class="comment-form">
      <h3>Leave a Comment</h3>
      <form  action="<?php $_SERVER['PHP_SELF'];?>?id=<?php echo $doctordetailsList->id;?>" method="post" id="commentForm">
        <div>
          <label for="cmt_name">Name*</label>
          <input type="text" id="cmt_name" name="cmt_name">
           <span id="cmtErrName" class="error"></span>
        </div>
        <div>
          <label for="cmt_email">Email*</label>
          <input type="email" id="cmt_email" name="cmt_email">
          <span id="cmtErrEmail" class="error"></span><br>
        </div>
        <div>
          <label for="cmt_comment">Message*</label>
          <textarea id="cmt_comment" name="cmt_comment" rows="4"></textarea>
          <span id="cmtErrComment" class="error"></span>
        </div>
        <?php  if(isset($_SESSION['is_login'])){?>
        <input type="submit" name="btnComment" value="Leave Comment" id="btnComment">
        <div class="commentsubmitted">

        </div>
        <?php  }else{?>
         <a href="index.php?loginfirst=1" class="loginfirst" style="margin-top:8px;">Leave Comment</a> 
          <?php  }?>
      </form>
    </div>
 <?php  
 require_once 'footer.php';
 ?>
<script>
        $(document).ready(function(){
            $('#commentForm').submit(function(e) {
              e.preventDefault();
              let err=0;   
              var id = <?php echo json_encode($id); ?>;
              let cmt_name = $('#cmt_name').val();
              nameRegex=/^[a-zA-Z ]+$/;
              if(cmt_name.trim()!==''){
              if (cmt_name.length < 3) {
                $('#cmtErrName').text('**Name must be at least 3 characters');
                err++;
              }else if(!nameRegex.test(cmt_name)){
                $('#cmtErrName').text('**Invalid Name format');
                err++;
              }
            }else{
              $('#cmtErrName').text('**Name is required');
              err++;
            }
              let cmt_email = $('#cmt_email').val();
              if(cmt_email.trim()!==''){
              let emailRegex = /^[a-zA-Z0-9\-_]+[\@][a-z]+[\.][a-z]{2,4}$/;
              if (!emailRegex.test(cmt_email)) {
                $('#cmtErrEmail').text('Invalid email address');
                err++;
              }
            }else{
              $('#cmtErrEmail').text('**Email address is required');
              err++;
            }

            let cmt_comment = $('#cmt_comment').val();
              if(cmt_comment.trim()!==''){
              if (cmt_comment.length >150) {
                $('#cmtErrComment').text('**Maximum characted exceed');
                err++;
              }
            }else{
              $('#cmtErrComment').text('**Comment is required');
              err++;
            }
              if (err==0) {
                
                $.ajax({
                  url:'doctor_comment.php',
                  method:'post',
                  dataType:'text',
                  data:{'name':cmt_name,'email':cmt_email,'comment':cmt_comment,'doctor_id':id},
                  success:function(resp){
                    console.log(resp);
                    if(resp=='successfull'){
                      $('.commentsubmitted').addClass('small_successmsg').html('Your Comment Has been submitted...');
                      $('#cmt_name').val('');
                      $('#cmt_email').val('');
                      $('#cmt_comment').val('');
                      setTimeout(function () {
                          location.href="doctordetail.php?id=<?php echo $id?>";
                      }, 3000)
                    }else if(resp=="unsuccessfull"){
                      $('#successmsg').addClass('small_unsuccessmsg').html('Comment isnt submitted!!');
                    }
                  },
                  error:function(err){
                    console.log(err);
                  }
                });
              }
              })
            });
 </script>