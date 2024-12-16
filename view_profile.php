<!DOCTYPE html>
<html>
<head>
  <!-- Include necessary CSS and JavaScript libraries -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>
    /* Center-align the tabs horizontally */
    .view_patient_profile{
        margin-top:120px;
    }
    #tabs {
      margin: 12px auto;
      width: 80%;
      font-size: 17px;
    }

    /* Style the tabs */
    #tabs ul {
      display: flex;
    justify-content: center;
    list-style-type: none;
    padding: 0;
    }

    #tabs ul li {
      display: inline;
      margin-right: 10px;
      padding: 5px 10px;
      background-color: #007BFF; /* Tab background color */
      border: 1px solid #0056b3; /* Tab border color */
      border-radius: 5px;
      cursor: pointer;
    }

    #tabs ul li a {
      color: #fff; /* Tab text color */
      text-decoration: none;
    }

    #tabs ul li:hover {
      background-color: #0056b3; /* Tab background color on hover */
    }

    /* Style the tab content */
    #tabs .ui-tabs-panel {
      padding: 20px;
      background-color: #fff; /* Tab content background color */
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    #patient-name {
      border-bottom: 1px solid red;
    }
    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 16px;
  }

  /* Style table header */
  th {
    background-color:rgba(0,0,0,.3) !important;
    color: red !important;
    padding: 10px;
    text-align: left;
  }

  /* Style table rows */
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  /* Style table cells */
  td {
    padding: 8px;
  }
    .btnCancel{
        padding: 10px 20px !important;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        background-color: #dc3545;
        color: #fff !important;
    }
  </style>
</head>
<body>
  <?php
    require_once 'navbar_reg_login_topbtn.php';
    require_once 'object.php';
    $id = $_SESSION['id'];
    $patient->setData('id', $id);
    $patientRecord=$patient->selectAllRecordById();
    $appointment->setData('patient_id',$id);
    $data=$appointment->selectRecordByPatientId();
  ?>
  <section class="view_patient_profile" id="view_patient_profile">
    <h2 style="text-align:center;color:red;"><span id="patient-name">Patient Name:<?php echo ucfirst($patientRecord->name); ?></span></h2>
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">My Profile</a></li>
        <li><a href="#tabs-3">View Appointment</a></li>
      </ul>
      <div id="tabs-1">
        <!-- Tab 1 content -->
        <p style="text-align:center">My Profile</p>
        <table border="1">
            <tr>
                <th>Id</th>
                <td><?php echo $patientRecord->id; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo ucfirst($patientRecord->name); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $patientRecord->email; ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?php echo $patientRecord->phone; ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <?php  if($patientRecord->status==1){?>
                    <td style="color:green;">Active</td>
                    <?php }else{?>
                        <td style="color:red">In Active</td>
                    <?php  }?>
            </tr>
        </table>
      </div>
      <div id="tabs-3">
        <form action="" method="post">
            <table id="appointment_table">
              <thead>
                <tr>
                  <th>Doctor Name</th>
                  <th>Message</th>
                  <th>Day</th>
                  <th>Slot</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php if(is_array($data)|| is_object($data)){?>
                  <?php foreach($data as $d){?>
                  <td>Dr.<?php  echo ucfirst($d->doctor_name);?></td>
                  <td><?php  echo $d->message;?></td>
                  <td><?php  echo $d->day;?></td>
                  <td><?php  echo $d->slots;?></td>
                  <?php if($d->sche_status==1){?>
                    <td style="color: orange;">Pending</td>
                    <?php }else if($d->sche_status==2){?>
                      <td style="color:green;">Approved</td>
                      <?php }else if($d->sche_status==0){?>
                        <td style="color:red;">Rejected</td>
                        <?php  }?>
                      <td><a href="cancel_appointment.php?id=<?php echo $d->id;?>" class="btnCancel" onclick=" return confirm('Are your sure you want to cancel your appointment?')">Cancel Appointment</a></td>
                </tr>
                <?php  }?>
                <?php  }else{?>
                  <tr style="text-align:center;color:red !important;">
                  <td>No Data Found</td>
                </tr>
                  <?php  }?>
              </tbody>
            </table>
        </form>
      </div>
    </div>
  </section>
  <?php 
    require_once 'footer.php';
  ?>
  <script>
    $(document).ready(function(){
      $("#tabs").tabs();
    })
  </script>
</body>
</html>
