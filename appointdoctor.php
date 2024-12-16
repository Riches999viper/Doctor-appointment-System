<?php  require_once 'navbar_reg_login_topbtn.php';
  $patientid= $_SESSION['id'];
  $specializationList=$doctor->selectAllRecord();
  ?>
  <div class="appointment_container">
    <h2>Appointment Form</h2>
    <form action="" method="post" id="appointmentform">
    <label for="role">Select Speciality:</label>
      <select name="select_speciality" id="select_speciality">
        <option value="">Select Speciality</option>
        <?php  foreach($specializationList as $sL){?>
        <option value="<?php echo $sL->specialization;?>"><?php  echo ucfirst($sL->specialization);?></option>
        <?php  }?>
      </select>
      <span id="select_specialityError"></span>
    <label for="role">Select Doctor:</label>
      <select name="select_doctor" id="select_doctor">
        <option value="">Select Doctor</option>
      </select>
      <span id="select_doctorError"></span>
    <label for="role">Select Day:</label>
      <select name="select_day" id="select_day">
        <option value="">Select Day</option>
      </select>
      <span id="select_dayError"></span>
    <label for="role">Select Slot:</label>
      <select name="select_slot" id="select_slot">
        <option value="">Select Slot</option>
      </select>
      <span id="select_slotError"></span>
    <label for="role">Select Role:</label>
      <select name="select_role" id="select_role">
        <option value="">Select Role</option>
        <option value="1">For Me</option>
        <option value="0">For others</option>
      </select>
      <span id="select_roleError"></span>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" autocomplete="off">
      <span id="nameError"></span>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" autocomplete="off">
      <span id="emailError"></span>
      <label for="phone">Phone:</label>
      <input type="text" id="phone" name="phone" autocomplete="off">
      <span id="phoneError"></span> 
      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4" autocomplete="off"></textarea>
      <span id="messageError"></span>
      <input type="submit" value="Submit">
      <span class="" id="successappointmentmsg">
      <span id="errorAll"></span>
      
    </span>
    </form>
   
  </div>

  <?php  require_once 'footer.php'?>

  <script>
    $(document).ready(function(){
      $('#successappointmentmsg').removeClass('small_appointmentMsg');
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

    //   for specialization 
      $('#select_speciality').change(function(){
        let specialization = $(this).val();
         if(specialization==''){
            $('#select_specialityError').html('Select specialization').css({'color':'red','font-size':'1em'});
            $('#select_doctor').html(`<option value="">Select Doctor</option>`);
            $('#select_slot').html(`<option value="">Select Slot</option>`);
            $('#select_day').html(`<option value="">Select Day</option>`);
         }else{
            $('#select_specialityError').html('');
            $.ajax({
                url:'check_speciality_doctor_day_slots.php',
                method:'post',
                data:{'d_specialization':specialization},
                success:function(resp){
                    $('#select_doctor').html(resp);
                },
                error:function(err){
                    console.log(err);
                }
            });
         }
      });

      //for doctor name
      $('#select_doctor').change(function(){
        let doctorRecord = $(this).val();
         if(doctorRecord==''){
            $('#select_doctorError').html('Select Doctor').css({'color':'red','font-size':'1em'});
            $('#select_day').html(`<option value="">Select Day</option>`);
            $('#select_slot').html(`<option value="">Select Slot</option>`);
         }else{
            $('#select_doctorError').html('');
            $.ajax({
                url:'check_speciality_doctor_day_slots.php',
                method:'post',
                data:{'d_doctorRecord':doctorRecord},
                success:function(resp){
                  console.log(resp);
                   var uniqueDays = [...new Set(resp.split('</option>'))];
                  var uniqueDaysHTML = uniqueDays.map(day => day + '</option>').join('');
                  $('#select_day').html(uniqueDaysHTML);
                },
                error:function(err){
                    console.log(err);
                }
            });
         }
      });

      //for available day and slots
      $('#select_day').change(function(){
        let dayRecord = $(this).val();
        let doctorRecord = $('#select_doctor').val();
         if(dayRecord==''){
            $('#select_dayError').html('Select Day').css({'color':'red','font-size':'1em'});
            $('#select_slot').html(`<option value="">Select Slot</option>`);
         }else{
            $('#select_dayError').html('');
            $.ajax({
                url:'check_speciality_doctor_day_slots.php',
                method:'post',
                data:{'d_dayRecord':dayRecord,'d_doctorId':doctorRecord},
                success:function(resp){
                    $('#select_slot').html(resp);
                },
                error:function(err){
                    console.log(err);
                }
            });
         }
      });


      ///insert appointment
      $('#appointmentform').submit(function(e) {
        e.preventDefault();
       let name=$('#name').val();
       let doctor_id=$('#select_doctor').val();
       let email=$('#email').val();
       let message=$('#message').val();
       let phone=$('#phone').val();
       let select_slot=$('#select_slot').val();
       let patientid = <?php echo json_encode($patientid); ?>;
       if(name.trim()=='' || doctor_id=='' || email.trim()=='' || message.trim()=='' || select_slot=='' || phone.trim()==''){
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
              $('#select_speciality').val('');
              $('#select_doctor').val('');
              $('#select_day').val('');
              $('#select_role').val('');
              $('#select_slot').val('');
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

    })
  </script>