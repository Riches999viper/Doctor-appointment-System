
<!-- creating footer -->

<div class="main-footer">
  <div class="inner-footer">
      <h2>Get in Touch</h2>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
  </div>

  <div class="inner-footer">
      <h2>Quick Links</h2>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
  </div>

  <div class="inner-footer">
      <h2>Services</h2>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
      <a href="#">dummy</a>
  </div>
</div>
<!-- copyright section  -->
<hr>
<footer>
 
  <div class="copyright">
    <marquee behavior="" direction="">
    <span style="color:red;font-size: 13px;">&copy;</span> 2023 Your Company. All rights reserved. <span style="color:rgb(206, 81, 23)">Designed and Developed by </span>: <span style="font-size:13px;">Nabin Thapa and Resma Gamal.Connect with us on <?php echo $settingRecord->site_url;?></span>
   </marquee>
  </div>

</footer>
<!-- creating footer -->
<script src="admin-dashboard\js\jquery-3.6.4.min.js"></script>
<script src="js/script.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  // registration process using jquery and ajax 
  $(document).ready(function(){ 
      $('#registrationForm').submit(function(e) {
              e.preventDefault();
              $('#successmsg').removeClass('small_successmsg');
              $('.error').text(''); 

              let name = $('#register_name').val();
              nameRegex=/^[a-zA-Z ]+$/;
              if(name.trim()!==''){
              if (name.length < 3) {
                $('#nameError').text('Name must be at least 3 characters');
              }else if(!nameRegex.test(name)){
                $('#nameError').text('Invalid Name format');
              }
            }else{
              $('#nameError').text('Name is required');
            }

              let email = $('#register_email').val();
              if(email.trim()!==''){
              let emailRegex = /^[a-zA-Z0-9\-_]+[\@][a-z]+[\.][a-z]{2,4}$/;
              if (!emailRegex.test(email)) {
                $('#emailError').text('Invalid email address');
              }
            }else{
              $('#emailError').text('Email address is required');
            }

              let password = $('#register_password').val();
              if(password.trim()!==''){
              if (password.length < 8) {
                $('#passwordError').text('Password must be at least 8 characters');
              }
            }else{
              $('#passwordError').text('Password is required');
            }

              let phone = $('#register_phone').val();
              if(phone.trim()!==''){
              let phoneRegex = /^[9][8][0-9]{8}$/; 
              if (!phoneRegex.test(phone)) {
                $('#phoneError').text('Invalid phone number');
              }
            }else{
              $('#phoneError').text('phone number is required');
            }
            let gender = $('input[name="gender"]:checked').val();
            
              if (!$('.error').text()) {
                $.ajax({
                  url:'ajax_register_login_check.php',
                  method:'post',
                  dataType:'text',
                  data:{'reg_name':name,'reg_email':email,'reg_pass':password,'reg_phone':phone,'reg_gender':gender},
                  success:function(resp){
                    if(resp=='successfull'){
                      $('#successmsg').addClass('small_successmsg').html('Registration Success!!');
                      $('#register_name').val('');
                      $('#register_email').val('');
                      $('#register_password').val('');
                      $('#register_phone').val('');
                    }else if(resp=="unsuccessfull"){
                      $('#successmsg').addClass('small_unsuccessmsg').html('Registration Unsuccess!!!');
                    }
                  },
                  error:function(err){
                    console.log(err);
                  }
                });
              }
            });
      // login part 
      $('#loginform').submit(function(e) {
        e.preventDefault();
        $('#unsuccessmsg').removeClass('small_unsuccessmsg');
        let login_email =$('#login_email').val();
        if(login_email.trim()==''){
          $('#loginEmailError').text('Email is required');
        }else{
          $('#loginEmailError').text('');
        }
        let login_password =$('#login_password').val();
        if(login_password.trim()==''){
          $('#loginPasswordError').text('Password is required');
        }else{
          $('#loginPasswordError').text('');
        }
        
        if (!$('.error').text()) {
          $.ajax({
            url:'ajax_register_login_check.php',
            method:'post',
            dataType:'text',
            data:{'login_email':login_email,'login_password':login_password},
            success:function(resp){
              console.log(resp)
              if(resp=='successfull'){
                $('#unsuccessmsg').addClass('small_successmsg').html('Loading...');
                setTimeout(function () {
                  location.href="index.php";
              }, 3000);
               
              }else if(resp=="Invalid Username/password"){
                $('#unsuccessmsg').addClass('small_unsuccessmsg').html(resp);
              }
            },
            error:function(err){
              console.log(err);
            }
          });
        }
      })
      // ajax for patient email 
      $('#register_email').keyup(function(){
        $email=$(this).val();
      $email=$email.trim();
      $.ajax({
        method:'post',
        url:'check_email_patient.php',
        dataType:"text",
        data:{'patient_email':$email},
        success:function(resp){
          if(resp==="email already exists"){
            $('#emailError').html(resp).css({'color':'red','font-size':'1em'});
            $('#regSubmit').attr('disabled',true).css({'opacity':'0.5'});
          }          
          else{
            $('#emailError').html("");
            $('#regSubmit').attr('disabled',false).css({'opacity':'1'});
          }
        },
        error:function(err){
          console.log(err);
        }
      });
    });
    });
</script>



</body>
</html>