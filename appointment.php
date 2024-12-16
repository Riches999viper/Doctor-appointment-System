  <?php 
  ob_start();
   require_once 'navbar_reg_login_topbtn.php';
  if(empty($_GET['doctor_id'])){
    header('location:doctordetail.php?nodoctorid&noslot=1');
    ob_end_flush();
  }else{
    $doctor_id=$_GET['doctor_id'];
    $slot=$_GET['slot'];
  }
  $patientid= $_SESSION['id'];
  ?>
  <div class="appointment_container">
    <h2>Appointment Form</h2>
    <form action="" method="post" id="appointmentdoctorform">
       
    <label for="role">Select Role:</label>
      <select name="select_role" id="select_role">
        <option value="">Select Role</option>
        <option value="1">For Me</option>
        <option value="0">For others</option>
      </select>

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" autocomplete="off">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" autocomplete="off">

      <label for="phone">Phone:</label>
      <input type="text" id="phone" name="phone" autocomplete="off">

      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4" autocomplete="off"></textarea>

      <input type="submit" value="Submit">
      <span class="" id="successappointmentmsg">
      <span id="errorAll"></span>
    </form>
  </div>

  <?php  require_once 'footer.php'?>

  <script>
    $(document).ready(function(){
      $('#select_role').change(function(){
        let select_role=$(this).val();
        let patientid = <?php echo json_encode($patientid); ?>;
        if(select_role==1){
          $.ajax({
            url:'get_patient_detail.php',
            method:'post',
            data:{'role':select_role,'patient_id':patientid},
            success:function(resp){
              console.log(resp);
              let data=JSON.parse(resp);
              $('#name').val(data.name);
              $('#phone').val(data.phone);
              $('#email').val(data.email);
            },
            error:function(err){
              console.log(err);
            }
          })
        }else if(select_role==0){
          $('#name').val('');
              $('#phone').val("");
              $('#email').val("");
        }else if(select_role==''){
          $('#name').val('');
              $('#phone').val("");
              $('#email').val("");
        }
      });

      // insert into appointment form
      $('#appointmentdoctorform').submit(function(e) {
        e.preventDefault();
       let name=$('#name').val();
       let email=$('#email').val();
       let message=$('#message').val();
       let phone=$('#phone').val();
       let patientid = <?php echo json_encode($patientid); ?>;
       let doctor_id = <?php echo json_encode($doctor_id); ?>;
       let select_slot = <?php echo json_encode($slot); ?>;
       if(name.trim()=='' ||  email.trim()=='' || message.trim()=='' || phone.trim()==''){
        $('#errorAll').html('***Please Fill All Credentials').css({'color':'red','font-size':'1.2em'});
       }else{
        $('#errorAll').html('');
        $.ajax({
          method:'post',
          url:'appointment_form.php',
          data:{'pname':name,'pdoctor_id':doctor_id,'pemail':email,'pmessage':message,'pphone':phone,'pselect_slots':select_slot,'ppatient_id':patientid},
          success:function(resp){
            if(resp === 'success'){
              console.log(resp);
              $('#successappointmentmsg').addClass('small_appointmentMsg').html('Appointment Fillup Success!!');
              $('#email').val('');
              $('#name').val('');
              $('#phone').val('');
              $('#message').val('');
            }else{
              $('#successappointmentmsg').html('Data insertion failed');
            }
          },
          error:function(err){
            console.log(err);
          }
        })
       }
      })
    });


    
  </script>